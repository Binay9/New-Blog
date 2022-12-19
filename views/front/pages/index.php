<?php view('front/includes/header.php'); ?>
<div class="row">
    <div class="col-12 my-3">

        <div class="row">
            <div class="col-12 mb-3 top-article-title">
                <?php echo $topArticle->name; ?>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($topArticle->image)) : ?>
                <div class="col-6">
                    <img src="<?php echo url('assets/images/' . $topArticle->image); ?>" class="mx-auto d-block img-thumbnail img-fluid">
                </div>
            <?php endif; ?>

            <div class="col">
                <div class="row">
                    <div class="col-12 pb-2">
                        <?php $admin = $topArticle->admin()->select('name')->first(); ?>
                        <span class="top-article-info"> Author: <?php echo $admin->name; ?> </span>
                        <span class="top-article-info"> Published At: <?php echo date('j M Y h:i A', strtotime($topArticle->published_at)); ?> </span>
                    </div>
                    <div class="col-12">
                        <?php
                        $withBr = nl2br($topArticle->description);

                        $summery = substr($withBr, 0, strpos($withBr, '<br />'));

                        echo $summery;
                        ?>
                    </div>
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary btn-sm">Read More</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hr Line -->
<div class="row">
    <div class="col-12">
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-12 my-3">

        <div class="row">

            <?php foreach ($articles as $article) : ?>
                <div class="col-3 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <?php $image =  !empty($article->image) ? $article->image : 'default-img.jpeg' ?>
                            <div class="img-thumb img-fluid " style="background-image: url(<?php echo url('assets/images/' . $image); ?>)">
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <a href="<?php url($article->id) ?>"> <?php echo $article->name; ?> </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</div>

<?php view('front/includes/footer.php'); ?>