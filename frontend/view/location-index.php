<? include "_head.php" ?>

<a id="backgroundImage" href="<?=sprintf('http://www.flickr.com/photos/%s/%s',$this->randomPhoto['owner'],$this->randomPhoto['id'])?>" title="Linz von austrianpsycho bei Flickr">

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
		<h2><?=$this->location['today']['temp'] ?>&#8451;</h2>
		<h3><?=$this->location['today']['type']['name']?></h3>
		<h4><?=$this->config['weekdays'][date('w', $this->location['today']['time'])]?>, <?=date('d.m.Y H:i', $this->location['today']['time'])?></h4>
	
		<div class="dayForeacast">
			<div class="dayChart" style="height:100px; width:640px"></div>

			<div class="detail">
				<? foreach($this->location['today']['detail'] as $detail) : ?>
				<div class="hour">
					<p class="icon"><span class="<?=$detail['icon']?>"></span></p>
					<p class="time"><?=date('H:i', $detail['time'])?></p>
					<p class="temp"><?=$detail['temp']?>°C</p>
					<p class="rain"><?=$detail['rain']?>%</p>
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