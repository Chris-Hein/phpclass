<?php
// PHP Challenge I
// String variables
$title = "Welcome to WEBD3000\n";
$body = "I Love PHP!";

// Sets background color of the page to green
echo "<body bgcolor='#318D04'>";
// Inserts breaks and carriage returns, sets the font size and bolds the first output string
echo nl2br("<font color='#0033CC' font size='24'><b>$title</b></font>\r\n");
// Sets the color and bolds the output string
echo "<font color='#FF0000'><b>$body</b></font>";
// Yes matt I was paying attention when you said leaving out
// the php closing tag was best practice so I did