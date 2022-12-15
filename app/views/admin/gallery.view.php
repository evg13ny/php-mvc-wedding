<?php $this->view("admin/admin.header") ?>

<?php if ($action == "add") : ?>

    <div class="col-md-6 mx-auto p-3 text-center">
        <h4>Add new image</h4>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?></div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <label>Click to change image</label>
            <br>
            <label>
                <input type="file" name="image" class="d-none" onchange="display_image(this.files[0], event)">
                <img src="<?= get_image() ?>" style="width: 250px; height: 250px; object-fit: cover; cursor: pointer;">
            </label>
            <br>
            <br>
            <button class="btn btn-success my-3">Save</button>

            <a href="<?= ROOT ?>/admin/gallery">
                <button class="btn btn-secondary my-3" type="button">Back</button>
            </a>
        </form>
    </div>

<?php elseif ($action == "edit") : ?>

    <div class="col-md-6 mx-auto p-3 text-center">
        <h4>Edit image</h4>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?></div>
        <?php endif; ?>

        <?php if (!empty($row)) : ?>
            <form method="post" enctype="multipart/form-data">
                <label>Click to change image</label>
                <br>
                <label>
                    <input type="file" name="image" class="d-none" onchange="display_image(this.files[0], event)">
                    <img src="<?= get_image($row->image) ?>" style="width: 250px; height: 250px; object-fit: cover; cursor: pointer;">
                </label>
                <br>
                <br>

                <button class="btn btn-success my-3">Save</button>

                <a href="<?= ROOT ?>/admin/gallery">
                    <button class="btn btn-secondary my-3" type="button">Back</button>
                </a>
            </form>

        <?php else : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?>
                Record not found
            </div>

            <a href="<?= ROOT ?>/admin/gallery">
                <button class="btn btn-secondary my-3" type="button">Back</button>
            </a>
        <?php endif; ?>

    </div>

<?php elseif ($action == "delete") : ?>

    <div class="col-md-6 mx-auto p-3 text-center">
        <h4>Delete image</h4>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?></div>
        <?php endif; ?>

        <?php if (!empty($row)) : ?>
            <form action="" method="post">
                <label>
                    <input type="file" name="image" class="d-none" onchange="display_image(this.files[0], event)">
                    <img src="<?= get_image($row->image) ?>" style="width: 250px; height: 250px; object-fit: cover; cursor: pointer;">
                </label>
                <br>

                <button class="btn btn-danger my-3">Delete</button>

                <a href="<?= ROOT ?>/admin/gallery">
                    <button class="btn btn-secondary my-3" type="button">Back</button>
                </a>
            </form>

        <?php else : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?>
                Record not found
            </div>

            <a href="<?= ROOT ?>/admin/gallery">
                <button class="btn btn-secondary my-3" type="button">Back</button>
            </a>
        <?php endif; ?>

    </div>

<?php else : ?>

    <h4>
        Image gallery
        <a href="<?= ROOT ?>/admin/gallery/add">
            <button class="btn btn-primary">New</button>
        </a>
    </h4>

    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        <?php if (!empty($rows)) : ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td>
                        <?= $row->id ?>
                    </td>
                    <td>
                        <img src="<?= get_image($row->image) ?>" style="width: 100px; height: 100px; object-fit: cover;">
                    </td>
                    <td>
                        <a href="<?= ROOT ?>/admin/gallery/edit/<?= $row->id ?>">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                        <a href="<?= ROOT ?>/admin/gallery/delete/<?= $row->id ?>">
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