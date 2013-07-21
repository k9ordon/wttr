<html id="<?=strtolower(substr(get_class($this),11))?>" class="<?=implode($this->htmlClassList, ' ')?>">
<head>
<title>wttr</title>
<? foreach(array($this->config['base']."/assets/built/less/app.css") as $s) : ?>
	<link href="<?=$s?>" rel="stylesheet" type="text/css" media="screen" />
<? endforeach; ?>

<meta charset="utf-8">
</head>

<body>

<? include "_nav.php"; ?>

<div id="page">