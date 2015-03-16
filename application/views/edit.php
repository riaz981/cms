<?php
$this->load->view('header');
?>
<div class="container">
  <div class="row formationadd">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <?php if(isset($message)) echo $message; ?>
      <?php echo form_open('property/logincheck'); ?>
        <h3 align="center">Add Property</h3>
        <div class="form-body">

            <div class="form-group">
                <label for="name">Property Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter property name" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
            </div>


            <div class="form-group">
                <fieldset>
                    <legend style="color: #1489a6;">Icon informations:</legend>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="typeProperty">Type:</label>
                        <input type="text" class="form-control" id="typeProperty" name="typeProperty" placeholder="Whole house/Just rooms" float:"left" required>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="guestNumber">Number of Guests:</label>
                            <input type="number" class="form-control" id="guestNumber" name="guestNumber" required>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="bedroomNumber">Number of Bedrooms:</label>
                        <input type="number" class="form-control" id="bedroomNumber" name="bedroomNumber" required>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="bedsNumber">Number of Beds:</label>
                        <input type="number" class="form-control" id="bedsNumber" name="bedsNumber" required><br>
                    </div>
                </fieldset>
            </div>

            <div class="form-group">
                <fieldset>
                <legend style="color: #1489a6;">Rate:</legend>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="nightlyRate">Nightly Price: A$</label>
                        <input type="text" class="form-control" id="nightlyRate" name="nightlyRate" placeholder="Nightly Price" required>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="weeklyRate">Weekly Rate: A$</label>
                        <input type="text" class="form-control" id="weeklyRate" name="weeklyRate" placeholder="Weekly Price" required>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="monthlyRate">Monthly Price: A$</label>
                        <input type="text" class="form-control" id="monthlyRate" name="monthlyRate" placeholder="Monthly Price" required>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="cleaningRate">Cleaning Fee: A$</label>
                        <input type="text" class="form-control" id="cleaningRate" name="cleaningRate" placeholder="Cleaning Fee" required>
                    </div>
                </fieldset>
            </div>

            <div class="form-group">
                <label for="overview"><h4 style="color: #1489a6;">Overview:</h4></label>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea class="form-control" id="overview" name="overview" placeholder="Property Overview" rows="5"></textarea>
                </div>
            </div>

            <fieldset>
            <legend style="color: #1489a6; margin-top:0.6em;">Specifications:</legend>
                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="dining">Dining:</label>
                        <textarea class="form-control" id="dining" name="dining" placeholder="Dining" rows="3"></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="bathroomDescription">Bathroom Description:</label>
                        <textarea class="form-control" id="bathroomDescription" name="bathroomDescription" placeholder="Bathroom Description" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="bedroomDescription">Bedroom Description:</label>
                        <textarea class="form-control" id="bedroomDescription" name="bedroomDescription" placeholder="Bedroom Description" rows="3"></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="attractionDescription">Attractions Description:</label>
                        <textarea class="form-control" id="attractionDescription" name="attractionDescription" placeholder="Attractions Description" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="leisureDescription">Leisure Activity Description:</label>
                        <textarea class="form-control" id="leisureDescription" name="leisureDescription" placeholder="Leisure Activity Description" rows="3"></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="businessDescription">Local Services &amp Businesses Description:</label>
                        <textarea class="form-control" id="businessDescription" name="businessDescription" placeholder="Local Service and Businesses Description" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.4em;">
                        <label for="sportsDescription">Sports Adventures Activity Description:</label>
                        <textarea class="form-control" id="sportsDescription" name="sportsDescription" placeholder="Sports Adventures Activity Description" rows="3"></textarea>
                    </div>
                </div>

            </fieldset>
        </div>
        <div class="footerForm">
            <div align="center">
              <button type="submit" name="submit" id="submit" class="btn btn-primary">Add</button>
              <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </div>
      </form>
  </div>
</div>
<?php
$this->load->view('footer');
?>
