<?php
	echo "sql begin <br><b>";
	echo ($application_stats->sql());
	echo "</b><br>sql end";
	pr($application_stats->toArray())
?>