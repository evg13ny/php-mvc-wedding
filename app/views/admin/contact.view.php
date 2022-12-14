<?php $this->view("admin/admin.header") ?>

<?php if ($action == "edit") : ?>

    <div class="col-md-6 mx-auto p-3">
        <h4>Edit user</h4>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?></div>
        <?php endif; ?>

        <?php if (!empty($row)) : ?>
            <form action="" method="post">
                <small>Please enter full path e.g. https://www.socialnetwork.com/yourlogin</small>

                <input type="text" name="twitter_link" class="form-control mt-3" value="<?= old_value("twitter_link", $row->twitter_link) ?>" placeholder="Twitter link">
                <input type="text" name="facebook_link" class="form-control mt-3" value="<?= old_value("facebook_link", $row->facebook_link) ?>" placeholder="Facebook link">
                <input type="text" name="linkedin_link" class="form-control mt-3" value="<?= old_value("linkedin_link", $row->linkedin_link) ?>" placeholder="Linkedin link">
                <input type="text" name="instagram_link" class="form-control mt-3" value="<?= old_value("instagram_link", $row->instagram_link) ?>" placeholder="Instagram link">
                <input type="text" name="email" class="form-control mt-3" value="<?= old_value("email", $row->email) ?>" placeholder="Email">
                <input type="text" name="phone" class="form-control mt-3" value="<?= old_value("phone", $row->phone) ?>" placeholder="Phone">

                <button class="btn btn-success my-3">Save</button>

                <a href="<?= ROOT ?>/admin/contact">
                    <button class="btn btn-secondary my-3" type="button">Back</button>
                </a>
            </form>

        <?php else : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?>
                Record not found
            </div>

            <a href="<?= ROOT ?>/admin/contact">
                <button class="btn btn-secondary my-3" type="button">Back</button>
            </a>
        <?php endif; ?>

    </div>

<?php else : ?>

    <h4>
        Contact links
    </h4>

    <table class="table table-striped table-bordered">

        <?php if (!empty($rows)) : ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <th>#</th>
                    <td>
                        <?= $row->id ?>
                    </td>
                </tr>
                <tr>
                    <th>Twitter</th>
                    <td>
                        <?= $row->twitter_link ?>
                    </td>
                </tr>
                <tr>
                    <th>Facebook</th>
                    <td>
                        <?= $row->facebook_link ?>
                    </td>
                </tr>
                <tr>
                    <th>Linkedin</th>
                    <td>
                        <?= $row->linkedin_link ?>
                    </td>
                </tr>
                <tr>
                    <th>Instagram</th>
                    <td>
                        <?= $row->instagram_link ?>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <?= $row->email ?>
                    </td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>
                        <?= $row->phone ?>
                    </td>
                </tr>
                <tr>
                    <th>Action</th>
                    <td>
                        <a href="<?= ROOT ?>/admin/contact/edit/<?= $row->id ?>">
                            <button class="btn btn-primary">
                                Edit
                            </button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>

<?php endif; ?>

<?php $this->view("admin/admin.footer") ?>