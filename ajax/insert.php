<?php

$fname = $_POST["firstname"];
$lname = $_POST["lastname"];

$con = mysqli_connect("localhost","root","","practice") or die ("Don't Connected");
$sql = "INSERT INTO `ajax`(`FNAME`, `LNAME`) VALUES ('$fname','$lname')";

if($result = mysqli_query($con,$sql)){
    echo "1";
}else{
    echo "no";
}



