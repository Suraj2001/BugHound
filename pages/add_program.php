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
            session_start();
            if(isset($_SESSION['user_name']) && isset($_SESSION['user_level'])) {
                $sess_user_level = $_SESSION['user_level'];
                $sess_user_name = $_SESSION['user_name'];
                include "./navigation_bar.php";
                echo nav_bar($sess_user_name, $sess_user_level, "manage_database");
                echo '<h2><center><font color="gray">Add a Program Entry</font></center></h2>';
                echo'
                <form name="add_program_form" action="add_program_post.php" method="post" onsubmit="return validate(this)">
                <table>
                    <tr><td>Program Name:</td><td><input type="Text" name="program_name" /></td></tr>
                    <tr><td>Program Release:</td><td><input type="Number" name="program_release" /></td></tr>
                    <tr><td>Program Version:</td><td><input type="Number" name="program_version" /></td></tr>
                    <tr><td>Program Release Date:</td><td><input type="Date" name="program_release_date" /></td></tr>     
                </table>
                <input type="submit" name="submit" value="Submit" />
                <input class="button" type="button" onclick="window.location.replace(\'index.php\')" value="Cancel" />
            </form>
                ';
            }else {
                include "./authentication.php";
                echo authUser();
            }
        ?>

        <script language=Javascript>
            function validate(theform) {
                if(theform.program_name.value.trim() === ""){
                    alert ("Program name field must contain characters");
                    return false;
                }
                if(theform.program_release.value.trim() === ""){
                    alert ("Program release field must contain characters");
                    return false;
                }
                if(theform.program_version.value.trim() === ""){
                    alert ("Program version field must contain characters");
                    return false;
                }
                if(theform.program_release_date.value === ""){
                    alert ("Program release date field must contain characters");
                    return false;
                }
                return true;
            }
        </script>
    </body>
</html>