<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Question;
use App\Answer;
use Auth;
use Cookie;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function generateQuiz($id)
    {
        if(Cookie::get($id)==false)
        {
            Cookie::queue($id,'quiz_played',3600);
            Quiz::where('id',$id)->increment('times_played',1);
        }

        $route = Route::currentRouteName();
    	$name = Quiz::findOrFail($id);        

    	$questions = Question::where('id_quiz','=',$id)->get();
		
		$answers = array();	
	    foreach($questions as $question) {
	       	array_push($answers,Answer::where('id_question','=',$question->id)->get()->toArray());
	    }   
    	return view($route,['name' => $name, 'id' => $id, 'questions' => $questions, 'answers' => $answers]);
    }

    public function generateSummary(Request $request)
    {
    	$answers = $request->all();
    	$correct=0;
    	foreach ($answers['answers'] as $answer) {
    		$bool = Answer::where('id','=',$answer)->select('correct')->first();
    		if($bool->correct)
    			$correct++;
    	}
    	return $correct;
    }

    public function displayQuizes()
    {
    	$popular = Quiz::orderBy('times_played','DESC')->limit(30)->get();

    	$newest = Quiz::orderBy('created_at','ASC')->limit(30)->get();

    	return view('pages.index',['popular' => $popular, 'newest' => $newest, 'data' => 'test']);
    }

    public function delete(Request $request)
    {
        $id_quiz = $request->all()['id_quiz'];
        $id_user = Auth::user()->id;

        $quiz = Quiz::where([
            ['id','=',$id_quiz],
            ['id_user','=',$id_user]
        ])->delete();

        return $quiz;    
    }

    public function update(Request $request)
    {
        
        Question::where('id','=',$_POST['id_quest'])->update(['name' => $_POST['quest_name']]);
        
        foreach ($_POST['answers'] as $key => $value) {
            if($value!='')
                Answer::where('id','=',$key)->update(['correct' => '0', 'name' => $value]);
        }

        Answer::where('id','=',$_POST['correct'])->update(['correct' => '1']);
    }

    public function create(Request $request)
    {
        $quiz = new Quiz;
        $quiz->name = $request->quiz_name;
        $quiz->id_user = Auth::user()->id;
        $quiz->save();

        $questions = array();
        foreach ($request->question as $key => $value) {
            $question = new Question;
            $question->name = $value;
            $question->id_quiz = $quiz->id;
            $question->save();
            $questions[$key] = $question->id;
        }

        foreach($request->answer as $key => $value)
        {

            $correct = $request->correct[$key];
            foreach ($value as $index => $name) {
                $answer = new Answer;
                $answer->name = $name;
                $answer->id_question = $questions[$key];
                $answer->correct = 0;
                if($index==$correct)
                    $answer->correct = 1;
                $answer->save();
            }            
        }
        
        return redirect('/account/edit/'.$quiz->id.'/'.str_slug($quiz->name, "-"));
    }
}
