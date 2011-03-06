<?php
function durationToString($seconds) {
	$min = (int) ($seconds/60);
	$sec = fmod((double)$seconds, 60);
	return $min . ":" . $sec;
}

$track = 1;
if (isset($_GET['track']) && intval($_GET['track']) > 0) {
	$track = intval($_GET['track']);
	$xml = new SimpleXMLElement(file_get_contents('data/songs.xml'));
	$songs = $xml->xpath('/songs/song[track=\''.$track.'\']');
	$song = current($songs);
}

echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>CCStream.com</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style/common.css" />
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-822266-2']);
			_gaq.push(['_trackPageview']);
			(function() {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</head>
	<body>
        	<div id="main">
			<h1 id="header">
				<span id="track"><?php echo $song->track; ?></span>.
				<span id="title">
					<?php echo  str_replace("&", "&amp;", $song->title); ?>
					<?php if (property_exists($song, 'writer')) echo ' ('. str_replace("&", "&amp;", $song->writer).')';?>
				</span>
			</h1>
			<span id="duration"><?php echo durationToString($song->duration); ?></span>
			<pre id="lyrics"><?php echo str_replace("&", "&amp;", $song->lyrics); ?></pre>
		</div>
	</body>
</html>
