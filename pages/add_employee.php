<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Bughound</title>
    <link rel="stylesheet" href="../assets/styles/nav_menu_style.css">
    <link rel="stylesheet" href="../assets/styles/vertical_menu_style.css">
    <link rel="stylesheet" href="../assets/styles/form_style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<?php
// See if user that logged in is of manager level (user level of 5)
session_start();
if (isset($_SESSION['user_name']) && isset($_SESSION['user_level'])) {
    $sess_user_level = $_SESSION['user_level'];
    $sess_user_name = $_SESSION['user_name'];
    include "./navigation_bar.php";
    echo nav_bar($sess_user_name, $sess_user_level, "manage_database");
    echo    '
        <h2>
        <center>
            <font color="gray">Add an Employee Entry</font>
        </center>
        </h2>

        <form name="add_employee_form" action="add_employee_post.php" method="post" onsubmit="return validate(this)">
    <table>
        <tr>
            <td>First Name:</td>
            <td><input type="Text" name="first_name" /></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><input type="Text" name="last_name" /></td>
        </tr>
        <tr>
            <td>Username:</td>
            <td><input type="Text" name="user_name" /></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="Text" name="user_pass" /></td>
        </tr>
        <tr>
            <td>Position:</td>
            <td>
                <select name="position" required>
                    <option value="">Select Position</option>
                    <option value="programmer">Programmer</option>
                    <option value="designer">Designer</option>
                    <option value="tester">Tester</option>
                    <option value="manager">Manager</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Group Number</td>
            <td><input type="Text" name="group_num"></td>
        </tr>
        <tr>
            <td>Is a reporter?</td>
            <td><input type="checkbox" name="is_reporter" value="True" /></td>
        </tr>
        <tr>
            <td>User Level:</td>
            <td><input type="Number" name="user_level" /></td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Submit" />
    <input class="button" type="button" onclick="window.location.replace(\'index.php\')" value="Cancel" />
</form>';
} else {
    include "./authentication.php";
    echo authUser();
}
?>





<script language=Javascript>
    function validate(theform) {
        if (theform.first_name.value.trim() === "") {
            alert("First Name field must contain characters");
            return false;
        }
        if (theform.last_name.value.trim() === "") {
            alert("Last Name field must contain characters");
            return false;
        }
        if (theform.user_name.value.trim() === "") {
            alert("User name field must contain characters");
            return false;
        }
        if (theform.user_pass.value.trim() === "") {
            alert("Password field must contain characters");
            return false;
        }
        if (theform.position.value === "") {
            alert("Must select a position");
            return false;
        }
        if (theform.group_num.value.trim() === "") {
            alert("Group number field must contain a number");
            return false;
        }
        if (theform.user_level.value === "" || theform.user_level.value <= 0 || theform.user_level.value > 5) {
            alert("User Level field must contain a number from 1-5");
            return false;
        }
        return true;
    }
</script>
</body>

</html>