<?php

  if(isset($_SESSION["STUDENT_MATNO"])&&($_SESSION["STUDENT_DEPT"])){

  }else{
    echo '<script>
            window.location = "student-list";
            </script>';
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course Registration</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Course Registration Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
                        <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <?php
                        if($_SESSION["STUDENT_PHOTO"] != ""){

                          echo'
                          <img class="profile-user-img img-fluid img-circle"
                          src="'.$_SESSION["STUDENT_PHOTO"].'"
                          alt="student profile picture">';

                        }else{

                          echo'
                          <img class="profile-user-img img-fluid img-circle"
                          src="views/dist/img/user4-128x128.jpg"
                          alt="User profile picture">';

                        }
                  
                  ?>
                </div>

                <h3 class="profile-username text-center"><?php echo $_SESSION["STUDENT_FNAME"]." ".$_SESSION["STUDENT_LNAME"]; ?></h3>

                <p class="text-muted text-center"><?php echo $_SESSION["STUDENT_MATNO"]; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Class :</b> <a class="float-right"><?php 
                    if($_SESSION["STUDENT_LEVEL"] == 1){
                      echo 'ND 1';
                    }elseif($_SESSION["STUDENT_LEVEL"] == 2){
                      echo 'ND 2';
                    }elseif($_SESSION["STUDENT_LEVEL"] == 3){
                      echo 'ND 3';
                    }elseif($_SESSION["STUDENT_LEVEL"] == 4){
                      echo 'HND 1';
                    }elseif($_SESSION["STUDENT_LEVEL"] == 5){
                      echo 'HND 2';
                    }elseif($_SESSION["STUDENT_LEVEL"] == 6){
                      echo 'HND 3';
                    }else{
                      echo $_SESSION["STUDENT_LEVEL"];
                    } 
                    ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Gender :</b> <a class="float-right"><?php echo $_SESSION["STUDENT_GENDE"]; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone :</b> <a class="float-right"><?php echo $_SESSION["STUDENT_PHONE"]; ?></a>
                  </li>
                </ul>

                <!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>



    <div class="col-md-9">
      <!-- Default box -->
      <div class="card">
        <form method="post" id="reg-course">
        <div class="card-header"><h3 class="card-title">Title</h3></div>
        <div class="card-body">
          <!-- Form Field -->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-receipt"></i></span></div>
                  <input type="text" name="tellerno" id="tellerno" class="form-control" placeholder="Enter Payment/Teller Number">
                </div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-graduate"></i></span></div>
                  <input type="text" name="session" id="session" class="form-control" placeholder="Academic Session (eg 2019/2020)" required="">
                </div>
              </div>
            </div>
          </div>
          <!-- Form Field -->
          <table id="" class="table table-bordered dt-responsive table-striped">
            <thead>
              <tr>
                <th style="width:10px">No</th>
                <th style="width:auto;">#</th>
                <th>CourseCode</th>
                <th style="width:auto;">CourseTittle</th>
                <th>CourseUnit</th>
                <th>Semester</th>
              </tr>
            </thead>

            <tbody>
              <?php

                $item1  = "Department";
                $value1 = $_SESSION["STUDENT_DEPT"];

                $item2  = "Level";
                $value2 = $_SESSION["STUDENT_LEVEL"];

                $oitem1 = "MatriculationNo";
                $ovalue = $_SESSION["STUDENT_MATNO"];

                $oitem2 = "Total";
                $ovalu2 = 40;


                $course     = ControllerCourses::ctrShowCourses($item1, $value1, $item2, $value2);

                $carryo     = ControllerCourses::ctrShowCarryOverCourses($oitem1, $ovalue, $oitem2, $ovalu2);

                #$check[] = $carryo;
                foreach($course as $key => $row){
                  echo
                  '<tr>
                    <td>'.($key+1).'</td>';
                    echo'
                    <td>
                    <input type="checkbox" class="form-check-input" data-coursecode="'.$row["CourseCode"].'" 
                    data-coursetittle="'.$row["CourseTittle"].'" data-courseunit="'.$row["CourseUnit"].'" 
                    data-matno="'.$_SESSION["STUDENT_MATNO"].'" data-department="'.$row["Department"].'" 
                    data-level="'.$row["Level"].'" data-semester="'.$row["Semester"].'" id="'.$row["course_Id"].'" required="">
                    </td>';
                    echo'
                    <td>'.$row["CourseCode"].'</td>
                    <td>'.$row["CourseTittle"].'</td>
                    <td>'.$row["CourseUnit"].'</td>';

                    if($row["Semester"] == 'F'){
                      echo '<td>1<sup>st</sup></td>';
                    }elseif($row["Semester"] == 'S'){
                      echo '<td>2<sup>nd</sup></td>';
                    }else{
                      echo '
                      <td>'.$row["Semester"].'</td>';
                    }
                    echo'</tr>';
                }

                  foreach($carryo as $way => $co){
                    if($co["MatriculationNo"] == $ovalue){
                  echo '
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="color: red;"><b>Carry Over Courses</b></td>
                    <td></td>
                  </tr>';


                
                  echo '
                  <tr>
                  <td>'.($way+1).'</td>';
                  echo'
                  <td>
                    <input type="checkbox" class="form-check-input" data-coursecode="'.$co["CourseCode"].'" 
                    data-coursetittle="'.$co["CourseTittle"].'" data-courseunit="'.$co["CourseUnit"].'" 
                    data-matno="'.$_SESSION["STUDENT_MATNO"].'" data-department="'.$co["Department"].'" 
                    data-level="'.$co["Level"].'" data-semester="'.$co["Semester"].'" id="'.$co["course_Id"].'">
                  </td>';
                  echo'
                    <td>'.$co["CourseCode"].'</td>
                    <td>'.$co["CourseTittle"].'</td>
                    <td>'.$co["CourseUnit"].'</td>';

                    if($co["Semester"] == 'F'){
                      echo '<td>1<sup>st</sup></td>';
                    }elseif($co["Semester"] == 'S'){
                      echo '<td>2<sup>nd</sup></td>';
                    }else{
                      echo '
                      <td>'.$co["Semester"].'</td>';
                    }
                  echo'</tr>';

                  }
                }

              


              ?>
            </tbody>
          </table>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col">
            <div class="form-group">
              <div class="input-group">
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Register Courses</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-footer-->
      </form>

      </div>
      <!-- /.card -->
    </div>
  



</div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->