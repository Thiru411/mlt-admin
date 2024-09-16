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
            <h1>Package</h1>
          </div>
          <div class="col-sm-6">
            
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
                <h3 class="card-title">Package Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="<?php echo base_url('settings/faqsave')?>" method="post">
                <div class="card-body row">

                  <div class="form-group col-md-3">
                      <label>Question1</label>
                    <input type="text" name="faq1" class="form-control"  id="faq1" placeholder="Enter FAQ Question1">
</div>                  
            
                  <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Question2</label>
                    <input type="text" name="faq2" id="faq2" class="form-control" placeholder="Enter FAQ Question2">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Question3</label>
                    <input type="text" name="faq4" class="form-control"  id="faq3" placeholder="Enter FAQ Question3">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Question4</label>
                    <input type="text" name="faq3" class="form-control"  id="faq4" placeholder="Enter FAQ Question3">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Description1</label>
                    <textarea name="short_description" class="form-control" id="short_description" placeholder="Enter Description"></textarea>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Description2</label>
                    <textarea name="short" class="form-control" id="short" placeholder="Enter Description"></textarea>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Description3</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Enter Description"></textarea>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Description4</label>
                    <textarea name="desc" class="form-control" id="desc" placeholder="Enter Description"></textarea>
                  </div>
                  
                  <div class="form-group col-md-6">

                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
                <!-- <div class="card-footer">
                <!--  <input type="submit" name="submit">-->
                 <!-- <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div> -->
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


<!-- Page specific script -->


</body>
</html>
