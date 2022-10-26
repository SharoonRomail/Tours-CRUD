<?php session_start(); ?>
<html lang="en" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logout</title>
</head>
<body>
<?php 
if (isset($_SESSION)){
    unset($_SESSION);
    session_unset();
    session_destroy();
} ?>
<script language="javascript" type="text/javascript">document.location = "index.php";</script>
</body>
</html>