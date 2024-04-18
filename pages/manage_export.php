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

<body>
    <?php
    // See if user that logged in is of manager level (user level of 5)
    session_start();
    if (isset($_SESSION['user_name']) && isset($_SESSION['user_level'])) {
        $sess_user_level = $_SESSION['user_level'];
        $sess_user_name = $_SESSION['user_name'];
        include "./navigation_bar.php";
        echo nav_bar($sess_user_name, $sess_user_level, "manage_database");
        echo'
        <h2>
        <center>
            <font color="gray">Export Tables</font>
        </center>
    </h2>
    <div class="vertical-menu">
        <a href="exportbugs_xml_post.php">Export <i>bugs</i> as XML</a>
        <a href="exportprograms_xml_post.php">Export <i>programs</i> as XML</a>
        <a href="exportareas_xml_post.php">Export <i>areas</i> as XML</a>
        <a href="exportemployees_xml_post.php">Export <i>employees</i> as XML</a>
        <a href="exportbugs_text_post.php">Export <i>bugs</i> as ASCII text</a>
        <a href="exportprograms_text_post.php">Export <i>programs</i> as ASCII text</a>
        <a href="exportareas_text_post.php">Export <i>areas</i> as ASCII text</a>
        <a href="exportemployees_text_post.php">Export <i>employees</i> as ASCII text</a>
    </div>';
    } else {
        include "./authentication.php";
        echo authUser();
    }
    ?>

</body>

</html>