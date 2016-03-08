<?php

require_once __DIR__.'/../../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/', function () use ($app) {
	$data = getFile();
    $data = generateJSON();
    return $app->json($data) ;
});

function generateJSON (){
	return ['data' => [
		['name'=>'beer', 'count' => 0],
		['name'=>'licornes', 'count' => 0],
		['name'=>'nunu', 'count' => 0],
		['name'=>'jacqueline', 'count' => 0],
		['name'=>'trucs', 'count' => 0],
		['name'=>'schnaps', 'count' => 0],
		['name'=>'Arsenic', 'count' => 0],
		['name'=>'cigüe', 'count' => 0],
	]];
}

function getFile() {
	$path = './../../data/counter.json';
	if (file_exists($path)){
		$counter = file_get_contents($path);
		return $counter;
	} else {
		$data = generateJSON();
		file_put_contents($path, json_encode($data));
		return $data;
	}
}

$app->run();
