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
			})