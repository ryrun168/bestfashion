<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs" />
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name='robots' content='all, follow' />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    
<title>Ur Best Fashion shop</title>
    <!---Css and Script Include -->
        <?php
            include("cssControl.php");
            include("script.php");
        ?>
    <!---End Css and Script Include -->
    
    <!---Menu Operation--->
    <script type="text/javascript">
	
		function showLoad(){
			$('#dvLoading').fadeIn(50);
		}
		function hideLoad(a){
			$('#dvLoading').fadeOut(500);	
		}
		$(document).ready(function(e) {
            $('#dvLoading').hide();
			//****Action Click Menu
			var menuClicked = $("#sidebar .mainmenu li .submenu li a, #sidebar .mainsubmenu a");
			
			$(menuClicked).click(function(){
				//alert("Me Already Clicked...");	
				showLoad();
				var currentRel = $(this).attr("rel");
				//alert(currentRel);
				switch(currentRel){
					case "home" : $("#content").load("home/home.php",{'opr':'home'},hideLoad()); break;
					case "newProduct"  : $("#content").load("product/addProduct.php",{'opr':'addProduct'},hideLoad()); break;
					case "viewProduct" : $("#content").load("product/viewProduct.php",{'opr':'viewProduct'},hideLoad()); break;
					case "newCategory" : $("#content").load("category/addCategory.php",{'opr':'addCategory'},hideLoad()); break;
					case "viewCategory": $("#content").load("category/viewCategory.php",{'opr':'viewCategory'},hideLoad()); break;
					case "newCustomer" : $("#content").load("customer/addCustomer.php",{'opr':'addCustomer'},hideLoad()); break;
					case "viewCustomer": $("#content").load("customer/viewCustomer.php",{'opr':'viewCustomer'},hideLoad()); break;
					case "newUser"  : $("#content").load("user/addUser.php",{'opr':'addUser'},hideLoad()); break;
					case "viewUSer" : $("#content").load("user/viewUser.php",{'opr':'viewUser'},hideLoad());break;
					case "newArticle" : $("#content").load("article/addArticle.php",{'opr':'addArticle'},hideLoad());break;
					case "viewArticle": $("#content").load("article/viewArticle.php",{'opr':'viewArticle'},hideLoad());break;
					case "newEvent" : $("#content").load("event/addEvent.php",{'opr':'addEvent'},hideLoad());break;
					case "viewEvent": $("#content").load("event/viewEvent.php",{'opr':'viewEvent'},hideLoad());break;
					case "reportProduct"  : $("#content").load("report/reportProduct.php",{'opr':'rptProduct'},hideLoad()); break;
					case "reportCustomer" : $("#content").load("report/reportCustomer.php",{'opr':'rptCustomer'},hideLoad()); break;
					case "reportOrder"    : $("#content").load("report/reportOrder.php",{'opr':'rptOrder'},hideLoad()); break;
					case "reportSubcriber": $("#content").load("report/reportSubcriber.php",{'opr':'rptSubcriber'},hideLoad()); break;
					case "sale": $("#content").load("sale/sale.php",{'opr':'sale'},hideLoad()); break;
					case "userProfile": $("#content").load("user/userPrfile.php",{'opr':'profile'},hideLoad()); break;
					case "simpleTab"  : $("#content").load("simpletabs/test.php",hideLoad()); break;
				}
				hideLoad();
			});
        });
	</script>
    <!---End Menu Operation--->
    
    <!-- Google Analytics -->
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-797086-8']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();    
    </script>
    
</head>

<body>
<div id="main">
    <!-- #header -->
    <div id="header"> 
      <!-- #logo --> 
      <div id="logo">
        <a href="#" title="Go to Dashboard"><span>UBF Admin</span></a>
      </div>
      <!-- /#logo -->
      <!-- #user -->                        
      <div id="user">
        <h2>UBF Team <span>(admin)</span></h2>
        <a href="">7 messages</a> - <a href="#">settings</a> - <a href="../">logout</a>

      </div>
      <!-- /#user -->  
    </div>
    <!-- /header -->
    <div id="full-content">        
        <div id="menu-verticle">
        	<div id="sidebar">
        <!-- mainmenu -->
        <ul id="floatMenu" class="mainmenu">
          <li class="first">Dashboard</li>
          <li><a href="#">Category</a>
            <ul class="submenu">
              <li><a href="#" rel="newCategory">New Category</a></li>          
              <li><a href="#" rel="viewCategory">View Category</a></li>
            </ul>
          </li>
          <li><a href="#">Product</a>
            <ul class="submenu">
              <li><a href="#" rel="newProduct">New Product</a></li>          
              <li><a href="#" rel="viewProduct">View Product</a></li>
            </ul>
          </li>
          <li class="mainsubmenu"><a href="#" rel="sale">Sales</a></li>
           <li><a href="#">Payment</a>
            <ul class="submenu">
              <li><a href="#" rel="newEvent">Expense</a></li>          
              <li><a href="#" rel="viewEvent">Cross Profit</a></li>
            </ul>
          </li>
           <li><a href="#">Banner</a>
            <ul class="submenu">
              <li><a href="#" rel="newEvent">New Banner</a></li>          
              <li><a href="#" rel="viewEvent">View Banner</a></li>
            </ul>
          </li>
          <li><a href="#">Report</a>
          	<ul class="submenu">
            	<li><a href="#" rel="reportProduct">Product</a></li>
                <li><a href="#" rel="reportCustomer">Customer</a></li>
                <li><a href="#" rel="reportOrder">Order</a></li>
                <li><a href="#" rel="reportSubcriber">Subcriber</a></li>
            </ul>
          </li>
          <li><a href="#">Task</a>
          	<ul class="submenu">
            	<li><a href="#" rel="viewSubcriber">Subcribers</a></li>
                <li><a href="#" rel="viewComment">Comments</a></li>
            </ul>
          </li>
          <li><a href="#" rel="userProfile">User</a>
          	<ul class="submenu">
            	<li><a href="#" rel="profile">Profile</a></li>
                <li><a href="#" rel="role">Role</a></li>
            </ul>
          </li>
          <li><a href="">Settings</a>
          	<ul class="submenu">
            	<li><a href="#" rel="backup">Backup</a></li>
                <li><a href="#" rel="restore">Restore</a></li>
            </ul>
          </li>
        </ul>
        <!-- /.mainmenu -->

    </div>
 </div>
        <!-- #content -->
        <div id="content">
           <?php include("home/home.php");?>
        </div>
        <!-- /#content -->
	</div>
	
    <!-- #sidebar -->
    
    <!-- /#sidebar -->
    <!-- #footer -->
    <div id="footer">
      
    </div>
    <!-- /#footer -->
</div>
  <!-- /#main --> 
    <!---Loading Image--->
    	<div id="dvLoading"></div>
    <!---Endloading Image--->
</body>
</html>