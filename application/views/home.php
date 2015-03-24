<?php
$this->load->view('navheader');
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
            <input type="text" class="form-control" name="search" placeholder="Search by name">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="http://cms.localhost">Logout</a></li>
    </ul>
</div> <!-- navbar collapse -->
</div>
</nav> <!-- main navbar closes -->

<div class="container" style="padding-top: 60px;">
    <div class="row formationaddtable" style="min-height:42em;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 align="center">List of Properties</h2>
            <?php if(isset($message)){?>
                <div class="alert alert-danger" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Error!</strong> <span style="color:#F24B4B;"><?php echo $message;?></span><a href="home" style="margin-left:1em;" class="btn btn-info">Back</a>
                </div>
            <?php } ?>
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
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <form>
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</button>
        </form>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <button type="button" class="btn btn-danger" data-toggle="modal" style="float:left;" data-target="#myModal">Delete</button>
        </div>
        <div class="modal fade" id="myModal" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" align="center" id="gridSystemModalLabel">Delete Property</h4>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">Do you really want to delete the property?</div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <div align="center">
                  <button type="button" class="btn btn-primary">Yes</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </td>
</tr>
                            <?php
                        }
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
