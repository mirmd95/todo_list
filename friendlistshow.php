
<?php
//session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$date1="";
	$errors = array();
	$success=array(); 
     $a=$_SESSION['username'];
	// connect to database
	$conn = new mysqli('localhost', 'root', '', 'registration');

$sql = "SELECT * FROM relation,users where relation.Fusername='$a' and relation.connect=1 AND relation.username=users.username";
$result = $conn->query($sql);
//var_dump($result);
$i=1;
if ($result->num_rows >0) { ?>
    	<table class="table table-striped table-bordered " >
    		<thead>
    			<tr>
                    <th>No</th>
    				<th>User Name</th>
    				<th>Email</th>
    			</tr>
    		</thead>
    		<tbody>
    			<?php
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $i++; ?></td>
        	<td><?=$row["username"]?></td>
            <td><?=$row["email"]?></td>
            
        </tr>
        <!-- echo"<tr><td><button>Edit</button></td><td>".  $row["taskname"]. " </td><td>" . $row["describes"]. "</td></tr>"; -->

   <?php } ?>
    			
    		</tbody>
    	</table>
    <?php	
} else {
    echo "There is No Friend yet!";
    echo '<img src="task.jpg" alt="icon" />';
}
$conn->close();
?>