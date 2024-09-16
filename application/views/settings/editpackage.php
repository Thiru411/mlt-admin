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
              <form id="quickForm" action="<?php echo base_url('settings/editpackage/update')?>" method="post">
                <div class="card-body row">
                <input type="hidden" name="id" value="<?php echo $sk_package_id?>">
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Package Name</label>
                    <input type="text" name="package_name" class="form-control"  id="package_name" value="<?=$package_name1?>" placeholder="Enter Package Name">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Number Of Pizzas</label>
                    <input type="text" name="no_of_pizza" class="form-control" onchange="toDisplay()" id="no_of_pizza" value="<?=$no_of_pizza?>"  placeholder="Enter Number Of Pizzas">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Number Of Sides</label>
                    <input type="text" name="no_of_sides" class="form-control"  id="no_of_sides" value="<?=$no_of_sides?>"  placeholder="Enter Number Of Sides">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Number Of Salads</label>
                    <input type="text" name="no_of_salads" class="form-control" id="no_of_salads" value="<?=$no_of_salads?>"  placeholder="Enter Number Of Salads">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Number Of Dips</label>
                    <input type="text" name="no_of_dips" class="form-control" id="no_of_dips" value="<?=$no_of_dips?>"  placeholder="Enter Number Of Dips">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Number Of Desserts</label>
                    <input type="text" name="no_of_desserts" class="form-control" id="no_of_desserts" value="<?=$no_of_desserts?>"  placeholder="Enter Number Of Desserts">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Number Of Drinks</label>
                    <input type="text" name="no_of_drinks" id='no_of_drinks' onchange="toDisplayDrinks()" class="form-control" value="<?=$no_of_drinks?>"  placeholder="Enter Number Of Drinks" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Total Package Amount</label>
                    <input type="text" name="amount" id='amount' class="form-control" value="<?=$package_amount?>"  placeholder="Enter Amount" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Display Package</label>
                    <input type="text" name="display_package" id='display_package' class="form-control " value="<?=$display_package?>"  placeholder="Enter Display Package" required>
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
                var sides=document.getElementById("no_of_sides").value;
                
       var text=$('#display_package').val();
        var text1=text.split('+');
if (pizza!=""){
 text='choose ' + pizza + ' Pizzas' + ' + ' + text1[1] + ' + ' + text1[2] + ' + ' + text1[3] + ' + ' + text1[4] + ' + ' + text1[5];
    $('#display_package').val(text)
}   

    }
    $('#no_of_sides').change(function(){
        var sides=document.getElementById("no_of_sides").value;
        var text=$('#display_package').val();
        var text1=text.split('+');
        if(sides!=""){
            text=text1[0] + ' + ' + sides + 'Sides+' + text1[2] + ' + ' + text1[3] + ' + ' + text1[4] + ' + ' + text1[5];
            $('#display_package').val(text)
        }    
    })
    $('#no_of_salads').change(function(){
   // alert()
        var salads=document.getElementById("no_of_salads").value;
        var text=$('#display_package').val();
        var text1=text.split('+');
        if(salads!=""){
            text=text1[0] + ' + ' + text1[1] + ' + ' + salads + ' Salads+' + ' + ' + text1[3] + ' + ' + text1[4] + ' + ' + text1[5];
                        $('#display_package').val(text)
        }
    });
    
    $('#no_of_dips').change(function(){
       // alert()
        var dips=document.getElementById("no_of_dips").value;
        var text=$('#display_package').val();
        var text1=text.split('+');
        if(dips!=""){
            text=text1[0] + ' + ' + text1[1] + ' + ' + text1[2] + ' + ' + dips + ' Dips+' + ' + ' + text1[4] + ' + ' + text1[5];
            $('#display_package').val(text)
        }
    });
    $('#no_of_desserts').change(function(){
        var desserts=document.getElementById("no_of_desserts").value;
       
       var text=$('#display_package').val();
       var text1=text.split('+');
        if(desserts!=""){
            text=text1[0] + ' + ' + text1[1] + ' + ' + text1[2] + ' + ' + text1[3] + ' + ' + desserts + ' Desserts+' + ' + ' +text1[5];
            $('#display_package').val(text)
        }
    });
    $('#no_of_drinks').change(function(){
        var drinks=document.getElementById("no_of_drinks").value;
       var text=$('#display_package').val();
       var text1=text.split('+');
        if(drinks!=""){
            text=text1[0] + ' + ' + text1[1] + ' + ' + text1[2] + ' + ' + text1[3] + ' + ' + text1[4] + ' + ' + drinks + ' Drinks ';
                        $('#display_package').val(text)
        }
    });
    
</script>
</body>
</html>
