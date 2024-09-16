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
              <form id="quickForm" action="<?php echo base_url('settings/packagesave')?>" method="post">
                <div class="card-body row">

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Package Name</label>
                    <input type="text" name="package_name" class="form-control"  id="package_name" placeholder="Enter Package Name">
                  </div>

                  
                    <input type="hidden" name="pizza_id" class="form-control"  id="pizza_id" value="<?=$pizz_id?>">
                 
                    <input type="hidden" name="sides_id" class="form-control"  id="sides_id" value="<?=$sides_id?>" >
                  
                  
                    <input type="hidden" name="salads_id" class="form-control"  id="salads_id" value="<?=$salds_id?>">
                  
                  
                    
                    <input type="hidden" name="dips_id" class="form-control"  id="dips_id" value="<?=$dips_id?>">
                  
                 
                    <input type="hidden" name="desserts_id" class="form-control"  id="desserts_id" value="<?=$desserts_id?>">
                  
                  
                    
                    <input type="hidden" name="drinks_id" class="form-control"  id="drinks_id" value="<?=$drinks_id?>">
                  

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Number Of Pizzas</label>
                    <input type="text" name="no_of_pizza" class="form-control" onchange="toDisplay()" id="no_of_pizza" placeholder="Enter Number Of Pizzas">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Number Of Sides</label>
                    <input type="text" name="no_of_sides" class="form-control" onchange="toDisplaySides()" id="no_of_sides" placeholder="Enter Number Of Sides">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Number Of Salads</label>
                    <input type="text" name="no_of_salads" class="form-control" onchange="toDisplaySalads()" id="no_of_salads" placeholder="Enter Number Of Salads">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Number Of Dips</label>
                    <input type="text" name="no_of_dips" class="form-control" onchange="toDisplayDips()" id="no_of_dips" placeholder="Enter Number Of Dips">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Number Of Desserts</label>
                    <input type="text" name="no_of_desserts" class="form-control" onchange="toDisplayDesserts()" id="no_of_desserts" placeholder="Enter Number Of Desserts">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Number Of Drinks</label>
                    <input type="text" name="no_of_drinks" id='no_of_drinks' onchange="toDisplayDrinks()" class="form-control"  placeholder="Enter Number Of Drinks">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Total Package Amount</label>
                    <input type="text" name="amount" id='amount' class="form-control"  placeholder="Enter Amount" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Display Package</label>
                    <input type="text" name="display_package" id='display_package' class="form-control "  placeholder="Enter Display Package">
                  </div>
                  <div class="form-group col-md-4">

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

<script>
    function toDisplay(){
        var pizza=document.getElementById("no_of_pizza").value;
var text=' choose ';
if (pizza!=""){
 text=text+ pizza +' Pizzas';
    $('#display_package').val(text)
}   

    }
    function toDisplaySides(){
        var sides=document.getElementById("no_of_sides").value;
        var text=$('#display_package').val();
        if(sides!=""){
            textm=text + ' + ' + sides +' Sides';
            $('#display_package').val(textm)
        }
    }
    function toDisplaySalads(){
        var salads=document.getElementById("no_of_salads").value;
        var text=$('#display_package').val();
        if(salads!=""){
            textm=text + ' + ' + salads +' Salads';
            $('#display_package').val(textm)
        }
    }
    function toDisplayDips(){
        var dips=document.getElementById("no_of_dips").value;
        var text=$('#display_package').val();
        if(dips!=""){
            textm=text + ' + ' + dips +' Dips';
            $('#display_package').val(textm)
        }
    }
    function toDisplayDesserts(){
        var desserts=document.getElementById("no_of_desserts").value;
       // alert(desserts)
       var text=$('#display_package').val();
        if(desserts!=""){
            textm=text + ' + ' + desserts +' Desserts';
            $('#display_package').val(textm)
        }
    }
    function toDisplayDrinks(){
        var drinks=document.getElementById("no_of_drinks").value;
       // alert(desserts)
       var text=$('#display_package').val();
        if(drinks!=""){
            textm=text + ' + ' + drinks +' Drinks';
            $('#display_package').val(textm)
        }
    }
    
</script>
</body>
</html>
