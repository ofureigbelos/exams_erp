<?php

class ControllerStudents {

	/*	============================================
					Show Student List
		============================================ */

	public static function ctrSearchStudent(){

		if(isset($_POST["search"])){

			$mat_no = $_POST["matric_no"];

			$table  = "students";

			$item   = "matric";

			$value  = $mat_no;

			$answer = StudentsModel::mdlShowStudents($table, $item, $value);

			if($answer["matric"] == $mat_no){
				#Session Then Href

				$_SESSION["STUDENT_ID"] 	= $answer["id"];
				$_SESSION["STUDENT_PHOTO"]	= $answer["photo"];
				$_SESSION["STUDENT_MATNO"]	= $answer["matric"];
				$_SESSION["STUDENT_FNAME"]	= $answer["firstname"];
				$_SESSION["STUDENT_LNAME"]	= $answer["lastname"];
				$_SESSION["STUDENT_MNAME"]	= $answer["middlename"];
				$_SESSION["STUDENT_GENDE"]	= $answer["gender"];
				$_SESSION["STUDENT_BIRTH"]	= $answer["dob"];
				$_SESSION["STUDENT_MARID"]	= $answer["maritalstatus"];
				$_SESSION["STUDENT_MADEN"]	= $answer["maidenname"];
				$_SESSION["STUDENT_DEPT"]	= $answer["department"];
				$_SESSION["STUDENT_LEVEL"]	= $answer["level"];
				$_SESSION["ACADEMIC_SESS"]	= $answer["session"];
				$_SESSION["STUDENT_PRYM"]	= $answer["postprimary"];
				$_SESSION["STUDENT_PRYMD"]	= $answer["postprimarydate"];
				$_SESSION["STUDENT_QUALI"]	= $answer["qualification"];
				$_SESSION["STUDENT_QUALD"]	= $answer["qualificationdate"];
				$_SESSION["STUDENT_STATE"]	= $answer["state"];
				$_SESSION["STUDENT_LOCAL"]	= $answer["localgov"];
				$_SESSION["STUDENT_ADDRS"]	= $answer["homeadd"];
				$_SESSION["STUDENT_PHONE"]	= $answer["phonenumber"];
				$_SESSION["STUDENT_POSTA"]	= $answer["postaladdress"];
				$_SESSION["SPONSOR_NAME"]	= $answer["sponsorname"];
				$_SESSION["SPONSOR_ADDRS"]	= $answer["sponsoraddress"];
				$_SESSION["SPONSOR_PHONE"]	= $answer["sponsorphone"];
				$_SESSION["NEXTOFKIN_NAM"]	= $answer["nextofkin"];
				$_SESSION["NEXTOFKIN_ADD"]	= $answer["nextkinaddress"];
				$_SESSION["NEXTOFKIN_PHN"]	= $answer["nextofkinphone"];

				echo '<script>
						window.location = "course-reg";
					  </script>';

			}else{

				echo '<script>
						swal({
							type: "error",
							title: "¡Matriculaton No Does Not Exist !!",
							showConfirmButton: true,
							confirmButtonText: "Close"
							}).then(function(result){
								if(result.value){
									window.location = "student-list";
								}
							});
				 	  </script>';

			}
		}
	}


	/*	============================================
					Show Student List
		============================================ */

	public static function ctrShowStudents($item, $value){

		$table = "students";

		$answer = StudentsModel::mdlShowStudents($table, $item, $value);

		return $answer;
	}


	/*	============================================
					Show Student List
		============================================ */

	public static function ctrAddStudent(){

		if(isset($_POST["submit"])){

			$mat_no = $_POST["matric"];
			$fst_na = $_POST["fname"];
			$mid_na = $_POST["mname"];
			$lst_na = $_POST["lname"];
			$gender = $_POST["sex"];
			$d_of_b = $_POST["dob"];
			$marita = $_POST["marital"];
			$maiden = $_POST["maiden"];
			$school = $_POST["department"];
			$class 	= $_POST["class"];
			$acad_s = $_POST["session"];
			$pry_na = $_POST["post-primary"];
			$pry_da = $_POST["primary-date"];
			$qualif = $_POST["qualification"];
			$qual_d = $_POST["qualification-date"];
			$state 	= $_POST["state"];
			$lo_gov = $_POST["local-gov"];
			$hom_ad = $_POST["home-address"];
			$s_phon = $_POST["student-phone"];
			$postal = $_POST["postal"];
			$sp_nam = $_POST["sponsor-name"];
			$sp_add = $_POST["sponsor-address"];
			$sp_phn = $_POST["sponsor-phone"];
			$kin_na = $_POST["kin"];
			$kin_ad = $_POST["kin-address"];
			$kin_ph = $_POST["kin-phone"];

			$photo  = "";

			if (isset($_FILES["studentPhoto"]["tmp_name"])){

				list($width, $height) = getimagesize($_FILES["studentPhoto"]["tmp_name"]);

				$newWidth = 500;
				$newHeight = 500;

				/*=============================================
					Let's create the folder for each user
				=============================================*/

				$folder = "views/img/students/".$fst_na;

				mkdir($folder, 0755);

				/*=============================================
					PHP functions depending on the image
				=============================================*/

				if($_FILES["studentPhoto"]["type"] == "image/jpeg"){

					$randomNumber = mt_rand(100,999);
						
					$photo = "views/img/students/".$fst_na."/".$randomNumber.".jpg";
						
					$srcImage = imagecreatefromjpeg($_FILES["studentPhoto"]["tmp_name"]);
						
					$destination = imagecreatetruecolor($newWidth, $newHeight);

					imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

					imagejpeg($destination, $photo);

				}

				if ($_FILES["studentPhoto"]["type"] == "image/png") {

					$randomNumber = mt_rand(100,999);
						
					$photo = "views/img/students/".$fst_na."/".$randomNumber.".png";
						
					$srcImage = imagecreatefrompng($_FILES["studentPhoto"]["tmp_name"]);
						
					$destination = imagecreatetruecolor($newWidth, $newHeight);

					imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

					imagepng($destination, $photo);
				}

			}

			$table 	= "students";

			$data 	= array('photo' => $photo,
							'matno' => $mat_no,
							'fname' => $fst_na,
							'lname' => $lst_na,
							'mname' => $mid_na,
							'gende' => $gender,
							'bdate' => $d_of_b,
							'marit' => $marita,
							'maide' => $maiden,
							'depmt' => $school,
							'level' => $class,
							'seson' => $acad_s,
							'pryma' => $pry_na,
							'pryda' => $pry_da,
							'qualy' => $qualif,
							'quada' => $qual_d,
							'state' => $state,
							'local' => $lo_gov,
							'home'  => $hom_ad,
							'phone' => $s_phon,
							'posta' => $postal,
							'spona' => $sp_nam,
							'spodd' => $sp_add,
							'spohn' => $sp_phn,
							'kin_n' => $kin_na,
							'kin_a' => $kin_ad,
							'kin_p' => $kin_ph);

			$answer = StudentsModel::mdlAddStudent($table, $data);

			if($answer == 'ok') {

				echo '<script>
						swal({
							type: "success",
							title: "¡Student data created successfully !",
							showConfirmButton: true,
							confirmButtonText: "OK"

							}).then(function(result){

								if(result.value){

									window.location = "student-bio";
								}

							});

				 	  </script>';
			}else{

				echo '<script>
						swal({
							type: "error",
							title: "¡Student Data Not Sent !!",
							showConfirmButton: true,
							confirmButtonText: "Close"
							}).then(function(result){
								if(result.value){
									window.location = "student-bio";
								}
							});
				 	  </script>';
			}

		}
	}



}