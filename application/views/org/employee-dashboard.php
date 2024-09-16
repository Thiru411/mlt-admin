<!DOCTYPE html>
<html lang="en">
<head>

<?php $this->load->view('inc/script-top.php'); ?> 

</head>
<body class="<?=body_style?>">
<div class="wrapper">
  

<?php $this->load->view('inc/nav-top.php'); ?> 

<?php $this->load->view('inc/nav-side.php'); ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Summary</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Widgets</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
  


      <div class="row">
          <div class="col-md-4">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
             
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Total Employees <span class="float-right badge bg-primary">31</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Total Contract Employees <span class="float-right badge bg-info">5</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                    Total Vehicles <span class="float-right badge bg-success">12</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                    Total Contract Vehicles <span class="float-right badge bg-danger">842</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          
          <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info" style="height:50px">
              
                <h5 class="widget-user-desc">Founder & CEO</h5>
              </div>
            
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          
  
          
        </div>
        <!-- /.row -->

        <!-- <div class="row">
          <div class="col-md-3">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Expandable</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                
              </div>
              
              <div class="card-body">
                The body of the card
              </div>
              
            </div>
            
          </div>
          
          <div class="col-md-3">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Collapsable</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                
              </div>
              
              <div class="card-body">
                The body of the card
              </div>
              
            </div>
            
          </div>
          
          <div class="col-md-3">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Removable</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
                
              </div>
              
              <div class="card-body">
                The body of the card
              </div>
              
            </div>
            
          </div>
          
          <div class="col-md-3">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Maximizable</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
                
              </div>
              
              <div class="card-body">
                The body of the card
              </div>
              
            </div>
            
          </div>
          
        </div> -->
        <!-- /.row -->


        <!-- <div class="row">
          <div class="col-md-3">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Primary Outline</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                
              </div>
              
              <div class="card-body">
                The body of the card
              </div>
              
            </div>
            
          </div>
          
          <div class="col-md-3">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Success Outline</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
                
              </div>
              
              <div class="card-body">
                The body of the card
              </div>
              
            </div>
            
          </div>
          
          <div class="col-md-3">
            <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Warning Outline</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                
              </div>
              
              <div class="card-body">
                The body of the card
              </div>
              
            </div>
            
          </div>
          
          <div class="col-md-3">
            <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title">Danger Outline</h3>
              </div>
              <div class="card-body">
                The body of the card
              </div>
              
            </div>
            
          </div>
          
        </div> -->
        <!-- /.row -->



        <div class="row">
            <div class="col-md-6">
              <!-- Box Comment -->
              <div class="card card-widget">
                <div class="card-header">
                  <div class="user-block">
                    <span class="username" style="margin-left:0px">Quick Links</span>
                  </div>
                  <div class="card-tools"> 
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <ul style="list-style-type:none;">
                        <li><a href="#" class="nav-link">New Employee</a></li>
                        <li><a href="#" class="nav-link">Add Bulk Employee</a></li>
                      </ul>
                    </div>
                    <div class="col-md-6">
                      <ul style="list-style-type:none;">
                        <li><a href="#" class="nav-link">New Vehicle</a></li>
                        <li><a href="#" class="nav-link">Add Bulk Vehicle</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
            </div>
          
        </div>
        <!-- /.row -->

  
        <div class="row">
            <div class="col-md-6">
              <!-- Box Comment -->
              <div class="card card-widget">
                <div class="card-header">
                  <div class="user-block">
                    <span class="username" style="margin-left:0px">Quick Reports</span>
                  </div>
                  <div class="card-tools"> 
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <ul style="list-style-type:none;">
                        <li><a href="#" class="nav-link">All Employees</a></li>
                        <li><a href="#" class="nav-link">Resigned Employee</a></li>
                        <li><a href="#" class="nav-link">Incomplete Profiles</a></li>
                      </ul>
                    </div>
                    <div class="col-md-6">
                      <ul style="list-style-type:none;">
                      <li><a href="#" class="nav-link">Employee Job Details</a></li>
                        <li><a href="#" class="nav-link">Employees In Probation</a></li>
                        <li><a href="#" class="nav-link">Employees in notice period</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
            </div>
          
        </div>
        <!-- /.row -->
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  
  <!-- /.content-wrapper -->

  <?php $this->load->view('inc/footer.php'); ?> 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php $this->load->view('inc/script-bottom.php'); ?> 

</body>
</html>
