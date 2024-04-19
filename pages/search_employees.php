<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Bughound</title>
    <link rel="stylesheet" href="../assets/styles/nav_menu_style.css">
    <link rel="stylesheet" href="../assets/styles/form_style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['user_name']) && isset($_SESSION['user_level'])) {
        $sess_user_level = $_SESSION['user_level'];
        $sess_user_name = $_SESSION['user_name'];
        include "./navigation_bar.php";
        echo nav_bar($sess_user_name, $sess_user_level, "manage_database");
        echo "<h2><center>";
        $source = $_GET['source'];
        if ($source == 'edit') {
            echo '<font color="gray">Search for an Employee to Edit Entry</font>';
        }
        if ($source == 'delete') {
            echo '<font color="gray">Search for an Employee to Delete Entry</font>';
        }
        if ($source == 'search') {
            echo '<font color="gray">Search for an Employee Entry</font>';
        }
        echo "</center></h2>";
    } else {
        include "./authentication.php";
        echo authUser();
    }
    ?>
    <?php
    if (isset($_SESSION['user_name']) && isset($_SESSION['user_level'])) {
    ?>
        <form name="search_employees_form" action="search_employees_post.php?source=<?php echo $source; ?>" method="post" onsubmit="return validate(this)">
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
                    <td>Position:</td>
                    <td>
                        <select name="position">
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

            <input type="submit" name="search_reports_submit" value="Search" />
            <input class="button" type="button" onclick="window.location.replace('search_employees.php?source=<?php echo $source; ?>')" value="Reset" />
            <input class="button" type="button" onclick="window.location.replace('index.php')" value="Cancel" />
        </form>
    <?php } ?>

    <script language=Javascript>
        function validate(theform) {
            var at_least_one_selected = true;
            if (theform.first_name.value === "") {
                at_least_one_selected = false;
            }
            if (theform.last_name.value != "" && at_least_one_selected === false) {
                at_least_one_selected = true;
            }
            if (theform.user_name.value != "" && at_least_one_selected === false) {
                at_least_one_selected = true;
            }
            if (theform.position.value != "" && at_least_one_selected === false) {
                at_least_one_selected = true;
            }
            if (theform.group_num.value != "" && at_least_one_selected === false) {
                at_least_one_selected = true;
            }
            if (theform.user_level.value != "" && at_least_one_selected === false) {
                at_least_one_selected = true;
            }

            if (at_least_one_selected === true) {
                return true;
            } else {
                alert("At least one search term must be selected/filled in.");
                return false;
            }
        }
    </script>
</body>

</html>