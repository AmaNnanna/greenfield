<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(<?= $assets ?>/img/testimonial/test-bg.png)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-left">
                        <div class="breadcrumb-title">
                            <h2>Our Blog</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <!-- inner-blog -->
    <section class="inner-blog b-details-p">
        <div class="container">
            <div class="row">
                <div class="blog-details-wrap">
                    <div class="related__post mt-45 mb-85">
                        <div class="post-title">
                            <h4>Our Recents Blogs</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <?php while ($BlogPost = mysqli_fetch_object($BlogPosts)) : ?>
                    <div class="col-md-4">
                        <div class="related-post-wrap
                                                mb-30">
                            <div class="post-thumb">
                                <img src="<?= $BlogPost->firstImage ?>">
                            </div>
                            <div class=" rp__content">
                                <h3><a href="/pages/<?= $BlogPost->id ?>/blog-details"><?= $BlogPost->heading ?></a>
                                </h3>
                                <p class="pb-30"><?= $BlogPost->shortDescription ?>
                                </p>
                                <div class="meta-info">
                                    <ul class="pb-0">
                                        <li><i class="far fa-user"></i> <?= $BlogPost->postCreator ?> </li>
                                        <li><i class="fal fa-calendar-alt"></i><?= date("M. Y", strtotime($BlogPost->postDate))  ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>
    </section>
    <!-- inner-blog-end -->
</main>
<!-- main-area-end -->