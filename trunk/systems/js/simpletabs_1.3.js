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