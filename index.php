<?php
define("DATABASE_HOST", "mysql.hostinger.lt");
define("DATABASE_NAME", "u376988355_db");
define("DATABASE_USER", "u376988355_gedwu");
define("DATABASE_PASS", "bibiene8");

$pdo = new PDO('mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME, DATABASE_USER, DATABASE_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

require_once 'functions.php';

$page = isset($_GET['page']) ? $_GET['page'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '0';
?>

<html>
	<head>
		<title>
			Books
		</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
   <body>

   <?php require_once 'search.php'; ?>

    <?php if($page == 'knyga'): ?>
        <?php require_once 'knyga.php'; ?>
    <?php else: ?>
        <?php require_once 'knygos.php'; ?>
    <?php endif; ?>

	</body>
</html>
