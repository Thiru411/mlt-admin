<!DOCTYPE html>
<html lang="en">
<head>

<?php $this->load->view('inc/script-top.php'); ?> 

  <link rel="stylesheet" href="<?=base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
            <h1>Employee Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Directory</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
          <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Designation</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Role</a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                    



                  <div class="row">
                        <!-- left column -->
                        <div class="col-md-4">
                            <!-- jquery validation -->
                            <div class="card card-primary">
                           
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="<?php echo base_url('org/save_designation')?>" method="post">
                                <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Designation</label>
                                    <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Designation" required>
                                </div>

                                
                                
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            </div>
                            <!-- /.card -->
                            </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">
                        <div class="card card-primary">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Designation</th>
                                
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if($getdesination){
                              foreach($getdesination as $rows) {
                                ?>
                              
                            <tr>
                                <td><?php echo $rows->designation_name?></td>
                               <?php if($rows->designation_status==1){?>
                                <td><a href="<?php echo base_url('org/designationEdit/edit'.'/'.$rows->sk_designation_id);?>">Edit</a>
                                <a href="<?php echo base_url('org/designationEdit/delete'.'/'.$rows->sk_designation_id);?>">Delete</a>
                              </td>
                              <?php }else{ ?>


                                <td><a href="<?php echo base_url('org/designationEdit/active'.'/'.$rows->sk_designation_id);?>">Active</a></td>
                             <?php }?>
                            </tr>
                            <?php } }?>
                         
                            
                            </tbody>
                            
                            </table>
                        </div>
                        </div>
                        <!--/.col (right) -->
                </div>





                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                     
                  

                  <div class="row">
                        <!-- left column -->
                        <div class="col-md-4">
                            <!-- jquery validation -->
                            <div class="card card-primary">
                           
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="<?php echo base_url('org/save_role')?>" method="post">
                                <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Role</label>
                                    <input type="text" name="role" class="form-control" id="role" placeholder="Enter Role" required>
                                </div>

                                
                                
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            </div>
                            <!-- /.card -->
                            </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">
                        <div class="card card-primary">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Role</th>
                                
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                              if($getrole){
                              foreach($getrole as $rows){
                              ?>

                            <tr>
                                <td><?php echo $rows->role_name?></td>
                                <?php if($rows->role_status==1){?>
                                <td><a href="<?php echo base_url('org/roleEdit/edit'.'/'.$rows->sk_role_id);?>">Edit</a>
                                <a href="<?php echo base_url('org/roleEdit/delete'.'/'.$rows->sk_role_id);?>">Delete</a>
                              </td>
                              
                              <?php }else{ ?>


                                <td><a href="<?php echo base_url('org/roleEdit/active'.'/'.$rows->sk_role_id);?>">Active</a></td>
                             <?php }?>
                            </tr>
                            <?php } }?>
                    
                          
                         
                            </tbody>
                            
                            </table>
                        </div>
                        </div>
                        <!--/.col (right) -->
                </div>





                  </div>
                 
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
         
        </div>
          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php $this->load->view('inc/footer.php'); ?> 

</div>
<!-- ./wrapper -->

<?php $this->load->view('inc/script-bottom.php'); ?> 

</body>
</html>
