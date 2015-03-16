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
                    <label for="typeProperty">Type:</label>
                    <input type="text" id="typeProperty" name="typeProperty" placeholder="Whole house/Just rooms" required><br>
                    <label for="guestNumber">Number of Guests:</label>
                    <input type="number" id="guestNumber" name="guestNumber" required><br>
                    <label for="bedroomNumber">Number of Bedrooms:</label>
                    <input type="number" id="bedroomNumber" name="bedroomNumber" required><br>
                    <label for="bedsNumber">Number of Beds:</label>
                    <input type="number" id="bedsNumber" name="bedsNumber" required><br>
                </fieldset>
            </div>

            <div class="form-group">
                <fieldset>
                <legend style="color: #1489a6;">Rate:</legend>
                    <label for="nightlyRate">Nightly Price: A$</label>
                    <input type="text" id="nightlyRate" name="nightlyRate" placeholder="Nightly Price" required><br>
                    <label for="weeklyRate">Weekly Rate: A$</label>
                    <input type="text" id="weeklyRate" name="weeklyRate" placeholder="Weekly Price" required><br>
                    <label for="monthlyRate">Monthly Price: A$</label>
                    <input type="text" id="monthlyRate" name="monthlyRate" placeholder="Monthly Price" required><br>
                    <label for="cleaningRate">Cleaning Fee: A$</label>
                    <input type="text" id="cleaningRate" name="cleaningRate" placeholder="Cleaning Fee" required><br>
                </fieldset>
            </div>

            <div class="form-group">
                <label for="overview"><h4 style="color: #1489a6;">Overview:</h4></label>
                <textarea class="form-control" id="overview" name="overview" placeholder="Property Overview" rows="5"></textarea>
            </div>

            <fieldset>
            <legend style="color: #1489a6;">Specifications:</legend>
                <div class="form-group">
                    <label for="dining">Dining:</label>
                    <textarea class="form-control" id="dining" class="dining" placeholder="Dining" rows="3"></textarea>
                </div>

                <div class="form-group" style="margin-top:2em;">
                    <label for="bathroomDescription">Bathroom Description:</label>
                    <textarea class="form-control" id="bathroomDescription" class="bathroomDescription" placeholder="Bathroom Description" rows="3"></textarea>
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
