<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->
  <a href="home" class="brand-link">
      <img src="views/img/template/MH_logo.png"
           alt="MH Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">IHT | Exams & Record</span>
    </a>
    <!-- Brand Logo Ends -->

    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 
                <!-- Home Menu --> 
               <li class="nav-item">
                <a href="home" class="nav-link active">
                  <i class="nav-icon fas fa-home"></i><p>Home</p>
                </a>
               </li>
               <!-- Home Menu -->

               <!-- User Menu -->
               <?php
               if($_SESSION["profile"] == "Super Admin"){
                echo'
               <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Users Profile<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="users" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>User Management</p>
                    </a>
                  </li>
                </ul>
              </li>';
            }
              ?>
              <!-- User Menu -->

              <!-- Student Menu -->
              <li class="nav-header">Students</li> 
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Students Data<i class="right fas fa-angle-left"></i></p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="student-bio" class="nav-link">
                        <i class=" fas fa-bars nav-icon"></i><p>Student Bio-data</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="student-list" class="nav-link">
                        <i class=" fas fa-bars nav-icon"></i><p>Course Registration</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="attendance" class="nav-link">
                        <i class="fab fa-product-hunt nav-icon"></i><p>Attendance List</p>
                      </a>
                    </li>
                  </ul>
                </li>
               <!-- Student Menu -->

               <!-- Scores Menu --> 
               <li class="nav-item">
                <a href="exam-score" class="nav-link">
                  <i class="nav-icon fas fa-users"></i><p>Record Scores</p>
                </a>
               </li>
               <!-- Scores Menu -->

               <!-- Report Menu -->
               <li class="nav-item has-treeview">
                 <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-poll-h"></i>
                   <p>Reports<i class="right fas fa-angle-left"></i></p>
                 </a>
                 <ul class="nav nav-treeview">
                   <li class="nav-item">
                     <a href="semester-result" class="nav-link">
                       <i class="fas fa-list-alt nav-icon"></i><p>Semester Result</p>
                     </a>
                   </li>
                   <li class="nav-item">
                     <a href="final-result" class="nav-link">
                       <i class="fas fa-list-alt nav-icon"></i><p>Final Result</p>
                     </a>
                   </li>
                   <li class="nav-item">
                     <a href="broadsheet" class="nav-link">
                       <i class="fas fa-list-alt nav-icon"></i><p>BroadSheet Report</p>
                     </a>
                   </li>
                   <li class="nav-item">
                     <a href="#" class="nav-link">
                       <i class="fas fa-chart-pie nav-icon"></i><p>Transcript Report</p>
                     </a>
                   </li>
                 </ul>
               </li>
               <!-- Report Menu -->


               <!-- Promotion Menu -->
               <li class="nav-item has-treeview">
                 <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-level-up-alt"></i>
                   <p>Promote Students<i class="right fas fa-angle-left"></i></p>
                 </a>
                 <ul class="nav nav-treeview">
                   <li class="nav-item">
                     <a href="promote-student" class="nav-link">
                       <i class="fas fa-external-link-alt nav-icon"></i><p>Promote Student</p>
                     </a>
                   </li>
                 </ul>
               </li>
               <!-- Promotion Menu -->

               <!-- Settings Menu -->
               <li class="nav-item has-treeview">
                 <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-cogs"></i>
                   <p>Settings<i class="right fas fa-angle-left"></i></p>
                 </a>
                 <ul class="nav nav-treeview">
                   <li class="nav-item">
                     <a href="school-courses" class="nav-link">
                       <i class="fas fa-list-ul nav-icon"></i><p>School Courses</p>
                     </a>
                   </li>
                   <li class="nav-item">
                     <a href="#" class="nav-link">
                       <i class="fas fa-cogs nav-icon"></i><p>Other Setup</p>
                     </a>
                   </li>
                   <li class="nav-item">
                     <a href="#" class="nav-link">
                       <i class="fas fa-chart-pie nav-icon"></i><p>Other Setup</p>
                     </a>
                   </li>
                 </ul>
               </li>
               <!-- Settings Menu -->


        </ul>
      </nav>

    </div>
  </aside>