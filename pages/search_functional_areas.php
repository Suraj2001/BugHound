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
            echo '<font color="gray">Search for a Functional Area to Edit Entry</font>';
        }
        if ($source == 'delete') {
            echo '<font color="gray">Search for a Functional Area to Delete Entry</font>';
        }
        if ($source == 'search') {
            echo '<font color="gray">Search for a Functional Area Entry</font>';
        }
        echo "</center></h2>";
    } else {
        include "./authentication.php";
        echo authUser();
    }
    ?>
    <form name="search_functional_areas_form" action="search_functional_areas_post.php?source=<?php echo $source; ?>" method="post" onsubmit="return validate(this)">
            <table>
                <tr>
                    <td>Program Name:</td><td><input type="Text" name="program_name" /></td>
                </tr>
                <tr>
                    <td>Area Name:</td><td><input type="Text" name="area_name" /></td>
                </tr>
            </table>

            <input type="submit" name="search_reports_submit" value="Search"/>
            <input class="button" type="button" onclick="window.location.replace('search_functional_areas.php?source=<?php echo $source; ?>')" value="Reset" />
            <input class="button" type="button" onclick="window.location.replace('index.php')" value="Cancel" />
        </form>
    </script>
</body>

</html>