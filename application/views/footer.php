<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.2.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/validator.js"); ?>"></script>
<div style="margin-top:1em;" align="center">Copyright &copy; <strong><?php $startYear=2015;
                                                                 $thisYear=date('Y');
                                                                 if($startYear==$thisYear){
                                                                     echo $startYear;
                                                                 }
                                                                 else{
                                                                     echo $startYear." - ".$thisYear;
                                                                 }
                                                            ?></strong> Apartment Sydney</div>
</body>
</html>
