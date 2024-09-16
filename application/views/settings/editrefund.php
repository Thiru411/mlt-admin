<!DOCTYPE html>
<html>
<head>
  
  
  <?php $this->load->view('inc/script-top.php'); ?> 
 <!-- daterange picker -->
 <link rel="stylesheet" href="<?=base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">

  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
            <h1>Manage Refund</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Directory</li>
              <li class="breadcrumb-item active">Refund</li>
              <li class="breadcrumb-item align-self-center"><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back </li></a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
            <?php foreach($refundDetails as $info) {
   //var_dump($info);exit;
   $id=$info->sk_refund_id;
   $orderid=$info->order_id;
   $user_id=$info->user_id;
   $number=$info->number;
   $refund_date=$info->refund_date;
   $refund_amount=$info->refund_amount;
}?>
              <div class="card-header">
                <h3 class="card-title">Refund Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="<?php echo base_url('settings/refundedit/update')?>" method="post">
                <div class="card-body row">
                <input type="hidden" name="id" value="<?=$id?>">
                  <div class="form-group col-md-4">
                      <label>Order Id</label>
                    <input type="text" name="order_id" class="form-control" value="<?=$orderid?>" id="order_id" placeholder="Enter Order Id">
                </div>  
                
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Customers List</label>
                    <select name="users" class="form-control" id="users">
                    
                    
<?php foreach($getusers as $rows) { ?>

<?php   if( $user_id==$rows->sk_user_id){ echo $selected = "selected"; }else{ echo $selected = "";} ?>
<option <?=$selected?> value="<?=$rows->sk_user_id?>"><?=$rows->full_name?></option>
<?php } ?>
                    </select>
                  </div>                
            
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" name="phone" id="phone" value="<?=$number?>" class="form-control" placeholder="Enter Phone Number">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Refund Date</label>
                    <input type="date" name="refund" class="form-control" value="<?=$refund_date?>" id="refund">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Refund Amount</label>
                    <input type="text" name="amount" class="form-control" value="<?=$refund_amount?>"  id="amount" placeholder="Enter Refund Amount ">
                  </div>
                  
                  
                  <div class="form-group col-md-6">

                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
                <!-- <div class="card-footer">
                <!--  <input type="submit" name="submit">-->
                 <!-- <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div> -->
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <?php $this->load->view('inc/footer.php'); ?> 
 
</div>
<!-- ./wrapper -->

<?php $this->load->view('inc/script-bottom.php'); ?> 
<!-- jquery-validation -->
<script src="<?=$admin_url?>assets/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?=$admin_url?>assets/admin/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- DataTables -->
<script src="<?=$admin_url?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=$admin_url?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<script type="text/javascript">
$(document).ready(function () {
  
  $('#quickForm').validate({
    rules: {
      section: {
        required: true,
      },
      category: {
        required: true,
      },
    },
    messages: {
    	section: {
        required: "Please enter a email address"
      },
      category: {
        required: "Please provide a password"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
