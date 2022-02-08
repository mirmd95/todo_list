<?php 
	//session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="containter">
		<div class="row"> 
      <nav class="navbar navbar-inverse">
        <div class="col-sm-12 col-md-3">
            <div class="container-fluid">
              <div class="navbar-header">
                 <a class="navbar-brand" href="home.php">To Do List</a>
              </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-9">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
             <li ><a href="Activework.php">Active</a></li>
             <li ><a href="Activeworklast30days.php">Last 30 days</a></li>
             <li><a href="Completed.php">Completed</a></li>
             <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Request
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="sendrequest.php">Send Request</a></li>
                      <li><a href="viewrequest.php">View Request</a></li>
                      <li><a href="Friendtodo.php">Show Friends To Do list</a></li>
                      <li><a href="#">1-2</a></li>
                      
                  </ul>
                </li>
                <li><a href="login.php">Log out</a></li>
                <li><a href="#"><?php include ("me.php"); ?></a></li>
          </ul>
          <form class="navbar-form navbar-left" action="/action_page.php">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn-submit">Submit</button>
          </form>
        </div>
      </nav>
    </div>

		<div class="row">
			<div class="col-sm-12 col-md-7">

				<form method="post" action="home.php">

					<?php include('errors.php'); ?>
						<div class="form-group">
							<label>Task Name</label>
							<input type="text" name="taskname"  class="form-control" placeholder="Task Name">
						</div>
						<div class="form-group">
							<label>Describe your Task</label>
							<input type="text" name="describes"   class="form-control" placeholder="Describe your task">
						</div>
						<div class="form-group">
							<label>Date</label>
							<input type="DATE" name="date1"   class="form-control" placeholder="Date">
						</div>
						<div class="form-group">
							<label>Time</label>
							<input type="Time" name="time1"   class="form-control" placeholder="Time">
						</div>
						<div class="form-group">
							<label>Types</label>
							<input type="text" name="types"   class="form-control" placeholder="If Private press 1 or If Public press 0 ">
						</div>

						<button type="submit" class="btn-success" name="additem">ADD ITEM</button>
				</form>
			</div>
				<div class="col-sm-12 col-md-5 table-responsive">
					<?php 
						include('taskshow.php');
					?>
				</div>
			</div>
	</div>
	
	

		
	<script>
		$(document).ready(function () {
			$('.changeStatus').click(function () {
				var tid = $(this).data('id');
				$.get('changeStatus.php', {
					id : tid
				}).done(function () {
					alert('You Completed this task');
				});
				$(this).parent().parent().remove();
			});
		});

		$(document).ready(function () {
			$('.btn-danger').click(function () {
				var tid = $(this).data('id');
				$.get('deletetask.php', {
					id : tid
				}).done(function () {
					alert('You Deleted this task');
				});
				$(this).parent().parent().remove();
			});
		});
	</script>

</body>
</html>