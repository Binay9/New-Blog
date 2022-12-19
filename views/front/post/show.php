<?php view('front/includes/header.php'); ?>
<div class="row">
    <div class="col-12 my-3">
        <?php view('cms/includes/messages.php'); ?>

        <div class="row">
            <div class="col-12 mb-3 top-article-title">
                <?php echo $article->name; ?>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($article->image)) : ?>
                <div class="col-12">
                    <img src="<?php echo url('assets/images/' . $article->image); ?>" class="mx-auto d-block img-thumbnail img-fluid">
                </div>
            <?php endif; ?>

            <div class="col-12 m-2">
                <div class="row">
                    <div class="col-12 pb-2">
                        <?php $category = $article->category()->select('name')->first(); ?>
                        <span class="top-article-info"> Category: <?php echo $category->name; ?> </span>

                        <?php $admin = $article->admin()->select('name')->first(); ?>
                        <span class="top-article-info"> Author: <?php echo $admin->name; ?> </span>

                        <span class="top-article-info"> Published At: <?php echo date('j M Y h:i A', strtotime($article->published_at)); ?> </span>
                    </div>
                    <div class="col-12">
                        <?php
                        $withBr = nl2br($article->description);
                        echo $withBr;
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-12 my-2">

        <div class="row">

            <div class="col-7">

                <div class="row">
                    <div class="col-12">
                        <h3>Post Comment</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 my-3">

                        <form action="<?php echo url('post/comment/' . $article->id); ?>" method="POST">
                            <div class="mb-2">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-2">
                                <label for="cmt" class="form-label">Comment</label>
                                <textarea name="cmt" id="cmt" class="form-control" rows="3" placeholder="Enter your comment" required></textarea>
                            </div>

                            <div class="my-3">
                                <button class="btn btn-dark" type="submit">Add Comment</button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <hr>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <h3>Comments</h3>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <?php if (!empty($comments)) : ?>
                            <?php foreach ($comments as $comment) : ?>

                                <div class="col-12 m-2 p-3 border border-secondary rounded">
                                    <div class="row">
                                        <div class="col-12">
                                            <?php echo nl2br($comment->comment); ?>
                                        </div>
                                        <div class="col-12">
                                            <small>
                                                Posted By: <?php echo $comment->name; ?> (<?php echo $comment->email; ?>) on <?php echo date('j M Y h:i A', strtotime($comment->created_at));  ?>
                                            </small>

                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="row">
                                <div class="col-12 m-2 p-3 border border-secondary rounded ">
                                    <span>
                                        No comments yet.
                                    </span>
                                </div>
                            </div>

                        <?php endif; ?>

                    </div>
                </div>

            </div>

            <div class="col-5">
                <div class="row">
                    <div class="col-12">

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<?php view('front/includes/footer.php'); ?>