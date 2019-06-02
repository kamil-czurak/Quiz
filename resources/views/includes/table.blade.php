			<table>
				<thead>
					<tr>
						<th>Zagrań</th>
						<th>Nazwa quizu</th>
						<th>Opcje</th>
					</tr>
				</thead>
				<tbody>
					@foreach($quizes as $quiz)
						<tr data-id='{{$quiz->id}}'>
							<td>{{$quiz->times_played}}</td>
							<td>{{$quiz->name}}</td>
							<td><a href='/account/edit/{{$quiz->id}}/{{str_slug($quiz->name, "-")}}'><img src='{{url("img/edit.png")}}' class='table_img'></a><img src='{{url("img/delete.png")}}' class='table_img delete_quiz'></td>
						</tr>
					@endforeach
				</tbody>
			</table>