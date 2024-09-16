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
            <h1>Vehicles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vehicles Directory</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php 
    if($fetchdata!=false){
     foreach($fetchdata as $rows) {
        $vehicle_count=$rows->vehicle_count;
        $sk_vehicle_id=$rows->sk_vehicle_id;
        }
    }
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
          <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-tabs">
             <h2>Number Of Vehicles Information</h2>
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
                            <form id="quickForm" action="<?php echo base_url('settings/editvehicle')?>" method="post">
                                <div class="card-body row">
                                <input type="hidden" name="id" value="<?=$sk_vehicle_id?>">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">No Of Vehicles</label>
                                    <input type="text" name="no_of_vehicles" class="form-control" id="no_of_vehicles" placeholder="Enter No Of Vehicles" value="<?=$vehicle_count?>" required>
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
                                <th>Sl No</th>
                                <th>No Of Vehicles</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if($fetchdata!=false){
                             $i=1; foreach($fetchdata as $rows) {
                                 // var_dump($rows)
                                ?>
                              
                            <tr>
                                                  <td><?php echo $i++;?></td>

                                <td><?php echo $rows->vehicle_count?></td>
                              
                             <?php }?>
                            </tr>
                            <?php } ?>
                         
                            
                            </tbody>
                            
                            </table>
                        </div>
                        </div>
                        <!--/.col (right) 
                </div>-->





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
