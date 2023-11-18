

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Bio-Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Student Bio-Data Page</li>
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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudent">Add Student</button>
        </div>

        <div class="card-body">

          <table id="table" class="table table-bordered dt-responsive table-striped">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th style="width:40px">Photo</th>
                <th style="width:auto;">Matriculation</th>
                <th style="width:auto;">Full Name</th>
                <th>Gender</th>
                <th>Department</th>
                <th>Class</th>
                <th>Session</th>
                <th>State</th>
                <th>Phone</th>
                <th style="width:auto;">Home Address</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php

              $item  = null;
              $value = null;

              $students = ControllerStudents::ctrShowStudents($item, $value);

              foreach ($students as $key => $row) {

                echo '

              <tr>
                <td>'.($key+1).'</td>';
                if($row["photo"] != ""){
                  echo'
                  <td><img src="'.$row["photo"].'" class="img-thumbnail" width="40px;"></td>';
                }else{
                  echo'
                  <td><img src="views/img/students/default/anonymous.png" class="img-thumbnail" width="40px;"></td>';
                }
                echo'
                <td>'.$row["matric"].'</td>
                <td>'.$row["lastname"]." ".$row["firstname"]." ".$row["middlename"].'</td>
                <td>'.$row["gender"].'</td>
                <td>'.$row["department"].'</td>';
                if($row["level"] == 1){
                  echo'<td>ND 1</td>';
                }elseif($row["level"] == 2){
                  echo'<td>ND 2</td>';
                }elseif($row["level"] == 3){
                  echo'<td>ND 3</td>';
                }elseif($row["level"] == 4){
                  echo'<td>HND 1</td>';
                }elseif($row["level"] == 5){
                  echo'<td>HND 2</td>';
                }elseif($row["level"] == 6){
                  echo'<td>HND 3</td>';
                }else{
                  echo'
                  <td>'.$row["level"].'</td>';
                }

                echo'
                <td>'.$row["session"].'</td>
                <td>'.$row["state"].'</td>
                <td>'.$row["phonenumber"].'</td>
                <td>'.$row["homeadd"].'</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-success"><i class="fas fa-search"></i></button>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#editUser"><i class="fas fa-pencil-alt" style="color: white;"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                  </div>
                </td>
              </tr>';
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



  <!-- Modal -->

  <div class="modal fade" id="addStudent">
    <div class="modal-dialog modal-xl">

      <div class="modal-content">
      
      <form method="POST" enctype="multipart/form-data">
        <div class="modal-header" style="background: #007bff; color: white">
          <h4 class="modal-title">Student Bio-Data Form</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

    <div class="modal-body">

      <div class="row">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col">
          <label>Upload Passport</label>
          <input type="file" class="form-control" name="studentPhoto" id="studentPhoto">
          <img class="img-thumbnail preview" src="views/img/students/default/anonymous.png" width="100px">
        </div>
      </div>

      <div class="row"><div class="col-12"><h4><label>Personal Information</label></h4></div></div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-graduate"></i></span></div>
              <input type="text" class="form-control" name="matric" id="matric" placeholder="Enter Mat-Number" required="">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-edit"></i></span></div>
              <input type="text" class="form-control" name="fname" placeholder="Enter First Name" required="">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-edit"></i></span></div>
              <input type="text" class="form-control" name="mname" placeholder="Enter Middle Name">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-edit"></i></span></div>
              <input type="text" class="form-control" name="lname" placeholder="Enter Surname" required="required">
            </div>
          </div>
        </div>
      </div>
      <!-- Second Layer -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-venus-mars"></i></span></div>
              <select class="form-control" name="sex" required="required">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span></div>
              <input type="date" class="form-control" name="dob" placeholder="Date of Birth" required="required">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-venus-mars"></i></span></div>
              <select class="form-control" name="marital" required="required">
                <option value="">Marital Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Seperated">Seperated</option>
                <option value="Widowed">Widowed</option>
                <option value="Widower">Widower</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!-- Third Layer -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-venus"></i></span></div>
              <input type="text" name="maiden" class="form-control" placeholder="Enter Maiden Name">
            </div>
          </div>
        </div>
      </div>
      <br>
      <!-- Space -->
      <div class="row"><div class="col"><h4><label>Academic Information</label></h4></div></div>
      
      <!-- Forth Layer -->
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
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-graduate"></i></span></div>
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
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-pen-fancy"></i></span></div>
              <input type="text" name="session" class="form-control" placeholder="Entery Session (eg 2019/2020)" required="">
            </div>
          </div>
        </div>
      </div>
      <!-- Fifth Layer -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-school"></i></span></div>
              <input type="text" class="form-control" name="post-primary" placeholder="Post Primary School Name" required="">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span></div>
              <input type="text" class="form-control" name="primary-date" placeholder="Post Primary Date (e.g 2002-2008)" required="">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-certificate"></i></span></div>
              <input type="text" class="form-control" name="qualification" placeholder="Entery Qualification (eg WAEC)" required="">
            </div>
          </div>
        </div>
      </div>
      <!-- Sixth Layer -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span></div>
              <input type="text" class="form-control" name="qualification-date" placeholder="Qualification Date (eg May/June 2008)" required="required">
            </div>
          </div>
        </div>
      </div>
      <br>
      <!-- Space -->
      <div class="row"><div class="col"><h4><label>Contact Information</label></h4></div></div>
      <!-- Seventh Layer -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-globe-africa"></i></span></div>
              <select class="form-control" name="state" required="required">
                <option value="">State of Origin</option>
                <option value="Abia">Abia</option>
                <option value="Abuja">Abuja</option>
                <option value="Adamawa">Adamawa</option>
                <option value="Akwa-Ibom">Akwa-Ibom</option>
                <option value="Anambra">Anambra</option>
                <option value="Bauchi">Bauchi</option>
                <option value="Bayelsa">Bayelsa</option>
                <option value="Benue">Benue</option>
                <option value="Borno">Borno</option>
                <option value="Cross-River">Cross-River</option>
                <option value="Delta">Delta</option>
                <option value="Ebonyi">Ebonyi</option>
                <option value="Edo">Edo</option>
                <option value="Ekiti">Ekiti</option>
                <option value="Enugu">Enugu</option>
                <option value="Gombe">Gombe</option>
                <option value="Imo">Imo</option>
                <option value="Jigawa">Jigawa</option>
                <option value="Kaduna">Kaduna</option>
                <option value="Kano">Kano</option>
                <option value="Katsina">Katsina</option>
                <option value="Kebbi">Kebbi</option>
                <option value="Kogi">Kogi</option>
                <option value="Kwara">Kwara</option>
                <option value="Lagos">Lagos</option>
                <option value="Nasarawa">Nasarawa</option>
                <option value="Niger">Niger</option>
                <option value="Ogun">Ogun</option>
                <option value="Ondo">Ondo</option>
                <option value="Osun">Osun</option>
                <option value="Oyo">Oyo</option>
                <option value="Plateau">Plateau</option>
                <option value="Rivers">Rivers</option>
                <option value="Sokoto">Sokoto</option>
                <option value="Taraba">Taraba</option>
                <option value="Zamfara">Zamfara</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!-- Eighth Layer -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span></div>
              <input type="text" class="form-control" name="local-gov" placeholder="Local Gov of Origin" >
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-home"></i></span></div>
              <input type="text" class="form-control" name="home-address" placeholder="Enter Home Address">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
              <input type="telephone" class="form-control" name="student-phone" placeholder="Student's Phone">
            </div>
          </div>
        </div>
      </div>
      <!-- Ninth Layer -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span></div>
              <input type="text" class="form-control" name="postal" placeholder="Postal Address">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-users"></i></span></div>
              <input type="text" class="form-control" name="sponsor-name" placeholder="Sponsor's Name">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span></div>
              <input type="text" class="form-control" name="sponsor-address" placeholder="Sponsor's Address">
            </div>
          </div>
        </div>
      </div>
      <!-- Tenth Layer -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
              <input type="telephone" class="form-control" name="sponsor-phone" placeholder="Sponsor's Phone">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-child"></i></span></div>
              <input type="text" class="form-control" name="kin" placeholder="Next of Kin's Name" required="required">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span></div>
              <input type="text" class="form-control" name="kin-address" placeholder="Next of Kin's Address">
            </div>
          </div>
        </div>
      </div>
      <!-- Eleventh Layer -->
      <div class="row">
        <div class="form-group col">
          <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
            <input type="telephone" class="form-control" name="kin-phone" placeholder="Next of Kin's Phone">
          </div>
        </div>
      </div>

    </div>

    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
    </div>
    <?php
    $addStudent = new ControllerStudents();
    $addStudent -> ctrAddStudent();

    ?>

  </form>

</div>
</div>
</div>



        