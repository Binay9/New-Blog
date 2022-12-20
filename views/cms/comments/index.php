<?php
view('cms/includes/header.php');
view('cms/includes/nav.php');
?>

<div class="row">
    <div class="col-12 bg-white my-1 py-4 px-3">
        <div class="row mb-2">
            <div class="col">
                <h2>Comments</h2>
                <?php view('cms/includes/messages.php'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if (count($data) > 0) : ?>
                    <table class="table table-spriped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Article</th>
                                <th>Comment</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $cmt) : ?>
                                <tr>
                                    <td>
                                        <?php echo $cmt->name; ?>
                                    </td>
                                    <td>
                                        <?php echo $cmt->email; ?>
                                    </td>
                                    <?php $article = $cmt->article()->select('name')->first(); ?>
                                    <td>
                                        <?php echo $article->name; ?>
                                    </td>
                                    <td>
                                        <?php echo nl2br($cmt->comment); ?>
                                    </td>
                                    <td>
                                        <?php echo $cmt->created_at; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo url('comments/destroy/' . $cmt->id); ?>" class="btn btn-danger btn-sm delete">Delete</a>
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