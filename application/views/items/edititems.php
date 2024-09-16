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
            <h1>Category Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category Directory</li>
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
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Category</a>
                  </li>
                  
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                    



                  <div class="row">
                        <!-- left column -->
                        <div class="col-md-4">
                            <!-- jquery validation -->
                            <div class="card card-primary">
                            <?php foreach($getdetails as $rows){
                              $name=$rows->Items_categoryname;
                              $slug=$rows->category_slug;
                              $seotitle=$rows->seo_title;
                              $seodesc=$rows->seo_description;
                              $caption=$rows->caption;
                              $image=$rows->category_image; }

  ?>
                         
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="<?php echo base_url('items/ItemEdit/update')?>" method="post" enctype='multipart/form-data' >
                                <div class="card-body row">
       <input type="hidden" name="id" value="<?=$rows->sk_categoryItems_id?>">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">category</label>
                                    <input type="text" name="category" class="form-control" value="<?=$name?>" id="category1" placeholder="Enter category" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="slugCategory" class="form-control" value="<?=$slug?>" id="slugCategory" placeholder="Enter Category">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">SEO Title</label>
                                    <input type="text" name="seo_title" class="form-control" value="<?=$seotitle?>" id="seo_title" placeholder="Enter Seo Title">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">SEO Description</label>
                                    
                                    <textarea name="seo_description" class="form-control" id="seo_description" placeholder="Enter Seo Description"><?= $seodesc?></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Caption</label>
                                    <textarea name="caption" class="form-control" id="caption" placeholder="Enter Caption"><?=$caption?></textarea>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Image</label>
                                    <img src="<?=base_url()?>uploads/category/<?=$rows->category_image?>"  width="50" height="50">
                                    <input type="file" name="image" class="form-control" value="<?=$image?>" id="image" >
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
  </script>

</body>
</html>
