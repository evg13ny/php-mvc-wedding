<?php $this->view("admin/admin.header") ?>

<?php if ($action == "add") : ?>

    <div class="col-md-6 mx-auto p-3 text-center">
        <h4>Add new family member</h4>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?></div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <label>Click to change image</label>
            <br>
            <br>
            <label>
                <input type="file" name="image" class="d-none" onchange="display_image(this.files[0], event)">
                <img src="<?= get_image() ?>" style="width: 250px; height: 250px; object-fit: cover; cursor: pointer;">
            </label>
            <br>
            <br>

            <input value="<?= old_value("name") ?>" type="text" name="name" class="form-control mt-3" placeholder="Full name">
            <input value="<?= old_value("title") ?>" type="text" name="title" class="form-control mt-3 mb-3" placeholder="Title">

            <label class="text-start d-block">List order:</label>
            <input value="<?= old_value("list_order", 0) ?>" type="number" min="0" name="list_order" class="form-control mt-3 mb-3">

            <small>Please enter full path e.g. https://www.socialnetwork.com/yourlogin</small>
            <input value="<?= old_value("twitter_link") ?>" type="text" name="twitter_link" class="form-control mt-3" placeholder="Twitter link">
            <input value="<?= old_value("facebook_link") ?>" type="text" name="facebook_link" class="form-control mt-3" placeholder="Facebook link">
            <input value="<?= old_value("linkedin_link") ?>" type="text" name="linkedin_link" class="form-control mt-3" placeholder="Linkedin link">
            <input value="<?= old_value("instagram_link") ?>" type="text" name="instagram_link" class="form-control mt-3" placeholder="Instagram link">

            <button class="btn btn-success my-3">Save</button>

            <a href="<?= ROOT ?>/admin/family">
                <button class="btn btn-secondary my-3" type="button">Back</button>
            </a>
        </form>
    </div>

<?php elseif ($action == "edit") : ?>

    <div class="col-md-6 mx-auto p-3 text-center">
        <h4>Edit family member record</h4>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?></div>
        <?php endif; ?>

        <?php if (!empty($row)) : ?>
            <form method="post" enctype="multipart/form-data">
                <label>Click to change image</label>
                <br>
                <br>
                <label>
                    <input type="file" name="image" class="d-none" onchange="display_image(this.files[0], event)">
                    <img src="<?= get_image($row->image) ?>" style="width: 250px; height: 250px; object-fit: cover; cursor: pointer;">
                </label>
                <br>
                <br>

                <input value="<?= old_value("name", $row->name) ?>" type="text" name="name" class="form-control mt-3" placeholder="Full name">
                <input value="<?= old_value("title", $row->title) ?>" type="text" name="title" class="form-control mt-3 mb-3" placeholder="Title">

                <label class="text-start d-block">List order:</label>
                <input value="<?= old_value("list_order", $row->list_order) ?>" type="number" min="0" name="list_order" class="form-control mt-3 mb-3">

                <small>Please enter full path e.g. https://www.socialnetwork.com/yourlogin</small>
                <input value="<?= old_value("twitter_link", $row->twitter_link) ?>" type="text" name="twitter_link" class="form-control mt-3" placeholder="Twitter link">
                <input value="<?= old_value("facebook_link", $row->facebook_link) ?>" type="text" name="facebook_link" class="form-control mt-3" placeholder="Facebook link">
                <input value="<?= old_value("linkedin_link", $row->linkedin_link) ?>" type="text" name="linkedin_link" class="form-control mt-3" placeholder="Linkedin link">
                <input value="<?= old_value("instagram_link", $row->instagram_link) ?>" type="text" name="instagram_link" class="form-control mt-3" placeholder="Instagram link">

                <button class="btn btn-success my-3">Save</button>

                <a href="<?= ROOT ?>/admin/family">
                    <button class="btn btn-secondary my-3" type="button">Back</button>
                </a>
            </form>

        <?php else : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?>
                Record not found
            </div>

            <a href="<?= ROOT ?>/admin/family">
                <button class="btn btn-secondary my-3" type="button">Back</button>
            </a>
        <?php endif; ?>

    </div>

<?php elseif ($action == "delete") : ?>

    <div class="col-md-6 mx-auto p-3 text-center">
        <h4>Delete family member</h4>

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

                <a href="<?= ROOT ?>/admin/family">
                    <button class="btn btn-secondary my-3" type="button">Back</button>
                </a>
            </form>

        <?php else : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?>
                Record not found
            </div>

            <a href="<?= ROOT ?>/admin/family">
                <button class="btn btn-secondary my-3" type="button">Back</button>
            </a>
        <?php endif; ?>

    </div>

<?php else : ?>

    <h4>
        Family
        <a href="<?= ROOT ?>/admin/family/add">
            <button class="btn btn-primary">New</button>
        </a>
    </h4>

    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Title</th>
            <th>List order</th>
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
                        <?= esc($row->name) ?>
                    </td>
                    <td>
                        <?= esc($row->title) ?>
                    </td>
                    <td>
                        <?= esc($row->list_order) ?>
                    </td>
                    <td>
                        <a href="<?= ROOT ?>/admin/family/edit/<?= $row->id ?>">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                        <a href="<?= ROOT ?>/admin/family/delete/<?= $row->id ?>">
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