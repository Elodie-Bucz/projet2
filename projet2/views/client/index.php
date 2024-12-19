<head>
    <link rel="stylesheet" href="resources/css/style.css">
</head>

<body>
    <h1>Liste des Articles</h1>

    <?php if (isset($data['articles']) && mysqli_num_rows($data['articles']) > 0): ?>
        <div class="articles">
            <?php while ($row = mysqli_fetch_assoc($data['articles'])): ?>
                <div class="article">
                    <h2><?php echo htmlspecialchars($row['titre']); ?></h2>
                    <h3><strong>Posté par:</strong> <?php echo htmlspecialchars($row['nom']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($row['article'])); ?></p>
                    <p><strong>le:</strong> <?php echo htmlspecialchars($row['date_poste']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true): ?>
            <p>Si vous ne voyez aucun article veuillez relancer ci-dessous</p>
            <a href="?controller=forum&function=indexOffline" class="button">Recharger la page</a>
        <?php else: ?>
            <p>Si vous ne voyez aucun article veuillez relancer ci-dessous</p>
            <a href="?controller=forum&function=index" class="button">Recharger la page</a>
        <?php endif; ?>
    <?php endif; ?>
</body>
