<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Show Friends To Do List</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="row"> 
      <nav class="navbar navbar-inverse">
        <div class="col-sm-12 col-md-5">
            <div class="container-fluid">
              <div class="navbar-header">
                 <a class="navbar-brand" href="home.php">To Do List</a>
              </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-7">
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
                     <li><a href="showfriendlist.php">Show Friend List</a></li>
                      
                  </ul>
                </li>
                <li><a href="login.php">Log out</a></li>
                <li><a href="profile.php"><?php include ("me.php"); ?></a></li>
          </ul>
         
        </div>
      </nav>
    </div>

		<div class="row">
			<div class="col-sm-12 col-md-7">
				<form method="post" action="Friendtodo.php">
					<?php include('errors.php'); ?>
						<div class="form-group">
							<label>Friends User Name</label>
							<input type="text" name="Fusername"  class="form-control" placeholder=" Friends user Name">
						</div>
						<button type="submit" class="btn-fsearch" name="Friendtodo">Search</button>
				</form>
			</div>
				
			</div>
	</div>
	
	

</body>
</html>