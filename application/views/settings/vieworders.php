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
            <h1>View Of Order Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Details</li>
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
                <h3 class="card-title">Order <small>Basic</small>Details</h3>
              </div>
              <!-- /.card-header -->
              <?php
              $sk_order_id=$full_name=$mobile=$order_type=$payment_mode=$item_price=$discount_amount=$total_order_value=$total_amount=$order_status= $riderName=$riderPhone=$full_address='';
              
              if($orderdetails){
               foreach($orderdetails as $info){
                 // var_dump($info); exit;
                  $sk_order_id=$info->sk_order_id;
                  $full_name=$info->full_name;
                  $mobile=$info->mobile;
                  $order_type=$info->order_type;
                  $payment_mode=$info->payment_mode;
                  $item_price=$info->item_price;
                  $discount_amount=$info->discount_amount;
                  $total_order_value=$info->total_order_value;
                  $total_amount=$total_order_value - $discount_amount;
                  $order_status=$info->order_status;
                  $riderName=$info->riderName;
                  $riderPhone=$info->riderPhone;
                  $full_address=$info->full_address;
                 
               } }?>
              
                <div class="card-body row">
               
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Order Id:--</label>
                    <label for="exampleInputEmail1"><?=$sk_order_id?></label>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Name:--</label>
                    <label for="exampleInputEmail1"><?=$full_name?></label>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Order Type:--</label>
                    <label for="exampleInputEmail1"><?=$order_type?></label>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Payment Mode:--</label>
                    <label for="exampleInputEmail1"><?=$payment_mode?></label>
                  </div> 
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Order Amount:--</label>
                    <label for="exampleInputEmail1"><?=$total_order_value?></label>
                  </div>
                 
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Discount Amount:--</label>
                    <label for="exampleInputEmail1"><?=$discount_amount?></label>
                  </div> 

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Total Amount:--</label>
                    <label for="exampleInputEmail1"><?=$total_amount?></label>
                  </div>

                 

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Order Status:--</label>
                    <label for="exampleInputEmail1"><?=$order_status?></label>
                  </div>
                  <?php if($riderName!=''){ ?>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Rider Name:--</label>
                    <label for="exampleInputEmail1"><?=$riderName?></label>
                  </div>
                 <?php } ?>
                 <?php if($riderPhone!=''){?>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Rider Phone Number:--</label>
                    <label for="exampleInputEmail1"><?=$riderPhone?></label>
                  </div>
                  <?php } ?>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Address:--</label>
                    <label for="exampleInputEmail1"><?=$full_address?></label>
                  </div>

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
      <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Item 
                    Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
              
                <div class="card-body row">
                  <?php
                  $item_name=$quantity=$singleqtyprice='';
                   if($adddetails){
                        foreach($adddetails as $info){
               // var_dump($info); exit;
                $item_name=$info->item_name;
                $quantity=$info->cart_count;
                $singleqtyprice=$info->cprice;
               ?>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Item Name:--</label>
                    <label for="exampleInputEmail1"><?=$item_name?></label>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Quantity Of Item:--</label>
                    <label for="exampleInputEmail1"><?=$quantity?></label>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Single Quantity Price:--</label>
                    <label for="exampleInputEmail1"><?=$singleqtyprice?></label>
                  </div> 
                  <?php } }?>

                 
                </div>
                <!-- /.card-body -->
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
