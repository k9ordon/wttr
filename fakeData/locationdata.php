<? 

function fakeDay($addDays) {
	global $config;

	$ts = strtotime(sprintf('+ %s days 0:00', $addDays));
	return array(
		'day' => $ts,
		'type' => $config['weatherTypes'][array_rand($config['weatherTypes'])],
		'temp' => rand(10,30),
		'min' => rand(10,20),
		'max' => rand(20,30),
		'rain' => rand(0,20),
		'detail' => fakeDayHours($ts)
	);
}

function fakeDayHours($dayTimestamp) {
	$item = array();
	for($h = 0; $h <= 23; $h++) {
		$item[] = array(
			'hour' => $dayTimestamp + ($h * 60 * 60),
			'temp' => rand(10, 30),
			'rain' => rand(0,20)
		);
	}
	return $item;
}

$config['fake']['locationData'] = array(
	'name' => 'Linz',
	'today' => fakeDay(0),
	'forecast' => array(
		fakeDay(1), fakeDay(2), fakeDay(3), fakeDay(4), fakeDay(5), fakeDay(6), fakeDay(7)
	)
);