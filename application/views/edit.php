<?php
$this->load->view('navheader');
?>
<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!-- collapse the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="#bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <li><a href="home">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="add">Add Property</a></li>
        <li class="active"><a href="#">Edit Property</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="logout">Logout</a></li>
    </ul>
</div> <!-- navbar collapse -->
</div>
</nav> <!-- main navbar closes -->

<div style="margin-top:3em;">
<ol class="breadcrumb" style="background-color:#E4E0E0;">
  <li><a href="home">Home</a></li><span> / </span>
  <li class="active">Edit</li>
</ol>
</div>

<div class="container" style="margin-top:-2em;">
  <div class="row formationadd">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

      <div><span style="color:#F24B4B;"><?php echo validation_errors(); ?></span></div>
      <?php if(isset($message)) echo $message; ?>
      <?php echo form_open('property/editProperty'); ?>
        <h2 align="center">Edit Property</h2>
        <div class="form-body">

            <div class="form-group">
            <fieldset>
                <legend class="headings">Name, Address &amp Url:</legend>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="name">Property Name: <span class="spanColor">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>" placeholder="Enter property name" required>

                    <!--
                    <label for="address" class="labelInput">Address: <span class="spanColor">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $address;?>" placeholder="Enter address" required>
                    !-->

                    <label for="street" style="margin-top:0.4em;">Street:</label>
                    <input type="text" class="form-control" id="street" name="street" value="<?php if(isset($street)){ echo $street; } ?>" placeholder="Enter street">

                    <label for="suburb" style="margin-top:0.4em;">Suburb:</label>
                    <input type="text" class="form-control" id="suburb" name="suburb" value="<?php if(isset($suburb)){  echo $suburb; }?>" placeholder="Enter suburb">

                    <label for="state" style="margin-top:0.4em;">State:</label>
                    <input type="text" class="form-control" id="state" name="state" value="<?php if(isset($state)){ echo $state; }?>" placeholder="Enter state">

                    <label for="country" style="margin-top:0.4em;">Country:</label>
                    <input type="text" class="form-control" id="country" name="country" value="<?php if(isset($country)){ echo $country; }?>" placeholder="Enter country eg. United States">

                </div>
            </div>


            <div class="form-group">
                <fieldset>
                    <legend class="headings">Icon informations:</legend>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="typeProperty">Type: <span class="spanColor">*</span></label>
                        <input type="text" class="form-control" id="typeProperty" name="typeProperty" value="<?php echo $typeProperty;?>" placeholder="Whole house/Just rooms">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="guestNumber">Number of Guests: <span class="spanColor">*</span></label>
                        <input type="number" class="form-control" id="guestNumber" name="guestNumber" placeholder="Number of Guests" value="<?php echo $guestNumber;?>">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 labelInput">
                        <label for="bedroomNumber">Number of Bedrooms: <span class="spanColor">*</span></label>
                        <input type="number" class="form-control" id="bedroomNumber" name="bedroomNumber" placeholder="Number of Bedrooms" value="<?php echo $bedroomNumber;?>">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 labelInput">
                        <label for="bedsNumber">Number of Beds: <span class="spanColor">*</span></label>
                        <input type="number" class="form-control" id="bedsNumber" name="bedsNumber" placeholder="Number of Beds" value="<?php echo $bedsNumber;?>">
                    </div>
                    <div class="col-lg-12 col-lg-12 col-lg-12 col-xs-12 labelInput">
                        <label for="minimumStay">Minimum Stay: (Nights) <span class="spanColor">*</span></label>
                        <input type="number" class="form-control" id="minimumStay" name="minimumStay" placeholder="Minimum Stay" value="<?php echo $minimumStay;?>">
                    </div>
                </fieldset>
            </div>

            <div class="form-group">
                <fieldset>
                <legend class="headings">Rates:</legend>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="nightlyRate">Nightly Price: A$ </label>
                        <input type="text" class="form-control" id="nightlyRate" name="nightlyRate" value="<?php echo $nightlyRate;?>" placeholder="Nightly Price">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="weeklyRate">Weekly Price: A$ </label>
                        <input type="text" class="form-control" id="weeklyRate" name="weeklyRate" value="<?php echo $weeklyRate;?>" placeholder="Weekly Price">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 labelInput">
                        <label for="monthlyRate">Monthly Price: A$ </label>
                        <input type="text" class="form-control" id="monthlyRate" name="monthlyRate" value="<?php echo $monthlyRate;?>" placeholder="Monthly Price">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 labelInput">
                        <label for="cleaningRate">Cleaning Fee: A$ </label>
                        <input type="text" class="form-control" id="cleaningRate" name="cleaningRate" value="<?php echo $cleaningRate;?>" placeholder="Cleaning Fee">
                    </div>
                </fieldset>
            </div>

            <div class="form-group">
                <label for="overview"><h4 class="headings" style="font-size:20px;">Overview: <span class="spanColor">*</span></h4></label>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea class="form-control" id="overview" name="overview" placeholder="Property Overview" rows="5"><?php echo $overview;?></textarea>
                </div>
            </div>

            <fieldset>
            <legend class="headings">Specifications:</legend>
                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="dining">Dining: </label>
                        <textarea class="form-control" id="dining" name="dining" placeholder="Dining" rows="3"><?php echo $dining;?></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="bathroomDescription">Bathroom Description: </label>
                        <textarea class="form-control" id="bathroomDescription" name="bathroomDescription" placeholder="Bathroom Description" rows="3"><?php echo $bathroomDescription;?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 labelInput">
                        <label for="bedroomDescription">Bedroom Description: </label>
                        <textarea class="form-control" id="bedroomDescription" name="bedroomDescription" placeholder="Bedroom Description" rows="3"><?php echo $bedroomDescription;?></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 labelInput">
                        <label for="attractionDescription">Attractions Description: </label>
                        <textarea class="form-control" id="attractionDescription" name="attractionDescription" placeholder="Attractions Description" rows="3"><?php echo $attractionDescription;?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 labelInput">
                        <label for="leisureDescription">Leisure Activity Description: </label>
                        <textarea class="form-control" id="leisureDescription" name="leisureDescription" placeholder="Leisure Activity Description" rows="3"><?php echo $leisureDescription;?></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 labelInput">
                        <label for="businessDescription">Local Services &amp Businesses Description: </label>
                        <textarea class="form-control" id="businessDescription" name="businessDescription" placeholder="Local Service and Businesses Description" rows="3"><?php echo $businessDescription; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 labelInput">
                        <label for="sportsDescription">Sports Adventures Activity Description: </label>
                        <textarea class="form-control" id="sportsDescription" name="sportsDescription" placeholder="Sports Adventures Activity Description" rows="3"><?php echo $sportsDescription;?></textarea>
                    </div>
                </div>

            </fieldset>
            <div class="form-group">
                <fieldset>
                <legend class="headings">Photos: (To upload photos go back to home page)</legend>
                    <?php
                        if(isset($photo_name))
                        {
                            $max=sizeof($photo_name);

                        }

                    ?>
                        <?php
                         if(isset($max)){
                         for($i=0;$i<$max;$i++){?>
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 labelInput">
                         <a href="<?php echo $photo_url.'/'.$photo_name[$i]; ?>" ><img src="<?php echo $photo_url.'/'.$photo_name[$i]; ?>" class="img-responsive" height="200" width="300"></a>

                         </div>
                        <?php }}  ?>
                </fieldset>
            </div>

            <div class="form-group">
                <fieldset>
                    <legend class="headings">Map: </legend>
                    <?php $address = $street.",".$suburb.",".$state.",".$country;?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 labelInput" style=" margin-top:-0.5em;margin-bottom:0.3em; margin-left:-1em;">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address;?>" style="float:left;" placeholder="Address" disabled>
                    </div>
                    <script src="http://maps.googleapis.com/maps/api/js"></script>
                    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                    <script type="text/javascript">
                        /*
                        function initialize() {

                          var latitude = undefined;
                          var longitude = undefined;

                          latitude = document.getElementById("latitude").value;
                          longitude = document.getElementById("longitude").value;

                          var mapProp = {
                            center:new google.maps.LatLng(latitude,longitude),
                            zoom:15,
                            mapTypeId:google.maps.MapTypeId.ROADMAP
                          };
                          var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
                          var marker = new google.maps.Marker({
                                position: new google.maps.LatLng(latitude,longitude),
                                map: map
                            });
                        }
                        google.maps.event.addDomListener(window, 'load', initialize);
                        */

                        function getLatLong(){
                            var geocoder = new google.maps.Geocoder();
                            var street = document.getElementById("street").value;
                            var suburb = document.getElementById("suburb").value;
                            var state = document.getElementById("state").value;
                            var country = document.getElementById("country").value;
                            var address = street+","+suburb+","+state+","+country;
                            document.getElementById("address").value = address;
                            geocoder.geocode( { 'address': address}, function(results, status) {

                              if (status == google.maps.GeocoderStatus.OK) {
                                var latitude = results[0].geometry.location.lat();
                                var longitude = results[0].geometry.location.lng();
                                document.getElementById("latitude").value = latitude;
                                document.getElementById("longitude").value = longitude;
                                var mapProp = {
                                  center:new google.maps.LatLng(latitude,longitude),
                                  zoom:15,
                                  mapTypeId:google.maps.MapTypeId.ROADMAP
                                };
                                var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
                                var marker = new google.maps.Marker({
                                      position: new google.maps.LatLng(latitude,longitude),
                                      map: map
                                  });
                              }
                            });
                        }

                        function initialize() {

                        var geocoder = new google.maps.Geocoder();
                        var address = document.getElementById("address").value;

                        geocoder.geocode( { 'address': address}, function(results, status) {

                          if (status == google.maps.GeocoderStatus.OK) {
                            var latitude = results[0].geometry.location.lat();
                            var longitude = results[0].geometry.location.lng();
                            document.getElementById("latitude").value = latitude;
                            document.getElementById("longitude").value = longitude;
                            var mapProp = {
                              center:new google.maps.LatLng(latitude,longitude),
                              zoom:15,
                              mapTypeId:google.maps.MapTypeId.ROADMAP
                            };
                            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
                            var marker = new google.maps.Marker({
                                  position: new google.maps.LatLng(latitude,longitude),
                                  map: map
                              });
                          }
                        });

                      }
                        google.maps.event.addDomListener(window, 'load', initialize);

                    </script>

                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6" id="googleMap"></div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 labelInput">
                        <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo $latitude; ?>" placeholder="Latitude">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 labelInput">
                        <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo $longitude; ?>" placeholder="Longitude">
                    </div>

                </fieldset>
                <div style="text-align:center;"><input type="button" value="Obtain Longitude and Latitude if you have changed address" onclick="getLatLong()"><span class="spanColor">*</span><br></div>
            </div>

        </div>
        <div class="footerForm">
            <div align="center">
              <input type="hidden" name="id" id="submit" value="<?php echo $id;?>">
              <button type="submit" name="submit" id="submit" class="btn btn-success">Edit</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>
        </div>
      </form>
</div>
</div>
<?php
$this->load->view('footer');
?>
