<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Raw SMTP Text Generator</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Raw SMTP Text Generator</a></h1>
		<form id="form_969573" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Raw SMTP Text Generator</h2>
			<p></p><p>This tool will generate a basic block of text that you can paste into a telnet session to determine if SMTP delivery is working. It also creates a unique identifier which will help you track down
			missing or undelivered messages.</p>
		</div>						
			
			
			<?
			
			if( isset($_POST['fromAddress']) && isset($_POST['toAddress']) )
			{
				// $uniqueString = $_POST['fromAddress'] . $_POST['toAddress'] . time() . rand(1,1000000);
				// $unique = hash(md5, $uniqueString); 
				$uniqid = uniqid('', true);
				$md5 = hash(md5, $uniqid);
				
				$guid1 = substr($md5, 0, 8);
				$guid2 = substr($md5, 9, 4);
				$guid3 = substr($md5, 13, 4);
				$guid4 = substr($md5, 17, 12);
				
				$unique = $guid1 . "-" . $guid2 . "-" . $guid3 . "-" . $guid4;
				
				echo '<pre>' . "\r\n";
				echo 'HELO mailserver' . "\r\n";
				echo 'MAIL FROM: &lt;' . htmlspecialchars($_POST["fromAddress"]) . '&gt;' . "\r\n";
				echo 'RCPT TO: &lt;' . htmlspecialchars($_POST["toAddress"]) . '&gt;' . "\r\n";
				echo 'DATA' . "\r\n";
				echo 'SUBJECT: This is a raw SMTP test (ID: ' . $unique . ')' . "\r\n";
				echo 'This is a test of the raw SMTP delivery mechanism built into the mail system.' . "\r\n";
				echo '' . "\r\n";
				echo 'Unique identifier: ' . $unique . "\r\n";
				echo '.' . "\r\n";
				echo 'quit';
				echo '</pre>';
				
			}
			
			?>

			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">From Address </label>
		<div>
			<input id="element_1" name="fromAddress" class="element text medium" type="text" maxlength="255" value="<? echo $_POST['fromAddress']; ?>"/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">To Address </label>
		<div>
			<input id="element_2" name="toAddress" class="element text medium" type="text" maxlength="255" value="<? echo $_POST['toAddress']; ?>"/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="969573" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
	
		</form>	
		
		

	</div>
	<img id="bottom" src="bottom.png" alt="">
	<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-56818975-1', 'auto');
	  ga('send', 'pageview');</script>
	</body>
</html>