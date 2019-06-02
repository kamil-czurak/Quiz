@extends('layouts.default')
@section('content')
	<section class='account_functions'>
		<section class='single_function'>
			<a href='{{url("/account/create")}}'>
				<img src='{{url("img/add.png")}}'>
				<h3>Dodaj nowy quiz</h3>
			</a>				
		</section>

		<section class='single_function'>
			<a href='{{url("/account/edit")}}'>
				<img src='{{url("img/edit.png")}}'>
				<h3>Edytuj swoje quizy</h3>	
			</a>			
		</section>	
	</section>

	<section class='user_operation'>
		@isset($name)
			@if($name=='edit')
				@include('includes.table')
			@endif

			@if($name=='create')
				@include('includes.create-quiz')
			@endif	
		@endisset
	</section>
@endsection