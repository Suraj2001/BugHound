<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bughound</title>
        <link rel="stylesheet" href="../assets/styles/nav_menu_style.css">
        <link rel="stylesheet" href="../assets/styles/form_style.css">
        <link rel="stylesheet" href="../assets/styles/table_style.css">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    </head>
    <body>
        <!-- ADD YOUR DB INFO HERE -->
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $conn = new mysqli($servername, $username, $password);
            mysqli_select_db($conn, "bughound_db");
        ?>

        <?php
            session_start();
            if(isset($_SESSION['user_name']) && isset($_SESSION['user_level'])) {
                $user_level = $_SESSION['user_level'];
                $user_name = $_SESSION['user_name'];
                include "./navigation_bar.php";
                echo nav_bar($user_name, $user_level, "manage_database");
            }else {
                include "./authentication.php";
                echo authUser();
            }
        ?>
        <center>
        <h2>
            <?php
                $source = $_GET['source'];
                if($source == 'edit') {
                    echo "<h2>Results for Functional Areas to Edit\n</h2><h3>Click on functional area ID number to edit.</h3>";
                }
                if($source == 'delete') {
                    echo "<h2>Results for Functional Areas to Delete\n</h2><h3>Click on functional area ID number to delete.</h3>";
                }
                if($source == 'search') {
                    echo "<h2>Results for Functional Areas Search\n</h2>";
                }
                if($source == 'searchProgram') {
                    echo "<h2>Areas under the selected Program\n</h2>";
                }

                $area_name = $_POST['area_name'];
                $program_name = $_POST['program_name'];

                
                $sql = "";
                if($source == 'searchProgram' && $program_name !== "") {
                    // First get the program ID
                    $program_sql = "SELECT program_id FROM programs WHERE program_name = '".$program_name."'";
                    $program_result = $conn->query($program_sql);
                    if($program_row = $program_result->fetch_assoc()) {
                        $program_id = $program_row['program_id'];
                        // Now get all areas under this program ID
                        $sql .= "SELECT A.area_id, A.area_name, P.program_name, P.program_release, P.program_version FROM areas as A JOIN programs as P ON A.program_id = P.program_id WHERE A.program_id = ".$program_id." AND A.is_visible = 1";
                    }
                }else{
                    if($area_name != "" && $program_name === "") {
                        $sql .= "SELECT A.area_id, A.area_name, P.program_name, P.program_release, P.program_version FROM areas as A, programs as P WHERE A.area_name = '".$area_name."' AND A.program_id = P.program_id AND A.is_visible = 1";
                        $previous_selection_exists = true;
                    } else if($area_name === "" && $program_name != "") {
                        $sql .= "SELECT A.area_id, A.area_name, P.program_name, P.program_release, P.program_version FROM areas as A, programs as P WHERE P.program_name = '".$program_name."' AND A.program_id = P.program_id AND A.is_visible = 1";
                    } else if($area_name != "" && $program_name != "") {
                        $sql = "SELECT A.area_id, A.area_name, P.program_name, P.program_release, P.program_version FROM areas as A, programs as P WHERE A.area_name = '".$area_name."' AND P.program_name = '".$program_name."' AND A.program_id = P.program_id AND A.is_visible = 1";
                    }
                }
                
                echo"<div class='table-container'>";    
                if (!empty($sql)) {
                    $result = $conn->query($sql);
                    echo "<table border=1><th>Area ID</th><th>Area Name</th><th>Program Name</th><th>Release</th><th>Version</th>\n";
                    while($row = mysqli_fetch_row($result)) {
                        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>\n";
                    }
                    echo "</table>";
                } else {
                    echo "<h3>No matching records found or missing program name.</h3>\n";
                }
                echo "</div>";
                $conn->close();
            ?>
        </h2>
            </center>
        <script type="text/javascript">
            function confirm_delete(area_id) {
                var str = "Are you sure you want to delete functional area ".concat(area_id, "?");
                return confirm(str);
            }
        </script>
    </body>
</html>
