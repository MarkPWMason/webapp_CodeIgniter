<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?> Delete Article <?= $this->endSection() ?>

<?= $this->section("content") ?> 
    
    <h1>Delete Article</h1>
    <p>Are you sure?</p>


    <?= form_open("articles/delete/" . $article->id) ?>

    <button>Yes</button>

    </form>

<?= $this->endSection()?>