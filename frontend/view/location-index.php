<? include "_head.php" ?>

<div id="locationWrap" class="type<?=ucfirst($this->location['today']['type']['class'])?>">
	<h1>Wetter <?=$this->location['name']?></h1>

	<div id="today">
		<h2><?=$this->location['today']['temp'] ?>°C</h2>
		<h3><?=$this->location['today']['type']['name']?></h3>
		<?/*<h4><?=date('d.m.Y', $this->location['today']['day'])?></h4>*/?>
	</div>

	<div class="detail">
		<? foreach($this->location['today']['detail'] as $detail) : ?>
		<div class="hour">
			<p class="icon"><span class="<?=$detail['icon']?>"></span></p>
			<p class="time"><?=date('H:i', $detail['hour'])?></p>
			<p class="temp"><?=$detail['temp']?>°C</p>
			<p class="rain"><?=$detail['rain']?>%</p>
		</div>
		<? endforeach; ?>
	</div>

	<div style="display:none">
	<pre>
		<? var_dump($this->location['today']); ?>
	</pre>

	<hr><h2>Forecast</h2>
	<pre>
		<? var_dump($this->location['forecast'][0]); ?>
	</pre>
	</div>
</div>

<div id="locationBackground">
	<img src="http://farm9.staticflickr.com/8278/8710831494_63c5940287_o.jpg" alt="Laufrunde durch Linz">
	<a href="http://www.flickr.com/photos/friesenecker/8710831494/" title="Laufrunde durch Linz von Daniel Friesenecker bei Flickr">c by</a>
</div>

<? include "_foot.php" ?>