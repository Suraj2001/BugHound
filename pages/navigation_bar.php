<?php
function nav_bar($sess_user_name, $sess_user_level, $selected_tab)
{
    if (isset($sess_user_name) && isset($sess_user_level)) {
        echo '<ul>
            <li><a class="' . ($selected_tab == "home" ? "active" : "") . '" href="index.php">Home</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn, ' . ($selected_tab == "bug_report" ? "active" : "") . '">Bug Report</a>
                <div class="dropdown-content">
                    <a href="create_report.php">Create</a>';
        if ($sess_user_level >= 2) {
            echo'<a href="search_reports.php?source=update">Update</a>
                    <a href="search_reports.php?source=search">Search</a>';
        }
        echo'</div>
            </li>';
        if ($sess_user_level == 4) {
            echo '<li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn, ' . ($selected_tab == "manage_database" ? "active" : "") . '">Manage Database</a>
                <div class="dropdown-content">
                    <a href="manage_programs.php">Programs</a>
                    <a href="manage_functional_areas.php">Functional Areas</a>
                    <a href="manage_employees.php">Employees</a>
                    <a href="manage_export.php">Exports</a>
                </div>
            </li>';
        }
        echo '<li style="float:right"><a href="logout.php">Logout</a></li>';
        echo '<li style="float:right" class="disabled"><a>Welcome, ' . $sess_user_name . '</a></li>';
        echo '</ul>';
    }
}
