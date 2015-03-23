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
    <div class="row formationadd" style="min-height:42em;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php
                //var_dump($property);
                foreach($property as $row){
                    echo $row['id']."."."Name: ".$row['name']."<br>";
                }
            ?>
        </div>
    </div>
</div>
<?php
$this->load->view('footer');
?>
