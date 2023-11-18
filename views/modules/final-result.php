

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Final Semester Result</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Final Year Result Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

       <?php
          global $header, $matque, $body;

          $session = "SELECT DISTINCT Session FROM courseregistration";

          $dept = "SELECT DISTINCT Department FROM schoolcourse";
          $leve = "SELECT DISTINCT Level FROM schoolcourse";
          $seme = "SELECT DISTINCT Semester FROM schoolcourse";

          $stmt_ses  = Connection::Connect()->prepare($session);
          $stmt_dep  = Connection::Connect()->prepare($dept);
          $stmt_lev  = Connection::Connect()->prepare($leve);
          $stmt_sem  = Connection::Connect()->prepare($seme);

          $stmt_ses -> execute();
          $stmt_dep -> execute();
          $stmt_lev -> execute();
          $stmt_sem -> execute();


          if(isset($_POST["search"])){

              $sch = $_POST["school"];
              $cla = $_POST["class"];
              $ses = $_POST["session"];

              $data = array('dept' => $sch,
                            'leve' => $cla,
                            'year' => $ses);

              $query = "SELECT DISTINCT CourseCode FROM courseregistration JOIN schoolcourse ON courseregistration.course_Id = schoolcourse.course_Id WHERE Department = :dept AND Level = :leve AND Session = :year"; 

              $header = Connection::Connect()->prepare($query);

              $header -> bindParam(':dept', $data['dept'], PDO::PARAM_STR);
              $header -> bindParam(':leve', $data['leve'], PDO::PARAM_STR);
              $header -> bindParam(':year', $data['year'], PDO::PARAM_STR);

              $header -> execute();
                 
            }

            if(isset($_POST["search"])){

              $sch = $_POST["school"];
              $cla = $_POST["class"];
              $ses = $_POST["session"];

              $datam = array('dept' => $sch,
                            'leve' => $cla,
                            'year' => $ses);


              $query2 = "SELECT MatriculationNo, Total FROM courseregistration JOIN schoolcourse ON courseregistration.course_Id = schoolcourse.course_Id WHERE courseregistration.MatriculationNo = courseregistration.MatriculationNo AND Department = :dept AND Level = :leve AND Session = :year"; 

              $body   = Connection::Connect()->prepare($query2);

              $body -> bindParam(':dept', $datam['dept'], PDO::PARAM_STR);
              $body -> bindParam(':leve', $datam['leve'], PDO::PARAM_STR);
              $body -> bindParam(':year', $datam['year'], PDO::PARAM_STR);

              $body -> execute();
                 
            }

      ?>

    <!-- Main content -->
    <form method="post" id="semester_result">
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md">
              
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-school"></i></span></div>
                        <select name="school" id="school" class="form-control" required="">
                          <option value="">Select School</option>
                          <?php
                        while($row = $stmt_dep->fetch(PDO::FETCH_ASSOC)){
                        echo '
                        <option value="'.$row["Department"].'">'.$row["Department"].'</option>';
                        }
                        ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-graduate"></i></span></div>
                        <select name="class" id="class" class="form-control" required="">
                          <option value="">Select Level</option>
                          <?php
                        while($row = $stmt_lev->fetch(PDO::FETCH_ASSOC)){
                        echo '
                        <option value="'.$row["Level"].'">'.$row["Level"].'</option>';
                        }
                        ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-graduate"></i></span></div>
                        <select name="session" id="session" class="form-control" required="">
                          <option value="">Select Session</option>
                          <?php
                        while($row = $stmt_ses->fetch(PDO::FETCH_ASSOC)){
                        echo '
                        <option value="'.$row["Session"].'">'.$row["Session"].'</option>';
                        }

                        ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group-append">
                      <button type="submit" name="search" id="search" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered dt-responsive table-striped">
            <thead>
              <tr>
              <?php
                if($header != null){
                echo'<th style="width:10px">#</th>
                <th style="width:Auto">Matriculation No</th>';

                while($row = $header->fetch(PDO::FETCH_ASSOC)){
                  echo '<th>'.$row["CourseCode"].'</th>';
                }
                echo'<th>CGPA</th>';
              }
              ?>
                
              </tr>
            </thead>
            <tbody>
              <?php
              if($body != null){
                
                

                $grouped = [];

                foreach($body as $row){
                  $grouped[$row['MatriculationNo']][] = $row['Total'];  
                }
                  $i = 0;
                foreach($grouped as $name => $record){
                  echo '<tr>';
                  echo '<td>'.($i + 1).'</td>';
                  echo '<td>'.$name.'</td>';

                  echo '<td>'.implode('</td><td>', $record).'</td>';

                  echo '<td>'.(array_sum($record)/count($record)).'</td>';

                  echo '</tr>';

                  $i++;
                }
                
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
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->