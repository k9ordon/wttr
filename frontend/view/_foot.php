<div id="footer">
	<p>handcrafted by 
	<a href="#">k9ordon</a> - 
	powered by <a href="http://openweathermap.org">openweathermap api</a>

	<? if($this->randomPhoto) : ?>
	- image from <a target="_blank" href="<?=sprintf('http://www.flickr.com/photos/%s/%s',$this->randomPhoto['owner'],$this->randomPhoto['id'])?>" title="">flickr</a>
	<? endif; ?>
	- <?=date('Y')?>
</div>
</div>

<? foreach(array("assets/vendor/raphy-charts/vendor/raphael.min.js", "assets/vendor/raphy-charts/compiled/charts.js") as $s) : ?>
	<script type="text/javascript" src="<?=$s?>"></script>
<? endforeach; ?>

<script>
	<? foreach(array("assets/js/locationcard.js", "assets/js/app.js") as $s) : ?>
		<?= file_get_contents($s) . "\n"; ?>
	<? endforeach; ?>
</script>

</body>
</html>