<!DOCTYPE html>
<html lang="en">

<head>
    <title>NewsBlog || Latest News</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('assets/css/all.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('assets/css/front.css'); ?>" rel="stylesheet">
</head>

<body>

    <div class="container bg-white">

        <div class="row">
            <div class="col-12">

                <div class="row my-3">
                    <div class="col me-auto">
                        <a class="site-name" href="<?php echo url(); ?>">NewsBlog</a>
                    </div>
                    <div class="col-4 pt-2">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary col-12">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                    <?php
                                    $categories = new \App\Models\Category;
                                    $category = $categories->select('id, name')->get();
                                    foreach ($category as $cat) :
                                    ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><?php echo $cat->name; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>