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
            $servername = "localhost";
            $username = "root";
            $password = "";
            $conn = new mysqli($servername, $username, $password);
            mysqli_select_db($conn, "bughound_db");

            session_start();
            if(isset($_SESSION['user_name']) && isset($_SESSION['user_level'])) {
                $sess_user_level = $_SESSION['user_level'];
                $sess_user_name = $_SESSION['user_name'];
                include "./navigation_bar.php";
                echo nav_bar($sess_user_name, $sess_user_level, "manage_database");
                echo'<h2><center><font color="gray">Add a Functional Area Entry</font></center></h2>';
                echo '
                <form name="add_functional_area_form" action="add_functional_area_post.php" method="post" onsubmit="return validate(this)">
                <table>
                    <tr>
                        <td>Program:</td>
                        <td>
                            <select name="program_id">
                                <option value="default" selected>Select Program</option>';
                               
                                    $sql = "SELECT program_id, program_name, program_release, program_version FROM programs WHERE is_visible = 1";
                                    $result = $conn->query($sql);
                                    while($row=$result->fetch_assoc()) {
                                        $program_id = $row['program_id'];
                                        $program_name = $row['program_name'];
                                        $program_release = $row['program_release'];
                                        $program_version = $row['program_version'];
                                        echo '<option value="'.$program_id.'">'.$program_name.' Rel. '.$program_release.' Ver. '.$program_version.'</option>';
                                    }
                               
                echo'            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Area Name:</td>
                        <td><input type="Text" name="area_name" /></td>
                    </tr>
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
                if(theform.area_name.value === ""){
                    alert ("Area Name field must contain characters");
                    return false;
                }
                return true;
            }
        </script>
    </body>
</html>
