<!DOCTYPE>
<html>
<head>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style>
   body {
      
        background-color: #f5f5f5;
		padding: 40px 700px 29px;
      }
	  
      
        
      


</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <script>
  function validate()
  {
   var name = $("#name").val ();
	var email = $("#email").val ();
	 var message = $("#message").val ();
	
	 
		var fail = "";
     if (name.length < 3) fail = "Name should be bigger than 3 symbols";
     else if (message.length < 5)  fail = "tiny message!";
     else if (email.split('@').length - 1 == 0 || email.split('.').length - 1 == 0) fail = "enter correct email";
	 
	if (fail != "") {
      $('#messageShow').html (fail + "<div class='clear'><br></div>");
      $('#messageShow').show ();
      return false;
     }
	 return true;
  }
  
   $(document).ready (function () {
    $("#but").click (function () {
   if(!validate())
   {
    var name = $("#name").val ();
  
    var email = $("#email").val ();
 
   var message = $("#message").val ();

  return false;
   }
   

     $.ajax ({
      url: 'task.php',
      type: 'POST',
      cache: false,
      data: {'name': name, 'message': message, 'email':email},
      dataType: 'html',
     
     });
    });
	
	$("#preview").click(function(){
	if(validate())
	{
	var name = $("#name").val ();
	 $('#forName').html(name);
	$('#forName').show();
	  var email = $("#email").val ();
	 $('#forEmail').html(email);
	$('#forEmail').show();
	 var message = $("#message").val ();
	 $('#forMessage').html(message);
	$('#forMessage').show();
	
	var input = $('#image')[0];
		if (input.files && input.files[0]) {
            if (input.files[0].type.match('image.*')) {
				
                var reader = new FileReader();
                reader.onload = function (e) {
                     $('#forImage').attr('src', e.target.result);

        }
	
                
                reader.readAsDataURL(input.files[0]);
				
				
            } else {
                console.log('not an image!');
            }
        } else {
            console.log('fatal error');
        }
		
		  
		 }
	  
		   
	return false;
	$.ajax ({
      url: 'ajax/task.php',
      type: 'POST',
      cache: false,
      data: {'name':name, 'email': email, 'message': message},
      dataType: 'html',
      success: function (data) {
       $('#data').html (data + "<div class='clear'><br></div>");
       $('#data').show ();
      }
     });
    });
	 
 
	});
	
   
    
  </script>
  
</head>
<body>
<form class="form" method = "POST" enctype = "multipart/form-data" action = "">
  <div class="control-group">
    <label class="control-label" for="name" >Name</label>
    <div class="controls">
      <input type="text" name="name" id = "name"  placeholder="Enter Name">
    </div>
  </div>
  <br/>
    <div class="control-group">
    <label class="control-label" for="name">Email</label>
    <div class="controls">
      <input type="text" name="email" id = "email" placeholder="Enter email"  multiple accept="image/png,image/jpg" />
    </div>
  </div>
  <br/>

   <div class="control-group">
    <label class="control-label" for="message">Enter your message</label>
    <div class="controls">
      <textarea type="text" rows="10" cols="45" name = "message" id = "message" placeholder="Enter Message"></textarea>
    </div>
  </div> 
  <br/>
  
  <div class="control-group">
    <label class="control-label" for="message">Choose file(JPG/GIF/PNG)</label>
    <div class="controls">
  <input type = "file" name = "upfile" id = "image" />
    </div> 
	 </div> 
  <br/>
  
  <div class="control-group">
   <div id = "messageShow" style = "color:red"></div>
    <button name = "but" id = "but" type="submit" class="btn btn-success">Send</button>
    <button name = "but" id = "preview" type="submit" class="btn btn-info">Preview</button>
	<a class="btn btn-large btn-primary" href="/main">Back</a>
	 
    </div>
	
	<div class = "container" id = "data">
	<h2 id = "forName"></h2>
	<p id = "forEmail"><p>
	<p id = "forMessage"><p>
	<img id = "forImage" src = ""/>
	</div>

  
</form>



</body>

</html>
