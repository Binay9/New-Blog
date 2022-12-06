<div class="row">
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary col-12">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo url('home'); ?>">NewsBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (user()->type == 'admin') : ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo url('admins'); ?>">Admin</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Comments</a>
                    </li>
                </ul>
                <ul class="navbar-nav pe-2">
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo user()->name; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-1 me-2">
                            <li><a class="dropdown-item" href="<?php echo url('profile/edit'); ?>">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="<?php echo url('password/edit'); ?>">Change Password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?php echo url('logout'); ?>">Logout!</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>