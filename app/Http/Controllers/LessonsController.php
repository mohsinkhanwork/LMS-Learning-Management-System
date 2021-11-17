<?php

namespace App\Http\Controllers;

use App\Helpers\Auth\Auth;
use App\Mail\Frontend\LiveLesson\StudentMeetingSlotMail;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\Certificate;
use App\Models\LessonSlotBooking;
use App\Models\LiveLessonSlot;
use App\Models\Media;
use App\Models\Question;
use App\Models\QuestionsOption;
use App\Models\Test;
use App\Models\TestsResult;
use App\Models\VideoProgress;
use Illuminate\Http\Request;
use App\Models\colortext;
use App\Models\Category;
use App\Models\Note;
use App\Models\studycard;
use App\Models\CompleteAssignment;
use App\Models\Extraassignment;
use App\Models\Topic;
use App\Models\Assignment;


class LessonsController extends Controller
{

    private $path;

    public function __construct()
    {
        $path = 'frontend';
        if (session()->has('display_type')) {
            if (session('display_type') == 'rtl') {
                $path = 'frontend-rtl';
            } else {
                $path = 'frontend';
            }
        } else if (config('app.display_type') == 'rtl') {
            $path = 'frontend-rtl';
        }
        $this->path = $path;
    }

    public function show($course_id, $lesson_slug)
    {
        $test_result = "";
        $completed_lessons = "";
        $lesson = Lesson::where('slug', $lesson_slug)->where('course_id', $course_id)->where('published', '=', 1)->first();
        $course = Course::where('id', $course_id)->where('published', '=', 1)->first();
        
        //check student submitted all assignmnt


       $issues = CompleteAssignment::with('assignment')->where('course_id',$course->id)->where('user_id',auth()->user()->id)->get();
        $submit_assignment_lesson = $issues->count();
        $assignment_lesson = Assignment::where('course_id',$course->id)->pluck('id')->count();
        $check = false;
        if ($submit_assignment_lesson == $assignment_lesson) {
            $check = true;
        }
        $status = $check == true ? true : false ;
        if($check == true){
        if($issues != ''){
        foreach ($issues as $key => $issue) {
            if ($issue->marks > 4) {
                $status = true;
            }else{
                $status = false;
                break;
            }
        }
    }
    }


        //end 

        
        if ($lesson == "") {
            $lesson = Test::where('slug', $lesson_slug)->where('course_id', $course_id)->where('published', '=', 1)->firstOrFail();
            $lesson->full_text = $lesson->description;

            $test_result = NULL;
            if ($lesson) {
                $test_result = TestsResult::where('test_id', $lesson->id)
                    ->where('user_id', \Auth::id())
                    ->first();
            }
        }

        if ((int)config('lesson_timer') == 0) {
            if(!$lesson->live_lesson){
                if ($lesson->chapterStudents()->where('user_id', \Auth::id())->count() == 0) {
                    $lesson->chapterStudents()->create([
                        'model_type' => get_class($lesson),
                        'model_id' => $lesson->id,
                        'user_id' => auth()->user()->id,
                        'course_id' => $lesson->course->id
                    ]);
                }
            }
        }

        $course_lessons = $lesson->course->lessons->pluck('id')->toArray();
        $course_lessons_titles = $lesson->course->lessons->pluck('title')->toArray();
        $course_tests = ($lesson->course->tests ) ? $lesson->course->tests->pluck('id')->toArray() : [];
        $course_lessons = array_merge($course_lessons,$course_tests);
        
        $previous_lesson = $lesson->course->courseTimeline()
            ->where('id', '<', $lesson->courseTimeline->id)
            ->whereIn('model_id',$course_lessons)
            ->orderBy('id', 'desc')
            ->first();

        $next_lesson = $lesson->course->courseTimeline()
            ->whereIn('model_id',$course_lessons)
            ->where('id', '>', $lesson->courseTimeline->id)
            ->orderBy('id', 'asc')
            ->first();

        $lessons = $lesson->course->courseTimeline()->whereIn('model_id',$course_lessons)->orderby('sequence', 'asc')->get();
        $courses1 = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', 1)->orderBy('id', 'desc')->with('category')->take(8)->get();
        $purchased_course = $lesson->course->students()->where('user_id', \Auth::id())->count() > 0;
        $test_exists = FALSE;

        if (get_class($lesson) == 'App\Models\Test') {
            $test_exists = TRUE;
        }

        $completed_lessons = \Auth::user()->chapters()
            ->where('course_id', $lesson->course->id)
            ->get()
            ->pluck('model_id')
            ->toArray();
        $categories = Category::where('status','=',1)->get();

        $colorTexts = colortext::where('user_id',auth()->user()->id)->pluck('text')->toArray();
        $simpleTexts = colortext::where('user_id',auth()->user()->id)->pluck('simpletext')->toArray();
        
        $les  = $lesson->full_text;

        //headijng tags start

        $heading_with_href = [];
        $heading_with_atag = [];
        $lee_final = [];
        $headingText = [];
        $headingtag = 'h2';
        preg_match_all( '|<'.$headingtag.'>(.*)</'.$headingtag.'>|iU', $les, $headings );
        foreach($headings[0] as $headh2val)
        {
            $headingText[].=$headh2val;
        }
            $heading_with_href = str_replace('<h2>' ,'<a href="">',$headingText);
            $heading_with_href = str_replace('</h2>' ,'</a>',$heading_with_href);
            foreach ($heading_with_href as $key => $value) {
                $heading_with_atag[] = str_replace('<a href="">' ,'<a href="#'.$key.'">',$value);
            }
        $lee =  str_replace ($simpleTexts, $colorTexts, $les);
        $lee = str_replace ('<h2>','<h2 id="">',$lee);
        $lee = explode('</h2>', $lee);
        foreach ($lee as $key => $value) {
            $lee_final[] = str_replace('<h2 id="">','<h2 id="'.$key.'">',$value);
        }
        $lee_final = implode('</h2>', $lee_final);


        //end line
        
        //audio

        // $les_text = strip_tags($les);
        // $les_text = str_replace("\r\n", '', $les_text);
        // if(isset($les_text)){
        // $max = 80;
        // if (strlen($les_text) < $max) {
        //     $txt[] = rawurlencode(htmlspecialchars($les_text));
        // } else {
        //     $txt = chunk_split($les_text, $max);
        //     $txt = explode("\r\n", $txt);
        // }
        // //dd($txt);
        // foreach ($txt as $t) {
        //     if (strlen($t) == 0) { continue; }
        //     $t = rawurlencode(htmlspecialchars(trim($t)));
        //     $audio[] = file_get_contents('https://translate.google.com/translate_tts?client=gtx&q='.$t.'&tl=es');
        //     // echo "<audio controls='controls'><source src='data:audio/mpeg;base64,".base64_encode($audio)."'></audio>";
        // }
        
        // $oneaudio = implode(',', $audio);
        
        // }
  
        //end audio

        $lee =  str_replace ($simpleTexts, $colorTexts, $les);
        $notes = Note::where('user_id',auth()->user()->id)->get();
        $cards = studycard::where('user_id', auth()->user()->id)->get();
        //print_r($lee); exit();

        $user = auth()->user(); 
        $id = array();
        $noti_id = array();
        foreach ($user->Notifications as $notification) {
            if ($notification->type == 'App\Notifications\ExtraAssignment') {
                $noti_id[] = $notification->id;
                $id[] = $notification->data['ExtraAssignment_id'];
            }
        }
        $ExtraAssignment = Extraassignment::whereIn('id',$id)->get();
        $purchased_cours = auth()->user()->purchasedCourses()->last();


        return view($this->path . '.courses.lesson', compact('lesson', 'oneaudio' , 'courses1', 'user', 'noti_id', 'purchased_cours' , 'ExtraAssignment', 'status','categories','notes','previous_lesson', 'next_lesson', 'test_result','purchased_course', 'test_exists', 'lessons','lee' ,'completed_lessons', 'course', 'cards','colorTexts', 'course_lessons','course_lessons_titles'));

        $topics = Topic::with('lesson.course')->where('courses_id', $lesson->course->id)->where('published', 1)->get();


        return view($this->path . '.courses.lesson', compact('lesson', 'user', 'topics','heading_with_atag' , 'lee_final' , 'noti_id', 'purchased_cours' , 'ExtraAssignment', 'status','categories','notes','previous_lesson', 'next_lesson', 'test_result','purchased_course', 'test_exists', 'lessons','lee' ,'completed_lessons', 'course', 'cards','colorTexts', 'course_lessons','course_lessons_titles'));

    }

    public function test($lesson_slug, Request $request)
    {
        $test = Test::where('slug', $lesson_slug)->firstOrFail();
        $answers = [];
        $test_score = 0;
        if(!$request->get('questions')){

            return back()->with(['flash_warning'=>'No has seleccionado ninguna opción']);
        }
        foreach ($request->get('questions') as $question_id => $answer_id) {
            $question = Question::find($question_id);
            $correct = QuestionsOption::where('question_id', $question_id)
                    ->where('id', $answer_id)
                    ->where('correct', 1)->count() > 0;
            $answers[] = [
                'question_id' => $question_id,
                'option_id' => $answer_id,
                'correct' => $correct
            ];
            if ($correct) {
                if($question->score) {
                    $test_score += $question->score;
                }
            }
            /*
             * Save the answer
             * Check if it is correct and then add points
             * Save all test result and show the points
             */
        }
        $test_result = TestsResult::create([
            'test_id' => $test->id,
            'user_id' => \Auth::id(),
            'test_result' => $test_score,
        ]);
        $test_result->answers()->createMany($answers);


        if ($test->chapterStudents()->where('user_id', \Auth::id())->get()->count() == 0) {
            $test->chapterStudents()->create([
                'model_type' => $test->model_type,
                'model_id' => $test->id,
                'user_id' => auth()->user()->id,
                'course_id' => $test->course->id
            ]);
        }


        return back()->with(['message'=>'Test score: ' . $test_score,'result'=>$test_result]);
    }

    public function retest(Request $request)
    {
        $test = TestsResult::where('id', '=', $request->result_id)
            ->where('user_id', '=', auth()->user()->id)
            ->first();
        $test->delete();
        return back();
    }

    public function videoProgress(Request $request)
    {
        $user = auth()->user();
        $video = Media::findOrFail($request->video);
        $video_progress = VideoProgress::where('user_id', '=', $user->id)
            ->where('media_id', '=', $video->id)->first() ?: new VideoProgress();
        $video_progress->media_id = $video->id;
        $video_progress->user_id = $user->id;
        $video_progress->duration = $video_progress->duration ?: round($request->duration, 2);
        $video_progress->progress = round($request->progress, 2);
        if ($video_progress->duration - $video_progress->progress < 5) {
            $video_progress->progress = $video_progress->duration;
            $video_progress->complete = 1;
        }
        $video_progress->save();
        return $video_progress->progress;
    }


    public function courseProgress(Request $request)
    {
        if (\Auth::check()) {
            $lesson = Lesson::find($request->model_id);
            if ($lesson != null) {
                if ($lesson->chapterStudents()->where('user_id', \Auth::id())->get()->count() == 0) {
                    $lesson->chapterStudents()->create([
                        'model_type' => $request->model_type,
                        'model_id' => $request->model_id,
                        'user_id' => auth()->user()->id,
                        'course_id' => $lesson->course->id
                    ]);
                    return true;
                }
            }
        }
        return false;
    }

    public function bookSlot(Request $request)
    {
        $lesson_slot = LiveLessonSlot::find($request->live_lesson_slot_id);
        $lesson = $lesson_slot->lesson;

        if ((int)config('lesson_timer') == 0) {
            if ($lesson->chapterStudents()->where('user_id', \Auth::id())->count() == 0) {
                $lesson->chapterStudents()->create([
                    'model_type' => get_class($lesson),
                    'model_id' => $lesson->id,
                    'user_id' => auth()->user()->id,
                    'course_id' => $lesson->course->id
                ]);
            }
        }

        if(LessonSlotBooking::where('lesson_id', $request->lesson_id)->where('user_id', auth()->user()->id)->count() == 0){
            LessonSlotBooking::create(
                ['lesson_id' => $request->lesson_id, 'live_lesson_slot_id' => $request->live_lesson_slot_id, 'user_id' => auth()->user()->id]
            );
            \Mail::to(auth()->user()->email)->send(new StudentMeetingSlotMail($lesson_slot));
        }
        return back()->with(['success'=> __('alerts.frontend.course.slot_booking')]);
    }

}