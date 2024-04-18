<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Bughound</title>
    <link rel="stylesheet" href="../assets/styles/nav_menu_style.css">
    <link rel="stylesheet" href="../assets/styles/vertical_menu_style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
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
            <font color="gray">Employee Management Options</font>
        </center>
    </h2>

    <div class="vertical-menu">
        <a href="add_employee.php">Add a new employee</a>
        <a href="search_employees.php?source=edit">Edit employee information</a>
        <a href="search_employees.php?source=delete">Delete an employee</a>
        <a href="search_employees.php?source=search">Search for an employee</a>
    </div>';
    } else {
        include "./authentication.php";
        echo authUser();
    }
    ?>

</body>

</html>