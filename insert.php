

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    <div class="container my-4">
        <form method="post">
            
            <div class="form-group">
                <label for=""> Name </label>
                <input type="text" name="s_name" placeholder="Enter the Name"/>
            </div>

            <div class="form-group">
                <label for=""> Course </label>
                <select name="c_id">
                    <option value="">select the course</option>
                    <option value="1">Management</option>
                    <option value="2">IT</option>
                    <option value="3">Commerce</option>
                </select>
            </div>

            <div class="form-group">
                <label for=""> mobile no. </label>
                <input type="number" name="c_no"  placeholder="Enter the Mobile No.">
            </div>
            
            <div class="form-group">
                <label for=""> Address </label>
                <input type="text" name="addre" placeholder="Enter the Address">
            </div>
            <input type="submit" value="Add User" name="submit">
        </form>
    </div>
</body>
</html>

<?php

include 'connect.php';
if (isset($_POST['submit'])) {
    echo "Hello";
    $s_name=$_POST['s_name'];
    $c_id=$_POST['c_id'];
    $c_no=$_POST['c_no'];
    $addre=$_POST['addre'];

    $qry="insert into stud (s_name,c_id,c_no,addre) values('$s_name',$c_id,$c_no,'$addre')";
  //  echo $qry;

    $result=mysqli_query($cn,$qry);
    if ($result) {
        header("location:display.php");
    }
    else {
        die(mysqli_error($cn));
    }
}

?>