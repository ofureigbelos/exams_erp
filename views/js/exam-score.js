$(document).ready(function(){
//submit course and session field to load reg student
	$('#Exmscores').on('submit', function(event){
		event.preventDefault();
		function fetchRegisteredStudents(){
			var coscode = $('#course').val();
			var session = $('#academic-session').val();
			$.ajax({
				url: "ajax/registered.student.ajax.php",
				method: "POST",
				dataType: "json",
				data: {coscode:coscode, session:session},
				success: function(data){
					var html = '';
					for(var i = 0; i < data.length; i++){
						html += '<tr>';
						html += '<td><input type="checkbox" class="check_box" id="'+data[i].Id+'" student-session="'+data[i].Session+'" student-matno="'+data[i].MatriculationNo+'" student-code="'+data[i].CourseCode+'" student-tittle="'+data[i].CourseTittle+'" student-unit="'+data[i].CourseUnit+'" student-ftst="'+data[i].FirstTest+'" student-stst="'+data[i].SecondTest+'" student-exam="'+data[i].ExamScore+'" student-total="'+data[i].Total+'" /></td>';
						html += '<td>'+data[i].MatriculationNo+'</td>';
						html += '<td>'+data[i].CourseCode+'</td>';
						html += '<td>'+data[i].CourseTittle+'</td>';
						html += '<td>'+data[i].CourseUnit+'</td>';
						html += '<td>'+data[i].FirstTest+'</td>';
						html += '<td>'+data[i].SecondTest+'</td>';
						html += '<td>'+data[i].ExamScore+'</td>';
						html += '<td>'+data[i].Total+'</td></tr>';
					}
					$('tbody').html(html);
					console.log(data);
				}
			});
		}
		fetchRegisteredStudents();
	});
//click checkbox to input field
	$(document).on('click', '.check_box', function(){
		var html = '';
		if($(this).is(":checked")){

			html  = '<td><input type="checkbox" class="check_box" id="'+$(this).attr('id')+'" student-session="'+$(this).attr('student-session')+'" student-matno="'+$(this).attr('student-matno')+'" student-code="'+$(this).attr('student-code')+'" student-tittle="'+$(this).attr('student-tittle')+'" student-unit="'+$(this).attr('student-unit')+'" student-ftst="'+$(this).attr('student-ftst')+'" student-stst="'+$(this).attr('student-stst')+'" student-exam="'+$(this).attr('student-exam')+'" student-total="'+$(this).attr('student-total')+'" checked=""/></td>';
			html += '<td><input type="text" name="matricNo[]" class="form-control" value="'+$(this).attr('student-matno')+'" readonly=""></td>';
			html += '<td><input type="text" name="cusCode[]" class="form-control" value="'+$(this).attr('student-code')+'" readonly=""></td>';
			html += '<td><input type="text" name="cusTittle[]" class="form-control" value="'+$(this).attr('student-tittle')+'" readonly=""></td>';
			html += '<td><input type="text" name="cusUnit[]" class="form-control" value="'+$(this).attr('student-unit')+'" readonly=""></td>';
			html += '<td><input type="text" name="fTest[]" class="form-control" value="'+$(this).attr('student-ftst')+'" required="" /></td>';
			html += '<td><input type="text" name="sTest[]" class="form-control" value="'+$(this).attr('student-stst')+'" required="" /></td>';
			html += '<td><input type="text" name="examScore[]" class="form-control" value="'+$(this).attr('student-exam')+'" required="" /></td>';
			html += '<td>'+$(this).attr('student-total')+'<input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /><input type="hidden" name="session_id[]" value="'+$(this).attr('student-session')+'" /></td>';

			if($(this).attr('student-total') == 0){

				html  = '<td><input type="checkbox" class="check_box" id="'+$(this).attr('id')+'" student-session="'+$(this).attr('student-session')+'" student-matno="'+$(this).attr('student-matno')+'" student-code="'+$(this).attr('student-code')+'" student-tittle="'+$(this).attr('student-tittle')+'" student-unit="'+$(this).attr('student-unit')+'" student-ftst="'+$(this).attr('student-ftst')+'" student-stst="'+$(this).attr('student-stst')+'" student-exam="'+$(this).attr('student-exam')+'" student-total="'+$(this).attr('student-total')+'" checked=""/></td>';
				html += '<td><input type="text" name="matricNo[]" class="form-control" value="'+$(this).attr('student-matno')+'" readonly=""></td>';
				html += '<td><input type="text" name="cusCode[]" class="form-control" value="'+$(this).attr('student-code')+'" readonly=""></td>';
				html += '<td><input type="text" name="cusTittle[]" class="form-control" value="'+$(this).attr('student-tittle')+'" readonly=""></td>';
				html += '<td><input type="text" name="cusUnit[]" class="form-control" value="'+$(this).attr('student-unit')+'" readonly=""></td>';
				html += '<td><input type="text" name="fTest[]" class="form-control" value="'+$(this).attr('student-ftst')+'" required="" /></td>';
				html += '<td><input type="text" name="sTest[]" class="form-control" value="'+$(this).attr('student-stst')+'" required="" /></td>';
				html += '<td><input type="text" name="examScore[]" class="form-control" value="'+$(this).attr('student-exam')+'" required="" /></td>';
				html += '<td>'+$(this).attr('student-total')+'<input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /><input type="hidden" name="session_id[]" value="'+$(this).attr('student-session')+'" /></td>';

			}else if($(this).attr('student-total') >= 1 && $('#userprofile').val() == 'Super Admin' || $('#userprofile').val() == 'Record Officer'){

				html  = '<td><input type="checkbox" class="check_box" id="'+$(this).attr('id')+'" student-session="'+$(this).attr('student-session')+'" student-matno="'+$(this).attr('student-matno')+'" student-code="'+$(this).attr('student-code')+'" student-tittle="'+$(this).attr('student-tittle')+'" student-unit="'+$(this).attr('student-unit')+'" student-ftst="'+$(this).attr('student-ftst')+'" student-stst="'+$(this).attr('student-stst')+'" student-exam="'+$(this).attr('student-exam')+'" student-total="'+$(this).attr('student-total')+'" checked=""/></td>';
				html += '<td><input type="text" name="matricNo[]" class="form-control" value="'+$(this).attr('student-matno')+'" readonly=""></td>';
				html += '<td><input type="text" name="cusCode[]" class="form-control" value="'+$(this).attr('student-code')+'" readonly=""></td>';
				html += '<td><input type="text" name="cusTittle[]" class="form-control" value="'+$(this).attr('student-tittle')+'" readonly=""></td>';
				html += '<td><input type="text" name="cusUnit[]" class="form-control" value="'+$(this).attr('student-unit')+'" readonly=""></td>';
				html += '<td><input type="text" name="fTest[]" class="form-control" value="'+$(this).attr('student-ftst')+'" required="" /></td>';
				html += '<td><input type="text" name="sTest[]" class="form-control" value="'+$(this).attr('student-stst')+'" required="" /></td>';
				html += '<td><input type="text" name="examScore[]" class="form-control" value="'+$(this).attr('student-exam')+'" required="" /></td>';
				html += '<td>'+$(this).attr('student-total')+'<input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /><input type="hidden" name="session_id[]" value="'+$(this).attr('student-session')+'" /></td>';

			}else{

				html  = '<td><input type="checkbox" class="check_box" id="'+$(this).attr('id')+'" student-session="'+$(this).attr('student-session')+'" student-matno="'+$(this).attr('student-matno')+'" student-code="'+$(this).attr('student-code')+'" student-tittle="'+$(this).attr('student-tittle')+'" student-unit="'+$(this).attr('student-unit')+'" student-ftst="'+$(this).attr('student-ftst')+'" student-stst="'+$(this).attr('student-stst')+'" student-exam="'+$(this).attr('student-exam')+'" student-total="'+$(this).attr('student-total')+'" /></td>';
				html += '<td>'+$(this).attr('student-matno')+'</td>';
				html += '<td>'+$(this).attr('student-code')+'</td>';
				html += '<td>'+$(this).attr('student-tittle')+'</td>';
				html += '<td>'+$(this).attr('student-unit')+'</td>';
				html += '<td>'+$(this).attr('student-ftst')+'</td>';
				html += '<td>'+$(this).attr('student-stst')+'</td>';
				html += '<td>'+$(this).attr('student-exam')+'</td>';
				html += '<td>'+$(this).attr('student-total')+'</td>';

			}

		}else{

			html  = '<td><input type="checkbox" class="check_box" id="'+$(this).attr('id')+'" student-session="'+$(this).attr('student-session')+'" student-matno="'+$(this).attr('student-matno')+'" student-code="'+$(this).attr('student-code')+'" student-tittle="'+$(this).attr('student-tittle')+'" student-unit="'+$(this).attr('student-unit')+'" student-ftst="'+$(this).attr('student-ftst')+'" student-stst="'+$(this).attr('student-stst')+'" student-exam="'+$(this).attr('student-exam')+'" student-total="'+$(this).attr('student-total')+'" /></td>';
			html += '<td>'+$(this).attr('student-matno')+'</td>';
			html += '<td>'+$(this).attr('student-code')+'</td>';
			html += '<td>'+$(this).attr('student-tittle')+'</td>';
			html += '<td>'+$(this).attr('student-unit')+'</td>';
			html += '<td>'+$(this).attr('student-ftst')+'</td>';
			html += '<td>'+$(this).attr('student-stst')+'</td>';
			html += '<td>'+$(this).attr('student-exam')+'</td>';
			html += '<td>'+$(this).attr('student-total')+'</td>';
		}

		$(this).closest('tr').html(html);
	});

//submit inputed scores to update creg table
	$('#entscore-form').on('submit', function(e){
		e.preventDefault();
		if($('.check_box:checked').length > 0){
			$.ajax({
				url: "ajax/update.scores.ajax.php",
				method: "POST",
				data: $(this).serialize(),
				success: function(data){

					var coscode = $('#course').val();
					var session = $('#academic-session').val();
					$.ajax({
						url: "ajax/registered.student.ajax.php",
						method: "POST",
						dataType: "json",
						data: {coscode:coscode, session:session},
						success: function(data){
							var html = '';
							for(var i = 0; i < data.length; i++){
							html += '<tr>';
							html += '<td><input type="checkbox" class="check_box" id="'+data[i].Id+'" student-session="'+data[i].Session+'" student-matno="'+data[i].MatriculationNo+'" student-code="'+data[i].CourseCode+'" student-tittle="'+data[i].CourseTittle+'" student-unit="'+data[i].CourseUnit+'" student-ftst="'+data[i].FirstTest+'" student-stst="'+data[i].SecondTest+'" student-exam="'+data[i].ExamScore+'" student-total="'+data[i].Total+'" /></td>';
							html += '<td>'+data[i].MatriculationNo+'</td>';
							html += '<td>'+data[i].CourseCode+'</td>';
							html += '<td>'+data[i].CourseTittle+'</td>';
							html += '<td>'+data[i].CourseUnit+'</td>';
							html += '<td>'+data[i].FirstTest+'</td>';
							html += '<td>'+data[i].SecondTest+'</td>';
							html += '<td>'+data[i].ExamScore+'</td>';
							html += '<td>'+data[i].Total+'</td></tr>';
						}
						$('tbody').html(html);
						console.log(data);
					}
				});
					swal({type: "success", title: "¡Student Score Updated successfully !", showConfirmButton: true, confirmButtonText: "OK"});
				}
			});
		}
	});

});