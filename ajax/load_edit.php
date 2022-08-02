<?php
$data_id = $_POST["eid"];

$con = mysqli_connect("localhost", "root", "", "practice") or die("Don't Connected");
$sql = "SELECT * FROM `ajax` WHERE ID = {$data_id}";
$res = mysqli_query($con,$sql) or die ("SQL Query Failed");
$output = "";
if(mysqli_num_rows($res) > 0){

    while($row = mysqli_fetch_assoc($res)){
        $output .= "<tr class='text-center' style='border-bottom: 1px solid #000;'>
        <th colspan='2'>Edit Your Name</th>
    </tr>
    <tr class='ml-2'>
        <td>First Name:</td>
        <td>
            <input type='text' id='edit-id' hidden value='{$row["ID"]}'>
            <input type='text' id='edit-fname' value='{$row["FNAME"]}'>
        </td>
    </tr>
    <tr class='ml-2'>
        <td>Last Name:</td>
        <td> <input type='text' id='edit-lname' value='{$row["LNAME"]}'></td>
    </tr>
    <tr class='text-center'>
        <td colspan='2'><button class='btn btn-primary' id='edit-submit'>Save</button></td>
    </tr>";
    }
    mysqli_close($con);
    echo $output;
}
?>