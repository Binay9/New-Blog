<?php
view('cms/includes/header.php');
view('cms/includes/nav.php');
view('cms/includes/messages.php');
?>

<div class="row">
    <div class="col-12 bg-white my-1 py-4 px-3">
        <div class="row mb-2">
            <div class="col">
                <h2>Admin</h2>
            </div>
            <div class="col-auto">
                <a href="<?php echo url('admins/create'); ?>" class="btn btn-secondary">Add Admin</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if (count($admins) > 0) : ?>
                    <table class="table table-spriped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admins as $admin) : ?>
                                <tr>
                                    <td>
                                        <?php echo $admin->name; ?>
                                    </td>
                                    <td>
                                        <?php echo $admin->email; ?>
                                    </td>
                                    <td>
                                        <?php echo $admin->phone; ?>
                                    </td>
                                    <td>
                                        <?php echo $admin->address; ?>
                                    </td>
                                    <td>
                                        <?php echo $admin->created_at; ?>
                                    </td>
                                    <td>
                                        <?php echo $admin->updated_at; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo url('admins/edit/' . $admin->id); ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo url('admins/destroy/' . $admin->id); ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <h3 class="text-center">No data found.</h3>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?php
view('cms/includes/footer.php');
?>