<? include "_head.php" ?>

<div id="locationWrap">
	<h1>Wetter <?=$this->location['name']?></h1>

	<div class="dayCard">
		<h2><?=$this->location['today']['temp'] ?>°C</h2>
		<h3><?=$this->location['today']['type']['name']?></h3>
		<h4><?=$this->config['weekdays'][date('w', $this->location['today']['time'])]?>, <?=date('d.m.Y', $this->location['today']['time'])?></h4>
	
		<canvas id="dayChart" class="dayChart" width="640" height="400"></canvas>

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

	<div id="forecast">
		<h3>Vorschau</h3>

		<? foreach($this->location['forecast'] as $idx => $day) : ?>
		<div class="day<?=$idx==0?' active':''?>">
			<p class="icon"><span class="<?=$detail['icon']?>"></span></p>
			<p class="time">
				<?=$this->config['weekdaysShort'][date('w', $day['time'])]?>
				<?=date('d.m', $day['time'])?>
			</p>
			<p class="temp"><?=$detail['temp']?>°C</p>
			<p class="rain"><?=$detail['rain']?>%</p>
		</div>
		<? endforeach; ?>
	</div>
</div>

<div id="locationBackground" class="type<?=ucfirst($this->location['today']['type']['class'])?>">
	<? /* * /?>
	<img src="http://farm9.staticflickr.com/8278/8710831494_63c5940287_o.jpg" alt="Laufrunde durch Linz">
	<a href="http://www.flickr.com/photos/friesenecker/8710831494/" title="Laufrunde durch Linz von Daniel Friesenecker bei Flickr">c by</a><? /**/?>
</div>

<? include "_foot.php" ?>