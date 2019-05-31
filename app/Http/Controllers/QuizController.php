<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function generateQuiz($id)
    {
    	$name = Quiz::findOrFail($id);
    	Quiz::where('id',$id)->increment('times_played',1);

    	$questions = Question::where('id_quiz','=',$id)->get();
		
		$answers = array();	
	    foreach($questions as $question) {
	       	array_push($answers,Answer::where('id_question','=',$question->id)->get()->toArray());
	    }   
    	return view('pages.quiz',['name' => $name, 'id' => $id, 'questions' => $questions, 'answers' => $answers]);
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
}
