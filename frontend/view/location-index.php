<? include "_head.php" ?>

<div id="locationWrap">
<h1>Wetter <?=$this->location['name']?></h1>

<div id="today">
	<h2><?=$this->location['today']['temp'] ?>°C <?=$this->location['today']['type']?></h2>
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