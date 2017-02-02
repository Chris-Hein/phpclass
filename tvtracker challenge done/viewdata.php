<?php
	// Outputs the csv as a table
	echo "<html><body><table>\n\n";
	$fp = fopen("data.csv", "r");
	while (($line = fgetcsv($fp)) !== false) {
    	echo "<tr>";
        	foreach ($line as $cell) {
                echo "<td align:center;>" . htmlspecialchars($cell) . "</td>";
        	}
        	echo "</tr>\n";
		}
		fclose($fp);
		echo "\n</table></body></html>";
?>