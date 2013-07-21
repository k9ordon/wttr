<? 

function fakeDay($addDays = 0, $timestamp = false) {
	global $config;

	$ts = $timestamp ? $timestamp : strtotime(sprintf('+ %s days 0:00', $addDays));
	return array(
		'time' => $ts,
		'type' => $config['weatherTypes'][array_rand($config['weatherTypes'])],
		'icon' => $icons[array_rand($icons)],
		'temp' => rand(10,30),
		'min' => rand(10,20),
		'max' => rand(20,30),
		'rain' => rand(0,20),
		'detail' => fakeDayHours($ts, 3, 7)
	);
}

function fakeDayHours($start = 0, $intervall = 3, $limit = 7) {
	$icons = array('icon-sun', 'icon-moon', 'icon-cloudy', 'icon-cloud', 'icon-rainy', 'icon-lightning');
	$item = array();

	for($h = (int)date('h', $start); 
		$h < (date('h', $start) + ($intervall * $limit)); 
		$h = $h+$intervall) {
		//var_dump([$h, $start, $intervall, $limit, 'max' => (date('h', $start) + ($intervall * $limit))]);continue;

		$item[] = array(
			'icon' => $icons[array_rand($icons)],
			'type' => $config['weatherTypes'][array_rand($config['weatherTypes'])],
			'time' => $start + ($h * 60 * 60),
			'temp' => rand(10, 30),
			'rain' => rand(0,20)
		);

		if($h > 100) exit;
	}
	return $item;
}

$config['fake']['locationData'] = array(
	'name' => 'Linz',
	'today' => fakeDay(0),
	'forecast' => array(
		fakeDay(0), fakeDay(1), fakeDay(2), fakeDay(3), fakeDay(4), fakeDay(5), fakeDay(6)
	)
);