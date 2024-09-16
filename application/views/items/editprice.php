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
            <h1>Update Item</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">update Item</li>
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
        
          <!--/.col (left) -->
          <div class="col-md-3">
            <!-- jquery validation -->
            <div class="card card-primary">

            <?php foreach($getdetailsprice as $rows){


         $quantity=$rows->item_size;
         $price=$rows->item_cost; }

?>

              <div class="card-header">
                <h3 class="card-title">Price <small>Config</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="<?=base_url()?>items/priceEdit/update" method="post">
                <div class="card-body row">
                <input type="hidden" name="id" value="<?=$rows->sk_id?>">
                <input type="hidden" name="idtwo" value="<?=$idtwo?>">
                   

                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Size</label>
                    <input type="text" name="pizza_size" class="form-control"  value="<?=$quantity?>" id="pizza_size" placeholder="Enter Item Name">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Cost</label>
                    <input type="text" name="pizza_cost" class="form-control"  value="<?=$price?>" id="pizza_cost" placeholder="Enter Display Name">
                  </div>

                 

                 

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>

              
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->

            <!-- /.card -->
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
  $.validator.setDefaults({
    submitHandler: function () {
      //alert( "Form successful submitted!" );
      document.myForm.submit();
    }
  });
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
