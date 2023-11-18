

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>School Courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">School Courses Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCourse">Add Courses</button>
        </div>
        <div class="card-body">
          <table id="table" class="table table-bordered dt-responsive table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>CourseCode</th>
                <th>CourseTittle</th>
                <th>CourseUnit</th>
                <th>Department</th>
                <th>Level</th>
                <th style="width:auto;">Semester</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $item  = null;
                $value = null;

                $courses = ControllerCourses::ctrShowCoursesTable($item, $value);

                foreach($courses as $key => $row){
                  echo'<tr>
                  <td>'.($key + 1).'</td>
                  <td>'.$row["CourseCode"].'</td>
                  <td>'.$row["CourseTittle"].'</td>
                  <td>'.$row["CourseUnit"].'</td>
                  <td>'.$row["Department"].'</td>';
                  if($row["Level"] == 1){
                  echo'<td>ND 1</td>';
                }elseif($row["Level"] == 2){
                  echo'<td>ND 2</td>';
                }elseif($row["Level"] == 3){
                  echo'<td>ND 3</td>';
                }elseif($row["Level"] == 4){
                  echo'<td>HND 1</td>';
                }elseif($row["Level"] == 5){
                  echo'<td>HND 2</td>';
                }elseif($row["Level"] == 6){
                  echo'<td>HND 3</td>';
                }else{
                  echo'
                  <td>'.$row["Level"].'</td>';
                }

                if($row["Semester"] == 'F'){
                  echo '<td>1<sup>st</sup></td>';
                }elseif($row["Semester"] == 'S'){
                  echo '<td>2<sup>nd</sup></td>';
                }else{
                  echo '
                  <td>'.$row["Semester"].'</td>';
                }

                echo'
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#editCourse"><i class="fas fa-pencil-alt" style="color: white;"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                  </div>
                </td>
                ';

                }
              ?>
            </tbody>
          </table>
        </div>  
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <div class="modal fade" id="addCourse">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form method="POST">
          <!-- /.modal-header -->
          <div class="modal-header" style="background: #007bff; color: white">
            <h4 class="modal-title">Add School Course</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <!-- /.modal-body -->
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-school"></i></span></div>
                    <select class="form-control" name="department" required="required">
                      <option value="">Select Department</option>
                      <option value="PHN">Public Health Nursing</option>
                      <option value="EHT">Environmental Health Technology</option>
                      <option value="Biomedical">Biomedical Engineering Technology</option>
                      <option value="Paramedic">Paramedic Technology</option>
                      <option value="Dispensing">Dispensing Optics</option>
                      <option value="Medical">Medical Image Processing Technology</option> 
                      <option value="Audiology">Audiology</option>
                      <option value="Anaesthetic">Anaesthetic Technology</option>
                      <option value="Plaster">Plaster Technology</option>
                      <option value="Dental">Dental Surgery Technology</option>
                      <option value="Occupational">Occupational Therapy</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                    </div>
                    <select class="form-control" name="class" required="required">
                      <option value="">Select Class</option>
                      <option value="1">ND 1</option>
                      <option value="2">ND 2</option>
                      <option value="3">ND 3</option>
                      <option value="4">HND 1</option>
                      <option value="5">HND 2</option>
                      <option value="6">HND 3</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-key"></i></span></div>
                    <input type="text" class="form-control" placeholder="Course Code" name="courseCode" required="">
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-key"></i></span></div>
                    <input type="text" class="form-control" placeholder="Enter Course Tittle" name="courseTittle" required="">
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-key"></i></span></div>
                    <input type="number" class="form-control" min="0" placeholder="Course Unit" name="courseUnit" required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-school"></i></span>
                    </div>
                    <select class="form-control" name="semester" required="required">
                      <option value="">Select Semester</option>
                      <option value="F">First Semester</option>
                      <option value="S">Second Semester</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

    <!-- /.modal-body -->
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>

            <?php
              $createCourses =  new ControllerCourses();
              $createCourses -> ctrCreateCourses();
            ?>

          </form>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->