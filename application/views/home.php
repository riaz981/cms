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
            <?php if(isset($message)){?><span style="color:#F24B4B;"><?php echo $message;?></span><?php } ?>
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
<tr><td><?php echo $row['id'];?></td><td><?php echo $row['name']?></td><td><?php echo $row['address'] ?></td><td><a href="<?php echo $row['url']?>"><?php echo $row['url']?></a></td><td></td></tr>
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

<script>
        // Write on keyup event of keyword input element
    $("#search").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#table tbody").find("tr"), function() {
            console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
               $(this).hide();
            else
                 $(this).show();
        });
    });
</script>

<?php
$this->load->view('footer');
?>
