<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/datePicker.css" />
<script src="js/date.js"></script>
<script src="js/jquery.datePicker.js"></script>
</head>

<body>
<!-- breadcrumbs -->
        <div class="breadcrumbs">
          <ul>
            <li class="home"><a href="#" rel="home">DASHBOARD</a></li>
            <li><a href="#" rel="newArticle">Add Article</a></li>
          </ul>
        </div>
<!-- /breadcrumbs -->
        
<!-- /box -->
<div class="box">
<div class="headlines">
  <h2><span>New Article</span></h2>
</div>
<div class="box-content">
<form class="formBox" method="post" action="">
  <fieldset>
  <div class="form-cols"><!-- two form cols -->
  <div class="col1">
    <div class="clearfix">
      <div class="lab"><label for="input-one">Two cols input <span>*</span></label></div>
      <div class="con"><input type="text" class="input" value="" name="" id="input-one" /></div>
          </div>

    <div class="clearfix">
      <div class="lab"><label>Two cols select</label></div>
            <div class="con">
        <select class="select">
          <option>Select</option>
        </select>
      </div>
          </div>

  </div>
  <div class="col2">
    <div class="clearfix error">
      <div class="lab"><label for="input-two">Two cols input <span>*</span></label></div>
            <div class="con"><input type="text" class="input datepicker" value="" name="" id="input-two" /></div><!-- // class datepicker switch on jQuery date picker -->
          </div>
    <div class="clearfix">
      <div class="lab"><label>Two cols select</label></div>

            <div class="con">
        <select class="select">
          <option>Select</option>
        </select>
      </div>
          </div>
  </div>
  </div>

  <div class="clearfix">
    <div class="lab"><label for="input-three">Full width input</label></div>
        <div class="con"><input type="text" class="input" value="" name="" id="input-three" /></div>
      </div>
  <div class="clearfix">
    <div class="lab"><label for="textarea-one">Textarea</label></div>
        <div class="con"><textarea cols="" rows="" class="textarea" id="textarea-one"></textarea></div>

      </div>
  <div class="clearfix textarea-wysiwyg">
    <div class="lab"><label for="textarea-two">Textarea with wysiwyg</label></div>
        <div class="con"><textarea cols="" rows="" class="textarea wysiwyg" id="textarea-two"></textarea></div>
      </div>
  <div class="clearfix file">
    <div class="lab"><label for="file">Upload file</label></div>

    <div class="con"><input type="file" name="" class="upload-file" id="file" /></div>
  </div> 
  <div class="clearfix checkbox">
    <div class="lab"><label for="check-one">One checkbox</label></div>
    <div class="con"><input type="checkbox" name="" id="check-one" /></div>
  </div>
  <div class="clearfix checkbox">
    <div class="lab"><label>Two checkboxes</label></div>

    <div class="con"><label><input type="checkbox" name="" /> Text checkbox</label> <label><input type="checkbox" name="" /> Text checkbox</label></div>
  </div>
  <div class="clearfix checkbox">
    <div class="lab"><label>Two radio buttons</label></div>
    <div class="con"><label><input type="radio" name="" /> Text radio</label> <label><input type="radio" name="" /> Text radio</label></div>

  </div>
  <div class="btn-submit"><!-- Submit form -->
    <input type="submit" value="Submit form" class="button" />
    or <a href="" class="cancel">Cancel</a>
  </div>
</fieldset>    
</form>
</div><!-- /box-content -->

</div>
<!-- /box -->
<script>
	$('.breadcrumbs ul li a').click(function(e){
		//alert("Hello world ");
	});
</script>
</body>
</html>