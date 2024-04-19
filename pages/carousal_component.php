<?php 
  function createCarousal() {
    return '
    <h2><center><font color="gray">Bughound Bug Tracking Software</font></center></h2>
    <div style="display: flex; justify-content: center;">
    <div class="carousel">
        <div class="carousel-images">
            <img src="../assets/images/bug.jpg" alt="Slide 1">
            <img src="../assets/images/bug-tracking-software.jpg" alt="Slide 2">
            <img src="../assets/images/bud-tracking.png" alt="Slide 3">
        </div>
            <button class="prev">&#10094;</button>
            <button class="next">&#10095;</button>
            <div class="carousel-indicators"></div>
        </div>
    </div>
    ';
  }
?>
