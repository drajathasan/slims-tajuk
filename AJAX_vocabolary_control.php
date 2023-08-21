<?php
use SLiMS\DB;
use SLiMS\Json;

if (isset($_GET['plugin_base'])) {
	require SB . 'admin/default/session_check.inc.php';

	// $localTopic = DB::getInstance()->prepare('select `topic`,`classification` from `mst_topic` where `topic` like ?');
	// $localTopic->execute(['%' . $_POST['keywords'] . '%']);

	$search = new \Hendrowicaksono\TajukOnline\Topik\Search;
	$result = $search->index($_POST['keywords'], $_POST['type']);
	
	exit(Json::stringify($result)->withHeader());
}