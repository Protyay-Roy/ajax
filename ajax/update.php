<?php
$dataid = $_POST["id"];
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];

$con = mysqli_connect("localhost", "root", "", "practice") or die("Don't Connected");
$sql ="UPDATE `ajax` SET `ID`='{$dataid}',`FNAME`='{$firstname}',`LNAME`='{$lastname}' WHERE `ID`=$dataid";
$res = mysqli_query($con,$sql) or die ("SQL Query Failed");
if($res){
    echo 1;
}else{ echo 0;}