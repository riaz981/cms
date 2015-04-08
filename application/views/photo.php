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
        <li class="active"><a href="photo">Add Photo</a></li>
    </ul>

    <?php
        $attributes = array('class'=>'navbar-form navbar-left','role'=>'search');
    ?>


    <?php echo form_open('property/search',$attributes); ?>
        <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Search by name" required>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="logout">Logout</a></li>
    </ul>
</div> <!-- navbar collapse -->
</div>
</nav> <!-- main navbar closes -->

<div class="container" style="padding-top: 60px;">
    <div class="row formationaddtable" style="min-height:50em;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>View/Upload Photo for <span style="color: #1489a6; text-decoration:underline;"><?php echo $name; ?></span></h3>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php echo form_open_multipart('property/photoUpload');?>
                <input name="userfile[]" id="userfile" type="file" multiple="" />
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" value="Submit">
            </form>
                </div>
        </div>
    </div>
</div>
