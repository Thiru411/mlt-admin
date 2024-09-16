<!DOCTYPE html>
<html lang="en">
<head>

<?php $this->load->view('inc/script-top.php'); ?> 

  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">

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
            <h1>Add New Coupon</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Coupon</li>
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
        

          <div class="col-md-5">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Coupon<small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="post" action="<?php echo base_url('settings/savecoupon')?>">
                <div class="card-body">
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Coupon Code</label><span style="color:red">*</span>
                    <input type="text" id="coupon_code" name="coupon_code" class="form-control" placeholder="Coupon Code" required>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Start Date</label><span style="color:red">*</span>
                    <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Start Date" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">End Date</label><span style="color:red">*</span>
                    <input type="date" name="end_date" id="end_date" class="form-control" placeholder="End Date" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Discount in %</label><span style="color:red">*</span>
                    <input type="text" name="discount" id="discount" class="form-control" placeholder="Discount in %" required>
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
      
      
      
        <div class="col-7">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">View Coupon</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Coupon Code</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Discount in %</th>
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>

                <?php
                if($CouponDetails) {

                $i=1; foreach($CouponDetails as $info){?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $info->coupon_code;?></td>
                  <td><?php echo $info->start_date;?></td>
                   <td><?php echo $info->end_date;?></td>
                   <td><?php echo $info->discount;?></td>
                  <td><?php if($info->coupon_status==1){?>
                    <a href="<?php echo base_url('settings/couponEdit/edit'.'/'.$info->sk_coupon_id)?>" class="fa fa-edit"></a>
                    <a  href="<?php echo base_url('settings/couponEdit/delete'.'/'.$info->sk_coupon_id)?>" class="fa fa-trash"></a>
                    <?php }else{?>
                    <a href="<?php echo base_url('settings/couponEdit/active'.'/'.$info->sk_coupon_id)?>" class="fa fa-check"></a> 
                    <?php } ?>
                    </td>
                </tr>
                <?php } } ?>
               
                </tbody>
               
              </table>
            </div>
            <!-- /.card-body -->
          </div>
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
<script src="<?=base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>


<!-- Select2 -->
<script src="<?=base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?=base_url() ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?=base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?=base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?=base_url() ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Page specific script -->
<script>
$(function () {
 
  $('#quickForm').validate({
    rules: {
      first_name: {
        required: true,
      },
      employee_mobile: {
        required: true,
        maxlength: 10
      },
      email: {
        required: true,
        email: true,
      },
     
    },
    messages: {
        first_name: {
        required: "Please enter a first name"
      },
      employee_mobile: {
        required: "Please enter a employee mobile"
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
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
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()




  })
</script>
</body>
</html>
