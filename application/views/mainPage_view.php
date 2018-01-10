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
      }
	      /* Custom container */
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
	  
	  .taskContainer {
        margin:0 0  0 100px;
        padding: 2%;
      
		
  }
	  

</style>
</head>
<body>

    
 <div class="jumbotron">
 
     <h2>Welcome to the TaskNoter!</h2>
        <p class="lead">Enter any tasks you want</p>
        <a class="btn btn-large btn-primary" href="/task">Enter message</a>
		
		<a class="btn btn-success" href="/admin">Admin Panel</a>
		</div>
		
		 



</form>
		
		
		
		<?php  foreach($tasks as $task): ?>
		 <div class="taskContainer">
		  <?php  echo '<h2>'.$task['name'].'</h2>'.'<p>'.$task['text'].'</p><img src = "'.$task['image'].'">';?>
		  <?php if($task['isDone'] == 1){
			 echo '<font color = #7FFF00><h2>Done</h2></font>';
		  }
					 ?>
					
		 </div>
		 <?php  endforeach; ?>
		 <div class="pagination">
		 <?php  for($i = 1; $i <= $pages; $i++): ?>
		
		<li><a href="?page=<?php echo trim($i);?>&per-page=3"><?php echo $i; ?></a></li>
		<?php   endfor; ?>
		
		</div>


</body>

</html>
