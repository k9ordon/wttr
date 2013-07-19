<? include "_head.php" ?>

<h1>Wetter <?=$this->location['name']?></h1>

<hr><h2>Today</h2>
<pre>
	<? var_dump($this->location['today']); ?>
</pre>

<hr><h2>Forecast</h2>
<pre>
	<? var_dump($this->location['forecast'][0]); ?>
</pre>


<? include "_foot.php" ?>