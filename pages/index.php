<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Bughound</title>
  <link rel="stylesheet" href="../assets/styles/homepage_style.css">
  <link rel="stylesheet" href="../assets/styles/nav_menu_style.css">
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
    echo nav_bar($sess_user_name, $sess_user_level, "home");
    include "./home_page.php";
    echo homePage();
  } else {
    include "./authentication.php";
    echo authUser();
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