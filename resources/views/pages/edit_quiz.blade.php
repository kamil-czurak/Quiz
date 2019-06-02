@extends('layouts.default')
@section('content')
	<section class='edit_quiz_container'>
		<section class='quiz' data-id='{{$id}}'>
			<h1 class='quiz_title'>{{$name->name}}</h1>
			<section class='edit_questions'>
				@foreach($questions as $question)
					<section class='single_edit_question'>
						<h3 class='edit_question_ctx' contenteditable="true" data-id='{{$question->id}}'> {{$question->name}}</h3>
						<section class='edit_answers' data-id='{{$question->id}}'>
							<div class='single_edit_answer' contenteditable="true" data-id="{{$answers[$loop->index][0]['id']}}">{{$answers[$loop->index][0]['name']}}<input type='radio' name="correct_{{$loop->index}}" value='0'></div>
							<div class='single_edit_answer' contenteditable="true" data-id="{{$answers[$loop->index][1]['id']}}">{{$answers[$loop->index][1]['name']}}<input type='radio' name="correct_{{$loop->index}}" value='1'></div>
							<div class='single_edit_answer' contenteditable="true" data-id="{{$answers[$loop->index][2]['id']}}">{{$answers[$loop->index][2]['name']}}<input type='radio' name="correct_{{$loop->index}}" value='2'></div>
							<div class='single_edit_answer' contenteditable="true" data-id="{{$answers[$loop->index][3]['id']}}">{{$answers[$loop->index][3]['name']}}<input type='radio' name="correct_{{$loop->index}}" value='3'></div>
						</section>
						@for($i=0;$i<4;$i++)
							@if($answers[$loop->index][$i]['correct']==1)
								<input type='hidden' value="{{$answers[$loop->index][$i]['id']}}">
							@endif
						@endfor	
						<button class='save_btn' data-id='{{$question->id}}'>Zapisz zmiany</button>
					</section>
				@endforeach	
			</section>
		</section>
	</section>
@endsection