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
        if($source == 'edit') {
            echo '<font color="gray">Search for Program Information to Edit</font>';
        }
        if($source == 'delete') {
            echo '<font color="gray">Search for Program Information to Delete</font>';
        }
        if($source == 'search') {
            echo '<font color="gray">Search for a Program Information Entry</font>';
        }
        echo "</center></h2>";
        echo   '
        <form name="edit_search_programs_form" action="search_program_post.php?source=<?php echo $source; ?>" method="post" onsubmit="return validate(this)">
            <table>
                <tr>
                    <td>Program Name:</td><td><input type="Text" name="program_name" /></td>
                </tr>
                <tr>
                    <td>Program Release:</td><td><input type="Number" name="program_release" /></td>
                </tr>
                <tr>
                    <td>Program Version:</td><td><input type="Number" name="program_version" /></td>
                </tr>
                <tr>
                    <td>Program Release Date:</td><td><input type="Date" name="program_release_date" /></td>
                </tr>     
            </table>

            <input type="submit" name="search_reports_submit" value="Search"/>
            <input class="button" type="button" onclick="window.location.replace(\'search_program.php?source=<?php echo $source; ?>\')" value="Reset" />
            <input class="button" type="button" onclick="window.location.replace(\'index.php\')" value="Cancel" />
        </form>
        ';
    } else {
        include "./authentication.php";
        echo authUser();
    }
    ?>
  
        <script language=Javascript>
            function validate(theform) {
                var at_least_one_selected = true;
                if(theform.program_name.value.trim() === "") {
                    at_least_one_selected = false;
                }
                if(theform.program_version.value.trim() != "" && at_least_one_selected === false) {
                    at_least_one_selected = true;
                }
                if(theform.program_release.value.trim() != "" && at_least_one_selected === false) {
                    at_least_one_selected = true;
                }
                if(theform.program_release_date.value != "" && at_least_one_selected === false) {
                    at_least_one_selected = true;
                }
                
                if(at_least_one_selected === true) {
                    return true;
                } else {
                    alert ("At least one search term must be selected/filled in.");
                    return false;
                }
            }
        </script>
    </body>
</html>
