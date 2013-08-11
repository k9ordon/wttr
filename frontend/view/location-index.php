<? include "_head.php" ?>

<div id="backgroundImage">

<? if($this->randomPhoto) : ?>
<img src="<?=
sprintf(
'http://farm6.staticflickr.com/%s/%s_%s_b.jpg',
$this->randomPhoto['server'],
$this->randomPhoto['id'],
$this->randomPhoto['secret'])
?>" width="1024" height="673" alt="Linz">
<? endif; ?>

</div>

<div id="locationWrap">
	<h1>Wetter <?var_dump($this->weather)?></h1>
	
	<h2><?=round($this->weather['main']['temp']); ?><span class="icon-Celsius"></span></h2>
	<h3><?=$this->weather['weather'][0]['description']?></h3>
	<? // var_dump($this->weather); ?>
	<h4><?=$this->config['weekdays'][date('w', $this->weather['dt'])]?>, <?=date('d.m.Y H:i', $this->weather['dt'])?></h4>

	<?//=$this->weather['weather'][0]['main']?>

	<div class="hourForecast">
		<div class="hourChart" style="height:165px; width:<?=160*count($this->hours['list'])?>px"></div>
		<script>var hourChartData = JSON.parse('<?=$this->hourGraphJson;?>');</script>

		<div class="detail">
			<? foreach(array_slice($this->hours['list'], 0) as $hour) : ?>
			<? $hourWeatherType = $this->config['weatherTypes'][$hour['weather'][0]['icon']]; ?>

			<div class="hour" data-ts="<?=strtotime('00:00', $hour['dt'])?>">
			<div class="pin">
				<?//=$hour['weather'][0]['main']?>

				<p class="icon <?=$hourWeatherType['class']?>"><span class="<?=$hourWeatherType['icon']?>"></span></p>
				<p class="time"><?=$this->config['weekdaysShort'][date('w', $hour['dt'])]?> <?=date('H:i', $hour['dt'])?></p>
				<!--<p class="temp"><?=round($hour['main']['temp'])?><span class="icon-Celsius"></span></p>
				<p class="rain"><?var_dump($hour['rain'])?></p>-->
			</div>
			</div>
			<? endforeach; ?>
		</div>
	</div>

	<h3 class="dayForecastHeader">14 Tage Prognose <span>&#11015;</span></h3>
	<div class="dayForecast">

		<div class="forecastChart" style="height:50px; width:640px"></div>
		<div class="detail">

			<? foreach(array_slice($this->days['list'], 0, 14) as $idx => $day) : ?>
			<? $dayWeatherType = $this->config['weatherTypes'][$day['weather'][0]['icon']]; ?>

			<div class="day <?=$this->lastHourDate < $day['dt'] ? 'noData' : 'hasData'?>" data-ts="<?=strtotime('00:00', $day['dt'])?>">
			<div class="pin">
				<?//=$hour['weather'][0]['main']?>

				<p class="icon <?=$dayWeatherType['class']?>"><span class="<?=$dayWeatherType['icon']?>"></span></p>
				<p class="time"><?=$this->config['weekdaysShort'][date('w', $day['dt'])]?></p>
				<!--<p class="temp"><?//=$day['main']['temp']?>°C</p>
				<p class="rain"><?var_dump($day['rain'])?></p>-->
			</div>
			</div>
			<? endforeach; ?>

		</div>
	</div>

</div>

<div id="ad">
	<?/* * /?><img src="http://placekitten.com/120/600" /><?/**/?>
</div>

<? include "_foot.php" ?>