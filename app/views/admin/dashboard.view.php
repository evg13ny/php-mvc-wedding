<?php $this->view("admin/admin.header") ?>

<h4>Dashboard</h4>

<div class="row">
    <div class="m-4 p-2 text-center shadow col-md-3 border rounded">
        <i class="text-primary fs-2 fa fa-users"></i>
        <h5>Users</h5>
        <h6><?= $total_users->total ?></h6>
    </div>

    <div class="m-4 p-2 text-center shadow col-md-3 border rounded">
        <i class="text-primary fs-2 fa fa-images"></i>
        <h5>Gallery images</h5>
        <h6><?= $total_images->total ?></h6>
    </div>

    <div class="m-4 p-2 text-center shadow col-md-3 border rounded">
        <i class="text-primary fs-2 fa fa-envelope"></i>
        <h5>Rsvp count</h5>
        <h6><?= $total_rsvps->total ?></h6>
    </div>
</div>

<?php $this->view("admin/admin.footer") ?>