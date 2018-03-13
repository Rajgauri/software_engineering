<?php
include("config.php");
$delid = $_POST['delid'];
$nc = count($delid);
for($i=0;$i<$nc;$i++)
{
    $did = $delid[$i];
    mysql_query("DELETE FROM products WHERE id='$did'");

}
?>
<script>window.location = 'delete_products.php';</script>