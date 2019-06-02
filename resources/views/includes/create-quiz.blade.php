
<form method="POST" action='{{url("/create-quiz")}}' id='create_quiz'>
    @csrf
    <div class='form_quiz_name'>
    	<h2>Nazwa quizu</h2>
    	<input type='text' name='quiz_name' placeholder="" required>
    </div>	
    <div class='form_quiz_question'>
    	<h3>Pytanie #1</h3>
		<input type='text' name='question[0]' placeholder="" required>
		<div class='form_answers'>
			<div class='form_answer_box'>
				<h5>ODP A</h5>
				<input type='text' name='answer[0][]' required>
				<input type='radio' name='correct[0]' value='0' required>
			</div>
			<div class='form_answer_box'>
				<h5>ODP B</h5>
				<input type='text' name='answer[0][]' required>
				<input type='radio' name='correct[0]' value='1'>
			</div>
			<div class='form_answer_box'>
				<h5>ODP C</h5>
				<input type='text' name='answer[0][]' required>
				<input type='radio' name='correct[0]' value='2'>
			</div>
			<div class='form_answer_box'>
				<h5>ODP D</h5>
				<input type='text' name='answer[0][]' required>
				<input type='radio' name='correct[0]' value='3'>
			</div>
		</div>
    </div>
    <button id='add_question' class='pink_btn' >Kolejne pytanie</button><br>
    <input type='submit' class='pink_btn'>
</form>    
