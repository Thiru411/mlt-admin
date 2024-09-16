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
            <h1>View Package List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Package List</li>
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
           
            <!-- /.card -->

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>sl no</th>
                    <th>Package Name</th>
                    <th>Number Of Pizzas</th>
                    <th>Number Of Sides</th>
                    <th>Number Of Salads</th>
                    <th>Number Of Dips</th>
                    <th>Number Of Desserts</th>
                    <th>Number Of Drinks</th>
                    <th>Display Caption</th>
                    <th>Total Package Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                if($PackageDetails){
                    $i=1;
                foreach($PackageDetails as $row){

                  ?>
                  <tr>
                  <td><?php echo $i++;?></td> 
                    <td><?=$row->package_name?></td>
                    <td><?=$row->no_of_pizza?></td>
                    <td><?=$row->no_of_sides?></td>
                    <td><?=$row->no_of_salads?></td>
                    <td><?=$row->no_of_dips?></td>
                    <td><?=$row->no_of_desserts?></td>
                    <td><?=$row->no_of_drinks?></td>
                   
                    
                    <td><?=$row->display_package?></td>
                    <td><?=$row->package_amount?></td>
                    <?php
                                if($row->package_status==1){?>
                                <td><a href="<?php echo base_url('settings/editpackage/edit'.'/'.base64_encode($row->sk_package_id));?>">Edit</a>
                                <a href="<?php echo base_url('settings/editpackage/delete'.'/'.base64_encode($row->sk_package_id));?>">Delete</a>
                                </td>
                                <?php }else{ ?>
                                    <td><a href="<?php echo base_url('settings/editpackage/active'.'/'.base64_encode($row->sk_package_id));?>">Active</a></td>
                             <?php }?>
                                </tr>
                 <?php } }?>
                 
                
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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

<?php $this->load->view('inc/script-bottom.php'); ?> 
                                
</body>
</html>
