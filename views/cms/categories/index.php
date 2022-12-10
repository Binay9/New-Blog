<?php
view('cms/includes/header.php');
view('cms/includes/nav.php');
?>

<div class="row">
    <div class="col-12 bg-white my-1 py-4 px-3">
        <div class="row mb-2">
            <div class="col">
                <h2>Categories</h2>
                <?php view('cms/includes/messages.php'); ?>
            </div>
            <div class="col-auto">
                <a href="<?php echo url('categories/create'); ?>" class="btn btn-secondary">Add Category</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if (count($data) > 0) : ?>
                    <table class="table table-spriped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $category) : ?>
                                <tr>
                                    <td>
                                        <?php echo $category->name; ?>
                                    </td>
                                    <td>
                                        <?php echo $category->created_at; ?>
                                    </td>
                                    <td>
                                        <?php echo $category->updated_at; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo url('categories/edit/' . $category->id); ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo url('categories/destroy/' . $category->id); ?>" class="btn btn-danger btn-sm delete">Delete</a>
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

        <?php view('cms/includes/pagination.php', $pagination); ?>
    </div>
</div>

<?php
view('cms/includes/footer.php');
?>