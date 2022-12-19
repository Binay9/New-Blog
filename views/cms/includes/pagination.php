<?php if ($pages > 1) : ?>
    <?php
    if (!empty($query)) {
        $qry = [];

        foreach ($query as $key => $value) {
            $qry[] = $key . '=' . $value;
        }

        $qry[] = 'page=';

        $qry = '?' . implode('&', $qry);
    } else {
        $qry = '?page=';
    }
    ?>



    <div class="row mt-4">
        <div class="col-12">
            <nav>
                <ul class="pagination justify-content-center">

                    <?php if ($pageno == 1) : ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Previous</a>
                        </li>
                    <?php else : ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $path . $qry . ($pageno - 1); ?>">Previous</a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $pages; $i++) : ?>
                        <?php if ($i == $pageno) : ?>
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#"><?php echo $i; ?></a>
                            </li>
                        <?php else : ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $path . $qry . $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($pageno == $pages) : ?>
                        <li class="page-item disabled">
                            <a class="page-link">Next</a>
                        </li>
                    <?php else : ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $path . $qry  . ($pageno + 1); ?>">Next</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
<?php endif; ?>