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
            <h1>Add New Item</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Item</li>
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
                <h3 class="card-title">Employee <small>Basic Details</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="<?=base_url()?>items/items_onboardingsave" method="post" enctype="multipart/form-data" >
                <div class="card-body row"> 

                   <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Section</label>
                    <select name="section" class="form-control" id="section">
                    <?php foreach($getdetails as $info) { ?>

                    <option value="<?=$info->sk_section_id?>"><?=$info->section_name?></option>
                    <?php } ?>
                    </select>
                  </div>
                   <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Catgeory</label>
                    <select name="category" class="form-control" id="category">
                    <?php foreach($getdetailsCategory as $rows) { ?>
                    <option value="<?=$rows->sk_categoryItems_id?>"><?=$rows->Items_categoryname?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Type</label>
                    <select name="type" class="form-control" id="type">
                      <option value="">Type</option>
                      <option value="veg">Veg</option>
                      <option value="non-veg">Non-Veg</option>
                      <option value="egg">Egg</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Item Code</label>
                    <input type="text" name="item_code" class="form-control" id="item_code" placeholder="Enter Item code">
                  </div>
                   <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Item Name</label>
                    <input type="text" name="item_name" class="form-control" id="item_name" placeholder="Enter Item Name">
                  </div>
                  <div class="form-group col-md-3">
                  <label for="exampleInputEmail1">Slug</label>
                  <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter Slug">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Display Name</label>
                    <input type="text" name="display_name" class="form-control" id="display_name" placeholder="Enter Display Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Short Description</label>
                    <textarea name="short_description" class="form-control" id="short_description" placeholder="Enter Short Description"></textarea>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Enter Description"></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">SEO Title</label>
                    <input type="text" name="seo_title" class="form-control" id="seo_title" placeholder="Enter Seo Title">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">SEO Description</label>
                                    
                      <textarea name="seo_description" class="form-control" id="seo_description" placeholder="Enter Seo Description"></textarea>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" name="image" class="form-control" id="image" >     
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
<script>

$("#item_name").blur(function(){
  var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("#slug").val(Text);   

  });
</script>
</body>
</html>
