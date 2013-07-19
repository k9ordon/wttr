</div>

<script>
	<? foreach(array("assets/js/app.js") as $s) : ?>
		<?= file_get_contents($s) . "\n"; ?>
	<? endforeach; ?>
</script>

</body>
</html>