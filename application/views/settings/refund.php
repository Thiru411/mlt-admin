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
            <h1>Refund</h1>
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
                <h3 class="card-title">Refund Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="<?php echo base_url('settings/refundsave')?>" method="post">
                <div class="card-body row">

                  <div class="form-group col-md-4">
                      <label>Order Id</label>
                    <input type="text" name="order_id" class="form-control"  id="order_id" placeholder="Enter Order Id">
                </div>  
                
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Customers List</label>
                    <select name="users" class="form-control" id="users">
                    <?php foreach($getusers as $rows) { ?>
                    <option value="<?=$rows->sk_user_id?>"><?=$rows->full_name?></option>
                    <?php } ?>
                    </select>
                  </div>                
            
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Refund Date</label>
                    <input type="date" name="refund" class="form-control"  id="refund">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Refund Amount</label>
                    <input type="text" name="amount" class="form-control"  id="amount" placeholder="Enter Refund Amount ">
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
