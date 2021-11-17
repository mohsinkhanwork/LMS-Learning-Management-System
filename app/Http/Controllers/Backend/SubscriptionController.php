<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Stripe\StripePlan;
use Illuminate\Http\Request;
use App\Models\refferal_income;
use App\Models\Auth\User;

class SubscriptionController extends Controller
{
   
   public function __invoke(Request $request)
    {
        $first_paid_course = NULL;
        $subscribed_amount = NULL;
        $purchased_courses = NULL;
        // for referral income
            $purchased_courses = auth()->user()->purchasedCourses();
            //for subscription
            $check = refferal_income::where('newuser_id',auth()->user()->id)->get();
            if (count($check) == 0) {
            $stripe_plan_id = auth()->user()->subscribed('default') ? auth()->user()->subscription('default')->stripe_plan  : '';
            $stripe_plan = StripePlan::where('plan_id', $stripe_plan_id)->first();
            if($stripe_plan != ''){
            $subscribed_amount = $stripe_plan->amount;
            }
            //end subscription
            // for courses
            $first_paid_course = array();
            foreach ($purchased_courses as $key => $value) {
                if($value->free == 0){
                $first_paid_course = $value;
                break;
                }
            }
            $stripe_plandata = array();
            $stripe_plandata= auth()->user()->subscribed('default') ? auth()->user()->subscription('default')->toArray() : '';
            if ($stripe_plandata != '') {
                array_push($stripe_plandata, $stripe_plandata['price'] = $subscribed_amount);
            }
            $course_subscription = [$first_paid_course, $stripe_plandata];
            $first_buy = collect($course_subscription)->sortBy('created_at')->filter(function($value) {return !empty($value);})->first();
            $refferer_user = User::where('refferal_code',auth()->user()->refferal_code_affilate ?? '')->first();
            if ($refferer_user != '' && $first_buy != '') {
                $refferal_income = $first_buy['price'] * 75 /100;
                refferal_income::create(['user_id'=>$refferer_user->id, 'refferal_income'=>$refferal_income, 'newuser_id'=>auth()->user()->id , 'paidstatus'=>0]);
            }
            }
        $user     = $request->user();
        $invoices = $user->subscribed('default') ? $user->StripeInvoices() : optional();
        $activePlan = $user->subscribed('default') ? StripePlan::where('plan_id', $user->subscription()->stripe_plan)->first()??optional() : optional();
        return view('backend.subscription', compact('user', 'invoices', 'activePlan'));
    }

    /**
     * Download an invoice
     */
    public function downloadInvoice($invoiceId)
    {
        return auth()->user()->downloadInvoice($invoiceId, [
            'vendor'  => config('app.name'),
            'product' => 'Monthly Subscription'
        ]);
    }

    /**
     * Delete subscription
     */
    public function deleteSubscription(Request $request)
    {
        $user = $request->user();

        // cancel the subscription
        $user->subscription('default')->cancel();

        return redirect()->back()->withFlashSuccess(__('labels.subscription.cancel'));
    }

    /**
     * Update the credit card
     */
    public function updateCard(Request $request)
    {
        // get the user
        $user = $request->user();

        // get the cc token
        $ccToken = $request->input('cc_token');

        // update the card
        $user->updateCard($ccToken);

        // return a redirect back to account
        return redirect('account')->with(['success' => 'Credit card updated.']);
    }

}
