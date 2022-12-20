<?php $this->view("admin/admin.header") ?>

<?php if ($action == "delete") : ?>

    <div class="col-md-6 mx-auto p-3 text-center">
        <h4>Delete rsvp</h4>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?></div>
        <?php endif; ?>

        <?php if (!empty($row)) : ?>
            <form action="" method="post">
                <div class="alert alert-danger text-center mb-3">Are you sure you want to delete this record?</div>
                <div class="form-control mt-3"><?= old_value("name", esc($row->name)) ?></div>
                <div class="form-control mt-3"><?= old_value("email", esc($row->email)) ?></div>
                <div class="form-control mt-3"><?= old_value("message", esc($row->message)) ?></div>

                <button class="btn btn-danger my-3">Delete</button>

                <a href="<?= ROOT ?>/admin/rsvp">
                    <button class="btn btn-secondary my-3" type="button">Back</button>
                </a>
            </form>

        <?php else : ?>
            <div class="alert alert-danger text-center"><?= implode("<br>", $errors) ?>
                Record not found
            </div>

            <a href="<?= ROOT ?>/admin/rsvp">
                <button class="btn btn-secondary my-3" type="button">Back</button>
            </a>
        <?php endif; ?>

    </div>

<?php else : ?>

    <h4>
        Rsvp
    </h4>

    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Guests</th>
            <th>Attending</th>
            <th>Message</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        <?php if (!empty($rows)) : ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td>
                        <?= $row->id ?>
                    </td>
                    <td>
                        <?= esc($row->name) ?>
                    </td>
                    <td>
                        <?= esc($row->email) ?>
                    </td>
                    <td>
                        <?= esc($row->guests) ?>
                    </td>
                    <td>
                        <?= esc($row->attending) ?>
                    </td>
                    <td>
                        <?= esc($row->message) ?>
                    </td>
                    <td>
                        <?= esc($row->date) ?>
                    </td>
                    <td>
                        <a href="<?= ROOT ?>/admin/rsvp/delete/<?= $row->id ?>">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>

<?php endif; ?>

<?php $this->view("admin/admin.footer") ?>