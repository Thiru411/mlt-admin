<!DOCTYPE html>
<html lang="en">
<head>

<?php $this->load->view('inc/script-top.php'); ?> 

  <link rel="stylesheet" href="<?=base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <style>
  .profile-user-img {
  border: 3px solid #adb5bd;
  margin: 0 auto;
  padding: 3px;
  width: 100px;
  height:100px;
  object-fit:cover;
}
</style>

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
            <h1>Employee Directory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Directory</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <?php foreach($getemployeedetails as $info){

 //var_dump($info); exit;

  ?>
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                <?php if($info->image==''){?>
                    <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url() ?>assets/dist/img/profile.png" alt="User profile picture">
                    </div>
                    <?php }else{?>
                      <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url() ?>uploads/employee/<?=$info->image?>" alt="User profile picture">

                    <!-- <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url() ?>uploads/employee/<?=$info->image?>" alt="User profile picture"> -->
                    </div>
                      <?php }?>

                    <h3 class="profile-username text-center"><?=$info->first_name?></h3>

                    <p class="text-muted text-center"><?=$info->designation_name?></p>

                    <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Location</b> <a class="float-right"><?=$info->state_name?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right"><?=$info->email?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Mobile</b> <a class="float-right"><?=$info->mobile?></a>
                    </li>
                    </ul>

                    <a href="<?php echo base_url('org/employee_onboarding_edit/edit'.'/'.$info->Id );?>" class="btn btn-primary btn-block"><b>Edit Details</b></a>
                </div>
              <!-- /.card-body -->
            </div>

           
             <!-- Profile Image End-->
        </div>
        <?php }?>




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
<!-- ./wrapper -->

<?php $this->load->view('inc/script-bottom.php'); ?> 

<script src="<?=base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
