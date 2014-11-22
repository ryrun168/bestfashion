<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/visualize.css" />
<script type="text/javascript" src="js/jquery.visualize.js"></script>
</head>
<body>
       <div id="width-100">
            
       		<div id="width-50" class="fl br bb">
            	<?php
            	include("overview.php");
				?>
            </div>
            
            <div id="width-50" class="fr bl bb">
            	<?php
            	include("overview.php");
				?>
            </div>
            <p class="clear" />
            
            <div id="width-100" style="margin-top:8px; height:280px;" class="overflow">
            	<?php
          		include("latestOrder.php");
		  		?>
            </div>
       </div>
</body>
</html>














