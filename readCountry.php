<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT DISTINCT subjects FROM subjects WHERE subjects like '" . $_POST["keyword"] . "%' ORDER BY subjects LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["subjects"]; ?>');"><?php echo $country["subjects"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>