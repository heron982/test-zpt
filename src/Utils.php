<?php

use DatabaseInterface\DatabaseInterface;

require_once './User.php';

function setDb(DatabaseInterface $obj, $db) {
	$obj->setDb($db);
}

?>