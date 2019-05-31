@extends('layouts.default')
@section('content')
	<section class='quizes_choose'>
		<section class='quizes_newest quizes_column'>
			<h2>Najpopularniejsze</h2>
			<table>
				<thead>
					<tr>
						<th>Zagrań</th>
						<th>Nazwa quizu</th>
					</tr>
				</thead>
				<tbody>
					@foreach($popular as $pop)
						<tr>
							<td>{{$pop->times_played}}</td>
							<td><a href='/{{$pop->id}}/{{str_slug($pop->name, "-")}}'>{{$pop->name}}</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</section>

		<section class='quizes_popular quizes_column'>
			<h2>Najnowsze</h2>
			<table>
				<thead>
					<tr>
						<th>Zagrań</th>
						<th>Nazwa quizu</th>
					</tr>
				</thead>
				<tbody>
					@foreach($newest as $new)
						<tr>
							<td>{{$new->times_played}}</td>
							<td><a href='/{{$new->id}}/{{str_slug($new->name, "-")}}'>{{$new->name}}</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</section>
	</section>
@stop