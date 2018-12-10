<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?= $titre ?></title>
<link href="contenu/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="contenu/css/style.css">                                
</head>
	<body>
		<header class="jumbotron">
		<h3 class="text-center">Entête</h3>
		<h4 class="text-center"><a href="index.php">Accueil</a></h4>
		</header>
		<section>
			<?= $contenu ?>
		</section>
		<footer class="jumbotron"><h3 class="text-center">Footer</h3></footer>
    	<script src="contenu/js/jquery.slim.min.js"></script>
    	<script src="contenu/js/bootstrap.bundle.min.js"></script>
	</body>
</html>
