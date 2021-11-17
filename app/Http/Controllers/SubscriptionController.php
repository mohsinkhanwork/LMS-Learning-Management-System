<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\Course;
use App\Models\Order;
use App\Models\Stripe\StripePlan;
use Illuminate\Http\Request;
use App\Models\Category;

class SubscriptionController extends Controller
{
    private $path;

    public function __construct()
    {
        $path = 'frontend';
        if(session()->has('display_type')){
            if(session('display_type') == 'rtl'){
                $path = 'frontend-rtl';
            }else{
                $path = 'frontend';
            }
        }else if(config('app.display_type') == 'rtl'){
            $path = 'frontend-rtl';
        }
        $this->path = $path;
    }

    public function plans()
    {
        $plans = StripePlan::get();
        $categories = Category::where('status', '=', 1)->get();
        return view($this->path.'.subscription.price_plans', compact('plans','categories'));
    }



    public function price()
    {
        
        return view($this->path.'.subscription.price_plans');
    }





    public function showForm(StripePlan $plan)
    {

        $intent = auth()->user()->createSetupIntent();
        return view($this->path.'.subscription.form', compact('plan', 'intent'));
    }

    /**
     * Process the form
     */
    public function subscribe(Request $request, StripePlan $plan)
    {
        $paymentMethod = $request->paymentMethod;
        // grab the user
        $user = $request->user();
        $address = [
            "city" => null,
            "country" => null,
            "line1" => null,
            "line2" => null,
            "postal_code" => null,
            "state" => null,
        ];

        $user->createOrGetStripeCustomer();
        $stripe = new \Stripe\StripeClient(
          'sk_live_4n0jurauKjSAjgdI76CTmLPT'
        );
        $array = $stripe->coupons->all()['data'];
        $valid = [];
        
        foreach ($array as $key => $value) {
            if($request->coupon == $value['name']){
                $valid =  $value['id'];
            }else{
                $valid = '';
            }
        }
        //dd($valid);
        $user->updateStripeCustomer([
            'email' => $request->stripeEmail,
            "address" => $address
        ]);

        // create the subscription
        try {
            // $user->newSubscription('default', $plan->plan_id)
            // ->withCoupon($request->coupon)
            // ->create($paymentMethod, [
            //     'email' => $user->email,
            // ]);
            auth()->user()->newSubscription('default', $plan->plan_id)
            ->withCoupon($valid)
            ->create($paymentMethod);
            
            \Session::flash('success', trans('labels.subscription.done'));
        } catch (\Exception $e) {
            \Log::info($e->getMessage() . ' for subscription plan ' .$plan->name. ' User Name: '.$user->name.' Id:' .$user->id);
            return redirect()->url('subscription/price_plans')->withErrors('Error creating subscription.');
        }
        return redirect()->route('admin.subscriptions')->withDanger('plan comprado con éxito');
        
    }
 

    /**
     * Update the subscription
     */
    public function updateSubscription(Request $request, StripePlan $plan)
    {   
        //dd($request->input());
        $user = $request->user();
        //dd($plan);
        // if a user is cancelled
        if ($user->subscribed('default') && $user->subscription('default')->onGracePeriod()) {

            if ($user->onPlan($plan->plan_id)) {
                // resume the plan
                $user->subscription('default')->resume();
            } else {
                // resume and switch plan
                $user->subscription('default')->resume()->swap($plan->plan_id);
            }

            // if not cancelled, and switch
        } else {
            // change the plan
            $user->subscription('default')->swap($plan->plan_id);
        }


        \Session::flash('success', trans('labels.subscription.update'));
        return redirect()->route('admin.subscriptions')->withDanger('plan actualizado con éxito');
    }

    private function checkQuantity($isQuantity)
    {
        if($isQuantity == 0 || $isQuantity == 99){
            return false;
        }
        return true;
    }

    public function status()
    {
        $categories = Category::where('status', '=', 1)->get();

        return view('frontend.subscription.status',compact('categories'));
    }

    public function courseSubscribed(Request $request)
    {
        $user  = $request->user();

        if($user->subscription()->ended()){
            return redirect()->back()->withDanger(trans('alerts.frontend.course.subscription_plan_expired'));
        }

        if(!$user->subscription()->cancelled()){

            if($user->subscription()->active()){
                $plan = $this->getPlan($user->subscription()->stripe_plan);
                if($request->course_id){
                    if($plan->course == 99){
                        return redirect()->back()->withDanger(trans('alerts.frontend.course.sub_course_not_access'));
                    }
                    if($plan->course != 0 && $user->subscribedCourse()->count() >= $plan->course){
                        return redirect()->back()->withDanger(trans('alerts.frontend.course.sub_course_limit_over'));
                    }
                }else{
                    if($plan->bundle == 99){
                        return redirect()->back()->withDanger(trans('alerts.frontend.course.sub_bundle_not_access'));
                    }
                    if($plan->bundle != 0 && $user->subscribedBundles()->count() >= $plan->bundle){
                        return redirect()->back()->withDanger(trans('alerts.frontend.course.sub_bundle_limit_over'));
                    }
                }

                $this->subscribeBundleOrCourse($request);

                return redirect()->back()->withFlashSuccess($request->course_id) ? '¡Felicidades! Tienes este curso.' : '¡Felicidades! Tienes este curso.';
            }
        }else{

            return redirect()->back()->withDanger('Su plan de suscripción ha expirado.');
        }
    }

    private function getPlan($planId)
    {
        return StripePlan::where('plan_id', $planId)->firstorfail();
    }

    private function subscribeBundleOrCourse(Request $request)
    {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->reference_no = str_random(8);
        $order->amount = 0;
        $order->status = 1;
        $order->payment_type = 0;
        $order->order_type = 1;
        $order->save();
        //Getting and Adding items
        if ($request->course_id) {
            $type = Course::class;
            $id = $request->course_id;
        } else {
            $type = Bundle::class;
            $id = $request->bundle_id;

        }
        $order->items()->create([
            'item_id' => $id,
            'item_type' => $type,
            'price' => 0,
            'type' => 1
        ]);

        foreach ($order->items as $orderItem) {
            //Bundle Entries
            if ($orderItem->item_type == Bundle::class) {
                foreach ($orderItem->item->courses as $course) {
                    $course->students()->attach($order->user_id);
                }
            }
            $orderItem->item->students()->attach($order->user_id);
        }
    }

    
}
