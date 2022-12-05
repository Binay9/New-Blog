<?php if (isset($_SESSION['message']) && !empty($_SESSION['message'])) : ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>" role="alert">
                <?php echo $_SESSION['message']['content']; ?>
            </div>
        </div>
    </div>
<?php unset($_SESSION['message']);
endif; ?>