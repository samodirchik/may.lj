<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <header>
            <h1>
                <a href="<?= url('/') ?>">SiteName</a> 
            </h1>
        </header>
        <nav>
            <ul>
                <li><a href="<?= url('/') ?>">Home"</a></li>
                <li><a href="<?= url('/auth') ?>">Log in"</a></li>
            </ul>
        </nav>
        <main>
            <?php include_once getAppPath() . 'views' . DIRECTORY_SEPARATOR . $page . '.php'; ?>
        </main>
        <footer>"may" webstudio 2019$copy;</footer>
    </body>
</html>
