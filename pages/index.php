<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Bughound</title>
  <link rel="stylesheet" href="../assets/styles/homepage_style.css">
  <link rel="stylesheet" href="../assets/styles/nav_menu_style.css">
  <link rel="stylesheet" href="../assets/styles/table_styles.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $conn = new mysqli($servername, $username, $password);
  mysqli_select_db($conn, "bughound_db");

  // See if user that logged in is of manager level (user level of 5)
  session_start();
  if (isset($_SESSION['user_name']) && isset($_SESSION['user_level'])) {
    $sess_user_level = $_SESSION['user_level'];
    $sess_user_name = $_SESSION['user_name'];
    include "./navigation_bar.php";
    echo nav_bar($sess_user_name, $sess_user_level, "home");
    if ($sess_user_level == 3) {
      include "./home_page.php";
      echo homePage();
    }else{
      include "./carousal_component.php";
      echo createCarousal();
    }
  } else {
    include "./authentication.php";
    echo authUser();
  }
  ?>
  <?php
  if (isset($_SESSION['user_name']) && isset($_SESSION['user_level']) && $_SESSION['user_level'] == 3) {
    $sql = "SELECT b.*, p.program_name, a.area_name FROM bugs AS b 
          LEFT JOIN programs AS p ON b.program_id = p.program_id 
          LEFT JOIN areas AS a ON b.area_id = a.area_id";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
      echo '<div class="bug-tracking">
            <div class="table-container">';
      echo '<table>
              <tr class="table--header">
                <th style="font-size: 28px; width: 500px">Incoming</th>
                <th>Report Type</th>
                <th>Severity</th>
                <th>Date</th>
                <th>Reported By</th>
              </tr>';
      while ($row = $result->fetch_assoc()  ) {
        if($row['severity'] == 1) {
          $severity = "Minor";
        } else if($row['severity'] == 2) {
          $severity = "Serious";
        } else if($row['severity'] == 3) {
          $severity = "Fatal";
        } else {
          $severity = "NA";
        }
        $sqlQuery = "SELECT * FROM employees WHERE employee_id = ". $row['reported_by']."";
        $employeeData = $conn->query($sqlQuery)->fetch_assoc();

        echo "<tr class='table--row'>
                    <td>" . $row['program_name'] . "</td>
                    <td>" . $row['report_type'] . "</td>
                    <td><span class=". $severity .">" . $severity. "</span></td>
                    <td>" . $row['date_discovered'] . "</td>
                    <td>" . $employeeData['first_name']. " ". $employeeData['last_name']."</td>
                    </tr>";
      }
      echo "</table>";
      echo "</div></div>";
    }
  }
  ?>

  <script>
    jQuery(document).ready(function($) {
      //Count nr. of square classes
      var countSquare = $(".square").length;

      //For each Square found add BG image
      for (i = 0; i < countSquare; i++) {
        var firstImage = $(".square").eq([i]);
        var secondImage = $(".square2").eq([i]);

        var getImage = firstImage.attr("data-image");
        var getImage2 = secondImage.attr("data-image");

        firstImage.css("background-image", "url(" + getImage + ")");
        secondImage.css("background-image", "url(" + getImage2 + ")");
      }
    });
  </script>
  <script src="create_carousal.js"></script>
</body>

</html>