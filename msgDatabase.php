<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


$conn = new mysqli('localhost','root','','web_project');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connection_error);
}
else{
    $stmt = $conn->prepare("insert into usermsg(name, email, message) values(?, ?, ?)");
    $stmt->bind_param("sss",$name, $email, $message);
    $stmt->execute();
    echo "Message send successfully...";
    $stmt->close();
    $conn->close();
}

?>
