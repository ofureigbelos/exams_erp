

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Exam Scores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Exam Scores Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
          

          $session_query = "SELECT DISTINCT Session FROM courseregistration";

          $code_query = "SELECT DISTINCT course_Id, CourseCode FROM schoolcourse ORDER BY Level";

          $stmt_ses  = Connection::Connect()->prepare($session_query);
          $stmt_cod  = Connection::Connect()->prepare($code_query);

          $stmt_ses -> execute();
          $stmt_cod -> execute();

      ?>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-9">
            <form method="post" id="Exmscores">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-graduate"></i></span></div>
                      <select name="course" id="course" class="form-control" required="">
                        <option value="">Select Course Code</option>
                        <?php
                        while($row = $stmt_cod->fetch(PDO::FETCH_ASSOC)){
                        echo '
                        <option value="'.$row["course_Id"].'">'.$row["CourseCode"].'</option>';
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
                      <select name="academic-session" id="academic-session" class="form-control" required="">
                        <option value="">Select Present Academic Session</option>
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
                    <button type="submit" name="search-registered" id="search-registered" class="btn btn-primary"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="card-tools"></div>
      </div>

        <div class="card-body">
          <form method="post" id="entscore-form">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-9">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width: 15px;">SN</th>
                      <th style="width: auto;">Matriculation No</th>
                      <th style="width: auto;">Course Code</th>
                      <th style="width: auto;">Course Tittle</th>
                      <th style="width: auto;">Course Unit</th>
                      <th style="width: auto;">First Test</th>
                      <th style="width: auto;">Second Test</th>
                      <th>Exam Score</th>
                      <th>Total</th>
                    </tr>
                  </thead>

                  <tbody></tbody>
                </table>
              </div>
              <div class="col-md-1"></div>
            </div>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
          <div class="row">
            <div class="col"></div>
            <div class="col">
              <div class="form-group">
                <div class="input-group">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary">Upload Scores</button>
                </div>
              </div>
            </div>
            <div class="col"></div>
          </div>
        </div>
      </form>

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->