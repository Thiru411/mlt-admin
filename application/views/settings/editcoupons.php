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
            <h1>Manage Coupon</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Directory</li>
              <li class="breadcrumb-item active">Coupon</li>
              <li class="breadcrumb-item align-self-center"><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back </li></a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      
      
      <div class="col-md-5">
            <!-- jquery validation -->
            <div class="card card-primary">
<?php foreach($CouponDetail as $info) {
    $couponcode=$info->coupon_code;
    $startdate=$info->start_date;
    $enddate=$info->end_date;
    $dis=$info->discount;
}?>

              <div class="card-header">
                <h3 class="card-title">Edit Coupon<small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="post" action="<?php echo base_url('settings/couponEdit/update')?>">
                <div class="card-body">
                <input type="hidden" name="id" value="<?=$id?>">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Coupon Code</label><span style="color:red">*</span>
                    <input type="text" name="coupon_code" class="form-control" placeholder="Coupon Code" value="<?php echo $couponcode?>" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Start Date</label><span style="color:red">*</span>
                    <input type="date" name="start_date" class="form-control" value="<?php echo $startdate?>" placeholder="Start Date" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">End Date</label><span style="color:red">*</span>
                    <input type="date" name="end_date" class="form-control" placeholder="End Date" value="<?php echo $enddate?>" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Discount in %</label><span style="color:red">*</span>
                    <input type="text" name="discount" class="form-control" placeholder="Discount in %"  value="<?php echo $dis?>" required>
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
      
      
      </div>
      <!-- /.row -->
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
