<?php
$this->load->view('header');
?>
<div class="container">
  <div class="row roundedCorner formation">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <?php $attributes=array('role'=>'form', 'data-toggle'=>'validator'); echo form_open('property/logincheck',$attributes); ?>
        <h3 align="center">Please Log-In</h3>
        <div class="form-body">
        <div class="form-group">
          <label for="username">Username: <span style="color:#F24B4B;">*</span></label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" data-error="A username is required" required>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label for="password">Password: <span style="color:#F24B4B;">*</span></label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" data-error="A password is required" required>
          <div class="help-block with-errors"></div>
        </div>
        </div>
        <div align="center">
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Log In</button>
          <button type="reset" class="btn btn-warning">Reset</button>
        </div>
      </form>
      <div style="margin-top:0.5em;"><span style="color:#F24B4B;"><?php if(isset($message))
                                                                            echo $message; ?></span></div>
  </div>
</div>
<?php
$this->load->view('footer');
?>
