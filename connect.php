<?php
$firstname=$_post['firstname'];
$email=$_post['email'];
$text=$_post['subject'];
$text=$_post['message'];


$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('connection failed : ' .$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into contact( firstname, email, subject, text) values(? ? ? ?)");
    $stmt->bind_param("sss",$firstname,$email,$text);
    $execval = $stmt->execute();
    echo $execval;
    echo "submitted successfully...";
    $stmt->close();
    $conn->close();
}

?>