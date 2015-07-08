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
        <li class="active"><a href="add">Add Property</a></li>
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
  <li class="active">Add</li>
</ol>
</div>

<div class="container" style="margin-top:-2em;">
  <div class="row formationadd">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div><span style="color:#F24B4B;"><?php echo validation_errors(); ?></span></div>
      <?php if(isset($message)) echo $message; ?>
      <?php echo form_open_multipart('property/addProperty'); ?>
        <h2 align="center">Add Property</h2>
        <div class="form-body">

            <div class="form-group">
            <fieldset>
                <legend class="headings">Name, Address &amp Photo Upload Folder Name:</legend>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="name">Property Name: <span class="spanColor">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name')?>" placeholder="Enter property name" required>

                    <!--
                    <label for="address" style="margin-top:0.4em;">Address: <span class="spanColor">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php //echo set_value('address')?>" placeholder="Enter address" required>
                    !-->
                    <label for="street" style="margin-top:0.4em;">Street:</label>
                    <input type="text" class="form-control" id="street" name="street" value="<?php echo set_value('street')?>" placeholder="Enter street">

                    <label for="suburb" style="margin-top:0.4em;">Suburb:</label>
                    <input type="text" class="form-control" id="suburb" name="suburb" value="<?php echo set_value('suburb')?>" placeholder="Enter suburb">

                    <label for="state" style="margin-top:0.4em;">State:</label>
                    <input type="text" class="form-control" id="state" name="state" value="<?php echo set_value('state')?>" placeholder="Enter state">

                    <label for="country" style="margin-top:0.4em;">Country:</label>
                    <input type="text" class="form-control" id="country" name="country" value="<?php echo set_value('country')?>" placeholder="Enter country eg. United States">

                    <label for="upload_url" style="margin-top:0.4em">Photo Upload Folder Name: <span class="spanColor">*</span></label>
                    <input type="text" class="form-control" id="upload_url" name="upload_url" value="<?php echo set_value('upload_url')?>" placeholder="Folder name" required>
                </div>
            </fieldset>
            </div>


            <div class="form-group">
                <fieldset>
                    <legend class="headings">Icon informations:</legend>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="typeProperty">Type: <span class="spanColor">*</span></label>
                        <input type="text" class="form-control" id="typeProperty" name="typeProperty" value="<?php echo set_value('typeProperty')?>" placeholder="Whole house/Just rooms" required>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="guestNumber">Number of Guests: <span class="spanColor">*</span></label>
                        <input type="number" class="form-control" id="guestNumber" name="guestNumber" placeholder="Number of Guests" value="<?php echo set_value('guestNumber')?>" required>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="bedroomNumber">Number of Bedrooms: <span class="spanColor">*</span></label>
                        <input type="number" class="form-control" id="bedroomNumber" name="bedroomNumber" placeholder="Number of Bedrooms" value="<?php echo set_value('bedroomNumber')?>" required>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="bedsNumber">Number of Beds: <span class="spanColor">*</span></label>
                        <input type="number" class="form-control" id="bedsNumber" name="bedsNumber" placeholder="Number of Beds" value="<?php echo set_value('bedsNumber')?>" required>
                    </div>
                    <div class="col-lg-12 col-lg-12 col-lg-12 col-xs-12" style="margin-top:0.4em;">
                        <label for="minimumStay">Minimum Stay: (Nights) <span class="spanColor">*</span></label>
                        <input type="number" class="form-control" id="minimumStay" name="minimumStay" placeholder="Minimum Stay" value="<?php echo set_value('minimumStay')?>" required>
                    </div>
                </fieldset>
            </div>

            <div class="form-group">
                <fieldset>
                <legend class="headings">Rates:</legend>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="nightlyRate">Nightly Price: A$ <span class="spanColor">*</span></label>
                        <input type="text" class="form-control" id="nightlyRate" name="nightlyRate" value="<?php echo set_value('nightlyRate')?>" placeholder="Nightly Price" required>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="weeklyRate">Weekly Price: A$ <span class="spanColor">*</span></label>
                        <input type="text" class="form-control" id="weeklyRate" name="weeklyRate" value="<?php echo set_value('weeklyRate')?>" placeholder="Weekly Price" required>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="monthlyRate">Monthly Price: A$ <span class="spanColor">*</span></label>
                        <input type="text" class="form-control" id="monthlyRate" name="monthlyRate" value="<?php echo set_value('monthlyRate')?>" placeholder="Monthly Price" required>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="cleaningRate">Cleaning Fee: A$ <span class="spanColor">*</span></label>
                        <input type="text" class="form-control" id="cleaningRate" name="cleaningRate" value="<?php echo set_value('cleaningRate')?>" placeholder="Cleaning Fee" required>
                    </div>
                </fieldset>
            </div>

            <div class="form-group">
                <label for="overview"><h4 class="headings" style="font-size:20px;">Overview: <span class="spanColor">*</span></h4></label>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea class="form-control" id="overview" name="overview" value="<?php echo set_value('overview')?>" placeholder="Property Overview" rows="5" required></textarea>
                </div>
            </div>

            <fieldset>
            <legend class="headings">Specifications:</legend>
                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="dining">Dining: <span class="spanColor">*</span></label>
                        <textarea class="form-control" id="dining" name="dining" value="<?php echo set_value('dining')?>" placeholder="Dining" rows="3" required></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="bathroomDescription">Bathroom Description: <span class="spanColor">*</span></label>
                        <textarea class="form-control" id="bathroomDescription" name="bathroomDescription" value="<?php echo set_value('bathroomDescription')?>" placeholder="Bathroom Description" rows="3" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="bedroomDescription">Bedroom Description: <span class="spanColor">*</span></label>
                        <textarea class="form-control" id="bedroomDescription" name="bedroomDescription" value="<?php echo set_value('bedroomDescription')?>" placeholder="Bedroom Description" rows="3" required></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="attractionDescription">Attractions Description: <span class="spanColor">*</span></label>
                        <textarea class="form-control" id="attractionDescription" name="attractionDescription" value="<?php echo set_value('attractionDescription')?>" placeholder="Attractions Description" rows="3" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="leisureDescription">Leisure Activity Description: <span class="spanColor">*</span></label>
                        <textarea class="form-control" id="leisureDescription" name="leisureDescription" value="<?php echo set_value('leisureDescription')?>" placeholder="Leisure Activity Description" rows="3" required></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="businessDescription">Local Services &amp Businesses Description: <span class="spanColor">*</span></label>
                        <textarea class="form-control" id="businessDescription" name="businessDescription" value="<?php echo set_value('businessDescription')?>" placeholder="Local Service and Businesses Description" rows="3" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.4em;">
                        <label for="sportsDescription">Sports Adventures Activity Description: <span class="spanColor">*</span></label>
                        <textarea class="form-control" id="sportsDescription" name="sportsDescription" value="<?php echo set_value('sportDescription')?>" placeholder="Sports Adventures Activity Description" rows="3" required></textarea>
                    </div>
                </div>

            </fieldset>
        </div>

        <div class="form-group">
            <fieldset>
            <legend class="headings">Upload Photos:</legend>
            <?php
                if(isset($photo_name))
                {
                    $max=sizeof($photo_name);

                }

            ?>
                <?php
                 if(isset($max)){
                 for($i=0;$i<$max;$i++){?>
                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="margin-top:0.4em;">
                 <a href="<?php echo $photo_url.'/'.$photo_name[$i]; ?>" ><img src="<?php echo $photo_url.'/'.$photo_name[$i]; ?>" class="img-responsive" height="200" width="300"></a>

                 </div>
                <?php }}  ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:-0.6em;">
                    <input name="userfile[]" id="userfile" type="file" multiple="" required/>
            </fieldset>
        </div>

        <div class="form-group">
            <fieldset>
                <legend class="headings">Map: </legend>

                <script src="http://maps.googleapis.com/maps/api/js"></script>

                <script>

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


                </script>

                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6" id="googleMap"></div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 labelInput">
                    <label for="latitude">Latitude: <span class="spanColor">*</span></label>
                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Eg. -33.790706" required>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 labelInput">
                    <label for="longitude">Longitude: <span class="spanColor">*</span></label>
                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Eg. 151.085582" required>
                </div>
            </fieldset>
        </div>

        <div class="footerForm">
            <div align="center">
              <button type="submit" value="Submit" class="btn btn-success">Add</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>
        </div>
      </form>
  </div>
</div>
<?php
$this->load->view('footer');
?>
