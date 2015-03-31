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
        <li class="active"><a href="home">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="add">Add Property</a></li>
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
    <div class="row formationaddtable" style="min-height:42em;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 align="center">List of Properties</h2>
            <?php if(isset($message))
            {
                if($message=="success")
                { ?>
                    <div class="alert alert-success" role="alert" align="center">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <span style="color:#1B2E1E;"><?php echo "Property has now been entered!";?></span>
                    </div>
                <?php } ?>

                <?php
                if($message=="success edit")
                { ?>
                    <div class="alert alert-success" role="alert" align="center">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <span style="color:#1B2E1E;"><?php echo "Property has now been modified!";?></span>
                    </div>
                <?php } ?>

                <?php
                if($message=="fail edit")
                { ?>
                    <div class="alert alert-info" role="alert" align="center">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <span style="color:#1B2E1E;"><?php echo "Select property again as not all data was entered!";?></span>
                    </div>
                <?php } ?>

                <?php
                if($message=="fail")
                { ?>
                    <div class="alert alert-info" role="alert" align="center">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <span style="color:#F24B4B;"><?php echo "Unable to enter data!";?></span>
                    </div>
                <?php }
                if($message=="nope")
                { ?>
                <div class="alert alert-danger" role="alert" align="center">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Error!</strong> <span style="color:#F24B4B;"><?php echo "No property by that name was found";?></span><a href="home" style="margin-left:1em;" class="btn btn-info">Back</a>
                </div>
                <?php }
                if($message=="deleted")
                { ?>
                <div class="alert alert-success" role="alert" align="center">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <span style="color:#F24B4B;"><?php echo "Property has now been deleted.";?></span>
                </div>
                <?php
                }?>
                <?php
                if($message=="undeleted")
                { ?>
                <div class="alert alert-success" role="alert" align="center">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <span style="color:#F24B4B;"><?php echo "Property has could not be deleted.";?></span>
                </div>
                <?php
                }?>
                <?php
                } ?>

            <div class="table-responsive">
            <table class="table table-bordered" id="table" style="margin-top:2em;">

                <thead>
                    <tr style="background-color: #7F7D7D;">
                        <th style="color: #F9F2F2;">Property ID</th>
                        <th style="color: #F9F2F2;">Property Name</th>
                        <th style="color: #F9F2F2;">Property Address</th>
                        <th style="color: #F9F2F2;">Property Url</th>
                        <th style="color: #F9F2F2;">Admin Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($property)){
                        foreach($property as $row){ ?>
<tr><td><?php echo $row['id'];?></td><td><?php echo $row['name']?></td><td><?php echo $row['address'] ?></td><td><a href="<?php echo $row['url']?>"><?php echo $row['url']?></a></td>
    <td>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <?php echo form_open('property/edit'); ?>
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit/View</button>
        </form>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-sm-push-1 col-xs-5 col-xs-push-2">

        <button type="button" class="btn btn-danger" data-toggle="modal"  data-target="#myModal<?php echo $row['id'] ?>">Delete</button>
        </div>

        <?php } ?>
        <?php foreach($property as $row){ ?>
        <div class="modal fade" id="myModal<?php echo $row['id'] ?>" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #7F7D7D;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" align="center" style="color: #F9F2F2;" id="gridSystemModalLabel">Delete Property</h4>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">Do you really want to delete property <span style="color:#B84A4A;"><?php echo $row['name']; ?></span>?</div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <div align="center">

                    <?php echo form_open('property/deleteProperty'); ?>
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                    <button type="submit" class="btn btn-default">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </form>
                </div>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php } ?>
    </td>
</tr>
                            <?php

                    }
            ?>
            </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('footer');
?>
