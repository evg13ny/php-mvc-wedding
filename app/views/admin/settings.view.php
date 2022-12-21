<?php $this->view("admin/admin.header") ?>

<?php if ($action == "add") : ?>

    <div class="col-md-6 mx-auto p-3 text-center">
        <h4>Add new setting</h4>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?></div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <input value="<?= old_value("setting") ?>" type="text" name="setting" class="form-control mb-3" placeholder="Setting name">
            <select name="type" class="form-select mb-3">
                <option <?= old_select("type", "text") ?> value="text">Text</option>
                <option <?= old_select("type", "image") ?> value="image">Image</option>
                <option <?= old_select("type", "number") ?> value="number">Number</option>
            </select>

            <button class="btn btn-success my-3">Save</button>

            <a href="<?= ROOT ?>/admin/settings">
                <button class="btn btn-secondary my-3" type="button">Back</button>
            </a>
        </form>
    </div>

<?php elseif ($action == "edit") : ?>

    <div class="col-md-6 mx-auto p-3 text-center">
        <h4>Edit setting</h4>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?></div>
        <?php endif; ?>

        <?php if (!empty($row)) : ?>
            <form method="post" enctype="multipart/form-data">
                <input value="<?= old_value("setting", $row->setting) ?>" type="text" name="setting" class="form-control mb-3" placeholder="Setting name">

                <?php if ($row->type == "image") : ?>
                    <label>Click to change image</label>
                    <br>
                    <br>
                    <label>
                        <input type="file" name="image" class="d-none" onchange="display_image(this.files[0], event)">
                        <img src="<?= get_image($row->value) ?>" style="width: 250px; height: 250px; object-fit: cover; cursor: pointer;">
                    </label>
                <?php else : ?>
                    <input value="<?= old_value("value", $row->value) ?>" type="text" name="value" class="form-control mt-3" placeholder="Setting value">
                <?php endif; ?>

                <br>
                <button class="btn btn-success my-3">Save</button>

                <a href="<?= ROOT ?>/admin/settings">
                    <button class="btn btn-secondary my-3" type="button">Back</button>
                </a>
            </form>

        <?php else : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?>
                Record not found
            </div>

            <a href="<?= ROOT ?>/admin/settings">
                <button class="btn btn-secondary my-3" type="button">Back</button>
            </a>
        <?php endif; ?>

    </div>

<?php elseif ($action == "delete") : ?>

    <div class="col-md-6 mx-auto p-3 text-center">
        <h4>Delete setting</h4>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?></div>
        <?php endif; ?>

        <?php if (!empty($row)) : ?>
            <form action="" method="post">
                <div class="alert alert-danger text-center mb-3">Are you sure you want to delete this record?</div>

                <div class="form-control mt-3"><?= old_value("setting", esc($row->setting)) ?></div>

                <?php if ($row->type == "image") : ?>
                    <div class="form-control my-3"><?= old_value("value", esc($row->value)) ?></div>
                <?php else : ?>
                    <label>
                        <input type="file" name="image" class="d-none" onchange="display_image(this.files[0], event)">
                        <img src="<?= get_image($row->value) ?>" style="width: 250px; height: 250px; object-fit: cover; cursor: pointer;">
                    </label>
                <?php endif; ?>

                <button class="btn btn-danger my-3">Delete</button>

                <a href="<?= ROOT ?>/admin/settings">
                    <button class="btn btn-secondary my-3" type="button">Back</button>
                </a>
            </form>

        <?php else : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?>
                Record not found
            </div>

            <a href="<?= ROOT ?>/admin/settings">
                <button class="btn btn-secondary my-3" type="button">Back</button>
            </a>
        <?php endif; ?>

    </div>

<?php else : ?>

    <h4>
        Settings
        <a href="<?= ROOT ?>/admin/settings/add">
            <button class="btn btn-primary">New</button>
        </a>
    </h4>

    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>Setting</th>
            <th>Type</th>
            <th>Value</th>
            <th>Action</th>
        </tr>

        <?php if (!empty($rows)) : ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td>
                        <?= $row->id ?>
                    </td>
                    <td>
                        <?= $row->setting ?>
                    </td>
                    <td>
                        <?= esc($row->type) ?>
                    </td>

                    <?php if ($row->type == "image") : ?>
                        <td>
                            <img src="<?= get_image($row->value) ?>" style="width: 100px; height: 100px; object-fit: cover;">
                        </td>
                    <?php else : ?>
                        <td>
                            <?= esc($row->value) ?>
                        </td>
                    <?php endif; ?>

                    <td>
                        <a href="<?= ROOT ?>/admin/settings/edit/<?= $row->id ?>">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                        <a href="<?= ROOT ?>/admin/settings/delete/<?= $row->id ?>">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>

<?php endif; ?>

<script>
    function display_image(file, event) {
        let img = event.currentTarget.parentNode.querySelector("img")
        img.src = URL.createObjectURL(file)
    }
</script>

<?php $this->view("admin/admin.footer") ?>