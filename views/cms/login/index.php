<?php
view('cms/includes/header.php');
?>

<div class="row">
    <div class="col-4 bg-white mx-auto my-5 py-4 px-3">

        <div class="row">
            <div class="col-12 text-center">
                <h1>Login</h1>
            </div>
        </div>

        <?php view('cms/includes/messages.php'); ?>

        <div class="row">
            <div class="col-12">
                <form action="<?php echo url('login/check'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email here" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password here" required>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-secondary" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php
view('cms/includes/footer.php');
?>