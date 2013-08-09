<? include "_head.php" ?>

<a id="backgroundImage" target="_blank" href="<?=sprintf('http://www.flickr.com/photos/%s/%s',$this->randomPhoto['owner'],$this->randomPhoto['id'])?>" title="Linz von austrianpsycho bei Flickr">

<img src="<?=
sprintf(
'http://farm6.staticflickr.com/%s/%s_%s_b.jpg',
$this->randomPhoto['server'],
$this->randomPhoto['id'],
$this->randomPhoto['secret'])
?>" width="1024" height="673" alt="Linz">
</a>

<div id="locationWrap">
	<h1>Wetter <?=$this->location['name']?></h1>

	<div class="dayCard">
		<h2><?=round($this->weather['main']['temp']); ?><span class="icon-Celsius"></span></h2>
		<h3><?=$this->weather['weather'][0]['description']?></h3>
		<? // var_dump($this->weather); ?>
		<h4><?=$this->config['weekdays'][date('w', $this->weather['dt'])]?>, <?=date('d.m.Y H:i', $this->weather['dt'])?></h4>
	
		<?//=$this->weather['weather'][0]['main']?>

		<div class="hourForeacast">
			<div class="dayChart" style="height:100px; width:100%"></div>
			<script>var hourChartData = JSON.parse('<?=$this->hourGraphJson;?>');</script>

			<div class="detail">
				<? foreach(array_slice($this->hours['list'], 0, 7) as $hour) : ?>
				<? $hourWeatherType = $this->config['weatherTypes'][$hour['weather'][0]['icon']]; ?>

				<div class="hour">
				<div class="pin">
					<?//=$hour['weather'][0]['main']?>

					<p class="icon <?=$hourWeatherType['class']?>"><span class="<?=$hourWeatherType['icon']?>"></span></p>
					<p class="time"><?=date('D H:i', $hour['dt'])?></p>
					<p class="temp"><?=$hour['main']['temp']?>°C</p>
					<!--<p class="rain"><?var_dump($hour['rain'])?></p>-->
				</div>
				</div>
				<? endforeach; ?>
			</div>
		</div>
	</div>

	<div id="forecast">
		<h3>Vorschau</h3>

		<div class="forecastChart" style="height:50px; width:640px"></div>

		<? foreach($this->location['forecast'] as $idx => $day) : ?>
		<div class="day<?=$idx==0?' active':''?>">
			<p class="icon"><span class="<?=$detail['icon']?>"></span></p>
			<p class="weekday">
				<?=$this->config['weekdaysShort'][date('w', $day['time'])]?>
			</p>
			<p class="time">
				<?=date('d.m', $day['time'])?>
			</p>
			<p class="temp"><?=$detail['temp']?>°C</p>
			<p class="rain"><?=$detail['rain']?>%</p>
		</div>
		<? endforeach; ?>
	</div>
</div>

<div id="locationBackground">
	<? /* * /?>
	<img src="http://farm9.staticflickr.com/8278/8710831494_63c5940287_o.jpg" alt="Laufrunde durch Linz">
	<a href="http://www.flickr.com/photos/friesenecker/8710831494/" title="Laufrunde durch Linz von Daniel Friesenecker bei Flickr">c by</a><? /**/?>
</div>

<div id="ad">
	<?/* * /?><img src="http://placekitten.com/120/600" /><?/**/?>
</div>

<? include "_foot.php" ?>