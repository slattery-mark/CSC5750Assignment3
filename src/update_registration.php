<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../templates/head.php'; ?>
    <?php require_once 'data_layer.php'; ?>
    <link rel="stylesheet" href="../styles/main.css">
</head>

<body id="update-page">
    <?php
        if (isset($_POST['confirm'])) {
            if ($_POST['confirm'] == 'Yes') {
                edit_form();
                header("Location: /index.php");
            }
            else if ($_POST['confirm'] == 'No') {
                header("Location: /index.php");
            } 
        }
    ?>
    <h1>Warning</h1>
    <p>You've previously registered with the following information:</p>

    <?php
            $sql = "SELECT * FROM studentprojects WHERE student_id=?";
            $student_id = $_SESSION['student_id'];
            $types = "i";
            $db = $_SESSION['db'];
            $res = $db->execute_prepared_stmt($sql, $types, $student_id);
            $data = mysqli_fetch_row($res);
            echo    '<table class="prior-registration-table">
                        <tr>
                            <th>Project Title</th>
                            <td>' . $data[3] . '</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>' . $data[1] . ' ' . $data[2] . '</td>
                        </tr>
                        <tr>
                            <th>Start Time</th>
                            <td>' . date_format(new DateTime($data[6]), 'm-d-y g:i A') . '</td>
                        </tr>
                        <tr>
                            <th>Student ID</th>
                            <td>' . $data[0] . '</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>' . $data[5] . '</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>' . $data[4] . '</td>
                        </tr>
                    </table>
                </div>
            </div>';
        ?>

    <form class="update-form" method="post">
        <h2>Update Registration?</h2>
        <input type="submit" name="confirm" value="Yes"><br />
        <input type="submit" name="confirm" value="No"><br />
    </form>

</html>