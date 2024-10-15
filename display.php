<?php

include 'connect.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#srch").keyup(function () {
                srch = $(this).val();
                $.ajax({
                    url: "fetch.php",
                    method: "post",
                    data: { srch: srch },
                    success: function (data) {
                        $("#res").html(data);
                    }
                });
            });
        });
    </script>
</head>

<body>
    <form action="" method="post">
        Search : <input type="text" name="srch" id="srch">
        <p>
        <div id="res"></div>
    </form>
    <div class="container" my-4>

        <button class="btn btn-primary my-5"><a href="insert.php" class="text-light">Add User</a></button>
        <table class="table <?php echo '"border=1" width=50% align=center '; ?>">
            <thead>
                <tr>
                    <th>s_id</th>
                    <th>s_name</th>
                    <th>c_type</th>
                    <th>fees</th>
                    <th>address</th>
                    <th>UPDATE</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $qry = "select s_id,s_name,c_type,fees,addre from stud , course where stud.c_id=course.c_id ";
                $result = mysqli_query($cn, $qry);
                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        $s_id = $row['s_id'];
                        $s_name = $row['s_name'];
                        $c_type = $row['c_type'];
                        $fees = $row['fees'];
                        $addre = $row['addre'];

                        echo '
                                <tr>
                                <td>
                                    ' . $s_id . '
                                </td>
                                <td>
                                    ' . $s_name . '
                                </td>
                                <td>
                                    ' . $c_type . '
                                </td>
                                <td>
                                    ' . $fees . '
                                </td>
                                <td>
                                    ' . $addre . '
                                </td>
                                <td><button class="btn btn-primary my-5"><a href="update.php?updateid='.$s_id.'" class="text-light">UPDATE</a></button></td>
                                <td><button class="btn btn-primary my-5"><a href="delete.php?deleteid='.$s_id.'" class="text-light">DELETE</a></button></td>
                            </tr>
                            ';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>