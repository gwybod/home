<!DOCTYPE HTML>
<!--
	Directive by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
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
			<div id="header">
				<span class="logo icon fa-paper-plane-o"></span>
				<h1><?php echo shell_exec('/usr/bin/hostname --domain'); ?></h1>
				<p>
					thoughts and experiments of three minds in the bedlam of <?php echo ((time() * 4) + 1522088560); ?>		
				</p>
			</div>

		<!-- Main -->
			<div id="main">

				<header class="major container 75%">
					<h2>We conduct experiments that
					<br />
					may or may not seriously
					<br />
					break the universe</h2>
				</header>

				<div class="box alt container">
					<section class="feature left">
						<a href="#" class="image icon fa-signal"><img src="images/pic01.jpg" alt="" /></a>
						<div class="content">
							<h3>The First Thing</h3>
							<p><?php echo shell_exec('/usr/bin/fortune -s'); ?></p>
						</div>
					</section>
					<section class="feature right">
						<a href="#" class="image icon fa-code"><img src="images/pic02.jpg" alt="" /></a>
						<div class="content">
							<h3>The Second Thing</h3>
							<p><?php echo shell_exec('/usr/bin/fortune -s'); ?></p>
						</div>
					</section>
					<section class="feature left">
						<a href="#" class="image icon fa-mobile"><img src="images/pic03.jpg" alt="" /></a>
						<div class="content">
							<h3>The Third Thing</h3>
							<p><?php echo shell_exec('/usr/bin/fortune -s'); ?></p>
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
				<div class="container 75%">

					<header class="major last">
						<h2>Questions or comments?</h2>
					</header>

					<form method="post" action="#">
						<div class="row">
							<div class="6u 12u(mobilep)">
								<input type="text" name="name" placeholder="Name" />
							</div>
							<div class="6u 12u(mobilep)">
								<input type="email" name="email" placeholder="Email" />
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<textarea name="message" placeholder="Message" rows="6"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<ul class="actions">
									<li><input type="submit" value="Send Message" /></li>
								</ul>
							</div>
						</div>
					</form>


				</div>
			</div>


	</body>
</html>