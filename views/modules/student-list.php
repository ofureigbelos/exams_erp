

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Stundent List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Stundent List Page</li>
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
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>


        <div class="error-page">
        <!--
        <div class="card-body">
           Search Content -->
        <div class="error-content">
          <h3><i class="fas fa-search text-info"></i> Course-Reg Search Page.</h3>

          <p>
            Enter student's matriculation number you are looking for.
            Or, you may return to <a href="home"><i class="fas fa-tachometer-alt"></i> Dashboard</a>.
          </p>

          
          <form class="search-form" method="post">
            <div class="input-group">
              <input type="text" name="matric_no" class="form-control" placeholder="Enter Mat_No" required="">

              <div class="input-group-append">
                <button type="submit" name="search" class="btn btn-info"><i class="fas fa-search"></i>
                </button>
              </div>
            </div>
            <?php
            $search = new ControllerStudents();
            $search->ctrSearchStudent();
            ?>
              
          </form>
          
        </div>
        <!-- Search Content -->
        </div>

        <!--
        </div>
         /.card-body -->


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