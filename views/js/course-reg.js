$(document).ready(function() {
	// body...

	$('#reg-course').on('submit', function(event){
		event.preventDefault();

		var matno 	= [];
		var cosId 	= [];

		$('.form-check-input').each(function(){
			if($(this).is(":checked")){
				var teller	= $('#tellerno').val();
				var session = $('#session').val();
				matno.push($(this).attr('data-matno'));
				cosId.push($(this).attr('id'));

				console.log(teller, session, matno, cosId);

			}else{}
		});

		if($('.form-check-input:checked').length > 0){

			var teller	= $('#tellerno').val();
			var session = $('#session').val();

			$.ajax({
				url:"ajax/coursereg.ajax.php",
				method:"POST",
				data:{cosId:cosId, teller:teller, matno:matno, session:session},
				success: function(){
					swal({type: "success", title: "¡Student Course Registration successfully !", showConfirmButton: true, confirmButtonText: "OK"}).then(function(result){if(result.value){window.location = "student-list";}});
				}
			});
		}
	});
});



$("#tellerno").change(function(){

	$(".alert").remove();

	var tellno = $(this).val();

	var data = new FormData();
 	data.append("validateTeller", tellno);

  	$.ajax({

	  url:"ajax/check.teller.ajax.php",
	  method: "POST",
	  data: data,
	  cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(answer){ 

      	// console.log("answer", answer);

      	if(answer){

      		$("#tellerno").parent().after('<div class="alert alert-warning">This Teller-No has already been used</div>');
      		
      		$("#tellerno").val('');
      	}

      }

    });

});