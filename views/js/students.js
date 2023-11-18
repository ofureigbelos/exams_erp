
$("#studentPhoto").change(function(){

	var studentImage = this.files[0];

	/*===============================================
	=            	 Validate Image            =
	===============================================*/

	if(studentImage["type"] != "image/jpeg" && studentImage["type"] != "image/png"){

		$("#studentPhoto").val("");

		swal({
			type: "error",
			title: "Error Uploading Image",
			text: "¡Image has to be a jpeg or png",
			showConfirmButton: true,
			confirmButtonText: "Close"
		});

	}else if(studentImage["size"] > 2000000){

		$("#studentPhoto").val("");

		swal({
			type: "error",
			title: "Error Uploading Image",
			text: "¡Image file size exceeds 2MB",
			showConfirmButton: true,
			confirmButtonText: "Close"
		});

	}else{

		var imageData = new FileReader;
		imageData.readAsDataURL(studentImage);

		$(imageData).on("load", function(e){

			var imageURL = e.target.result;

			$(".preview").attr("src", imageURL)
		});
	}

/* === Image Validation Ends === */
})


$("#matric").change(function(){

	$(".alert").remove();

	var matno = $(this).val();

	var data = new FormData();
 	data.append("validateMatno", matno);

  	$.ajax({

	  url:"ajax/students.ajax.php",
	  method: "POST",
	  data: data,
	  cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(answer){ 

      	// console.log("answer", answer);

      	if(answer){

      		$("#matric").parent().after('<div class="alert alert-warning">This Mat-No is already taken</div>');
      		
      		$("#matric").val('');
      	}

      }

    });

});