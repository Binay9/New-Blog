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
                    <img src="<?php echo url('assets/images/' . $topArticle->image); ?>" class="mx-auto d-block img-fluid border">
                </div>
            <?php endif; ?>

            <div class="col">
                <div class="row">
                    <div class="col-12 pb-2">
                        <?php $admin = $topArticle->admin()->select('name')->first(); ?>
                        <span class="top-article-info"> Author: <?php echo $admin->name; ?> </span>
                        <span class="top-article-info"> Published At: 15 May 2019 12:00 AM </span>
                    </div>
                    <div class="col-12">
                        fjd ds sdf sdfsd sdfsdfsd sdfsd df dd ds a sfd asf.
                        sdfd aa sd safjn jfsd this isi a demo text. fjd ds sdf sdfsd sdfsdfsd sdfsd df dd ds a sfd asf. sdfd aa sd safjn jfsd this isi a demo text.
                        fjd ds sdf sdfsd sdfsdfsd sdfsd df dd ds a sfd asf.
                        sdfd aa sd safjn jfsd this isi a demo text.
                        fjd ds sdf sdfsd sdfsdfsd sdfsd df dd ds a sfd asf.
                        sdfd aa sd safjn jfsd this isi a demo text. fjd ds sdf sdfsd sdfsdfsd sdfsd df dd ds a sfd asf. sdfd aa sd safjn jfsd this isi a demo text.
                        fjd ds sdf sdfsd sdfsdfsd sdfsd df dd ds a sfd asf.
                        sdfd aa sd safjn jfsd this isi a demo text.
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
            <div class="col-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <img src="<?php echo url('assets/images/Nature-Picture.jpg') ?>" class="mx-auto d-block img-fluid border">
                    </div>
                    <div class="col-12">
                        <a href="#">This is a demo title.</a>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <img src="<?php echo url('assets/images/Nature-Picture.jpg') ?>" class="mx-auto d-block img-fluid border">
                    </div>
                    <div class="col-12">
                        <a href="#">This is a demo title.</a>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <img src="<?php echo url('assets/images/Nature-Picture.jpg') ?>" class="mx-auto d-block img-fluid border">
                    </div>
                    <div class="col-12">
                        <a href="#">This is a demo title.</a>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <img src="<?php echo url('assets/images/Nature-Picture.jpg') ?>" class="mx-auto d-block img-fluid border">
                    </div>
                    <div class="col-12">
                        <a href="#">This is a demo title.</a>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <img src="<?php echo url('assets/images/Nature-Picture.jpg') ?>" class="mx-auto d-block img-fluid border">
                    </div>
                    <div class="col-12">
                        <a href="#">This is a demo title.</a>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <img src="<?php echo url('assets/images/Nature-Picture.jpg') ?>" class="mx-auto d-block img-fluid border">
                    </div>
                    <div class="col-12">
                        <a href="#">This is a demo title.</a>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <img src="<?php echo url('assets/images/Nature-Picture.jpg') ?>" class="mx-auto d-block img-fluid border">
                    </div>
                    <div class="col-12">
                        <a href="#">This is a demo title.</a>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <img src="<?php echo url('assets/images/Nature-Picture.jpg') ?>" class="mx-auto d-block img-fluid border">
                    </div>
                    <div class="col-12">
                        <a href="#">This is a demo title.</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<?php view('front/includes/footer.php'); ?>