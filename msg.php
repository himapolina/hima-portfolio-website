<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//creating DB
$sql = "USE MYWEBSITE";
if($conn->query($sql)!=TRUE){
    echo "Error connecting to database: ", $conn->error;
}
$name = $_REQUEST['sender'];
$email = $_REQUEST['email'];
$msg = $_REQUEST['msg'];
$sql = "insert into MYMESSAGES values('$name', '$email', '$msg')";
if($conn->query($sql)!=TRUE){
    echo "Error in sending message: ", $conn->error;
}else{
    ?>
    <script type="text/javascript">alert("Message sent! Thank you :)");</script>
    <?php
    header('Location: index.html');
    exit;
}
$conn->close();
?>