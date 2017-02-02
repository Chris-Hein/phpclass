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
		$familyTime = $_POST["txtFamilyTime"];
		$outsideTime = $_POST["txtOutsideTime"];
        $currentSchoolYear = $_POST["txtCurrentSchoolYear"];
		$asleepTime = $_POST["txtBedTime"];
		$awakeTime = $_POST["txtWakeupTime"];
		// returns the number of hours awake in a day by subtracting the amount of time asleep from 24 hours
		// to get the number of waking hours in a day
		$timeAwakeEachDay = 24 - ($asleepTime + $awakeTime);
        // assume highschool 8 - 12
		// gets the number of years remaining in school
        $yearsLeft = (12 - $currentSchoolYear);
		// Number of hours spent in front of screen until graduation
		// based on 195 day school year
		// gets the hours spent in front of a screen
		$hoursScreen = (($hoursHomework + $hoursTV + $hoursComputer) * 195) * $yearsLeft;
		// based on a standard 365 day year
        //$hoursScreen = (($hoursHomework + $hoursTV + $hoursComputer) * 365) * $yearsLeft;
		//$percentageScreen = (($hoursTV + $hoursComputer) / 24) * 100;
		// gets the percentage of the users daily time awake that is spent in front of a screen
        $percentageScreen = (($hoursTV + $hoursComputer) / $timeAwakeEachDay) * 100;
        
        //echo "All fields are filled out";
        // school year hours: 195 school days
        // Outputs basic info for display
        echo "Great! Thanks $firstName for responding to our survey<br /><br /><br /><br />";
        echo "Student Details: <br />";
        echo "Name: $firstName $lastName<br />";
        echo "Born: $birthYear<br />";
        echo "Current Year: $currentSchoolYear<br /><br />";
        echo "Number of years remaining: $yearsLeft<br />";
        echo "Number of hours that will be spent on homework or in front of a screen: $hoursScreen<br />";
		echo "Percentage of each day spent in front of a screen: $percentageScreen<br />";
		
		// Outputs the data to a cvs file
		//$csvData = "\"First Name: $firstName\",\"Last Name: $lastName\",\"Birth Year: $birthYear\",\"Hours of Homework: $hoursHomework\",\"Hours using TV and consoles: $hoursTV\",\"Hours using computer: $hoursComputer\",\"Hours with family: $familyTime\",\"Hours outside: $outsideTime\",\"Current School Year: $currentSchoolYear\",\"Time student goes to sleep: $asleepTime\",\"Time student wakes up: $awakeTime\",\"Time awake each day: $timeAwakeEachDay\",\"Years left in school: $yearsLeft\",\"Hours spent in front of a screen: $hoursScreen\",\"Percentage of each day spent in front of a screen: $percentageScreen\"".PHP_EOL;
		
		// Sets up an array to hold the gathered data for writing to the csv file
		$list = array(
		"First Name: $firstName", 
		"Last Name: $lastName",
		"Birth Year: $birthYear",
		"Hours of Homework: $hoursHomework",
		"Hours using TV and consoles: $hoursTV",
		"Hours using computer: $hoursComputer",
		"Hours with family: $familyTime",
		"Hours outside: $outsideTime",
		"Current School Year: $currentSchoolYear",
		"Time student goes to sleep: $asleepTime",
		"Time student wakes up: $awakeTime",
		"Time awake each day: $timeAwakeEachDay",
		"Years left in school: $yearsLeft",
		"Hours spent in front of a screen: $hoursScreen",
		"Percentage of awake time each day spent in front of a screen: $percentageScreen",
		"",
		);
		
		// Writes the data to the csv file and generates the file if it doesn't already exist
		$fp = fopen("data.csv", "a+");
		/*if ($fp) {
			//fwrite($fp,$csvData);
			fputcsv($fp,$csvData);
			fclose("data.csv");
		}*/
		foreach ($list as $line) {
			fputcsv($fp,explode(',',$line));
		}
		fclose("data.csv");
		
		
		// Outputs the csv as a table
		/*echo "<html><body><table>\n\n";
		$fp1 = fopen("data.csv", "r");
		while (($line = fgetcsv($fp1)) !== false) {
        	echo "<tr>";
        	foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
        	}
        	echo "</tr>\n";
		}
		fclose($fp1);
		echo "\n</table></body></html>";*/
		
		//$filelink = "data.csv";
		// Allows user to view the csv file via the link
		//echo "<a href=\"$filelink\">Click here to view data</a>";
		echo "<a href=\"viewdata.php\">Click here to view data</a>";
		
		
		
		
    }
?>