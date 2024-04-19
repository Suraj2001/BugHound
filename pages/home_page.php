<?php
function homePage()
{
  return ('
  <div class="centerflipcards">
    <div class="square-flip">
      <div class="square" data-image="https://images.unsplash.com/photo-1477313372947-d68a7d410e9f?dpr=1&auto=format&crop=entropy&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb">
        <div class="square-container">

          <h2 class="textshadow">Manage Programs</h2>
        </div>
        <div class="flip-overlay"></div>
      </div>
      <div class="square2" data-image="https://images.unsplash.com/photo-1477313372947-d68a7d410e9f?dpr=1&auto=format&crop=entropy&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb">
        <div class="square-container2">
          <div class="align-center"></div>
          <h3>Click here to manage Programs</h3>
          <div class="button-container"> <!-- Container for the button -->
            <a href="manage_programs.php"><button class="custom-button">Click here</button></a>
          </div>
        </div>
        <div class="flip-overlay"></div>
      </div>
    </div>

    <div class="square-flip">
      <div class="square" data-image="http://titanicthemes.com/files/flipbox/kallyas-bundle.png">
        <div class="square-container">
          <h2 class="textshadow">Manage Functional Areas</h2>
        </div>
        <div class="flip-overlay"></div>
      </div>
      <div class="square2" data-image="http://titanicthemes.com/files/flipbox/kallyas-bundle.png">
        <div class="square-container2">
          <div class="align-center"></div>
          <h3>Click here to manage Functional Areas</h3>
          <div class="button-container"> <!-- Container for the button -->
            <a href="manage_functional_areas.php"><button class="custom-button">Click here</button></a>
          </div>
        </div>
        <div class="flip-overlay"></div>
      </div>
    </div>

    <div class="square-flip">
      <div class="square" data-image="https://instagram.fotp3-2.fna.fbcdn.net/t51.2885-15/e35/14712096_386502691740262_2357154798815412224_n.jpg?ig_cache_key=MTM2NzU2MzUwNjQ3OTUzOTgxNQ%3D%3D.2">
        <div class="square-container">

          <h2 class="textshadow">Manage Employees</h2>
        </div>
        <div class="flip-overlay"></div>
      </div>
      <div class="square2" data-image="http://titanicthemes.com/files/flipbox/kallyas-wedding.jpg">
        <div class="square-container2">
          <div class="align-center"></div>
          <h3>Click here to manage Employees</h3>
          <div class="button-container"> <!-- Container for the button -->
            <a href="manage_employees.php"><button class="custom-button">Click here</button></a>
          </div>
        </div>
        <div class="flip-overlay"></div>
      </div>
    </div>

    <div class="square-flip">
    <div class="square" data-image="https://instagram.fotp3-2.fna.fbcdn.net/t51.2885-15/e35/14712096_386502691740262_2357154798815412224_n.jpg?ig_cache_key=MTM2NzU2MzUwNjQ3OTUzOTgxNQ%3D%3D.2">
      <div class="square-container">

        <h2 class="textshadow">Export Data</h2>
      </div>
      <div class="flip-overlay"></div>
    </div>
    <div class="square2" data-image="http://titanicthemes.com/files/flipbox/kallyas-wedding.jpg">
      <div class="square-container2">
        <div class="align-center"></div>
        <h3>Click here to manage Employees</h3>
        <div class="button-container"> <!-- Container for the button -->
          <a href="manage_export.php"><button class="custom-button">Click here</button></a>
        </div>
      </div>
      <div class="flip-overlay"></div>
    </div>
  </div>
  </div>
    ');
}
