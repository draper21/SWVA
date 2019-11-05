
<?php

$TaskArray = array("Task1", "Task2", "Task3");
$StatusArray = array(true, true, false);

$MultiArray = array("Task1" => "Completed", "Task2" => "Completed", "Task3" => "Not Completed");


$_SESSION['test'] = "Test";


echo "<a href=?id=" . $_SESSION['test'] . ">" . $_SESSION['test'] . "</a>";

?>

<h3>To do list</h3>
<div id = "tasks">
    <ul>
<?php foreach($TaskArray as $item) {

    echo "<a href=><li>" . $item . "</li></a>";
} ?>
</ul>
</div>

<?php 
echo array_search("Completed", $MultiArray, true);
echo "<br>";
echo "<s>" . array_search("Not Completed", $MultiArray, true) . "</s>";
?>



