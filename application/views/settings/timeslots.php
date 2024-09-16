<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <?php $this->load->view('inc/script-top.php'); ?> 
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
  
</head>
<body class="<?=body_style?>">
<div class="wrapper">
  
<?php $this->load->view('inc/nav-top.php'); ?> 
	
<?php $this->load->view('inc/nav-side.php'); ?> 
	

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <form id="quickForm" action="<?php echo base_url('settings/timeslotsSsave')?>" method="post">
      
                  
                  
                  <table class="table table-bordered table-striped">
  <tr>
    <th>Days</th>
    <th colspan="2">Afternoon</th>
    <th colspan="4">Evening</th>
    <th colspan="4">Night</th>
<!--     <th colspan="10"> Time 1 </th> -->
	
<?php $mor_opening_time="<option>12:00 PM To 12:30 PM</option>
<option>12:30 PM To 01:00 PM</option>
<option>01:00 PM To 01:30 PM</option>
<option>01:30 PM To 02:00 PM</option>
<option>02:00 PM To 02:30 PM</option>
<option>02:30 PM To 03:00 PM</option>
<option>03:00 PM To 03:30 PM</option>
<option>03:30 PM To 04:00 PM</option>";

$noon_opening_time="<option>04:00 PM To 04:30 PM</option>
<option>04:30 PM To 05:00 PM</option>
<option>05:00 PM To 05:30 PM</option>
<option>05:30 PM To 06:00 PM</option>
<option>06:00 PM To 06:30 PM</option>
<option>06:30 PM To 07:00 PM</option>
<option>07:00 PM To 07:30 PM</option>
<option>07:30 PM To 08:00 PM</option>";
$night_opening_time="<option>08:00 PM To 08:30 PM</option>
<option>08:30 PM To 09:00 PM</option>
<option>09:00 PM To 09:30 PM</option>
<option>09:30 PM To 10:00 PM</option>
<option>10:00 PM To 10:30 PM</option>
<option>10:30 PM To 11:00 PM</option>
<option>11:00 PM To 11:30 PM</option>
<option>11:30 PM To 12:00 AM</option>";?>
  <tr>
    <td><input type="text" class="form-control" id="sunday" name="sunday_0" value="Sunday"></td>
   
    <td>
    <select id="item_type" name="t10_ot" class="form-control" style="width:200px" required>
    	<option value="">------Select Timings -----</option>
    	<?php echo $mor_opening_time?>
	</select></td>
    <td> </td>   
 											
 											<td></td>
  
<td> <select id="item_type" name="t20_ot" class="form-control" style="width:200px" required>
												
												<option value="">------Select Timings ------</option>
												<?php echo $noon_opening_time?>
 												
 											</select></td>
    <td> </td>   
 											
 											<td></td>
 											<td> <select id="item_type" name="t30_ot" class="form-control" style="width:200px" required>
											 	<option value="">------Select Timings ------</option>
 												<?php echo $night_opening_time?>
												
 											</select></td>
    <td> </td>   
 											
 											<td></td>
    
     </tr>
     <tr>
     
      <tr>
  
	

  <tr>
    <td><input type="text" class="form-control" id="sunday" name="monday_1" value="Monday"></td>
   
    <td> <select id="item_type" name="t11_ot" class="form-control" style="width:200px" required>
												
												<option value="">------Select Timings ------</option>
												<?php echo $mor_opening_time?>
												
 											</select></td>
    <td> </td>   
 											
 											<td></td>
  
<td> <select id="item_type" name="t21_ot" class="form-control" style="width:200px" required>
												
												<option value="">--Select Timings ------</option>
												<?php echo $noon_opening_time?>
												
 											</select></td>
    <td> 
   </td>   
 											
 											<td></td>
 											<td> <select id="item_type" name="t31_ot" class="form-control" style="width:200px" required>
												
											 	<option value="">------Select Timings ------</option>
												<?php echo $night_opening_time?>
												
 											</select></td>
   							
 										
    
     </tr>
     <tr>
    <td><input type="text" class="form-control" id="sunday" name="tuesday" value="Tuesday"></td>
   
    <td> <select id="item_type" name="t12_ot" class="form-control" style="width:200px" required>
												
												<option value="">------ Select Timings ------</option>
												<?php echo $mor_opening_time?>
												
 											</select></td>
    <td> </td>   
 											
 											<td></td>
  
<td> <select id="item_type" name="t22_ot" class="form-control" style="width:200px" required>
												
												<option value="">------Select Timings ------</option>
												<?php echo $noon_opening_time?>
												
 											</select></td>
    <td> 
   </td>   
 											
 											<td></td>
 											<td> <select id="item_type" name="t32_ot" class="form-control" style="width:200px" required>
												
											 	<option value="">------Select Timings ------</option>
												<?php echo $night_opening_time?>
												
 											</select></td>
   							
 										
    
     </tr>
     <tr>
    <td><input type="text" class="form-control" id="sunday" name="Wednesday_3" value="Wednesday"></td>
   
    <td> <select id="item_type" name="t13_ot" class="form-control"  style="width:200px" required>
												
	<option value="">----Select Timings ----</option>
												<?php echo $mor_opening_time?>
												
 											</select></td>
    <td> </td>   
 											
 											<td></td>
  
<td> <select id="item_type" name="t23_ot" class="form-control" style="width:200px" required>
												
<option value="">----Select Timings ----</option>
<?php echo $noon_opening_time?>
												
 											</select></td>
    <td> </td>   
 											
 											<td></td>
 											<td> <select id="item_type" name="t33_ot" class="form-control" style="width:200px" required>
												
											 <option value="">------Select Timings ------</option>
											<?php echo $night_opening_time?>
 											</select></td>
    <td> </td>   
 											
 											<td></td>
    
     </tr>
     <tr>
    <td><input type="text" class="form-control" id="sunday" name="thursday_4" value="Thursday"></td>
   
    <td> <select id="item_type" name="t14_ot" class="form-control" style="width:200px" required>
												
	<option value="">----Select Timings----</option>
											<?php echo $mor_opening_time?>
												
 											</select></td>
    <td> </td>   
 											
 											<td></td>
  
<td> <select id="item_type" name="t24_ot" class="form-control" style="width:200px" required>
												
<option value="">------Select Timings --</option>
<?php echo $noon_opening_time?>
												
 											</select></td>
    <td> </td>   
 											
 											<td></td>
 											<td> <select id="item_type" name="t34_ot" class="form-control" style="width:200px" required>
											 <option>-----Select Timings ------</option>
												<?php echo $night_opening_time?>
 												
												
 											</select></td>
    <td> </td>   
 											
 											<td></td>
    
     </tr>
     <tr>
    <td><input type="text" class="form-control" id="sunday" name="friday_5" value="Friday"></td>
   
    <td> <select id="item_type" name="t15_ot" class="form-control" style="width:200px" required>
	<option value="">------Select Timings ------</option>
											<?php echo $mor_opening_time?>
												
 											</select></td>
    <td> </td>   
 											
 											<td></td>
  
<td> <select id="item_type" name="t25_ct" class="form-control" style="width:200px" required>
												
<option value="">------Select Timings -----</option>
<?php echo $noon_opening_time?>
												
 											</select></td>
    <td> </td>   
 											
 											<td></td>
 											<td> <select id="item_type" name="t35_ot" class="form-control" style="width:200px">
												
											 <option value="">----Select Timings----</option>
											<?php echo $night_opening_time?>
												
 											</select></td>
    <td> </td>   
 											
 											<td></td>
    
     </tr>
     <tr>
    <td ><input type="text" class="form-control" id="sunday" name="saturday_6" value="Saturday"></td>
   
    <td> <select id="item_type" name="t16_ot" class="form-control" style="width:200px">
	<option value="">----Select Timings----</option>
												<?php echo $mor_opening_time?>
												
 											</select></td>
    <td> </td>   
 											
 											<td></td>
  
<td> <select id="item_type" name="t26_ot" class="form-control" style="width:200px" required>
												
<option value="">-----Select Timings ------</option>
<?php echo $noon_opening_time?>
												
 											</select></td>
    <td></td>   
 											
 											<td></td>
 											<td> <select id="item_type" name="t36_ot" class="form-control" style="width:200px" required>
												
											 <option value="">------Select Timings ------</option>
												
											<?php echo $night_opening_time?>
 											</select></td>
    <td> </td>   
 											
 											<td></td>
    
     </tr> 
</table>
</div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
      
      

        
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
  <?php $this->load->view('inc/footer.php'); ?> 
  
   
</div>
<!-- ./wrapper -->

<?php $this->load->view('inc/script-bottom.php'); ?> 
 
<!-- jquery-validation -->
<script src="<?=$admin_url?>assets/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?=$admin_url?>assets/admin/plugins/jquery-validation/additional-methods.min.js"></script>


<script type="text/javascript">
$(document).ready(function () {
  
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      name: {
        required: true
      },
            mobile: {
                required: true
              },
                    address: {
                        required: true
                      },
                              store_type: {
                                  required: true
                                },
                              cash_on:{
                                required:true
                              },
                              card_on:{
                                required:true
                              }

                          
                    
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
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
function isNumberKeyevent(evt) //onkeypress="return isNumberKeyevent(event)"
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
</script>
<script>
    


function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('address');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
		   // console.log(place);
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
           
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
             
            }));
		//	console.log(place.geometry.location.lat());
     // var place = autocomplete.getPlace();
     document.getElementById("lat").value =place.geometry.location.lat();
     document.getElementById("lon").value =place.geometry.location.lng();
     
  

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
   // var componentForm;

    // for the country, get the country code (the "short name") also
    if (addressType == "country") {
      document.getElementById("country").value =place.address_components[i].long_name;
    }
    if (addressType == "administrative_area_level_2") {
      document.getElementById("city").value = place.address_components[i].long_name;
    }
    if (addressType == "administrative_area_level_1") {
      document.getElementById("state").value = place.address_components[i].long_name;
    }
    
  }
  
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDxXs--htI0lAdhO1dr6tXzQqIkvycZ2U&libraries=places&callback=initAutocomplete"
         async defer>
         </script>
  
</body>
</html>
