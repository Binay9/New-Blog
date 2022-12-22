<?php view('front/includes/header.php'); ?>

<div class="row">
    <div class="col-12 my-3">
        <h3><?php echo $category->name ?></h3>
    </div>

    <div class="col-12 mb-3">
        <div class="row">

            <?php foreach ($data as $article) : ?>
                <div class="col-lg-3 col-md-4 col-6 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <?php $image =  !empty($article->image) ? $article->image : 'default-img.jpeg' ?>
                            <div class="img-thumb img-fluid " style="background-image: url(<?php echo url('assets/images/' . $image); ?>)">
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <a href="<?php echo url('post/show/' . $article->id); ?>"> <?php echo $article->name; ?> </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</div>
<?php view('cms/includes/pagination.php', $pagination); ?>
<?php view('front/includes/footer.php'); ?>