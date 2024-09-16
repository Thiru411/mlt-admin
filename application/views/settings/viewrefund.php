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
            <h1>View Refund List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Refund List</li>
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
                    <th>Order Id</th>
                    <th>Customer Name</th>
                    <th>Phone Number</th>
                    <th>Refund Date</th>
                    <th>Refund Amount</th>

                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                 if($refundDetails){
                     $i=1;
                foreach($refundDetails as $row){
//var_dump($row);
$row->refund_date= strtotime($row->refund_date);
 
$date = date("d-m-Y", $row->refund_date);


                  ?>

                 <tr>
                    <td><?php echo $i++;?></td> 
                    <td><?=$row->order_id?></td>
                    <?php $user_name= $this->CommonModel->getRecords(array('sk_user_id'=>$row->user_id),'mst_user');
                    $cust_name=$user_name[0]->full_name;
                    echo $user_name[0]->sk_user_id?>
                    <td><?=$cust_name?></td>
                    <td><?=$row->number?></td>

                    <td><?=$date?></td>
                    <td><?=$row->refund_amount?></td>
                    <?php
                                if($row->refund_status==1){?>
                                <td><a href="<?php echo base_url('settings/refundedit/edit'.'/'.$row->sk_refund_id );?>">Edit</a>
                                <a href="<?php echo base_url('settings/refundedit/delete'.'/'.$row->sk_refund_id );?>">Delete</a>
                                </td>
                                <?php }else{ ?>
                                    <td><a href="<?php echo base_url('settings/refundedit/active'.'/'.$row->sk_refund_id );?>">Active</a></td>
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
