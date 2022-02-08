
<?php
//session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$date1="";
	$errors = array();
	$success=array(); 
     $b=$_SESSION['fusername'];
     $a=$_SESSION['username'];
	// connect to database
	$conn = new mysqli('localhost', 'root', '', 'registration');

//$sql = "SELECT * FROM task where username='$b'  AND types=0 and status=0";
$sql="SELECT * FROM task,relation WHERE (task.username=relation.username and relation.connect=1 and relation.username='$b' and  types=0 and status=0 and relation.username='$b' and relation.fusername='$a' )";
//echo $sql;
//die;
$result = $conn->query($sql);
//var_dump($result);
if ($result->num_rows >0) { ?>
    	<table class="table table-striped table-bordered " >
    		<thead>
    			<tr>
    				
    				<th>Task name</th>
    				<th>Description</th>
    				<th>Date</th>
                    <th>Time</th>
    				
    			</tr>
    		</thead>
    		<tbody>
    			<?php
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
        	
        	<td><?=$row["taskname"]?></td>
        	<td><?=$row["describes"]?></td>
        	<td><?=$row["date1"]?></td>
            <td><?=$row["time1"]?></td>
        	
        </tr>
        <!-- echo"<tr><td><button>Edit</button></td><td>".  $row["taskname"]. " </td><td>" . $row["describes"]. "</td></tr>"; -->

   <?php } ?>
    			
    		</tbody>
    	</table>
    <?php	
} else {
    echo "There is no task yet!";
    //echo '<img src="task.jpg" alt="icon" />';
}
$conn->close();
?>