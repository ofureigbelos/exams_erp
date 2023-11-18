$(document).ready(function(){

	$('#Attendance').on('submit', function(event){
		event.preventDefault();

		function fetchAttendanceList(){
			var dept = $('#department').val();
			var levl = $('#academic_level').val();
			var sess = $('#academic_session').val();
			$.ajax({
				url: "ajax/students.attendance.ajax.php",
				method: "POST",
				dataType: "json",
				data: {dept:dept, levl:levl, sess:sess},
				success: function(data){
					var html = '';
					for(var i = 0; i < data.length; i++){
						html += '<tr>';
						html += '<td>'+(i+1)+'</td>';
						html += '<td>'+data[i].MatriculationNo+'</td>';
						html += '<td></td>';
						html += '<td></td>';
						html += '<td></td></tr>';
					}
					$('tbody').html(html);
					console.log(data);
				}
			});
		}

		fetchAttendanceList();
	});
});