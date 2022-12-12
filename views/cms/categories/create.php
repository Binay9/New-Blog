<?php
view('cms/includes/header.php');
view('cms/includes/nav.php');
?>

<div class="row">
    <div class="col-12 bg-white my-1 py-4 px-3">
        <div class="row">
            <div class="col-6 mx-auto ">
                <?php view('cms/includes/messages.php'); ?>
                <h2 class="text-center">Add Category</h2>

                <form action="<?php echo url('categories/store'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class=" mb-3">
                        <button class="btn btn-secondary" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
view('cms/includes/footer.php');
?>