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