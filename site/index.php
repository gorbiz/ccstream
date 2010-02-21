<?php
	echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
?><!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>CCStream.com</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="verify-v1" content="RRxPmO+EOGG0s5ZDogZahFIQsXj7UP11HLea8DfoZAU=" >

		<script type="text/javascript" src="swfobject.js"></script>		
		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		try {
		var pageTracker = _gat._getTracker("UA-822266-2");
		pageTracker._trackPageview();
		} catch(err) {}</script>

		<style type="text/css">
			body {
				margin: 0px;
				padding: 0px;
				background-color: #fe0;
				font-family: Arial;
				font-size: 10px;
				font-weight: bold;
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
				color: #000;
			}

			#main_div {
				margin: 0px;
				padding: 0px;
			}

			#contact a {
				color: #00e;
			}

			#info {
				position: absolute;
				left: 66%;
				top: 75%;
				z-index: 0;
				width: 150px;
				height: 80px;
			}
			
			.listen {
				font-size: 12px;
			}
			.listen a {
				color: #11d;
			}
			
			#flashPlayer {
				position: absolute;
				right: 0;
				bottom: 0;
			}
			
		</style>

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



			var TimeToFade = 1000.0;

			function fade(eid)
			{
			  var element = document.getElementById(eid);
			  if(element == null)
			    return;

			  if(element.FadeState == null)
			  {
			    if(element.style.opacity == null
			        || element.style.opacity == ''
			        || element.style.opacity == '1')
			    {
			      element.FadeState = 2;
			    }
			    else
			    {
			      element.FadeState = -2;
			    }
			  }

			  if(element.FadeState == 1 || element.FadeState == -1)
			  {
			    element.FadeState = element.FadeState == 1 ? -1 : 1;
			    element.FadeTimeLeft = TimeToFade - element.FadeTimeLeft;
			  }
			  else
			  {
			    element.FadeState = element.FadeState == 2 ? -1 : 1;
			    element.FadeTimeLeft = TimeToFade;
			    setTimeout("animateFade(" + new Date().getTime() + ",'" + eid + "')", 33);
			  }  
			}
			
			
			function animateFade(lastTick, eid)
			{  
			  var curTick = new Date().getTime();
			  var elapsedTicks = curTick - lastTick;

			  var element = document.getElementById(eid);

			  if(element.FadeTimeLeft <= elapsedTicks)
			  {
			    element.style.opacity = element.FadeState == 1 ? '1' : '0';
			    element.style.filter = 'alpha(opacity = '
			        + (element.FadeState == 1 ? '100' : '0') + ')';
			    element.FadeState = element.FadeState == 1 ? 2 : -2;
			    return;
			  }

			  element.FadeTimeLeft -= elapsedTicks;
			  var newOpVal = element.FadeTimeLeft/TimeToFade;
			  if(element.FadeState == 1)
			    newOpVal = 1 - newOpVal;

			  element.style.opacity = newOpVal;
			  element.style.filter = 'alpha(opacity = ' + (newOpVal*100) + ')';

			  setTimeout("animateFade(" + curTick + ",'" + eid + "')", 33);
			}

			setTimeout("fade('claes_live')", 5000);

		</script>
	</head>

	<body onclick="javascript:fade('claes_live');">
		
		<div id="flashPlayer">This text will be replaced by the flash music player.</div>
		
		<script type="text/javascript">
		   var so = new SWFObject("playerMini.swf", "mymovie", "75", "30", "7", "#FFFFFF");
		   so.addVariable("autoPlay", "yes");
		   so.addVariable("soundPath", "song/01-ccstream-email_blues.mp3");
		   so.write("flashPlayer");
		</script>
		
		<img src="img/painting.jpg" style="position:absolute; left:0%; height:100%; width:68%;" alt="" />
		
		<div id="claes_live" style="position: absolute; left: 20px; top: 20px; z-index: 100; border: 1px solid #eee;" onclick="javascript:document.getElementById('claes_live').style.display='none';"><img src="img/claes_live.jpg" style="border: 20px solid rgb(170, 170, 170);"></div>
		<div style="position:absolute; right: 15%; height:68%; text-align:right; margin-top:10%; border: 0px solid;">
		
			<?php $songs = new SimpleXMLElement(file_get_contents('mp3.xml')); ?>
			<?php foreach ($songs as $song) : ?>
			
				<a href="javascript:openLink('song.php?track=<?php echo $song->track; ?>');">
					<img src="img/so_<?php echo $song->shortName; ?>.gif" alt="Lyrics" title="Lyrics" />
				</a>
				<span class="listen" style="position:relative; top: <?php echo $song->offset ?>px;">
				- <a href="song/<?php echo $song->mp3; ?>" target="_blank">listen</a>
				/ <a href="song/<?php echo $song->mp3; ?>" target="_blank">download</a>
				</span><br />
				
			<?php endforeach; ?>
			
			<a href="javascript:openContact();"><img src="img/contact.gif" alt="Contact" style="margin-top: 10px;" /></a><br />
			<a href="javascript:openCchistory();"><img src="img/cchistory.gif" alt="Cchistory" style="margin-top: 10px;" /></a><br />
			
		</div>
		
		<img src="img/painting-rep.jpg" style="position:absolute; left:85%; height:95%; width:15%;" alt="" />
        
	</body>
</html>