
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

$sql = "SELECT * FROM relation where username='$a'  AND connect=0 ";
$result = $conn->query($sql);
//var_dump($result);
if ($result->num_rows >0) { ?>
        <table class="table table-striped table-bordered " >
            <thead>
                <tr>
                    <th>Friend User name</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?=$row["Fusername"]?></td>
            <td><button data-id="<?php echo $row['id']; ?>" class="btn-acc">Accept</button></td>
            <td><button data-id="<?php echo $row['id']; ?>" class="btn-rej">Reject</button></td>


        </tr>

   <?php } ?>
                
            </tbody>
        </table>
    <?php   
} else {
    echo "There is no Friend Request";
}
$conn->close();
?>