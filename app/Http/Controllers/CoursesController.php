<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Bundle;
use App\Models\Category;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use App\Models\Lesson;
use Stripe\Charge;
use Stripe\Customer;
use App\Models\Extraassignment;
use Cart;
use App\Models\Topic;

class CoursesController extends Controller
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

    public function all()
    {
        if (request('type') == 'popular') {
            $courses = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', 1)->where('popular', '=', 1)->orderBy('id', 'desc')->paginate(8);

        } else if (request('type') == 'trending') {
            $courses = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', 1)->where('trending', '=', 1)->orderBy('id', 'desc')->paginate(8);

        } else if (request('type') == 'featured') {
            $courses = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', 1)->where('featured', '=', 1)->orderBy('id', 'desc')->paginate(8);

        } else {
            $courses = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', 1)->orderBy('id', 'desc')->paginate(8);
        }
        $purchased_courses = NULL;
        $purchased_bundles = NULL;
        $categories = Category::where('status','=',1)->get();

        if (\Auth::check()) {
            $purchased_courses = Course::withoutGlobalScope('filter')->canDisableCourse()->whereHas('students', function ($query) {
                $query->where('id', \Auth::id());
            })
                ->with('lessons')
                ->orderBy('id', 'desc')
                ->get();
        }
        $featured_courses = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', '=', 1)
            ->where('featured', '=', 1)->take(8)->get();

        $recent_news = Blog::orderBy('created_at', 'desc')->take(2)->get();

       $purchased_cours = '';
        $id = array();
        $lesson = '';
        $noti_id = array();
        $ExtraAssignment = array();
        $user = '';
        if(\Auth::check()){
        $user = auth()->user();
        foreach ($user->Notifications as $notification) {
            if ($notification->type == 'App\Notifications\ExtraAssignment') {
                $noti_id[] = $notification->id;
                $id[] = $notification->data['ExtraAssignment_id'];
            }
        }
        $ExtraAssignment = Extraassignment::whereIn('id',$id)->get();
        $purchased_cours = auth()->user()->purchasedCourses()->last();
       
       if($purchased_cours != '') {
            $lesson = Lesson::with('course')->where('course_id', $purchased_cours->id)->first();
        }
         }

        $initial_course_level = Course::where('published', 1)->where('level', 'Inicial')->get();
        $Intermedio_course_level = Course::where('published', 1)->where('level', 'Intermedio')->get();
        $Avanzado_course_level = Course::where('published', 1)->where('level', 'Avanzado')->get();

        $pildora_categories = Category::with('courses')->where('status', '=', 1)->where('name', 'Píldoras')->first();



        return view( $this->path.'.courses.index', compact('courses', 'pildora_categories' ,'initial_course_level', 'Intermedio_course_level', 'Avanzado_course_level' , 'user', 'purchased_cours', 'lesson', 'ExtraAssignment' , 'noti_id','purchased_courses', 'recent_news','featured_courses','categories'));
    }

    public function show($course_slug)

    {


        $product = "";
        $teachers = "";
        $type = "";
        $bundle_ids = [];
        $course_ids = [];
        $continue_course=NULL;
        $recent_news = Blog::orderBy('created_at', 'desc')->take(2)->get();

        $course = Course::withoutGlobalScope('filter')->where('slug', $course_slug)->with('publishedLessons')->firstOrFail();
        
        $purchased_course = \Auth::check() && $course->students()->where('user_id', \Auth::id())->count() > 0;

        if(($course->published == 0) && ($purchased_course == false)){
            abort(404);
        }
        
        $course_rating = 0;
        $total_ratings = 0;
        $completed_lessons = "";
        $is_reviewed = false;
        if(auth()->check() && $course->reviews()->where('user_id','=',auth()->user()->id)->first()){
            $is_reviewed = true;
        }
        if ($course->reviews->count() > 0) {
            $course_rating = $course->reviews->avg('rating');
            $total_ratings = $course->reviews()->where('rating', '!=', "")->get()->count();
        }

        $lessons = $course->courseTimeline()->orderby('sequence','asc')->get();
        $courses = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', 1)->where('popular', '=', 1)->inRandomOrder()->take(3)->get();
        
    $related_courses = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', 1)->orderBy('id', 'desc')->get()->take(3);
        // dd($related_courses);


        if (\Auth::check()) {

            $completed_lessons = \Auth::user()->chapters()->where('course_id', $course->id)->get()->pluck('model_id')->toArray();
            $course_lessons = $course->lessons->pluck('id')->toArray();
            $continue_course  = $course->courseTimeline()
                ->whereIn('model_id',$course_lessons)
                ->orderby('sequence','asc')
                ->whereNotIn('model_id',$completed_lessons)

                ->first();
            if($continue_course == null){
                $continue_course = $course->courseTimeline()
                    ->whereIn('model_id',$course_lessons)
                    ->orderby('sequence','asc')->first();
            }

        }
        $categories = Category::where('status', '=', 1)->get();

       $purchased_cours = '';
        $id = array();
        $lesson = '';
        $noti_id = array();
        $ExtraAssignment = array();
        $user = '';
        if(\Auth::check()){
        $user = auth()->user();
        foreach ($user->Notifications as $notification) {
            if ($notification->type == 'App\Notifications\ExtraAssignment') {
                $noti_id[] = $notification->id;
                $id[] = $notification->data['ExtraAssignment_id'];
            }
        }
        $ExtraAssignment = Extraassignment::whereIn('id',$id)->get();
        $purchased_cours = auth()->user()->purchasedCourses()->last();


        if($purchased_cours != '') {
            $lesson = Lesson::with('course')->where('course_id', $purchased_cours->id)->first();
        }
        
        }


         $topics = Topic::with('lesson.course')->where('courses_id',  $course->id)->where('published', 1)->get();
         
        $initial_course_level = Course::where('published', 1)->where('level', 'Inicial')->get();
        $Intermedio_course_level = Course::where('published', 1)->where('level', 'Intermedio')->get();
        $Avanzado_course_level = Course::where('published', 1)->where('level', 'Avanzado')->get();

        $pildora_categories = Category::with('courses')->where('status', '=', 1)->where('name', 'Píldoras')->first();

        return view( $this->path.'.courses.course', compact('course', 'pildora_categories' , 'initial_course_level', 'Intermedio_course_level', 'Avanzado_course_level' , 'related_courses' , 'topics' , 'user', 'courses', 'lesson', 'noti_id' , 'purchased_cours', 'ExtraAssignment' , 'purchased_course', 'recent_news', 'course_rating','categories', 'completed_lessons','total_ratings','is_reviewed','lessons','continue_course'));

    }


    public function rating($course_id, Request $request)
    {
        $course = Course::findOrFail($course_id);
        $course->students()->updateExistingPivot(\Auth::id(), ['rating' => $request->get('rating')]);

        return redirect()->back()->with('success', 'Thank you for rating.');
    }

    public function getByCategory(Request $request)
    {
        $category = Category::where('slug', '=', $request->category)
            ->where('status','=',1)
            ->first();
        $categories = Category::where('status','=',1)->get();
        $user = auth()->user(); 

        if ($category != "") {
            $recent_news = Blog::orderBy('created_at', 'desc')->take(2)->get();
            $featured_courses = Course::where('published', '=', 1)
                ->where('featured', '=', 1)->take(8)->get();

            if (request('type') == 'popular') {
                $courses = $category->courses()->withoutGlobalScope('filter')->where('published', 1)->where('popular', '=', 1)->orderBy('id', 'desc')->paginate(9);

            } else if (request('type') == 'trending') {
                $courses = $category->courses()->withoutGlobalScope('filter')->where('published', 1)->where('trending', '=', 1)->orderBy('id', 'desc')->paginate(9);

            } else if (request('type') == 'featured') {
                $courses = $category->courses()->withoutGlobalScope('filter')->where('published', 1)->where('featured', '=', 1)->orderBy('id', 'desc')->paginate(9);

            } else {
                $courses = $category->courses()->withoutGlobalScope('filter')->where('published', 1)->orderBy('id', 'desc')->paginate(9);
            }

            $user = auth()->user(); 

        $initial_course_level = Course::where('published', 1)->where('level', 'Inicial')->get();
        $Intermedio_course_level = Course::where('published', 1)->where('level', 'Intermedio')->get();
        $Avanzado_course_level = Course::where('published', 1)->where('level', 'Avanzado')->get();


        $pildora_categories = Category::with('courses')->where('status', '=', 1)->where('name', 'Píldoras')->first();


            return view( $this->path.'.courses.index', compact('courses', 'pildora_categories' ,'initial_course_level', 'Intermedio_course_level', 'Avanzado_course_level' , 'user', 'category', 'recent_news','featured_courses','categories'));
        }
        return abort(404);
    }

    public function addReview(Request $request)
    {
        $this->validate($request, [
            'review' => 'required'
        ]);
        $course = Course::findORFail($request->id);
        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->reviewable_id = $course->id;
        $review->reviewable_type = Course::class;
        $review->rating = $request->rating;
        $review->content = $request->review;
        $review->save();

        return back();
    }

    public function editReview(Request $request)
    {
        $review = Review::where('id', '=', $request->id)->where('user_id', '=', auth()->user()->id)->first();
        if ($review) {
            $course = $review->reviewable;
            $recent_news = Blog::orderBy('created_at', 'desc')->take(2)->get();
            $purchased_course = \Auth::check() && $course->students()->where('user_id', \Auth::id())->count() > 0;
            $course_rating = 0;
            $total_ratings = 0;
            $lessons = $course->courseTimeline()->orderby('sequence','asc')->get();

            if ($course->reviews->count() > 0) {
                $course_rating = $course->reviews->avg('rating');
                $total_ratings = $course->reviews()->where('rating', '!=', "")->get()->count();
            }
            if (\Auth::check()) {

                $completed_lessons = \Auth::user()->chapters()->where('course_id', $course->id)->get()->pluck('model_id')->toArray();
                $continue_course  = $course->courseTimeline()->orderby('sequence','asc')->whereNotIn('model_id',$completed_lessons)->first();
                if($continue_course == ""){
                    $continue_course = $course->courseTimeline()->orderby('sequence','asc')->first();
                }

            }
            return view( $this->path.'.courses.course', compact('course', 'purchased_course', 'recent_news','completed_lessons','continue_course', 'course_rating', 'total_ratings','lessons', 'review'));
        }
        return abort(404);

    }


    public function updateReview(Request $request)
    {
        $review = Review::where('id', '=', $request->id)->where('user_id', '=', auth()->user()->id)->first();
        if ($review) {
            $review->rating = $request->rating;
            $review->content = $request->review;
            $review->save();

            return redirect()->route('courses.show', ['slug' => $review->reviewable->slug]);
        }
        return abort(404);

    }

    public function deleteReview(Request $request)
    {
        $review = Review::where('id', '=', $request->id)->where('user_id', '=', auth()->user()->id)->first();
        if ($review) {
            $slug = $review->reviewable->slug;
            $review->delete();
            return redirect()->route('courses.show', ['slug' => $slug]);
        }
        return abort(404);
    }
}
