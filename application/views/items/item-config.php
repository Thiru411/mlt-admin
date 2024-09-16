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
        
        <div class="col-md-6">
         <form id="quickForm" action="<?=base_url()?>items/itemupdate" method="post" enctype="multipart/form-data">
          <!-- left column -->
           <div class="row">
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Item <small>Basic Details</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
              if($getdesignation){
               foreach($getdesignation as $info){
               // var_dump($info);exit;
                 $section_name=$info->section_name; 
                 $category_name=$info->category_id;
                 $type=$info->type;
                 $code=$info->item_code;
                 $name=$info->item_name; 
                  $slugitem=$info->slug;
                              $displayname=$info->display_name;
                            $desc=$info->short_description;
                          $decsription=$info->description;
                          $seotitle=$info->seo_title;
                          $seodesc=$info->seo_description;
                          $itemsimage=$info->image;
                          $itemId=$info->sk_id;
                } } ?>
                
              
           
                <div class="card-body row">
                   
                <input type="hidden" name="id" value="<?=$itemId?>">           
                   <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Section</label>
                    <select name="section" class="form-control" id="section">
                    <?php foreach($getdetailsection as $info) { ?>
                      <?php   if( $section_name==$info->sk_section_id){ echo $selected = "selected"; }else{ echo $selected = "";} ?>
                    <option <?=$selected?>  value="<?=$info->sk_section_id?>"><?=$info->section_name?></option>
                   

                    <?php } ?>

                    
                    </select>
                  </div>

                   <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Catgeory</label>
                    <select name="category" class="form-control" id="category" onchange="myFunction()">
                    
                    <?php foreach($getdetailscategory as $rows) { ?>

                      <?php   if( $category_name==$rows->sk_categoryItems_id){ echo $selected = "selected"; }else{ echo $selected = "";} ?>
                    <option <?=$selected?> value="<?=$rows->sk_categoryItems_id?>"><?=$rows->Items_categoryname?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Type</label>
                    <select name="type" class="form-control" id="type">

                      <?php if($type=="veg"){ echo $selected ="selected"; } else {echo $selected="";} ?>
                      <option  <?=$selected?> value="veg">Veg</option>
                      <?php if($type=="non-veg"){ echo $selected ="selected"; } else {echo $selected="";} ?>
                      <option  <?=$selected?> value="non-veg">Non-Veg</option>
                      <?php if($type=="egg"){ echo $selected ="selected"; } else {echo $selected="";} ?>
                      <option  <?=$selected?> value="egg">Egg</option>
                    </select>
                  </div>

                  
                 

                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Item Code</label>
                    <input type="text" name="item_code" class="form-control" id="item_code" value="<?=$code?>">
                  </div>



                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Item Name</label>
                    <input type="text" name="item_name" class="form-control" value="<?=$name?>" id="item_name" placeholder="Enter Item Name">
                  </div>
                  <!--<div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Slug</label>
                  <input type="hidden" name="slug" class="form-control" value="<?=$slugitem?>"id="slug" placeholder="Enter Slug">
                  </div>-->

                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Display Name</label>
                    <input type="text" name="display_name" class="form-control" id="display_name" value="<?=$displayname?>" placeholder="Enter Display Name">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Short Description</label>
                    <textarea name="short_description" class="form-control" id="short_description" placeholder="Enter Short Description"><?=$desc?></textarea>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" class="form-control" id="description"  placeholder="Enter Description"><?= $decsription?></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">SEO Title</label>
                    <input type="text" name="seo_title" class="form-control" value="<?=$seotitle?>" id="seo_title" placeholder="Enter Seo Title">
                  </div>
                  <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">SEO Description</label>
                                    
                      <textarea name="seo_description" class="form-control" id="seo_description" placeholder="Enter Seo Description"><?=$seodesc?></textarea>
                  </div>
                  


                  <div class="form-group col-md-12">
                
                    <label for="exampleInputEmail1">Image</label>
                    <img src="<?=base_url()?>uploads/items/<?=$itemsimage?>" width="50" height="50">
                    <input type="file" name="image" class="form-control"  value="<?=$itemsimage?>" id="image">
                                
                  </div>
                  <input type='hidden' id='topping_list' name='topping_list' />
                </div>
                    </div>
                    </div>  
                    <div class="col-md-6" id="rrr">
                    <div class="row">
                      <?php $i=1;$toping=1;
                        foreach($getdetailtoppings as $rows){
                            ?>
                              
          	<div class="col-md-12">
            <!-- jquery validation -->
           
            <div class="card card-primary">
           
             
              <div class="card-header">
              <h3 class="card-title"><?=$rows->toping_head?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php $items="";
              $where=array('topping_id'=>$rows->toping_id,'item_id'=>$itemId);
              $toppingData=$this->CommonModel->getRecords($where,'mlt_item_toppings');
              if($toppingData)
              foreach($toppingData as $row)
              {
                  $items=$row->items;
              }
             
              ?>
              <input type="hidden" name="topping_id_<?=$toping?>" id="topping_id<?=$i?>" value="<?=$rows->toping_id?>">
              <input type="hidden" name="textm_<?=$toping?>" class="submitget" value="<?php echo $items?>" id="textm_<?=$rows->toping_id?>"> 
              
                <div class="card-body row">
              <?php  $j=1; if($rows->toping_type=="checkbox" ){?>
                            <?php $itemdes=$rows->toping_description;
                            $get=explode(",",$itemdes);
                            
                            foreach($get as $getInfo){  
                                
                                $item_checked = "";
                              
                               if (strpos($items, $getInfo) !== false) {
                                    $item_checked = "checked";
                                   }
                               
                              ?>
                              
                                    <div class="form-check">
                                    <input type="checkbox" <?=$item_checked?> class="form-check-input checkget" id="topping_<?=$rows->toping_id?>_<?=$j?>" value="<?=trim($getInfo)?>" onclick="checkIfChecked('checkbox',<?=$rows->toping_id?>)">
                                    <label class="form-check-label" for="exampleCheck_<?=$rows->toping_id?>_<?=$j?>"><?=$getInfo?></label> 
                                    </div>
                            <?php $j++; }?>
               <?php }else{?>
                                    <?php $itemdes=$rows->toping_description;
                                    $get=explode(",",$itemdes); 
                                   
                                     foreach( $get as $getInfo){
                                         $checked = "";
                                         if (strpos($items, $getInfo) !== false) {
                                             $checked = "checked";
                                         }
                                     ?>
                                        <div class="form-radio">
                                            <input type="radio" <?=$checked?> name="item" class="form-radio-input checkget" id="topping_<?=$rows->toping_id?>_<?=$j?>" value="<?=trim($getInfo)?>" onclick="checkIfChecked('radio',<?=$rows->toping_id?>)">
                                            <label class="form-radio-label"><?=$getInfo?></label>
                                      	</div>
                                      <?php $j++; }?>
                  <?php }?>
                  <input type="hidden" id="total_topping_<?=$rows->toping_id?>" value="<?=$j-1?>">
                 </div>
              
                <!-- /.card-body -->
          

            
                <!-- /.card-body -->
               
              
     			 </div>
     			 
            <!-- /.card -->
            </div>
              <?php $i++; $toping++;}?>
              </div>
            </div>
            </div>
             <input type="hidden" name="topping_count" value=<?=$toping?> />
             <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
            </form>
            
            </div>
            <!--/.row end-->
          <!--/.col (left) -->
          <div class="col-md-3">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Price <small>Config</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="<?=base_url()?>items/saveprice" method="post">
              <input type=hidden name="itemid" value="<?=$id?>">
                <div class="card-body row">

                   

                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Size</label>
                    <input type="text" name="pizza_size" class="form-control" id="pizza_size" placeholder="Enter Size" required>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Cost</label>
                    <input type="text" name="pizza_cost" class="form-control" id="pizza_cost" placeholder="Enter Cost" required>
                  </div>

                 

                 

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>

              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                 // var_dump($getdetailsprice); exit;
                  if($getdetailsprice){
                  foreach($getdetailsprice as $rows){
                   // var_dump($rows);
                    ?>
                  <tr>
                    <td><?php echo $rows->item_size?></td>
                    <td><?php echo $rows->item_cost?></td>
                    <?php if($rows->item_status==1){?>
                    <td><a href="<?php echo base_url('items/priceEdit/edit'.'/'.$rows->sk_id.'/'.$id);?>">Edit</a>
                    <a href="<?php echo base_url('items/priceEdit/delete'.'/'.$rows->sk_id.'/'.$id);?>">Delete</a></td>

                  <?php }else{ ?>
                    <td><a href="<?php echo base_url('items/priceEdit/active'.'/'.$rows->sk_id.'/'.$id);?>">Active</a></td>
                    <?php }?>
                    </tr>
                    <?php }}?>
                  </tbody>
                  
                </table>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
           
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
 function checkIfChecked(toping_type,toping_id){
 	total_topping = $("#total_topping_"+toping_id).val();
 	
 	var text = "";
 	for(var i=1;i<=total_topping;i++){
 	
 	//var checked = $('#topping_'+toping_id+'_'+i).is(':checked'); 
 	if($('#topping_'+toping_id+'_'+i).is(':checked')){
     	text+=$('#topping_'+toping_id+'_'+i).val()+','; 
     	}
 	}
 	
 	 $('#textm_'+toping_id).val(text);
 }
</script>

<script>
$('.submitget').click(function(){
  alert();
});
  

</script>
<script>

$("#item_name").blur(function(){
  var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("#slug").val(Text);   

  });
  function myFunction(){
var value=$('#category').val();
if(value!=1){

  $('#rrr').hide();
}else if(value==1){
  $('#rrr').show();
}

 }
</script>
</body>
</html>
