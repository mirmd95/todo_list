<!--  -->
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

$sql = "SELECT * FROM task where username='$a'  AND status=0 ORDER BY date1";
$result = $conn->query($sql);
//var_dump($result);
if ($result->num_rows >0) { ?>
        <table class="table table-striped table-bordered " >
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Task name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><input data-id="<?php echo $row['id']; ?>" class="changeStatus" type="checkbox" name="work"></td>
            <td><?=$row["taskname"]?></td>
            <td><?=$row["describes"]?></td>
            <td><?=$row["date1"]?></td>
            <td><?=$row["time1"]?></td>
            <td><button data-id="<?php echo $row['id']; ?>" class="btn-danger">delete</button></td>

        </tr>
        <!-- echo"<tr><td><button>Edit</button></td><td>".  $row["taskname"]. " </td><td>" . $row["describes"]. "</td></tr>"; -->

   <?php } ?>
                
            </tbody>
        </table>
    <?php   
} else {
    echo "There is No Tasks yet!";
}
$conn->close();
?>