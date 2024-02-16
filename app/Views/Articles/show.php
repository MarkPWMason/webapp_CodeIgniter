<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Article<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1><?= esc($article->title) ?></h1>

<p><?= esc($article->content) ?></p>

<a href="<?= url_to("Articles::edit", $article->id) ?>">Edit</a>

<a href="<?= url_to("Articles::delete", $article->id) ?>">Delete</a>

<?= $this->endSection() ?>