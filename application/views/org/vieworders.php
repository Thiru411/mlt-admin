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
               // var_dump($info); exit;
                  $sk_order_id=$info->sk_order_id;
                  $full_name=$info->full_name;
                  $email=$info->email;
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
                 <span for="exampleInputEmail1"><?=$sk_order_id?></span>
               </div>
               <div class="form-group col-md-4">
                 <label for="exampleInputEmail1">Name:--</label>
                 <span for="exampleInputEmail1"><?=$full_name?></span>
               </div>
               <div class="form-group col-md-4">
                 <label for="exampleInputEmail1">Email:--</label>
                 <span for="exampleInputEmail1"><?=$email?></span>
               </div>
               <div class="form-group col-md-4">
                 <label for="exampleInputEmail1">Mobile:--</label>
                 <span for="exampleInputEmail1"><?=$mobile?></span>
               </div>

               <div class="form-group col-md-4">
                 <label for="exampleInputEmail1">Order Type:--</label>
                 <span for="exampleInputEmail1"><?=$order_type?></span>
               </div>

               <div class="form-group col-md-4">
                 <label for="exampleInputEmail1">Payment Mode:--</label>
                 <span for="exampleInputEmail1"><?=$payment_mode?></span>
               </div> 
               <div class="form-group col-md-4">
                 <label for="exampleInputEmail1">Order Amount:--</label>
                 <span for="exampleInputEmail1"><?=$total_order_value?></span>
               </div>
              
               <div class="form-group col-md-4">
                 <label for="exampleInputEmail1">Discount Amount:--</label>
                 <span for="exampleInputEmail1"><?=$discount_amount?></span>
               </div> 
               <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Total Amount:--</label>
                    <span for="exampleInputEmail1"><?=$total_amount?></span>
                  </div>
                  <label for="exampleInputEmail1">Order Status:--</label>
                    <span for="exampleInputEmail1"><?=$order_status?></span>
                  </div>
                  <?php if($riderName!=''){ ?>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Rider Name:--</label>
                    <span for="exampleInputEmail1"><?=$riderName?></span>
                  </div>
                 <?php } ?>
                 <?php if($riderPhone!=''){?>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Rider Phone Number:--</label>
                    <span for="exampleInputEmail1"><?=$riderPhone?></span>
                  </div>
                  <?php } ?>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Address:--</label>
                    <span for="exampleInputEmail1"><?=$full_address?></span>
                    </div>

</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
<!--/.col (left) -->
<!-- right column -->
<div class="col-md-12">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Item Details</h3>
              </div>
<?php
                  $item_name=$quantity=$singleqtyprice=''; 
                   if($adddetails){
                        foreach($adddetails as $info){
               // var_dump($info); exit;
                $item_name=$info->item_name;
                $quantity=$info->cart_count;
                $singleqtyprice=$info->cprice;
                $customization=$info->customization;
              //  $get=serialize($customization);
             // echo  "hi kartheek".$get1=unserialize($get);

            //json_decode(json_encode($customization), true);
 //echo json_encode($customization);exit;
 
$customization_details=json_decode($customization);
//var_dump($customization_details);
$veg_array=$customization_details->veg;
$nonveg_array=$customization_details->nonveg;
$flavor_array=$customization_details->flavor;
$base=$customization_details->base;
$size_array=$customization_details->size;
$ordered_date=$info->ordered_date;
$info->ordered_date = strtotime($info->ordered_date);
$new_date = date("d-m-Y",$info->ordered_date);
$order_delivery_date=$info->order_delivery_date;
$info->order_delivery_date = strtotime($info->order_delivery_date);
$new_date1 = date("d-m-Y",$info->order_delivery_date);
$order_delivery_time=$info->order_delivery_time;
?>
 <div class="card-body row">
                  
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Item Name:--</label>
                    <span for="exampleInputEmail1"><?=$item_name?></span>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Quantity Of Item:--</label>
                    <span for="exampleInputEmail1"><?=$quantity?></span>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Single Quantity Price:--</label>
                    <span for="exampleInputEmail1"><?=$singleqtyprice?></span>
                  </div> 
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Customization:--</label>
                    <span for="exampleInputEmail1">
                        <?php 
                    if(!empty($veg_array)){
                        echo "Veg: ".implode(",",$veg_array);
                      }
                      if(!empty($nonveg_array)){
                        echo "<br/>Nonveg: ".implode(",",$nonveg_array);
                      }
                      if(!empty($flavor_array)){
                        echo "<br/>Flovor: ".implode(",",$flavor_array);
                      }
                      if(!empty($base_aaray)){
                        echo "<br/>Base: ".implode(",",$base_aaray);
                      }
                      if(!empty($size_array)){
                        echo "<br/>Size: ".implode(",",$size_array);
                      }
                      ?></span>
                      </div> 
                      <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Ordered Date:--</label>
                        <span for="exampleInputEmail1"><?=$new_date?></span>
                      </div> 
                      <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Order Delivery Date:--</label>
                        <span for="exampleInputEmail1"><?=$new_date1?></span>
                      </div> 
                      <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Order Delivery Time:--</label>
                        <span for="exampleInputEmail1"><?=$order_delivery_time?></span>
                      </div> 
    
                     
                    </div>
                    <?php } }?>
</div>
</div>
        </div>
<!--/.col (right) -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- Main content -->

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
    