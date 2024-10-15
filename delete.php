<?php

include 'connect.php';
$id = $_GET['deleteid'];


    //$qry="insert into stud (s_name,c_id,c_no,addre) values('$s_name',$c_id,$c_no,'$addre')";
    //  echo $qry;
    $qry = "delete from stud where s_id=$id";

    $result = mysqli_query($cn, $qry);
    if ($result) {
        header("location:display.php");
    } else {
        die(mysqli_error($cn));
    }

?>