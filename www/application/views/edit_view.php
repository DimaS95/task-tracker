<!DOCTYPE>
<html>

<head>
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

</head>
<body>
<div class="control-group">


 
    <div class="controls" action = "validate.php">
	<form method = "POST" >
      <textarea type="text" rows="10" cols="45" name = "message" size = "200"><?php echo $result; ?></textarea>
	  <br/>
	  <button name = "but" id = "but" type="submit" class="btn btn-success">Save</button>
	  <a class="btn btn-large btn-primary" href="/panel">Back</a>
	  </form>
    </div>
  </div> 
  <br/>
  </body>

</html>
