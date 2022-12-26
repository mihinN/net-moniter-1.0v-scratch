<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<pre>
<strong>Uptime:</strong>
<?php system("uptime"); ?>
<br />
<strong>System Information:</strong>
<?php system("uname -a"); ?>
<br />
<strong>Memory Usage (MB):</strong>
<?php system("free -m"); ?>
<br />
<strong>Disk Usage:</strong>
<?php system("df -h"); ?>
<br />
<strong>CPU Information:</strong>
<?php system("cat /proc/cpuinfo | grep \"model name\\|processor\""); ?>
</pre>

</body>
</html>