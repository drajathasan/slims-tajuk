<?php
use SLiMS\Json;

if (isset($_GET['plugin_base'])) {
	require SB . 'admin/default/session_check.inc.php';
	$search = new \Hendrowicaksono\TajukOnline\Topik\Search;
	$result = $search->index($_POST['keywords'], $_POST['type']);
	exit(Json::stringify($result)->withHeader());
}