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
       padding-bottom: 40px;
       padding-top: 40px;
	   background-color: #f5f5f5;
	   margin-left: 40px;
      }
	      
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

.jumbotron {
        margin: 10px 0;
        text-align: center;
		background-color: #ffffff;
      }
      .jumbotron h2 {
        font-size: 32px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }
	  .jumbotron p{
	  font-size:16px;
	  }
	  .jumbotron1 {
        margin: 10px 60px;
        text-align: left;
        display:inline-block;
        padding: 1%;
		
      }
      .jumbotron1 h2 {
        font-size: 32px;
        line-height: 1;
        
      }
      .jumbotron1 .btn {
        font-size: 21px;
        padding: 14px 24px;
      }
	  .jumbotron1 p{
	  font-size:16px;

	  }
	  .tasks
	  {
		display: inline-block;
	  }
.container {
   height:200px;
  width:500px;
  display:flex;
  flex-flow: column wrap;
 }
  
.item {
   margin:20px 2px;
 
  width:420px;
  }
  .form-control {
  	width: 200px;
  }
  .buttons {
  	margin-right: 150px; 
  }


</style>
</head>
<body>
<div class = "buttons">
<form method="POST" action="">
	<a class="btn btn-large btn-primary" name = "b" value = "back" href="/main">Back</a>
    <button class="btn btn-large btn-primary" name = "btn" value="logout">Logout</button>
	</form>
</div>

		<form method = "POST" action = "">
		 <select class="form-control" name="sort">

<option value='null'>None</option>
<option value='name'>Name</option>
<option value='email'>Email</option>

  </select>
  <br/>
 <input class = "btn btn-primary" type = "submit"  name = "btn" placeholder= "Submit" value="sort">
 </form>


 <div class = "container">
 <form method = "POST" action = "/panel">

		<?php foreach($tasks as $task): ?>
			
		 <div class="item">
		  <?php echo '<h2>'.$task['name'].'</h2>'.'<p>'.$task['email'].'</p>'.'<p>'.$task['text'].'</p><img src = "'.$task['image'].'"><br/>'.'<a href="/edit/?id='.$task['id'].'"><h2>Edit</h2></a>'.'<a href="/delete/?id='.$task['id'].'"><h2>Delete</h2></a>'  ;?>
		  <?php $_GET['id'] = $task['id'] ?>
		  <br/>
		  <?php if($task['isDone'] == 0){ 
		    echo '<label><input type="checkbox" name = "check[]" value ='.$task['id'].' ">Done</label>';
		  }?>
			<br/>
			<br/>

			
		 </div>
		 
		 <?php endforeach; ?>
		 
		
		 
		<a class="btn btn-large btn-primary" name = "button" value = "back" href="main/">Back</a>
		
     <button class = "btn btn-success"  name = "btn" value="Submit">Submit</button>
		</form>
		</div>
	
		
	
		
		



</body>

</html>





