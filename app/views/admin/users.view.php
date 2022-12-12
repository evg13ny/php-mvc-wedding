<?php $this->view("admin/admin.header") ?>

<?php if ($action == "add") : ?>

    <div class="col-md-6 mx-auto p-3">
        <h4>New user</h4>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?></div>
        <?php endif; ?>

        <form action="" method="post">
            <input type="text" name="username" class="form-control mt-3" placeholder="Username">
            <input type="email" name="email" class="form-control mt-3" placeholder="Email">
            <input type="password" name="password" class="form-control mt-3" placeholder="Password">

            <button class="btn btn-success my-3">Save</button>

            <a href="<?= ROOT ?>/admin/users">
                <button class="btn btn-secondary my-3" type="button">Back</button>
            </a>
        </form>
    </div>

<?php elseif ($action == "edit") : ?>

<?php elseif ($action == "delete") : ?>

<?php else : ?>

    <h4>
        Users
        <a href="<?= ROOT ?>/admin/users/add">
            <button class="btn btn-primary">New</button>
        </a>
    </h4>

    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php if (!empty($rows)) : ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row->id ?></td>
                    <td><?= $row->username ?></td>
                    <td><?= $row->email ?></td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>

<?php endif; ?>

<?php $this->view("admin/admin.footer") ?>