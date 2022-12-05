<?php
if (check_message()) :
    $message = get_message();
?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-<?php echo $message['type']; ?>" role="alert">
                <?php echo $message['content']; ?>
            </div>
        </div>
    </div>
<?php
    clear_message();
endif;
?>