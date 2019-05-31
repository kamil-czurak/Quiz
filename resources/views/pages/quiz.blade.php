@extends('layouts.default')
@section('content')		
		<section class='quiz_container'>
			<section class='quiz' data-id='{{$id}}'>
				<h1 class='quiz_title'>Quiz: {{$name->name}}</h1>
				@foreach($questions as $question)
					<section class='question' data-id='{{$question->id}}'>
						<h2>{{$question->name}}</h2>
						<section class='answers'>
							<div class='answer' data-id="{{$answers[$loop->index][0]['id']}}">{{$answers[$loop->index][0]['name']}}</div>
							<div class='answer' data-id="{{$answers[$loop->index][1]['id']}}">{{$answers[$loop->index][1]['name']}}</div>
							<div class='answer' data-id="{{$answers[$loop->index][2]['id']}}">{{$answers[$loop->index][2]['name']}}</div>
							<div class='answer' data-id="{{$answers[$loop->index][3]['id']}}">{{$answers[$loop->index][3]['name']}}</div>
						</section>	
					</section>
				@endforeach
			</section>
			<section class='summary'>
				Twój wynik<br>
				<span class='summary_result'></span><br>
				<a href='{{url("/")}}' class='btn_link'>Wróć do strony głównej</a>
			</section>
		</section>
@stop			