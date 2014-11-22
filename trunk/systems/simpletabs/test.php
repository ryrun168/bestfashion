<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<!-- jquer Tab -->
<script type="text/javascript">
	$(function() {
		var tabs = $('div.tabs ul li').length;	// count the tab
		for(var i = 0; i  < tabs + 1; i++) {
			$('li#tabHeader_'+ i ).click(function() {		
				$('li.active_tab').removeClass('active_tab');	// remove class
				$(this).addClass('active_tab'); // addClass to tab		
				var tab_id = $(this).attr('id'); // return: tabHeader_1		
				var id = tab_id.split("_")[1]; // 
				var tabpage_id = $('div#tabpage_'+id).attr('id'); // return: tabpage_1
				var get_id = tabpage_id.split("_")[1]; // return: 1	
				$('div.tabpage').css('display', 'none');
				$('div.tabscontent div#tabpage_'+ get_id).css('display', 'block');
				//if(tabpage_id == 'tabpage_3'){
					// ajax here, if the data from database
				//}
			});
		}
	});
	  </script>
      <style>
	  	.tabpage{display:none;}
		#tabpage_1{display:block;}
		
		div#tabContainer { padding:10px; }
		ul.simpleTabsNavigation { margin:0 10px; padding:0; text-align:left; }
		ul.simpleTabsNavigation li { list-style:none; display:inline; margin:0; padding:0; }
		ul.simpleTabsNavigation li a { border:1px solid #E0E0E0; padding:3px 6px; background:#F0F0F0; font-size:14px; text-decoration:none; font-family:Georgia, "Times New Roman", Times, serif; }
		ul.simpleTabsNavigation li a:hover { background-color:#F6F6F6; }
		ul.simpleTabsNavigation li.active_tab a { background:#fff; color:#222; border-bottom:1px solid #fff; }
		div.tabpage { border:1px solid #E0E0E0; padding:5px 15px 15px; margin-top:3px; display:none; }
		
	  </style>
</head>

<body>
	<div id="tabContainer"> 	
		<div class="tabs"> 
		  <ul class="simpleTabsNavigation">
			<li id="tabHeader_1" class="active_tab"><a href="#">General</a></li>
			<li id="tabHeader_2"><a href="#">Data</a></li>
		  </ul>
		</div> 
		
		<div class="tabscontent">
		  <div class="tabpage" id="tabpage_1">
			Tab1
		  </div>
		  <div class="tabpage" id="tabpage_2">
			tab2
		  </div>
         </div>        
	</div>
</body>
</html>