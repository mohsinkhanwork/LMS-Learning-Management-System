<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Bundle;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Certificate;
use App\Models\Skill;
use App\Models\Userskill;
use App\Notifications\SkillComplete;
use App\Mail\Frontend\LiveLesson\StudentMeetingSlotMail;
use App\Models\LessonSlotBooking;
use App\Models\LiveLessonSlot;
use Illuminate\Http\Request;
use App\Notifications\InviteNotification;
use Notification;
use Illuminate\Support\Facades\URL;
use App\Models\refferal_income;
use App\Models\Stripe\StripePlan;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $purchased_courses = NULL;
        $students_count = NULL;
        $recent_reviews = NULL;
        $threads = NULL;
        $teachers_count = NULL;
        $courses_count = NULL;
        $pending_orders = NULL;
        $recent_orders = NULL;
        $recent_contacts = NULL;
        $purchased_bundles = NULL;
        if (\Auth::check()) {

            $purchased_courses = auth()->user()->purchasedCourses();
            $purchased_bundles = auth()->user()->purchasedBundles();
            $subscribed_courses = auth()->user()->subscribedCourse();
            $subscribed_bundles = auth()->user()->subscribedBundles();
            $pending_orders = auth()->user()->pendingOrders();

            if(auth()->user()->hasRole('teacher')){
                //IF logged in user is teacher
                $students_count = Course::whereHas('teachers', function ($query) {
                    $query->where('user_id', '=', auth()->user()->id);
                })
                    ->withCount('students')
                    ->get()
                    ->sum('students_count');


                $courses_id = auth()->user()->courses()->has('reviews')->pluck('id')->toArray();
                $recent_reviews = Review::where('reviewable_type','=','App\Models\Course')
                    ->whereIn('reviewable_id',$courses_id)
                    ->orderBy('created_at', 'desc')
                    ->take(10)
                    ->get();



                $unreadThreads = [];
                $threads = [];
                if(auth()->user()->threads){
                    foreach(auth()->user()->threads as $item){
                        if($item->unreadMessagesCount > 0){
                            $unreadThreads[] = $item;
                        }else{
                            $threads[] = $item;
                        }
                    }
                    $threads = Collection::make(array_merge($unreadThreads,$threads))->take(10) ;

                }

            }elseif(auth()->user()->hasRole('administrator')){
                $students_count = User::role('student')->count();
                $teachers_count = User::role('teacher')->count();
                $courses_count = \App\Models\Course::all()->count() + \App\Models\Bundle::all()->count();
                $recent_orders = Order::orderBy('created_at','desc')->take(10)->get();
                $recent_contacts = Contact::orderBy('created_at','desc')->take(10)->get();
            }
        }
        $categories = Category::where('status','=',1)->get();
        return view('backend.dashboard',compact('purchased_courses','categories','students_count','recent_reviews','threads','purchased_bundles','teachers_count','courses_count','recent_orders','recent_contacts','pending_orders', 'subscribed_courses','subscribed_bundles'));
    }

    public function search_course(Request $request){
        $purchased_courses = NULL;
        $students_count = NULL;
        $recent_reviews = NULL;
        $threads = NULL;
        $teachers_count = NULL;
        $courses_count = NULL;
        $pending_orders = NULL;
        $recent_orders = NULL;
        $recent_contacts = NULL;
        $purchased_bundles = NULL;
        if (\Auth::check()) {
            $purchased_courses = auth()->user()->searchCourses($request);
            $purchased_bundles = auth()->user()->purchasedBundles();
            $subscribed_courses = auth()->user()->subscribedCourse();
            $subscribed_bundles = auth()->user()->subscribedBundles();
            $pending_orders = auth()->user()->pendingOrders();
        // this is for level and percantage
        $total_courses = Course::query()->get()->count();
        if(Userskill::where('user_id',auth()->user()->id)->get()->count() == ''){
            Userskill::create(['user_id'=>auth()->user()->id,'skill_id'=>1]);
        }
        $user_certificate = array();
        $certificate = Certificate::with('course')->where('user_id',auth()->user()->id)->get();
        foreach ($certificate as $key => $cer) {
            $user_certificate[] = $cer->course->title;
        }
        $id = Userskill::where('user_id',auth()->user()->id)->first()->skill_id;
        $skills = Skill::with('courses')->where('id',$id)->first();
        if($skills != ''){
        $skill_course = $skills->courses->pluck('title')->toArray();
        }else{
            $skill_course = [1];
        }
        $result = array_intersect($user_certificate, $skill_course);
        $progress_bar = count($result) / count($skill_course) * 100;
        if ($progress_bar == 100) {
            //User::find(auth()->user()->id)->notify(new SkillComplete());
            Userskill::where('user_id',auth()->user()->id)->update([
                'user_id'=>auth()->user()->id,'skill_id'=>$id + 1
            ]);
        }
        if($skills != '' && Skill::with('courses')->where('id',$id+1)->first()){
        $next_skill = Skill::with('courses')->where('id',$id+1)->first()->title;
        }else{
            $next_skill = 'Complete';
        }
        $user = auth()->user();
        //end
            if(auth()->user()->hasRole('teacher')){
                //IF logged in user is teacher
                $students_count = Course::whereHas('teachers', function ($query) {
                    $query->where('user_id', '=', auth()->user()->id);
                })
                    ->withCount('students')
                    ->get()
                    ->sum('students_count');
                $courses_id = auth()->user()->courses()->has('reviews')->pluck('id')->toArray();
                $recent_reviews = Review::where('reviewable_type','=','App\Models\Course')
                    ->whereIn('reviewable_id',$courses_id)
                    ->orderBy('created_at', 'desc')
                    ->take(10)
                    ->get();
                $unreadThreads = [];
                $threads = [];
                if(auth()->user()->threads){
                    foreach(auth()->user()->threads as $item){
                        if($item->unreadMessagesCount > 0){
                            $unreadThreads[] = $item;
                        }else{
                            $threads[] = $item;
                        }
                    }
                    $threads = Collection::make(array_merge($unreadThreads,$threads))->take(10) ;
                }
            }elseif(auth()->user()->hasRole('administrator')){
                $students_count = User::role('student')->count();
                $teachers_count = User::role('teacher')->count();
                $courses_count = \App\Models\Course::all()->count() + \App\Models\Bundle::all()->count();
                $recent_orders = Order::orderBy('created_at','desc')->take(10)->get();
                $recent_contacts = Contact::orderBy('created_at','desc')->take(10)->get();
            }
        }
        $categories = Category::where('status','=',1)->get();
        return view('backend.searchcourses',compact('purchased_courses','user','result','skill_course','total_courses','next_skill','skills','progress_bar','categories','students_count','recent_reviews','threads','purchased_bundles','teachers_count','courses_count','recent_orders','recent_contacts','pending_orders', 'subscribed_courses','subscribed_bundles'));
    }




    public function stu_dashboard()
    {

        $live_lessons = LiveLessonSlot::with('lesson')->get()->all();
     
        $purchased_courses = NULL;
        $students_count = NULL;
        $recent_reviews = NULL;
        $threads = NULL;
        $teachers_count = NULL;
        $courses_count = NULL;
        $pending_orders = NULL;
        $recent_orders = NULL;
        $recent_contacts = NULL;
        $purchased_bundles = NULL;
        if (\Auth::check()) {

            $purchased_courses = auth()->user()->purchasedCourses();
            $purchased_bundles = auth()->user()->purchasedBundles();
            $subscribed_courses = auth()->user()->subscribedCourse();
            $subscribed_bundles = auth()->user()->subscribedBundles();
            $pending_orders = auth()->user()->pendingOrders();

            $user = auth()->user();


            // skill notification

            $user_certificate = array();
        $certificate = Certificate::with('course')->where('user_id',auth()->user()->id)->get();

        foreach ($certificate as $key => $cer) {
            $user_certificate[] = $cer->course->title;
        }
            
        if(UserSkill::where('user_id',auth()->user()->id)->first() != ''){
        $id = UserSkill::where('user_id',auth()->user()->id)->first()->skill_id;
        }else{
            $id = 1;
        }

        $skills = Skill::with('courses')->where('id',$id)->first();


       if(count($skills->courses) > 0){
        $skill_course = $skills->courses->pluck('title')->toArray();
        }else{

            $skill_course = [1];
        }



        $result = array_intersect($user_certificate, $skill_course);


        $progress_bar = count($result) / count($skill_course) * 100;

        if ($progress_bar == 100) {
            
            User::find(auth()->user()->id)->notify(new SkillComplete());    
            

            
        }

        // end


            if(auth()->user()->hasRole('teacher')){
                //IF logged in user is teacher
                $students_count = Course::whereHas('teachers', function ($query) {
                    $query->where('user_id', '=', auth()->user()->id);
                })
                    ->withCount('students')
                    ->get()
                    ->sum('students_count');


                $courses_id = auth()->user()->courses()->has('reviews')->pluck('id')->toArray();
                $recent_reviews = Review::where('reviewable_type','=','App\Models\Course')
                    ->whereIn('reviewable_id',$courses_id)
                    ->orderBy('created_at', 'desc')
                    ->take(10)
                    ->get();



                $unreadThreads = [];
                $threads = [];
                if(auth()->user()->threads){
                    foreach(auth()->user()->threads as $item){
                        if($item->unreadMessagesCount > 0){
                            $unreadThreads[] = $item;
                        }else{
                            $threads[] = $item;
                        }
                    }
                    $threads = Collection::make(array_merge($unreadThreads,$threads))->take(10) ;

                }

            }elseif(auth()->user()->hasRole('administrator')){
                $students_count = User::role('student')->count();
                $teachers_count = User::role('teacher')->count();
                $courses_count = \App\Models\Course::all()->count() + \App\Models\Bundle::all()->count();
                $recent_orders = Order::orderBy('created_at','desc')->take(10)->get();
                $recent_contacts = Contact::orderBy('created_at','desc')->take(10)->get();
            }

            


        }
        $categories = Category::where('status','=',1)->get();
        return view('backend.student_dashboard',compact('purchased_courses', 'live_lessons','user','categories','students_count','recent_reviews','threads','purchased_bundles','teachers_count','courses_count','recent_orders','recent_contacts','pending_orders', 'subscribed_courses','subscribed_bundles'));
    }


    public function invitation(Request $request) {

        // dd('hi');

        $refferal_code = NULL;
        if (\Auth::check()) {
            $refferal_code = auth()->user()->refferal_code;
        }
        $url = URL::temporarySignedRoute(
            'signup', now()->addMinutes(300), ['refferal_code' => $refferal_code]
        );
         // $mail = Mail::to($request->input('email'))->send(new TestMail())
        Notification::route('mail', $request->input('email'))->notify(new InviteNotification($url));
        return redirect()->route('admin.Student_affliate')->with('success', 'enlace enviado a este correo electrónico!');
     }

   public function student_courses()
    {
        $purchased_courses = NULL;
        $students_count = NULL;
        $recent_reviews = NULL;
        $threads = NULL;
        $teachers_count = NULL;
        $courses_count = NULL;
        $pending_orders = NULL;
        $recent_orders = NULL;
        $recent_contacts = NULL;
        $purchased_bundles = NULL;
        $first_paid_course = NULL;
        $subscribed_amount = NULL;
        if (\Auth::check()) {
            $purchased_courses = auth()->user()->purchasedCourses();
            $purchased_bundles = auth()->user()->purchasedBundles();
            $subscribed_courses = auth()->user()->subscribedCourse();
            $subscribed_bundles = auth()->user()->subscribedBundles();
            $pending_orders = auth()->user()->pendingOrders();
            // for referral income
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
        // this is for level and percantage
        $total_courses = Course::query()->get()->count();
        if(Userskill::where('user_id',auth()->user()->id)->get()->count() == ''){
            Userskill::create(['user_id'=>auth()->user()->id,'skill_id'=>1]);
        }
        $user_certificate = array();
        $certificate = Certificate::with('course')->where('user_id',auth()->user()->id)->get();
        foreach ($certificate as $key => $cer) {
            $user_certificate[] = $cer->course->title;
        }
        $id = Userskill::where('user_id',auth()->user()->id)->first()->skill_id;
        $skills = Skill::with('courses')->where('id',$id)->first();
        if(count($skills->courses) > 0){
        $skill_course = $skills->courses->pluck('title')->toArray();
        }else{
            $skill_course = [1];
        }

        $result = array_intersect($user_certificate, $skill_course);
        
        $progress_bar = count($result) / count($skill_course) * 100;
        if ($progress_bar == 100) {
            //User::find(auth()->user()->id)->notify(new SkillComplete());
            Userskill::where('user_id',auth()->user()->id)->update([
                'user_id'=>auth()->user()->id,'skill_id'=>$id + 1
            ]);
        }
        if($skills != '' && Skill::with('courses')->where('id',$id+1)->first()){
        $next_skill = Skill::with('courses')->where('id',$id+1)->first()->title;
        }else{
            $next_skill = 'Complete';
        }
        $user = auth()->user();
        //end
            if(auth()->user()->hasRole('teacher')){
                //IF logged in user is teacher
                $students_count = Course::whereHas('teachers', function ($query) {
                    $query->where('user_id', '=', auth()->user()->id);
                })
                    ->withCount('students')
                    ->get()
                    ->sum('students_count');
                $courses_id = auth()->user()->courses()->has('reviews')->pluck('id')->toArray();
                $recent_reviews = Review::where('reviewable_type','=','App\Models\Course')
                    ->whereIn('reviewable_id',$courses_id)
                    ->orderBy('created_at', 'desc')
                    ->take(10)
                    ->get();
                $unreadThreads = [];
                $threads = [];
                if(auth()->user()->threads){
                    foreach(auth()->user()->threads as $item){
                        if($item->unreadMessagesCount > 0){
                            $unreadThreads[] = $item;
                        }else{
                            $threads[] = $item;
                        }
                    }
                    $threads = Collection::make(array_merge($unreadThreads,$threads))->take(10) ;
                }
            }elseif(auth()->user()->hasRole('administrator')){
                $students_count = User::role('student')->count();
                $teachers_count = User::role('teacher')->count();
                $courses_count = \App\Models\Course::all()->count() + \App\Models\Bundle::all()->count();
                $recent_orders = Order::orderBy('created_at','desc')->take(10)->get();
                $recent_contacts = Contact::orderBy('created_at','desc')->take(10)->get();
            }
        }
        $categories = Category::where('status','=',1)->get();
        return view('backend.studentcourses',compact('purchased_courses','user','result','skill_course','total_courses','next_skill','skills','progress_bar','categories','students_count','recent_reviews','threads','purchased_bundles','teachers_count','courses_count','recent_orders','recent_contacts','pending_orders', 'subscribed_courses','subscribed_bundles'));
        // return view('backend.studentcourses');
    }

    public function Student_affliate()
    {
        $user = auth()->user();
        $total_affiliate = refferal_income::getuser()->get();
        $total_income = array();
        foreach ($total_affiliate as $key => $value) {
            $total_income[] = $value->refferal_income;
        }
        $total = collect($total_income)->sum();
        $pending_payemnt = refferal_income::getuser()->where('paidstatus',0)->pluck('refferal_income')->sum();
        $paid_payment = refferal_income::getuser()->where('paidstatus',1)->pluck('refferal_income')->sum();
        return view('backend.Student_affliate',compact('user','total_affiliate','total', 'pending_payemnt' , 'paid_payment'));
    }


    public function markread($id,$user_id){
        $user = User::find($user_id);
        $user->unreadNotifications->where('id',$id)->markAsRead();

        return redirect()->route('admin.Student_courses');
    }
}
