<?php
$this->load->view('header');
?>
<div class="container">
  <div class="row formationadd">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div><span style="color:#F24B4B;"><?php echo validation_errors(); ?></span></div>
      <?php if(isset($message)) echo $message; ?>
      <?php $attributes=array('role'=>'form', 'data-toggle'=>'validator'); echo form_open('property/addProperty',$attributes); ?>
        <h2 align="center">Add Property</h2>
        <div class="form-body">

            <div class="form-group">
            <fieldset>
                <legend style="color: #1489a6;">Name, Address &amp Url:</legend>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="name">Property Name: <span style="color:#F24B4B;">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name')?>" placeholder="Enter property name" data-error="A name is required"required>
                    <div class="help-block with-errors"></div>

                    <label for="address" style="margin-top:0.4em;">Address: <span style="color:#F24B4B;">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo set_value('address')?>" placeholder="Enter address" data-error="An address is required" required>
                    <div class="help-block with-errors"></div>

                    <label for="url" style="margin-top:0.4em">Url: <span style="color:#F24B4B;">*</span></label>
                    <input type="text" class="form-control" id="url" name="url" value="<?php echo set_value('url')?>" placeholder="Enter Url: http://example.com" data-error="A url is required" required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>


            <div class="form-group">
                <fieldset>
                    <legend style="color: #1489a6;">Icon informations:</legend>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="typeProperty">Type: <span style="color:#F24B4B;">*</span></label>
                        <input type="text" class="form-control" id="typeProperty" name="typeProperty" value="<?php echo set_value('typeProperty')?>" placeholder="Whole house/Just rooms" data-error="A property type is required" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="guestNumber">Number of Guests: <span style="color:#F24B4B;">*</span></label>
                        <input type="number" class="form-control" id="guestNumber" name="guestNumber" value="<?php echo set_value('guestNumber')?>" data-error="A guest number is required" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="bedroomNumber">Number of Bedrooms: <span style="color:#F24B4B;">*</span></label>
                        <input type="number" class="form-control" id="bedroomNumber" name="bedroomNumber" value="<?php echo set_value('bedroomNumber')?>" data-error="A bedroom number is required" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="bedsNumber">Number of Beds: <span style="color:#F24B4B;">*</span></label>
                        <input type="number" class="form-control" id="bedsNumber" name="bedsNumber" value="<?php echo set_value('bedsNumber')?>" data-error="Number of beds is required" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-12 col-lg-12 col-lg-12 col-xs-12" style="margin-top:0.4em;">
                        <label for="minumumStay">Minimum Stay: (Nights) <span style="color:#F24B4B;">*</span></label>
                        <input type="number" class="form-control" id="minimumStay" name="minimumStay" value="<?php echo set_value('minimumStay')?>" data-error="Minimum stay is required" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </fieldset>
            </div>

            <div class="form-group">
                <fieldset>
                <legend style="color: #1489a6;">Rates:</legend>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="nightlyRate">Nightly Price: A$ <span style="color:#F24B4B;">*</span></label>
                        <input type="text" class="form-control" id="nightlyRate" name="nightlyRate" value="<?php echo set_value('nightlyRate')?>" placeholder="Nightly Price" data-error="A nightly price is required" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="weeklyRate">Weekly Rate: A$ <span style="color:#F24B4B;">*</span></label>
                        <input type="text" class="form-control" id="weeklyRate" name="weeklyRate" value="<?php echo set_value('weeklyRate')?>" placeholder="Weekly Price" data-error="A weekly price is required" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="monthlyRate">Monthly Price: A$ <span style="color:#F24B4B;">*</span></label>
                        <input type="text" class="form-control" id="monthlyRate" name="monthlyRate" value="<?php echo set_value('monthlyRate')?>" placeholder="Monthly Price" data-error="A monthly price is required" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="cleaningRate">Cleaning Fee: A$ <span style="color:#F24B4B;">*</span></label>
                        <input type="text" class="form-control" id="cleaningRate" name="cleaningRate" value="<?php echo set_value('cleaningRate')?>" placeholder="Cleaning Fee" data-error="A cleaning fee is required" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </fieldset>
            </div>

            <div class="form-group">
                <label for="overview"><h4 style="color: #1489a6;">Overview: <span style="color:#F24B4B;">*</span></h4></label>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea class="form-control" id="overview" name="overview" value="<?php echo set_value('overview')?>" placeholder="Property Overview" data-error="A property overview is required" rows="5" required></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <fieldset>
            <legend style="color: #1489a6; margin-top:0.6em;">Specifications:</legend>
                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="dining">Dining: <span style="color:#F24B4B;">*</span></label>
                        <textarea class="form-control" id="dining" name="dining" value="<?php echo set_value('dining')?>" placeholder="Dining" data-error="A description is required" rows="3" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="bathroomDescription">Bathroom Description: <span style="color:#F24B4B;">*</span></label>
                        <textarea class="form-control" id="bathroomDescription" name="bathroomDescription" value="<?php echo set_value('bathroomDescription')?>" placeholder="Bathroom Description" data-error="bathroom description is required" rows="3" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="bedroomDescription">Bedroom Description: <span style="color:#F24B4B;">*</span></label>
                        <textarea class="form-control" id="bedroomDescription" name="bedroomDescription" value="<?php echo set_value('bedroomDescription')?>" placeholder="Bedroom Description" data-error="A bedroom description is required" rows="3" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="attractionDescription">Attractions Description: <span style="color:#F24B4B;">*</span></label>
                        <textarea class="form-control" id="attractionDescription" name="attractionDescription" value="<?php echo set_value('attractionDescription')?>" placeholder="Attractions Description" data-error="Attractions description is required" rows="3" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="leisureDescription">Leisure Activity Description: <span style="color:#F24B4B;">*</span></label>
                        <textarea class="form-control" id="leisureDescription" name="leisureDescription" value="<?php echo set_value('leisureDescription')?>" placeholder="Leisure Activity Description" data-error="Leisure description is required" rows="3" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:0.4em;">
                        <label for="businessDescription">Local Services &amp Businesses Description: <span style="color:#F24B4B;">*</span></label>
                        <textarea class="form-control" id="businessDescription" name="businessDescription" value="<?php echo set_value('businessDescription')?>" placeholder="Local Service and Businesses Description" data-error="A description is required" rows="3" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:0.4em;">
                        <label for="sportsDescription">Sports Adventures Activity Description: <span style="color:#F24B4B;">*</span></label>
                        <textarea class="form-control" id="sportsDescription" name="sportsDescription" value="<?php echo set_value('sportDescription')?>" placeholder="Sports Adventures Activity Description" data-error="A description is required" rows="3" required></textarea>
                        <div class="help-block with-errors"></div>
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
