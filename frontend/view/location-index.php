<? include "_head.php" ?>

<div id="locationWrap" class="type<?=ucfirst($this->location['today']['type']['class'])?>">
<h1>Wetter <?=$this->location['name']?> <?=$this->location['name']?></h1>

<div id="today">
	<h2><?=$this->location['today']['temp'] ?>°C</h2>
	<h3><?=$this->location['today']['type']['name']?></h3>
</div>

<div class="detail">
	<? foreach($this->location['today']['detail'] as $detail) : ?>
	<div class="hour">
		<p><?=date('H:i', $detail['hour'])?></p>
		<p><?=$detail['temp']?>°C</p>
		<p><?=$detail['rain']?>%</p>
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


<? include "_foot.php" ?>