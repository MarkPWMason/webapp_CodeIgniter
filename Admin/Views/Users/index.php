<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?> Users <?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>Users</h1>

<table>
    <thead>
        <tr>
            <th>email</th>
            <th>First Name</th>
            <th>Active</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?= esc($user->email) ?></td>
                <td><?= esc($user->first_name) ?></td>
                <td><?= esc($user->active) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $pager->links() ?>

<?= $this->endSection() ?>