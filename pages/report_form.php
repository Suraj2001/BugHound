<?php function createForm($conn) { ?>
    <form name="new_report_form" action="create_report_post.php" method="post" onsubmit="return validate(this)" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Program:</td>
                <td>
                    <select name="program_id" id="programs" onchange="updateAreas()">
                        <option value="default" selected>Select Program</option>
                        <!-- Get all program info from DB here -->
                        <?php
                        $sql = "SELECT program_id, program_name, program_release, program_version FROM programs WHERE is_visible = 1";
                        $result = $conn->query($sql);

                        $programs_array = [];
                        $count = 0;
                        class Program
                        {
                            public $pID = 0;
                            public $pName = "";
                            public $pAreas = [];
                        }

                        while ($row = $result->fetch_assoc()) {
                            $program_id = $row['program_id'];
                            $program_name = $row['program_name'];
                            $program_release = $row['program_release'];
                            $program_version = $row['program_version'];
                            echo '<option value="' . $program_id . '">' . $program_name . ' Rel. ' . $program_release . ' Ver. ' . $program_version . '</option>';

                            $program = new Program();
                            $program->pID = $program_id;
                            $program->pName = $program_name;
                            $programs_array[$count++] = $program;
                        }
                        ?>
                    </select>
                </td>
                <td>Report Type:</td>
                <td>
                    <select name="report_type">
                        <option value="default" selected>Select Report Type</option>
                        <option value="code_error">Coding Error</option>
                        <option value="design_issue">Design Issue</option>
                        <option value="suggestion">Suggestion</option>
                        <option value="documention">Documentation</option>
                        <option value="hardware">Hardware</option>
                        <option value="query">Query</option>
                    </select>
                </td>
                <td>Severity:</td>
                <td>
                    <select name="severity">
                        <option value="default" selected>Select Severity Level</option>
                        <option value="1">Minor</option>
                        <option value="2">Serious</option>
                        <option value="3">Fatal</option>
                    </select>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>Problem Summary:</td>
                <td><input type="Text" name="summary" size="60"></td>
                <td>Reproducible?</td>
                <td><input type="checkbox" name="reproducible" value="checked"></td>
            </tr>
            <tr>
                <td>Problem Description:</td>
                <td>
                    <textarea name="problem_description" rows="5" cols="50" placeholder="Explain why bug is a problem. Describe all steps and symptoms including error messages. Be careful to describe how to reproduce the problem. Even if you can’t reproduce it, describe all the steps taken to do so."></textarea>
                </td>
            </tr>
            <tr>
                <td>Suggested Fix:</td>
                <td><textarea name="suggested_fix" rows="5" cols="50" placeholder="(OPTIONAL)"></textarea></td>
            </tr>
        </table>
        <table>
            <tr>
                <td>Reported By:</td>
                <td>
                    <select name="reported_by">
                        <option value="default" selected>Select Reporter</option>
                        <?php
                        $sql = "SELECT employee_id, CONCAT(first_name, ' ', last_name) as employee_name FROM employees WHERE is_visible = 1";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            $employee_id = $row['employee_id'];
                            $employee_name = $row['employee_name'];
                            echo '<option value="' . $employee_id . '">' . $employee_name . '</option>';
                        }
                        ?>
                    </select>
                </td>
                <td>Date Discovered:</td>
                <td><input type="date" name="date_discovered"></td>
            </tr>
        </table>

        <hr>

        <table>
            <tr>
                <td>Functional Area:</td>
                <td>
                    <select name="area_id" id="areas">
                        <option value="default" selected>Select Area</option>
                        <?php
                        $sql = "SELECT area_id, area_name, program_id FROM areas WHERE is_visible = 1";
                        $result = $conn->query($sql);

                        class Area
                        {
                            public $aID = 0;
                            public $aName = "";
                        }

                        $length = count($programs_array);
                        while ($row = $result->fetch_assoc()) {
                            $area_id = $row['area_id'];
                            $area_name = $row['area_name'];
                            $program_id = $row['program_id'];
                            //echo '<option data-program="'.$program_id.'" value="'.$area_id.'">'.$area_name.'</option>';


                            for ($i = 0; $i < $length; $i++) {
                                $program = $programs_array[$i];
                                if ($program->pID === $program_id) {
                                    //$program->pAreas[] = $area_name;
                                    $area = new Area();
                                    $area->aID = $area_id;
                                    $area->aName = $area_name;
                                    $program->pAreas[] = $area;
                                }
                            }
                        }
                        ?>
                    </select>
                </td>
                <td>Assigned To:</td>
                <td>
                    <select name="assigned_to">
                        <option value="default" selected>Select Assignee</option>
                        <?php
                        $sql = "SELECT employee_id, CONCAT(first_name, ' ', last_name) as employee_name FROM employees WHERE is_visible = 1";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            $employee_id = $row['employee_id'];
                            $employee_name = $row['employee_name'];
                            echo '<option value="' . $employee_id . '">' . $employee_name . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>Status:</td>
                <td>
                    <select name="status">
                        <option value="default" selected>Select Status</option>
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                        <option value="resolved">Resolved</option>
                    </select>
                </td>
                <td>Priority:</td>
                <td>
                    <select name="priority">
                        <option value="default" selected>Select Priority</option>
                        <option value="1">1. Fix immediately</option>
                        <option value="2">2. Fix as soon as possible</option>
                        <option value="3">3. Fix before next milestone</option>
                        <option value="4">4. Fix before release</option>
                        <option value="5">5. Fix if possible</option>
                        <option value="6">6. Optional</option>
                    </select>
                </td>
                <td>Resolution:</td>
                <td>
                    <select name="resolution">
                        <option value="default" selected>Select Resolution</option>
                        <option value="pending">Pending</option>
                        <option value="fixed">Fixed</option>
                        <option value="irreproducible">Irreproducible</option>
                        <option value="deferred">Deferred</option>
                        <option value="as_designed">As Designed</option>
                        <option value="withdrawn">Withdrawn By Reporter</option>
                        <option value="more_info">Need More Information</option>
                        <option value="disagreement">Disagree With Suggestion</option>
                        <option value="duplicate">Duplicate</option>
                    </select>
                </td>
                <td>Resolution Version:</td>
                <td><input type="Text" name="resolution_version" size="15"></td>
            </tr>
        </table>
        <table>
            <tr>
                <td>Resolved By:</td>
                <td>
                    <select name="resolved_by">
                        <option value="default" selected>Select Resolver</option>
                        <?php
                        $sql = "SELECT employee_id, CONCAT(first_name, ' ', last_name) as employee_name FROM employees WHERE is_visible = 1";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            $employee_id = $row['employee_id'];
                            $employee_name = $row['employee_name'];
                            echo '<option value="' . $employee_id . '">' . $employee_name . '</option>';
                        }
                        ?>
                    </select>
                </td>
                <td>Date Resolved:</td>
                <td><input type="date" name="date_resolved"></td>
                <td>Tested By:</td>
                <td>
                    <select name="tested_by">
                        <option value="default" selected>Select Tester</option>
                        <?php
                        $sql = "SELECT employee_id, CONCAT(first_name, ' ', last_name) as employee_name FROM employees WHERE is_visible = 1";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            $employee_id = $row['employee_id'];
                            $employee_name = $row['employee_name'];
                            echo '<option value="' . $employee_id . '">' . $employee_name . '</option>';
                        }
                        ?>
                    </select>
                </td>
                <td>Date Tested:</td>
                <td><input type="date" name="date_tested"></td>
                <td>Treat as deferred?</td>
                <td><input type="checkbox" name="treat_deferred" value="checked"></td>
            </tr>
        </table>
        <?php
        $conn->close();
        ?>

        <hr>

        <table>
            <tr>
                <td>Additional Comments:</td>
                <td><textarea name="comments" rows="5" cols="50" placeholder="Add any extra information that may be relevant."></textarea></td>
            </tr>
            <tr>
                <td>Attachments:</td>
                <td><input type="file" name="attachments" id="attachments"></td>
            </tr>
        </table>

        <input type="submit" name="submit_new_report" value="Submit">
        <input class="button" type="button" onclick="window.location.replace('create_report.php')" value="Reset" />
        <input class="button" type="button" onclick="window.location.replace('index.php')" value="Cancel" />
    </form>
<?php } ?>
