<h2>
        <center>
            <?php
            $source = $_GET['source'];
            if ($source == 'edit') {
                echo '<font color="gray">Search for an Employee to Edit Entry</font>';
            }
            if ($source == 'delete') {
                echo '<font color="gray">Search for an Employee to Delete Entry</font>';
            }
            if ($source == 'search') {
                echo '<font color="gray">Search for an Employee Entry</font>';
            }
            ?>
        </center>
    </h2>

    <form name="search_employees_form" action="search_employees_post.php?source=<?php echo $source; ?>" method="post" onsubmit="return validate(this)">
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="Text" name="first_name" /></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="Text" name="last_name" /></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="Text" name="user_name" /></td>
            </tr>
            <tr>
                <td>Position:</td>
                <td>
                    <select name="position">
                        <option value="">Select Position</option>
                        <option value="programmer">Programmer</option>
                        <option value="designer">Designer</option>
                        <option value="tester">Tester</option>
                        <option value="manager">Manager</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Group Number</td>
                <td><input type="Text" name="group_num"></td>
            </tr>
            <tr>
                <td>Is a reporter?</td>
                <td><input type="checkbox" name="is_reporter" value="True" /></td>
            </tr>
            <tr>
                <td>User Level:</td>
                <td><input type="Number" name="user_level" /></td>
            </tr>
        </table>

        <input type="submit" name="search_reports_submit" value="Search" />
        <input class="button" type="button" onclick="window.location.replace('search_employees.php?source=<?php echo $source; ?>')" value="Reset" />
        <input class="button" type="button" onclick="window.location.replace('index.php')" value="Cancel" />
    </form>


    <h2>
        <center>
            <?php
            $source = $_GET['source'];
            if ($source == 'edit') {
                echo '<font color="gray">Search for a Functional Area to Edit Entry</font>';
            }
            if ($source == 'delete') {
                echo '<font color="gray">Search for a Functional Area to Delete Entry</font>';
            }
            if ($source == 'search') {
                echo '<font color="gray">Search for a Functional Area Entry</font>';
            }
            ?>
        </center>
    </h2>

    <form name="search_functional_areas_form" action="search_functional_areas_post.php?source=<?php echo $source; ?>" method="post" onsubmit="return validate(this)">
        <table>
            <tr>
                <td>Program Name:</td>
                <td><input type="Text" name="program_name" /></td>
            </tr>
            <tr>
                <td>Area Name:</td>
                <td><input type="Text" name="area_name" /></td>
            </tr>
        </table>

        <input type="submit" name="search_reports_submit" value="Search" />
        <input class="button" type="button" onclick="window.location.replace('search_functional_areas.php?source=<?php echo $source; ?>')" value="Reset" />
        <input class="button" type="button" onclick="window.location.replace('index.php')" value="Cancel" />
    </form>

    <script language=Javascript>
        function validate(theform) {
            var at_least_one_selected = true;
            if (theform.program_name.value.trim() === "") {
                var at_least_one_selected = false;
            }
            if (theform.area_name.value.trim() != "" && at_least_one_selected === false) {
                at_least_one_selected = true;
            }

            if (at_least_one_selected === true) {
                return true;
            } else {
                alert("At least one search term must be selected/filled in.");
                return false;
            }
        }
    </script>

        /* Search Program*/
        <h2>
            <center>
                <?php
                    $source = $_GET['source'];
                    if($source == 'edit') {
                        echo '<font color="gray">Search for Program Information to Edit</font>';
                    }
                    if($source == 'delete') {
                        echo '<font color="gray">Search for Program Information to Delete</font>';
                    }
                    if($source == 'search') {
                        echo '<font color="gray">Search for a Program Information Entry</font>';
                    }
                ?>
            </center>
        </h2>

        <form name="edit_search_programs_form" action="search_program_post.php?source=<?php echo $source; ?>" method="post" onsubmit="return validate(this)">
            <table>
                <tr>
                    <td>Program Name:</td><td><input type="Text" name="program_name" /></td>
                </tr>
                <tr>
                    <td>Program Release:</td><td><input type="Number" name="program_release" /></td>
                </tr>
                <tr>
                    <td>Program Version:</td><td><input type="Number" name="program_version" /></td>
                </tr>
                <tr>
                    <td>Program Release Date:</td><td><input type="Date" name="program_release_date" /></td>
                </tr>     
            </table>

            <input type="submit" name="search_reports_submit" value="Search"/>
            <input class="button" type="button" onclick="window.location.replace('search_program.php?source=<?php echo $source; ?>')" value="Reset" />
            <input class="button" type="button" onclick="window.location.replace('index.php')" value="Cancel" />
        </form>
     