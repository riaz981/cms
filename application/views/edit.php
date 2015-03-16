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
                <h4>Icon informations:</h4>
                <label for="typeProperty">Type:</label>
                <input type="text" id="typeProperty" name="typeProperty" placeholder="Whole Apartment or Just rooms" required><br>
                <label for="guestNumber">Number of Guests:</label>
                <input type="number" id="guestNumber" name="guestNumber" required><br>
                <label for="bedroomNumber">Number of Bedrooms:</label>
                <input type="number" id="bedroomNumber" name="bedroomNumber" required><br>
                <label for="bedsNumber">Number of Beds:</label>
                <input type="number" id="bedsNumber" name="bedsNumber" required><br>
            </div>
            <div class="form-group">
                <h4>Rate:</h4>
                <label for="nightlyRate">Nightly Price: A$</label>
                <input type="text" id="nightlyRate" name="nightlyRate" placeholder="Nightly Price" required><br>
                <label for="weeklyRate">Weekly Rate: A$</label>
                <input type="text" id="weeklyRate" name="weeklyRate" placeholder="Weekly Price" required><br>
                <label for="monthlyRate">Monthly Price: A$</label>
                <input type="text" id="monthlyRate" name="monthlyRate" placeholder="Monthly Price" required><br>
                <label for="cleaningRate">Cleaning Fee: A$</label>
                <input type="text" id="cleaningRate" name="cleaningRate" placeholder="Cleaning Fee" required><br>
            </div>

            <div class="form-group">
                <label for="overview">Overview:</label>
                <textarea class="form-control" rows="5"></textarea>
            </div>

            <div class="form-group">
                <h4>Specification:</h4>
                <label for="dining"></label>
                <input type="text" id="dining" name="dining" placeholder="Dining area" required>
                <label for="bathroomDescription">Bathroom Description:</label>
                <input type="text" id="bathroomDescription" name="bathroomDescription" placeholder="Bathroom description" required>
                <label for="bedroomDescription">Bedroom Description:</label>
                <input type="text" id="bedroomDescription" name="bathroomDescription" placeholder="Bedroom description" required>
                <label for="attractionDescription">Attraction Description:</label>
            </div>
        </div>
        <div align="center">
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Add</button>
          <button type="reset" class="btn btn-warning">Reset</button>
        </div>
      </form>
  </div>
</div>
<?php
$this->load->view('footer');
?>
