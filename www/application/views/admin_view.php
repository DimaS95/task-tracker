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
<form class="form" method = "POST" action = "">
  <div class="control-group">
    <label class="control-label" for="name">Login</label>
    <div class="controls">
      <input type="text" name="login" placeholder="Enter Login">
    </div>
  </div>
  <br/>
    <div class="control-group">
    <label class="control-label" for="name">Password</label>
    <div class="controls">
      <input type="password" name="password" placeholder="Enter Password" />
    </div>
  </div>
  <br/>
    <div class="control-group">
   <div id = "messageShow" style = "color:red"></div>
    <input type="submit" value="Enter" name="btn" class = "btn btn-success">
	<a class="btn btn-large btn-primary" href="http://tasknoter/main?page=1&per-page=3">Back</a>
	</div>
  
</form>

</html>
