<!DOCTYPE HTML>
<!--
	Original html5, css and javascript template written by:
	Directive by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
	
	The rest was modified by me, tubular, hiya :)
	All javascript has been removed and a little php and a bit of new javascript added to provide the dynamic content;
 
	you can't normally see the php(as it should run server side), but I've included it here 
	in the comments incase anyone is interested in copying for any reason. the line of
	comment appears directly below the html line. 

	All hosted on plain centos 7 built modified only by running:
	 
	wget -O - https://pastebin.com/raw/b115iUBT | sed "s/\r$//" | bash
	yum -y install php git fortune-mod
	git clone https://github.com/gwybod/home.git
	cp -r home/* /var/www/html

-->
<html>
	<head>
		<title><?php echo shell_exec('/usr/bin/hostname --domain'); ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<div id="header" onClick="this.contentEditable='true';">
				<span class="logo icon fa-paper-plane-o"></span>
				<h1><?php echo shell_exec('/usr/bin/hostname --domain'); ?></h1>
				<p>	thoughts of three minds in the symphony of <?php echo (number_format ((time()*4) + 1519585964)); ?> </p>
			</div>

		<!-- Main -->
			<div id="main">

				<header class="major container 75%">
				<div id='output'>
					<h2>We conduct experiments that
					<br />
					may or may not seriously
					<br />
					break the universe</h2>
				</div>
				</header>

				<div class="box alt container">
					<section class="feature left">
						<a class="image icon fa-signal"><img src="images/pic01.jpg" alt="" /></a>
						<div class="content">
							<h3>The First Thing</h3>
							<p contenteditable="true" data-name="first"><?php echo shell_exec('/usr/bin/fortune -s'); ?></p>
						</div>
					</section>
					<section class="feature right">
						<a class="image icon fa-code"><img src="images/pic02.jpg" alt="" /></a>
						<div class="content">
							<h3>The Second Thing</h3>
							<p contenteditable="true" data-name="second"><?php echo shell_exec('/usr/bin/fortune -s'); ?></p>
						</div>
					</section>
					<section class="feature left">
						<a class="image icon fa-mobile"><img src="images/pic03.jpg" alt="" /></a>
						<div class="content">
							<h3>The Third Thing</h3>
							<p contenteditable="true" data-name="third"><?php echo shell_exec('/usr/bin/fortune -s'); ?></p>
<!--							<p><? php echo shell_exec('/usr/bin/fortune -s'); ?></p>		-->
						</div>
					</section>
				</div>

				<footer class="major container 75%">
<ul class="copyright">
<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
<li>DNS: <a href="http://afraid.org">afraid.org</a></li>
<li>Hosting: <a href="http://loveservers.com">loveservers.com</a></li>
<li>Powered by: <a href="https://www.gnu.org/gnu/manifesto.html">GNU/Linux</a></li>
<li>This page was served by:<a href="https://<?php echo shell_exec('hostname --fqdn');?>"><?php echo shell_exec('hostname'); ?></a></li>
<br>
<li>Special thanks to everyone who has ever created something and shared it with the world.<br> You will never be forgotten.</li>
</ul>
				</footer>

			</div>

		<!-- Footer -->
			<div id="footer">
				<div id='status' class="container 75%">

					<header class="major last">
						<h2>Questions or comments?</h2>
					</header>
				</div>
			</div>
<script>
document.addEventListener('keydown', function (event) {
  var esc = event.which == 27,
      nl = event.which == 13,
      el = event.target,
      input = el.nodeName != 'INPUT' && el.nodeName != 'TEXTAREA',
      data = {};

  if (input) {
    if (esc) {
      // restore state
      document.execCommand('undo');
      el.blur();
    } else if (nl) {
      // save
      data[el.getAttribute('data-name')] = el.innerHTML;
      gppost(JSON.stringify(data));
      el.blur();
      event.preventDefault();
    }
  }
}, true);
function writediv(a, s) {
  document.getElementById(a).innerHTML = s;
}
function gppost(payload, target = './back.php', outputdiv = 'output', statusdiv = 'status',  timeout = '5000', clobberOutputDiv = false){
    if (payload === '') { document.getElementById(statusdiv).innerHTML += "No payload"; return;}
    var xhttp = new XMLHttpRequest();
    xhttp.timeout = timeout;
    xhttp.onreadystatechange = function() {
        switch(this.readyState){
            case 1:
                writediv(statusdiv, "Connection opened<br>");
                break;
            case 2:
                writediv(statusdiv, "Command sent<br>");
                break;
            case 3:
                writediv(statusdiv, "Receiving data<br>");
                break;
            case 4:
                switch(this.status){
                    case 0:
                        writediv(statusdiv, "No reply?<br>");
                    case 403:
                        writediv(statusdiv, "Access denied<br>");
                    case 404:
                        writediv(statusdiv, "Target not valid<br>");
                    case 500:
                        writediv(statusdiv, "Server error<br>");
                        break;
                    case 200:
               		document.getElementById(outputdiv).innerHTML = this.responseText;
                }
        }
    };
    xhttp.open('POST', target, true);
    xhttp.setRequestHeader('Content-Type', 'application/json');
    xhttp.send(payload);
}
</script>
	</body>
</html>
