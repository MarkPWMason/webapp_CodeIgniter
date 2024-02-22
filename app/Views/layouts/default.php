<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection("title") ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
<nav>

<a href="<?= url_to("/") ?>">Home</a>

<?php if(auth()->loggedIn()) : ?>

Hello <?= esc(auth()->user()->first_name) ?>

<a href="<?= url_to("articles") ?>">Articles</a>

<a href="<?= url_to("admin/users") ?>">Users</a>

<a href="<?= url_to("logout") ?>">Logout</a>

<?php else: ?>
<a href="<?= url_to("login") ?>">Login</a>


<?php endif ?>
</nav>

    <?php  if(session()->has("message")): ?>
        <p><?= session("message") ?></p>
    <?php endif; ?>

    <?= $this->renderSection("content") ?>

</body>

</html>