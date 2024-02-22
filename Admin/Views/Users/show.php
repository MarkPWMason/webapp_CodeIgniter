<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?> User <?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>User</h1>

<dl>
    <dt>email</dt>
    <dd><?= esc($user->email) ?></dd>

    <dt>First name</dt>
    <dd><?= esc($user->first_name) ?></dd>

    <dt>Created</dt>
    <dd><?= $user->created_at->humanize() ?></dd>
</dl>

<?= form_open("admin/users/" . $user->id . "/toggle-ban") ?>

<button><?= $user->isBanned() ? "Unban" : "Ban" ?></button>

</form>

<?= $this->endSection() ?>