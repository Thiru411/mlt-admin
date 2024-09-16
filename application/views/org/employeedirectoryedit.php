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
            <h1>Add New Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Employee</li>
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
            <?php foreach($getemployeedetails as $rows){
$firstname=$rows->first_name;
$middlename=$rows->middle_name;
$lastname=$rows->last_name;
$emplmobile=$rows->mobile;
$contct=$rows->emergency_contact_no;
$email=$rows->email;
$username=$rows->username;
$pass=$rows->password;
$addrs=$rows->address;
$state=$rows->state;
$postalcode=$rows->postalcode;
$dateofbirth=$rows->dob;
$place=$rows->place_of_birth;
$status=$rows->relationship_status;
$adhar=$rows->aadhar;
$role=$rows->role;
$designation=$rows->designation;
$joining=$rows->doj;
$pic=$rows->image;
}
?>






              <div class="card-header">
                <h3 class="card-title">Employee <small>Basic Details</small></h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="<?php echo base_url('org/employee_onboarding_edit/update')?>" method="post" enctype='multipart/form-data'">
                <div class="card-body row">
                <input type="hidden" name="id" value="<?=$rows->Id ?>">
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="<?=$firstname?>" id="first_name" placeholder="Enter Name">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Middle Name</label>
                    <input type="text" name="middle_name" class="form-control" value="<?=$middlename?>" id="middle_name" placeholder="Enter Middle Name">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="<?=$lastname?>" id="last_name" placeholder="Enter Last Name">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Employee Mobile</label>
                    <input type="text" name="employee_mobile" class="form-control" value="<?=$emplmobile?>" id="employee_mobile" placeholder="Enter Mobile">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Employee Emergency Contact Number</label>
                    <input type="text" name="emergency_mobile" class="form-control" value="<?=$contct?>" id="emergency_mobile" placeholder="Enter Mobile">
                    
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" value="<?=$email?>" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" name="username" id='username' class="form-control" value="<?=$username?>" placeholder="Enter User Name" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" id='password' class="form-control" value="<?=$pass?>"  placeholder="Enter Password" required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea name="employee_address" class="form-control"  id="employee_address"><?=$addrs?></textarea>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">State</label>
                    <select name="state" class="form-control" value="<?=$state?>" id="state">
                    
                      <option value="">Select State</option>
                      <?php foreach($getstate as $dIfo) { ?>
                        <?php   if( $state==$dIfo->sk_state_id ){ echo $selected = "selected"; }else{ echo $selected = "";} ?>
                        <option  <?=$selected?> value="<?=$dIfo->sk_state_id ?>"><?=$dIfo->state_name?></option>
                        <?php } ?>

                       

                    </select>

                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Postalcode</label>
                    <input type="text" name="postalcode" class="form-control" value="<?=$postalcode?>" id="postalcode" placeholder="Enter Postalcode">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">DOB</label>
                    <input type="text" name="dob" id='dob' class="form-control" value="<?=$dateofbirth?>" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Place Of Birth</label>
                    <input type="text" name="place_of_birth" class="form-control" value="<?=$place?>" id="place_of_birth" placeholder="Enter Place of birth">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Relationship Status</label>
                    <select name="relationshit_status" class="form-control" id="relationshit_status">
                    
                        <?php   if( $status=="single"){ echo $selected = "selected"; }else{ echo $selected = "";} ?>
                      <option <?=$selected?> value="single">Single</option>
                      <?php   if( $status=="married"){ echo $selected = "selected"; }else{ echo $selected = "";} ?>
                      <option <?=$selected?> value="married">Married</option>
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Aadhar</label>
                    <input type="text" name="aadhar" class="form-control" value="<?=$adhar?>" id="aadhar" placeholder="Enter Social Security Number" required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Role</label>
                    <select name="role" class="form-control" id="role" required>
                      <option value="">Select Role</option>
                      <?php foreach($getrole as $dIfo) { ?>
                        <?php   if( $role==$dIfo->sk_role_id){ echo $selected = "selected"; }else{ echo $selected = "";} ?>
                        <option <?=$selected?> value="<?=$dIfo->sk_role_id ?>"><?=$dIfo->role_name?></option>
                       
                      <?php } ?>






                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Designation</label>
                    <select name="Designation" class="form-control" id="Designation" required>
                   <?php foreach($getdesination as $dIfo){ ?>
                        <?php   if($designation==$dIfo->sk_designation_id ){ echo $selected = "selected"; }else{ echo $selected = "";} ?>
                      <option <?=$selected?> value="<?=$dIfo->sk_designation_id?>"><?=$dIfo->designation_name?></option>
                   <?php }   ?>
                   </select>
                  </div>


                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">DOJ</label>
                    <input type="text" name="doj" id='doj' class="form-control" value="<?=$joining?>" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Profile Picture</label>
                    <img  src="<?php echo base_url() ?>uploads/employee/<?=$pic?>" width="50" height="50">
                    <input type="file" name="image" id='image' class="form-control" value="<?=$pic?>">
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
