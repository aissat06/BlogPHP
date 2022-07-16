<!DOCTYPE html>
<!-- fixer le footer en bas 
 class="h-100" dans html
 class="d-flex flex-column h-100" dans body
 mt-autodans footer
-->
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mon site' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="#" class="navbar-band" style="color:azure" >Mon site</a>
    </nav>
    <div class="container mt-4">
        <?= $content; ?>
    </div>
    <footer class="bg-light py-4 footer mt-auto">
        <div class="container">
            <!-- savoir le temps de chargement de la page pour debuguer et savoir si y a des problèmes-->
            <?php if (defined('DEBUG_TIME')) : ?>
                Page généré en <?= round(1000 * (microtime(true) - DEBUG_TIME)) ?> ms
            <?php endif; ?>
            </div>
    </footer>
</body>
</html>