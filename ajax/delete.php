<?php
$dataid = $_POST["id"];

$con = mysqli_connect("localhost", "root", "", "practice") or die("Don't Connected");
$sql = "DELETE FROM `ajax` WHERE `ID` = $dataid";
if($con->query($sql)){
    echo 1;
}else {
    echo 0;
}

