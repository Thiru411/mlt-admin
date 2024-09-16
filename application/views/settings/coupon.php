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
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Coupons</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="<?php echo base_url('settings/couponSave')?>" method="post">
                <div class="card-body row">

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Coupon Code</label>
                    <input type="text" name="coupon_code" class="form-control" id="coupon_code" placeholder="Enter Coupon Code" required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="desc" class="form-control" id="desc" placeholder="Enter Description"></textarea>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Coupon Type</label>
                    <select name="type" class="form-control" id="type">
                      <option value="">Percentage Discount</option>
                      <option value="fixed_cart_disc">Fixed cart discount</option>
                      <option value="fixed_item_disc">Fixed item discount</option>
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Coupon Amount</label>
                    <input type="text" name="coupon_amount" class="form-control" id="coupon_amount" placeholder="Enter Coupon Amount" required>
                  </div>

                <!--<div class="form-check col-md-8">
                    <label for="exampleInputEmail1">Allow Free Shipping</label><br>
                   
                    <input type="checkbox" class="form-check-input" name="checkbox" value="1" id="checkbox">
                    
                    <p>check this box if the coupon grants the free shipping.</p>
                    </div>-->

                    
<div class="form-group form-check col-md-4">
<div>
  <label for="">Allow Free Shipping</label>
</div>
<div class="ml-4">
<input type="checkbox" class="form-check-input mt-2" id="exampleCheck1" value="1" id="checkbox">
  <label class="form-check-label" for="exampleCheck1">check this box if the coupon grants the free shipping.</label>
</div>
 
</div>



                

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Coupon Expiry Date</label>
                    <input type="text" name="coupon_expiry" id='coupon_expiry' class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Usage Limit Per Coupon</label>
                    <input type="number" name="limit_per_coupon" id='limit_per_coupon' class="form-control" max="100" min="1" placeholder="Enter Usage limit of coupon" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Usage Limit Per User</label>
                    <input type="text" name="limit_per_user" id='limit_per_user' class="form-control"  placeholder="Enter usage limit of user" required>
                  </div>

                  



                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <!--  <input type="submit" name="submit">-->
                 <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
