<?php
    // Handles error checking for lack of input
    if (($_POST["txtFirstName"]) == "" || ($_POST["txtLastName"] == "") || ($_POST["txtBirthYear"] == "") || ($_POST["txtCurrentSchoolYear"] == "") || ($_POST["txtBedTime"] == "") || ($_POST["txtWakeupTime"] == "") || ($_POST["txtHomeworkTime"] == "") || ($_POST["txtTVTime"] == "") || ($_POST["txtComputerTime"] == "") || ($_POST["txtFamilyTime"] == "") || ($_POST["txtOutsideTime"] == "")) {
        // Output error message to user if all fields aren't filled out
        echo "Error: All fields must be filled out";
    } else {
        // Handles storage of data from text fields
        $firstName = $_POST["txtFirstName"];
        $lastName = $_POST["txtLastName"];
        $birthYear = $_POST["txtBirthYear"];
        $hoursHomework = $_POST["txtHomeworkTime"];
        $hoursTV = $_POST["txtTVTime"];
        $hoursComputer = $_POST["txtComputerTime"];
        $currentSchoolYear = $_POST["txtCurrentSchoolYear"];
        // assume highschool 8 - 12
        $yearsLeft = (12 - $currentSchoolYear);
        // Number of hours spent in front of screen until graduation
        $hoursScreen = (($hoursHomework + $hoursTV + $hoursComputer) * 365) * $yearsLeft;
        
        
        //echo "All fields are filled out";
        // school year hours: 195 school days
        // use . to concat
        // note to self: alter rollover code to use bootstrap cards to display profile info for users
        echo "Great! Thanks $firstName for responding to our survey<br /><br /><br /><br />";
        echo "Student Details: <br />";
        echo "Name: $firstName $lastName<br />";
        echo "Born: $birthYear<br />";
        echo "Current Year: $currentSchoolYear<br /><br />";
        
        echo "Number of years remaining: $yearsLeft<br />";
        echo "Number of hours that will be spent on homework or in front of a screen: $hoursScreen";
    }
?>