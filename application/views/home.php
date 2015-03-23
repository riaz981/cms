<?php
$this->load->view('navheader');
?>

<!-- collapse the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="#bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <li class="active"><a href="home">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="add">Add Property</a></li>
    </ul>

    <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
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
            <table class="table table-bordered" style="margin-top:2em;">
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
                    //var_dump($property);
                    foreach($property as $row){ ?>
                        <tr><td><?php echo $row['id'];?></td><td><?php echo $row['name']?></td><td><?php echo $row['address'] ?></td><td><a href="<?php echo $row['url']?>"><?php echo $row['url']?></a></td><td></td></tr>
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
