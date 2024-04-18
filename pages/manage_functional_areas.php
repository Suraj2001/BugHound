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
        echo '    <h2>
        <center>
            <font color="gray">Functional Area Management Options</font>
        </center>
    </h2>

    <div class="vertical-menu">
        <a href="add_functional_area.php" onclick="return check_programs_exist();">Add a new functional area</a>
        <a href="search_functional_areas.php?source=edit">Edit a functional area\'s information</a>
        <a href="search_functional_areas.php?source=delete">Delete a functional area</a>
        <a href="search_functional_areas.php?source=search">Search for a functional area</a>
    </div>';
    } else {
        include "./authentication.php";
        echo authUser();
    }
    ?>



    <script language=Javascript>
        function check_programs_exist() {
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $conn = new mysqli($servername, $username, $password);
            mysqli_select_db($conn, "bughound_db");

            $sql = "SELECT * FROM programs";
            $result = $conn->query($sql);
            $none = 0;
            while ($row = $result->fetch_assoc()) {
                $none = 1;
            }

            if ($none === 0) {
                echo "alert('No programs to add area to.'); return false;";
            }
            ?>
        }
    </script>
</body>

</html>