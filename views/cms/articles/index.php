<?php
view('cms/includes/header.php');
view('cms/includes/nav.php');
?>

<div class="row">
    <div class="col-12 bg-white my-1 py-4 px-3">
        <div class="row mb-2">
            <div class="col">
                <h2>Articles</h2>
                <?php view('cms/includes/messages.php'); ?>
            </div>
            <?php if (user()->type == 'author') : ?>
                <div class="col-auto">
                    <a href="<?php echo url('articles/create'); ?>" class="btn btn-secondary">Add Article</a>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if (count($data) > 0) : ?>
                    <table class="table table-spriped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Published At</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $article) : ?>
                                <tr>
                                    <td>
                                        <?php echo $article->name; ?>
                                    </td>

                                    <?php $author  = $article->admin()->first(); ?>
                                    <td>
                                        <?php echo $author->name; ?>
                                    </td>

                                    <?php $category  = $article->category()->first(); ?>
                                    <td>
                                        <?php echo $category->name; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($article->image)) : ?>
                                            <img src="<?php echo url('assets/images/' . $article->image); ?>" class="img-fluid small">
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo ucfirst($article->status); ?>
                                    </td>
                                    <td>
                                        <?php echo !empty($article->published_at) ? $article->published_at : '- N/A -'; ?>
                                    </td>
                                    <td>
                                        <?php echo $article->created_at; ?>
                                    </td>
                                    <td>
                                        <?php echo $article->updated_at; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo url('articles/edit/' . $article->id); ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo url('articles/destroy/' . $article->id); ?>" class="btn btn-danger btn-sm delete">Delete</a>
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