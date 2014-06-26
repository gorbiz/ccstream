<!DOCTYPE html>
<html>
<head>
	<title>CCStream</title>
	<meta charset="utf-8" />
	<meta name="verify-v1" content="RRxPmO+EOGG0s5ZDogZahFIQsXj7UP11HLea8DfoZAU=" />
	<script type="text/javascript" src="script/swfobject.js"></script>

    <script type="text/javascript">

        function openLink(url) {
            // Open song window
            var newWindow = open(url, 'newWindow', "width=550, height=500");
            newWindow.focus();
        }

        function openContact() {
            open('contact.html','contact','width=360,height=115');
        }

        function openCchistory() {
            // Use the same since they are the same size
            open('cchistory.html','newWindow','width=550,height=500');
            newWindow.focus();
        }

        function playSong(song) {
            // Make sure to show the player if an actual song was passed
            if (song != "") {
                document.getElementById('flashPlayer').style.display="block";
            }
            so.addVariable("autoPlay", "yes");
            so.addVariable("soundPath", song);
            so.write("flashPlayer");
        }

    </script>

    <style type="text/css">
        body {
            margin: 0px;
            padding: 0px;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 10px;
            font-weight: bold;
            background-color: #ff0;
            background-image: url(img/background-highly-compressed.jpg);
            background-size: 100%;
            background-repeat: no-repeat;
        }

        img {
            margin: 0px;
            padding: 0px;
            border: 0px;
        }

        div {
            margin: 0px;
            padding: 0px;
        }

        a {
            margin: 0px;
            padding: 0px;
            text-decoration: none;
            color: #11d;
        }
        a:hover {
            color: #08f;
        }

        .listen {
            font-size: 12px;
        }

        #flashPlayer {
            position: absolute;
            right: 0;
            bottom: 0;
        }

        #wrapper {
            position: absolute;
            right: 15%;
            height: 68%;
            text-align: right;
            margin-top: 10%;
        }

        #second-album {
        	font-size: 15px;
        	margin-top: 30px;
        }

        .listen-to-radio {
            font-size: 2em;
        }
        .listen-to-radio a {
            color: blue;
        }

        .section-radio {
            position: absolute;
            left: 31%;
            top: 35%;
            padding: 0 2em 2em 2em;
        }
        .section-radio h2 {
            margin: 0;
            text-align: left;
            font-size: 2em;
            color: white;
            text-shadow: black 0 0 4px;
        }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // Once the document had loded with the low resolution background load the high resolution one
            // ...this could be improved by slowly increasing the opacity of the new background
            $(new Image()).load(function() {
                $("body").css('backgroundImage', 'url(img/background.jpg)');
            })
            .attr('src', 'img/background.jpg');

            if (navigator.userAgent.match(/Android/i) ||
                    navigator.userAgent.match(/webOS/i) ||
                    navigator.userAgent.match(/iPhone/i) ||
                    navigator.userAgent.match(/iPod/i) ||
                    navigator.userAgent.match(/iPad/i) ||
                    navigator.userAgent.match(/BlackBerry/)) {
                // TODO Add something like this here
                //$("body").prepend('<div class="listen-to-radio">Listen to the CCstream radio!<br /><a href="http://radio.ccstream.com:8000/stream.m3u">radio.ccstream.com:8000/stream.m3u</a></div>');
            }
        });
    </script>

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

	<div id="flashPlayer">This text will be replaced by the flash music player.</div>
	<script type="text/javascript">
		var so = new SWFObject("script/playerMini.swf", "mymovie", "75", "30", "7", "#FFFFFF");
		so.addVariable("autoPlay", "no");
		so.addVariable("soundPath", "song/01-ccstream-email_blues.mp3");
		so.write("flashPlayer");
	</script>

	<div id="wrapper">
	    <?php foreach (simplexml_load_file('data/mp3.xml') as $song) : ?>
		<a href="javascript:playSong('song/<?php echo $song->mp3; ?>'); openLink('song.php?track=<?php echo $song->track; ?>');">
			<img src="img/so_<?php echo $song->shortName; ?>.gif" alt="Lyrics" title="Lyrics" />
		</a>
		<span class="listen" style="position:relative; top: <?php echo $song->offset ?>px;">
			- <a href="javascript:playSong('song/<?php echo $song->mp3; ?>'); openLink('song.php?track=<?php echo $song->track; ?>');">listen</a>
			/ <a href="song/<?php echo $song->mp3; ?>" target="_blank">download</a>
		</span><br />
	    <?php endforeach; ?>

        <a href="javascript:openContact();">
    		<img src="img/contact.gif" alt="Contact" style="margin-top: 10px;" />
    	</a><br />
    	<a href="javascript:openCchistory();">
    		<img src="img/cchistory.gif" alt="Cchistory" style="margin-top: 10px;" />
    	</a><br />

    	<div id="second-album">
    		<?php foreach (simplexml_load_file('data/mp3_2.xml') as $song) : ?>
    		<a href="javascript:playSong('song/2/<?php echo $song->mp3; ?>');">
    			<?php echo $song->name; ?>
    		</a>
    		<span class="listen">
    			 - <a href="javascript:playSong('song/2/<?php echo $song->mp3; ?>');">listen</a>
    			/ <a href="song/2/<?php echo $song->mp3; ?>" target="_blank">download</a>
    		</span><br />
    		<?php endforeach; ?>
        </div>

    </div>

    <div class="section-radio">
        <h2>The all new CCstream Radio!</h2>
	<p style="background: rgba(0, 0, 0, 0.75); padding: 1em; color: #eee; position: absolute; bottom: -40px; width: 320px;">
		<a href="http://listen.spacial.com/api/listen/?mount=SAM06AAC059&method=sc" style="color: #eee; text-decoration: underline;">...or listen to the radio in your media player.</a>
	</p>
        <iframe src="http://media.spacial.com/player/sam-vibe/index.html?sid=656672"
		width="340"
		height="270"
		scrolling="no"
		frameborder="0"
		marginheight="0"
		marginwidth="0"
		allowtransparency="true"
		title="The iframe flash player display."/>
    </div>

</body>
</html>
