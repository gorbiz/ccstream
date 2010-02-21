<?php

function durationToString($seconds) {
	$min = (int) ($seconds/60);
	$sec = fmod((double)$seconds, 60);
	return $min . ":" . $sec;
}

$track = 1;
if (isset($_GET['track']) && intval($_GET['track']) > 0) {
	$track = intval($_GET['track']);
	
	$xml = new SimpleXMLElement(file_get_contents('songs.xml'));
	$songs = $xml->xpath('/songs/song[track=\''.$track.'\']');
	$song = current($songs);
}

echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>CCStream.com</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		try {
		var pageTracker = _gat._getTracker("UA-822266-2");
		pageTracker._trackPageview();
		} catch(err) {}</script>

        <link rel="stylesheet" type="text/css" href="common.css" />
	</head>

	<body>
        <div id="main">
            <h1 id="header">
			    <span id="track"><?php echo $song->track; ?></span>.
			    <span id="title">
			    	<?php echo $song->title; ?>
			    	<?php if (property_exists($song, 'writer')) echo ' ('.$song->writer.')';?>
			    </span>
		    </h1>

		    <span id="duration"><?php echo durationToString($song->duration); ?></span>
		    <pre id="lyrics"><?php echo $song->lyrics; ?></pre>
        </div>
	</body>
</html>