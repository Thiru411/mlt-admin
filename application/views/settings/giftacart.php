<!DOCTYPE html>
<html lang="en">
<head>

<?php $this->load->view('inc/script-top.php'); ?> 

  <link rel="stylesheet" href="<?=base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
            <h1>Gift A Cart List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gift A Cart List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl no</th>
                    <th>Customer Name</th>
                    <th>Referral Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                                     </tr>
                  </thead>
                  <tbody>
                    <?php
                if($giftcartdetails){
                    $i=1;
                  foreach($giftcartdetails as $dinfo){
                  // var_dump($dinfo)
                   
                    ?>
                  <tr>
                     <td><?=$i?></td>
                    <td><?=$dinfo->full_name?></td>
                    <td><?=$dinfo->name?></td>
                    <td><?=$dinfo->email?></td>
                    <td><?=$dinfo->mobile?></td>

                      
                    <?php $i++; }  }?>
                   
                
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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
