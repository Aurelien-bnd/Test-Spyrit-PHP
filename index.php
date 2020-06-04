<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title> GitHub Events </title>
    <?php include_once "API.php"; ?>
</head>
<body>
    <h1>Github Events</h1>
    <?php
    echo "<ul>";
        for ($i=0; $i < 13;$i += 1) {
            echo '<li>';
            echo $type[$i], ' on ', $name[$i], ' by ';
            echo '<img id = avatar src="', $avatar[$i], '" height = 75px>';
            echo ' on ', '(', $date[$i], ')';
            echo '</li>';
            echo '<br>';
        }
    echo "</ul>";
    ?>
</body>
</html>