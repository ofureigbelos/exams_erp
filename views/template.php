<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IHT | Exams & Records</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Browser Icon -->
  <link rel="icon" href="views/img/template/MH_Icon.ico">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="views/dist/css/adminlte.css">

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="views/plugins/datatables-/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="views/plugins/datatables-/extensions/Responsive/css/dataTables.responsive.css">

  <!--
  <link rel="stylesheet" type="text/css" href="views/plugins/datatables-/extensions/Scroller/css/dataTables.scroller.min.css">

  <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> -->

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  <link rel="stylesheet" href="views/plugins/sweetalert2/sweetalert2.min.css">
  

<!--   =========================================
                  JavaScript
       =========================================  -->

<!-- jQuery -->
<script src="views/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="views/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="views/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="views/plugins/datatables-/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="views/plugins/datatables-/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="views/plugins/datatables-/extensions/Responsive/js/dataTables.responsive.min.js"></script>

<!--
<script type="text/javascript" src="views/plugins/datatables-/extensions/Scroller/js/dataTables.scroller.min.js"></script>

<script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> 

<script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->


<!-- Sweet Alert2 -->
<script src="views/plugins/sweetalert2/swal2/sweetalert2.all.js"></script>
<!-- -->

</head>

<!-- =========================================
              Document Body
     ========================================= -->



<?php

if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == "ok"){

  echo '<body class="hold-transition sidebar-mini sidebar-collapse">';

  echo '<div class="wrapper">';

  include "modules/header.php";

  include "modules/sidebar.php";

  if(isset($_GET["route"])){

    if($_GET["route"] == 'home' ||
       $_GET["route"] == 'users' ||
       $_GET["route"] == 'student-list' ||
       $_GET["route"] == 'student-bio' || 
       $_GET["route"] == 'course-reg' || 
       $_GET["route"] == 'attendance' || 
       $_GET["route"] == 'exam-score' || 
       $_GET["route"] == 'final-result' || 
       $_GET["route"] == 'broadsheet' || 
       $_GET["route"] == 'transcript' || 
       $_GET["route"] == 'semester-result' ||  
       $_GET["route"] == 'semester-result-grade' || 
       $_GET["route"] == 'school-courses' ||
       $_GET["route"] == 'logout'){

      include "modules/".$_GET["route"].".php";

  }else{

    include "modules/404.php";
  }

}else{

  include "modules/home.php";
}

  include "modules/footer.php";

  echo '</div>';

}else{

  include "modules/login.php";
}

?>



<script src="views/js/template.js"></script>
<script src="views/js/users.js"></script>
<script src="views/js/students.js"></script>
<script src="views/js/course-reg.js"></script>
<script src="views/js/exam-score.js"></script>
<script src="views/js/attendance.js"></script>

</body>
</html>
