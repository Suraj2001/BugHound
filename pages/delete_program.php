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
        <!-- ADD YOUR DB INFO HERE -->
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $conn = new mysqli($servername, $username, $password);
            mysqli_select_db($conn, "bughound_db");

            $program_id = $_GET['program_id'];
            
            /*
            $query = " UPDATE programs SET is_visible = 0 WHERE program_id = '".$program_id."' ";
            //echo $query;
            mysqli_query($conn, $query);
            */
            
            $stmt = $conn->prepare("UPDATE programs SET is_visible = 0 WHERE program_id = ?");
            $stmt->bind_param("i", $program_id);
            $stmt->execute();

            $stmt->close();
            $conn->close();
            
            header("Location: manage_programs.php");
            exit;
        ?>
    </body>
</html>

