<?php
function homePage()
{
  return '
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
          <h3>#1 Front-end Visual Website Builder in 2016</h3>
          <div class="button-container"> <!-- Container for the button -->
            <a href="manage_programs.php"><button class="custom-button">Learn More</button></a>
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
          <h3>The only theme you\'ll ever need. No codding skills needed.</h3>
          <div class="button-container"> <!-- Container for the button -->
            <a href="manage_functional_areas.php"><button class="custom-button">Learn More</button></a>
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
          <h3>The only theme you\'ll ever need. No codding skills needed.</h3>
          <div class="button-container"> <!-- Container for the button -->
            <a href="manage_employees.php"><button class="custom-button">Learn More</button></a>
          </div>
        </div>
        <div class="flip-overlay"></div>
      </div>
    </div>
  </div>

    ';
}
//   <div class="bug-tracking">
//   <div class="table-container">
//     <table>
//       <tr class="table--header">
//         <th style="font-size: 28px; width: 500px">Incoming</th>
//         <th>Bug Status</th>
//         <th>Priority</th>
//         <th>Effort</th>
//         <th>Developer</th>
//       </tr>
//       <tr class="table--row">
//         <td><img src="avatar1.png" alt="Avatar"></td>
//         <td><span class="stuck">Stuck</span></td>
//         <td><span class="critical">Critical</span></td>
//         <td>&#9733;&#9733;&#9733;&#9733;&#9733;</td>
//         <td><img src="avatar2.png" alt="Avatar"></td>
//       </tr>
//       <tr class="table--row">
//         <td><img src="avatar4.png" alt="Avatar"></td>
//         <td><span class="working">Working on it</span></td>
//         <td><span class="critical">Critical</span></td>
//         <td>&#9733;&#9733;&#9733;&#9733;</td>
//         <td><img src="avatar5.png" alt="Avatar"></td>
//       </tr>
//       <tr class="table--row">
//         <td><img src="avatar6.png" alt="Avatar"></td>
//         <td><span class="fixed">Closed - Fixed</span></td>
//         <td><span class="high">High</span></td>
//         <td>&#9733;&#9733;&#9733;</td>
//         <td><img src="avatar7.png" alt="Avatar"></td>
//       </tr>
//     </table>
//   </div>
//   <div class="table-container">
//     <table>
//       <tr class="table--header">
//         <th style="font-size: 28px; width: 500px">Resolved</th>
//         <th>Bug Status</th>
//         <th>Priority</th>
//         <th>Effort</th>
//         <th>Developer</th>
//       </tr>
//       <tr class="table--row">
//         <td><img src="avatar8.png" alt="Avatar"></td>
//         <td><span class="open">Open</span></td>
//         <td><span class="low">Low</span></td>
//         <td>&#9733;&#9733;&#9733;&#9733;&#9733;</td>
//         <td><img src="avatar9.png" alt="Avatar"></td>
//       </tr>
//       <tr class="table--row">
//         <td><img src="avatar10.png" alt="Avatar"></td>
//         <td><span class="open">Open</span></td>
//         <td><span class="critical">Critical</span></td>
//         <td>&#9733;&#9733;&#9733;&#9733;</td>
//         <td><img src="avatar5.png" alt="Avatar"></td>
//       </tr>
//       <tr class="table--row">
//         <td><img src="avatar5.png" alt="Avatar"></td>
//         <td><span class="working">Working on it</span></td>
//         <td><span class="high">High</span></td>
//         <td>&#9733;&#9733;&#9733;&#9733;</td>
//         <td><img src="avatar11.png" alt="Avatar"></td>
//       </tr>
//       <tr class="table--row">
//         <td><img src="avatar13.png" alt="Avatar"></td>
//         <td><span class="fixed">Closed - Fixed</span></td>
//         <td><span class="medium">Medium</span></td>
//         <td>&#9733;&#9733;&#9733;&#9733;&#9733;</td>
//         <td><img src="avatar14.png" alt="Avatar"></td>
//       </tr>
//     </table>
//   </div>
// </div>
