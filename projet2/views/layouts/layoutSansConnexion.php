<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <link rel="stylesheet" href="resources/css/style1.css">
</head>     
<body>
<nav>
    <ul>
        <li><a href="?controller=forum&function=indexOffline">Forum</a></li>
        <li><a href="?controller=client&function=connect">Connexion</a></li>
    </ul>
    </nav>
    <main>
        <?php echo $content; ?>
    </main>
    <footer>
        Copryright 2024 - Élodie Buczkowski
    </footer>
</body>
</html>