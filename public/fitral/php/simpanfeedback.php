<?php
include 'fitral.php';
$fullname=$_POST['fullname'];
$feedback=$_POST['feedback'];
$query_feedback = "INSERT INTO feedback (nama, feedback, timestamp, status) VALUES ('$fullname', '$feedback', now(), 'belum');";
$result_feedback = mysqli_query($conn, $query_feedback);
header('Location: https://bupesta.web.bps.go.id/tentangbupesta.php');
?>