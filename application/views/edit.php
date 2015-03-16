<?php
$this->load->view('header');
?>
<div class="container">
  <div class="row formationadd">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <?php if(isset($message)) echo $message; ?>
      <?php echo form_open('property/logincheck'); ?>
        <h3 align="center">Please Add Data</h3>
        <div class="form-body">
            <div class="form-group">
                <label for="name">Property Name:</label>
                <input type="name" class="form-control" id="name" name="name" placeholder="Enter property name" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="name" class="form-control" id="address" name="address" placeholder="Enter address" required>
            </div>
            <div class="form-group">
                <h4>Icon informations:</h4>
                <label for="typeProperty">Type:</label>
                <input type="text" id="typeProperty" name="typeProperty" placeholder="Whole Apartment or Just rooms" required><br>
                <label for="guestNumber">Number of Guests:</label>
                <input type="number" id="guestNumber" name="guestNumber" required><br>
                <label for="bedroomNumber">Number of Bedrooms:</label>
                <input type="bedroomNumber" id="bedroomNumber" name="bedroomNumber" required><br>
                <label for="number">Number of Beds:</label>
                <input type="bedsNumber" id="bedsNumber" name="bedsNumber" required><br>
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
