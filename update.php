<?php

include 'connect.php';
$id = $_GET['updateid'];

// Use prepared statements
$qry = "SELECT * FROM stud WHERE s_id = ?";
$stmt = $cn->prepare($qry);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$s_name = $row['s_name'];
$c_id = $row['c_id'];
$c_no = $row['c_no'];
$addre = $row['addre'];

if (isset($_POST['submit'])) {
    $s_name = $_POST['s_name'];
    $c_id = $_POST['c_id'];
    $c_no = $_POST['c_no'];
    $addre = $_POST['addre'];

    // Validate inputs here if needed

    $qry = "UPDATE stud SET s_name = ?, c_id = ?, c_no = ?, addre = ? WHERE s_id = ?";
    $stmt = $cn->prepare($qry);
    $stmt->bind_param("siisi", $s_name, $c_id, $c_no, $addre, $id);
    
    if ($stmt->execute()) {
        header("location:display.php");
        exit(); // Ensure no further script execution after redirect
    } else {
        die($stmt->error);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <div class="container my-4">
        <form method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="s_name" placeholder="Enter the Name" value="<?php echo htmlspecialchars($s_name); ?>" required />
            </div>

            <div class="form-group">
                <label for="">Course</label>
                <select name="c_id" required>
                    <option value="">Select the course</option>
                    <option value="1" <?php echo ($c_id == 1) ? 'selected' : ''; ?>>Management</option>
                    <option value="2" <?php echo ($c_id == 2) ? 'selected' : ''; ?>>IT</option>
                    <option value="3" <?php echo ($c_id == 3) ? 'selected' : ''; ?>>Commerce</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Mobile No.</label>
                <input type="number" name="c_no" placeholder="Enter the Mobile No." value="<?php echo htmlspecialchars($c_no); ?>" required />
            </div>
            
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="addre" placeholder="Enter the Address" value="<?php echo htmlspecialchars($addre); ?>" required />
            </div>
            <input type="submit" value="Update User" name="submit">
        </form>
    </div>
</body>
</html>
