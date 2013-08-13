<html id="<?=strtolower(substr(get_class($this),11))?>" class="<?=implode($this->htmlClassList, ' ')?>">
<head>
<title>wttr.k94n.com</title>
<? foreach(array($this->config['base']."/assets/built/less/app.css") as $s) : ?>
	<link href="<?=$s?>" rel="stylesheet" type="text/css" media="screen" />
<? endforeach; ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<body>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43143945-1', 'wttr.at');
  ga('send', 'pageview');
</script>

<? include "_nav.php"; ?>

<div id="page">