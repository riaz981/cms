<?php
$this->load->view('header');
?>
<div class="container">
  <div class="row roundedCorner formation">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <?php echo form_open('property/logincheck'); ?>
        <h3 align="center">Please Log-In</h3>
        <div class="form-group">
          <label for="firstname">Username: <span style="color:#F24B4B;">*</span></label>
          <input type="text" class="form-control" id="firstname" placeholder="Enter Username" name="firstname"/>
        </div>
        <div class="form-group">
          <label fpr="lastname">Password: <span style="color:#F24B4B;">*</span></label>
          <input type="password" class="form-control" id="lastname" placeholder="Enter Password" name="lastname"/>
        </div>
        <div align="center">
          <button type="submit" name="submit" class="btn btn-success" value="Submit">Log In</button>
          <button type="reset" class="btn btn-warning">Reset</button>
        </div>
      </form>
  </div>
</div>
<?php
$this->load->view('footer');
?>
