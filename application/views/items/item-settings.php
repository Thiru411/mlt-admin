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
            <h1>Item Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Item Settings</li>
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
           
          <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">

                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-toping-tab" data-toggle="pill" href="#custom-tabs-three-toping" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Topings</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Category</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Section</a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">


                  <div class="tab-pane fade show active" id="custom-tabs-three-toping" role="tabpanel" aria-labelledby="custom-tabs-three-toping-tab">
                    



                  <div class="row">
                        <!-- left column -->
                        <div class="col-md-4">
                            <!-- jquery validation -->
                            <div class="card card-primary">
                           
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="<?php echo base_url('items/topingSave')?>" method="post" >
                                <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Toping</label>
                                    <input type="text" name="topping" class="form-control" id="topping" placeholder="Enter Topping Head">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="slugtopping" class="form-control" id="slugtopping" placeholder="Enter Slug">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Toping</label>
                                    <textarea rows="10" name="topping_list" class="form-control" id="topping_list" placeholder="Please Enter Comma Separated Topings"></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">List Selection Type</label>
                                  <select name="category" class="form-control" id="category">
                                  <option>radio</option>
                                  <option>checkbox</option>
                                  </select>
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
                        <div class="card card-primary">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Toping</th>
                                <th>Slug</th>
                                <th>List</th>
                                
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($gettopings){
                            foreach($gettopings as $rows){
                              ?>

                            <tr>
                                <td><?=$rows->toping_head?></td>
                                <td><?=$rows->toping_slug?></td>
                                <td><?=$rows->toping_type?></td>
                                <?php
                                if($rows->toping_status==1){?>
                              
                              <td><a href="<?php echo base_url('items/topingEdit/edit'.'/'.$rows->toping_id );?>">Edit</a> 
                              <a href="<?php echo base_url('items/topingEdit/delete'.'/'.$rows->toping_id );?>">Delete</a>
                            </td>
                            
                            <?php } else{ ?>


                            <td><a href="<?php echo base_url('items/topingEdit/active'.'/'.$rows->toping_id);?>">Active</a></td>
                          <?php }?>
                       </tr>
                    <?php } } ?>


                    

                             


                               
                            
                            
                            </tbody>
                            
                            </table>
                        </div>
                        </div>
                        <!--/.col (right) -->
                </div>





                  </div>



                  <div class="tab-pane fade" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                    



                  <div class="row">
                        <!-- left column -->
                        <div class="col-md-4">
                            <!-- jquery validation -->
                            <div class="card card-primary">
                           
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="<?php echo base_url('items/itemsave')?>" method="post" enctype='multipart/form-data' >
                                <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Category</label>
                                    <input type="text" name="category" class="form-control" id="category1" placeholder="Enter Category">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="slugCategory" class="form-control" id="slugCategory" placeholder="Enter Category">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">SEO Title</label>
                                    <input type="text" name="seo_title" class="form-control" id="seo_title" placeholder="Enter Seo Title">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">SEO Description</label>
                                    
                                    <textarea name="seo_description" class="form-control" id="seo_description" placeholder="Enter Seo Description"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Caption</label>
                                    <textarea name="caption" class="form-control" id="caption" placeholder="Enter Caption"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
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
                        <div class="card card-primary">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Slug</th>
                                
                                <th>SEO Title</th>
                                <th>SEO Description</th>
                                <th>Caption</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                              if($getdetailsCategory){
                              //var_dump($getdetails);
                              foreach($getdetailsCategory as $rows) { ?>
    
                            <tr>
                                <td><?=$rows->Items_categoryname?></td>
                                <td><?=$rows->category_slug?></td>
                                <td><?=$rows->seo_title?></td>
                                <td><?=$rows->seo_description?></td>
                                <td><?=$rows->caption?></td>
                                <td><img src="<?=base_url()?>uploads/category/<?=$rows->category_image?>"  width="50" height="50"></td>
                                
                                                       
                                <?php
                                 if($rows->Items_categorystatus==1){?>
                              
                                <td><a href="<?php echo base_url('items/ItemEdit/edit'.'/'.$rows->sk_categoryItems_id);?>">Edit</a>
                                <a href="<?php echo base_url('items/ItemEdit/delete'.'/'.$rows->sk_categoryItems_id);?>">Delete</a>
                              </td>

                             


                              <?php }else{ ?>


                                <td><a href="<?php echo base_url('items/ItemEdit/active'.'/'.$rows->sk_categoryItems_id);?>">Active</a></td>
                             <?php }?>
                            </tr>
                            <?php } }?>
                         
                            
                           
                            </tbody>
                            
                            </table>
                        </div>
                        </div>
                        <!--/.col (right) -->
                </div>





                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                     
                  

                  <div class="row">
                        <!-- left column -->
                        <div class="col-md-4">
                            <!-- jquery validation -->
                            <div class="card card-primary">
                           
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="<?php echo base_url('items/sectionSave')?>" method="post" enctype="multipart/form-data" >
                                <div class="card-body row">

                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Section</label>
                                    <input type="text" name="role" class="form-control" id="role" placeholder="Enter Section">
                                </div>
                                <div class="form-group col-md-12">
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
                        <div class="card card-primary">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Section</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                             if($getdetails){
                             foreach($getdetails as $rows) {
                               
                              // var_dump($rows); //exit;
                               ?>
                              <tr>
                                <td><?=$rows->section_name?></td>
                                <td><img src="<?=base_url()?>uploads/section/<?=$rows->section_icon?>"  width="50" height="50">
                                </td>
                                <?php if($rows->section_status==1){?>
                                  <td><a href="<?php echo base_url('items/sectionEdit/edit'.'/'.$rows->sk_section_id);?>">Edit</a>
                                <a href="<?php echo base_url('items/sectionEdit/delete'.'/'.$rows->sk_section_id);?>">Delete</a>
                              </td>
                              
                              <?php }else{ ?>
                                <td><a href="<?php echo base_url('items/sectionEdit/active'.'/'.$rows->sk_section_id);?>">Active</a></td>
                                <?php }?>
                            </tr>
                            <?php } }?>
                            
                            </tbody>
                            
                            </table>
                        </div>
                        </div>
                        <!--/.col (right) -->
                </div>





                  </div>
                 
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
         
        </div>
          
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
<script>

$("#category1").blur(function(){
  var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("#slugCategory").val(Text);   

  });


  $("#topping").blur(function(){
  var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("#slugtopping").val(Text);   
      });

</script>
</body>
</html>
