<?php
view('cms/includes/header.php');
view('cms/includes/nav.php');
?>

<div class="row">
    <div class="col-12 bg-white my-1 py-4 px-3">
        <div class="row">
            <div class="col-6 mx-auto ">
                <?php view('cms/includes/messages.php'); ?>
                <h2 class="text-center">Edit Profile</h2>

                <form action="<?php echo url('profile/update'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" value="<?php echo $user->name; ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $user->email; ?>" class="form-control" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" value="<?php echo $user->phone; ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" class="form-control" required><?php echo $user->address; ?>
                                </textarea>
                    </div>
                    <div class=" mb-3">
                        <button class="btn btn-secondary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
view('cms/includes/footer.php');
?>