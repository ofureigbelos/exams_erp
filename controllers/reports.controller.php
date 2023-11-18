<?php

class ControllerReports{

	public static function transposeData($data){

		$retData = array();
		foreach($data as $key => $row){
			foreach($row as $skey => $column){
				$retData[$skey][$key] = $column;
			}
		}
		return $retData;
	}


	public static function SearchSemesterResult(){

		if(isset($_POST["search"])){

              $sch = $_POST["school"];
              $cla = $_POST["class"];
              $sme = $_POST["semester"];
              $ses = $_POST["session"];

              $table1 = 'courseregistration';
              $table2 = 'schoolcourse';

              $data = array('dept' => $sch,
                            'leve' => $cla,
                            'term' => $sme,
                            'year' => $ses);

              $answer = ReportsModel::mdlShowSemesterHeader($table1, $table2, $data);

              	if($answer == 'ok') {



				echo '';
			}else{

				echo '<script>
						swal({
							type: "error",
							title: "¡Student Data Not Sent !!",
							showConfirmButton: true,
							confirmButtonText: "Close"
							});
				 	  </script>';
			}
          }
      }

}