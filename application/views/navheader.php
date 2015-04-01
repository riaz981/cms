<!DOCTYPE html>
<html>
<head>
<title>CMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("assets/css/ekko-lightbox.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("assets/css/master.css"); ?>" />
</head>

<body>
    <?php

    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    ?>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home">
                    <img alt="Brand" src="<?php echo base_url("assets/img/as.png"); ?>">
                </a>
            </div>
