<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array();
	$success=array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);
				$query = "SELECT * FROM users WHERE username='$username' or email='$email'";
				$results = mysqli_query($db, $query);

				if (mysqli_num_rows($results) != 0)
				{
					array_push($errors, "Username or Email is Used ");
				}else 
				{
					$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			       mysqli_query($db, $query);	
			       $_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');				
				}

			
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
         $_SESSION['username'] = $username;
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: home.php');
				$a=$username;
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}


	// ADD task
	if (isset($_POST['additem'])) 
	{
		// receive all input values from the form
		 $username=$_SESSION['username'];
		$taskname = mysqli_real_escape_string($db, $_POST['taskname']);
		$describes = mysqli_real_escape_string($db, $_POST['describes']);
		$date1 = mysqli_real_escape_string($db, $_POST['date1']);
		$time1= mysqli_real_escape_string($db, $_POST['time1']);
		$types= mysqli_real_escape_string($db, $_POST['types']);
		
		

		$status=0;

		$formattedDate = date('Y-m-d', strtotime($date1));
		$formattedDate = time('H:i', strtotime($time1));
	
		// form validation: ensure that the form is correctly filled
		if (empty($taskname)) { array_push($errors, "Task name is required"); }
		if (empty($describes)) { array_push($errors, "Describe is required"); }
	
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO task(username,taskname, describes,date1,status,time1,types) 
					  VALUES('$username','$taskname', '$describes','$date1',$status,'$time1',$types)";
					  //echo $query;
					  //die;

			mysqli_query($db, $query);

			$a = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: home.php');
		}		
	}



	// Send Request
	if (isset($_POST['sendrequest'])) 
	{
		// receive all input values from the form
		 $username=$_SESSION['username'];
		$Fusername = mysqli_real_escape_string($db, $_POST['Fusername']);
		$connect=0;
		
		// form validation: ensure that the form is correctly filled
		if (empty($Fusername)) { array_push($errors, "Friend username is required"); }
		$sql="SELECT * FROM relation WHERE username='$Fusername' and Fusername='$username'";	
				
				$res = mysqli_query($db, $sql);
					if (mysqli_num_rows($res) != 0)
					{
						array_push($errors, "You Already send a request ");
					}
		
		// register user if there are no errors in the form
		if (count($errors) == 0)
		{
				$query = "SELECT * FROM users WHERE username='$Fusername'";
					$results = mysqli_query($db, $query);
					if (mysqli_num_rows($results) != 1)
					{
						array_push($errors, "Friend Username is not valid ");
					}else 
					{
				$query = "INSERT INTO relation(username,Fusername,connect) 
						  VALUES('$Fusername','$username', $connect)";
						  //echo $query;
						 // die;

				mysqli_query($db, $query);

				$a = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: sendrequest.php');
			}		
		}
	}



	// Show friend to do list
	if (isset($_POST['Friendtodo'])) {
		// receive all input values from the form
		$Fusername = mysqli_real_escape_string($db, $_POST['Fusername']);
		 $b=$_SESSION['username'];
		// form validation: ensure that the form is correctly filled
		if (empty($Fusername)) { array_push($errors, "FUsername is required"); }
		
		$sql="SELECT * FROM users,relation WHERE users.username=relation.username and relation.connect=1 and (relation.username='$Fusername' and relation.Fusername='$b')";
		
		$res= mysqli_query($db, $sql);
					if (mysqli_num_rows($res) != 1)
					{
						array_push($errors, "yor are not connected ");
					}
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "SELECT * FROM users WHERE username='$Fusername' ";
					$results = mysqli_query($db, $query);
					if (mysqli_num_rows($results) != 1)
					{
						array_push($errors, "Friend Username is not valid ");
					}else
				{
					$_SESSION['fusername'] = $Fusername;
			      header('location: Factivework.php');				
				}

			
		}

	}


		


?>