<?php
$con = mysqli_connect("localhost", "root", "", "practice") or die("Don't Connected");
$sql = "SELECT * FROM `ajax`";
$res = mysqli_query($con,$sql) or die ("SQL Query Failed");
$output = "";
if (mysqli_num_rows($res) > 0) {
    $output = '<table class="table table-striped table-bordered">
    <tr class="text-center">
    <th>Id</th>
    <th>Name</th>
    <th>Action</th>
    </tr>';
    $i=0;

    while($row = $res->fetch_assoc()){
        $i++;
        $output .= "<tr class='text-center'>
        <td>{$i}</td>
        <td>{$row["FNAME"]} {$row["LNAME"]}</td>
        <td>
            <button class='btn btn-danger delete' data-id='{$row["ID"]}'>Delete</button>
            <button class='btn btn-warning edit' data-eid='{$row["ID"]}'>Edit</button>
        </td>
    </tr>";
    }
    $output .= '</table>';
    mysqli_close($con);
    echo $output;
}
