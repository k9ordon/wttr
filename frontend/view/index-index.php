<? include "_head.php" ?>
index

<ul>
<? foreach($this->numbers as $number) : ?>
	<li>Item: <?=$number?></li>
<? endforeach; ?>
</ul>

<? include "_foot.php" ?>