<?php
view('cms/includes/header.php');
view('cms/includes/nav.php');
?>

<div class="row">
    <div class="col-12 bg-white my-1 py-4 px-3">
        <div class="row">
            <div class="col-6 mx-auto ">
                <?php view('cms/includes/messages.php'); ?>
                <h2 class="text-center">Add Article</h2>

                <form action="<?php echo url('articles/store'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" name="image" type="file" id="images" accept="image/*" multiple>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categories</label>
                        <select class="form-select" name="category_id" id="category_id" required>
                            <option selected disabled hidden> Select Category</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="published_at" class="form-label">Publish Date</label>
                        <input name="published_at" id="published_at" type="text" class="form-control datetimepicker-input" data-target="#published_at" data-toggle="datetimepicker">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" required>
                            <option selected disabled hidden>Set Status</option>
                            <option value="draft">*** Draft ***</option>
                            <option value="pending">*** PUBLISH ***</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-secondary" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Intend -->
<div class="row my-5">
    <div class="col-12 my-5"></div>
</div>

<?php
view('cms/includes/footer.php');
?>