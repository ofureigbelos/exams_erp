    <?php
    
    $querya = "SELECT DISTINCT Department FROM schoolcourse";
    $queryb = "SELECT DISTINCT Level FROM schoolcourse";
    $queryc = "SELECT DISTINCT Session FROM courseregistration";

    $stmta = Connection::Connect()->prepare($querya);
    $stmtb = Connection::Connect()->prepare($queryb);
    $stmtc = Connection::Connect()->prepare($queryc);

    $stmta -> execute();
    $stmtb -> execute();
    $stmtc -> execute();

    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attendance List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Attendance List Page</li>
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
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
              <form method="post" id="Attendance">
                <div class="row">

                  <div class="col">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-graduate"></i></span></div>
                        <select name="department" id="department" class="form-control" required="">
                          <option value="">Select Department</option>
                          <?php
                          while($row = $stmta->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$row["Department"].'">'.$row["Department"].'</option>';
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
                        <select name="academic_level" id="academic_level" class="form-control" required="">
                          <option value="">Select Class Level</option>
                          <?php
                          while($row = $stmtb->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$row["Level"].'">'.$row["Level"].'</option>';
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
                        <select name="academic_session" id="academic_session" class="form-control" required="">
                          <option value="">Select Present Session</option>
                          <?php
                          while($row = $stmtc->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$row["Session"].'">'.$row["Session"].'</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group-append">
                      <button type="submit" name="search_registered" id="search_registered" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px;">SN</th>
                      <th>Matriculation No</th>
                      <th style="width: auto;">Sign In</th>
                      <th style="width: auto;">Sign Out</th>
                      <th style="width: auto;">Date</th>
                    </tr>
                  </thead>

                  <tbody></tbody>
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