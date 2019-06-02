$(document).ready(function(){
	var answers = new Array();
	
	$('.question').eq(0).addClass('active');

	$('.answer').click(function(){
		$(this).off('click');
	 	answers.push($(this).data('id'));
		var numItems = $('.question').length
		var i = $('.active').index();
	
		$('.active').animate({'margin-left':'-500px', 'opacity':'0'},500,function(){
						
			$('.question').eq(i-1).removeClass('active');						
			$('.question').eq(i).addClass('active').animate({'opacity':'1'},600);

			if(i==numItems)
			{
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					type:'POST',
					url:'/quiz-summary',
					data:{answers:answers},
				    success:function(data){
					    $('.summary_result').html(data+'/'+numItems);
					    $('.summary').fadeIn();
					}
				});	
			}
		});
	})

	$('.delete_quiz').click(function(){
		var id_quiz = $(this).parent().parent().data('id');
		if(confirm('Czy na pewno chcesz usunąć quiz?'))
		{
			$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
			});
			$.ajax({
				type:'POST',
				url:'/quiz-delete',
				data:{id_quiz:id_quiz},
				success:function(data){
					if(data==1)
						$('[data-id="'+id_quiz+'"]').fadeOut();
					else
						alert('false');
				}
			});	
		}
		
	})

	$('#add_question').click(function(){
		var i = $('.form_quiz_question').length;
		var nb = i+1;
		$(this).before("<div class='form_quiz_question'><h3>Pytanie #"+nb+"</h3><input type='text' name='question["+i+"]' placeholder='Quiz question' required><div class='form_answers'><div class='form_answer_box'><h5>ODP A</h5><input type='text' name='answer["+i+"][]' required><input type='radio' name='correct["+i+"]' value='0'required></div><div class='form_answer_box'><h5>ODP B</h5><input type='text' name='answer["+i+"][]' required><input type='radio' name='correct["+i+"]' value='1'></div><div class='form_answer_box'><h5>ODP C</h5><input type='text' name='answer["+i+"][]' required><input type='radio' name='correct["+i+"]' value='2'></div><div class='form_answer_box'><h5>ODP D</h5><input type='text' name='answer["+i+"][]' required><input type='radio' name='correct["+i+"]' value='3'></div></div></div>");
		return false;
	})
	$('input[type=hidden]').each(function(){
		$('.single_edit_answer[data-id="'+$(this).val()+'"] input').attr('checked','checked');
	})
	$('.save_btn').click(function(){
		var id_quest = $(this).data('id');
		var quest_name = $('.edit_question_ctx[data-id="'+id_quest+'"]').text();
		var correct='';
		$('.edit_answers[data-id="'+id_quest+'"] .single_edit_answer input').each(function(){
			if($(this).is(':checked'))
				correct = $(this).parent().data('id');
		}) 

		var answers = [];
		$('.edit_answers[data-id="'+id_quest+'"] .single_edit_answer').each(function(){
			answers[$(this).data('id')] = $(this).text();
		})
		

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type:'POST',
			url:'/quiz-update',
			data:{id_quest:id_quest, quest_name:quest_name, answers:answers, correct:correct},
			success:function(data){
				$('#succesful_change').fadeIn().delay(1300).fadeOut();
			},
			error:function(data)
			{
				alert(data);
			}
		})
	})
})