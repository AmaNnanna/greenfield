<!-- main-area -->
<main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(<?= $assets ?>/img/testimonial/test-bg.png)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-left">
                        <div class="breadcrumb-title">
                            <h2>Our Blog Detail</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item
                                                    active" aria-current="page">Blog
                                            Detail</li>
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
    <section class="inner-blog b-details-p pt-120 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-wrap">
                        <div class="details__content pb-30">
                            <div class="bsingle__post-thumb mb-30">
                                <img src="<?= $BlogDetails->firstImage ?>" alt="Blog Image">
                            </div>
                            <h2><?= $BlogDetails->heading ?></h2>
                            <div class="meta-info">
                                <ul>
                                    <li><i class="far fa-user"></i><?= $BlogDetails->postCreator ?></li>
                                    <li><i class="fal fa-calendar-alt"></i><?= date("jS F, Y", strtotime($BlogDetails->postDate)) ?></li>
                                </ul>
                            </div>
                            <div><?= $BlogDetails->firstContent ?></div>

                            <?php if (!empty($BlogDetails->blockQuote)) : ?>
                            <blockquote>
                                <footer><?= $BlogDetails->quoteAuthor ?></footer>
                                <h3><?= $BlogDetails->blockQuote ?></h3>
                            </blockquote>
                            <?php endif; ?>

                            <?php if (!empty($BlogDetails->videoLink)) : ?>
                                <div class="bsingle__post mb-50">
                                    <div class="bsingle__post-thumb video-p">
                                        <img src="<?= $BlogDetails->secondImage ?>" alt="">

                                        <a href="<?= $BlogDetails->videoLink ?>" class="video-i popup-video"> <i class="fas fa-play"></i></a>

                                        <h4><?= $BlogDetails->secondImageHeading ?></h4>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div><?= $BlogDetails->secondContent ?></div>

                            <div class="details__content-img">
                                <img src="<?= $BlogDetails->thirdImage ?>" alt="">
                                <h4><?= $BlogDetails->thirdImageHeading ?></h4>
                            </div>

                            <div><?= $BlogDetails->thirdContent ?></div>

                            <a class="btn ss-btn mt-30" href="/pages/blog">Go Back to Blogs</a>
                        </div>
                    </div>

                    <?php
                    $sql = "SELECT * FROM blog_posts ORDER BY id DESC";
                    $BlogPosts = mysqli_query($Core->dbCon, $sql);
                    $Template->assign("Campaigns", $BlogPosts);
                    ?>

                    <section id="custom_html-5" class="widget_text widget widget_custom_html mb-50">
                        <h2 class="widget-title">Share</h2>
                        <div class="textwidget custom-html-widget">
                            <?php while ($BlogPost = mysqli_fetch_object($BlogPosts)) : ?>
                                <div class="widget-social">
                                    <a href="http://www.facebook.com/sharer.php?u=https://aulmed.org/pages/<?= $BlogPost->id ?>/blog-details&text=<?= $BlogPost->heading ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/share?url=https://aulmed.org/pages/1/blog-details&text=<?= $BlogPost->heading ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=https://aulmed.org/pages/<?= $BlogPost->id ?>/blog-details&text=<?= $BlogPost->heading ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                    <a href="https://api.whatsapp.com/send?&text=<?= $BlogPost->heading ?>%0ARead Here:%20https://aulmed.org/pages/<?= $BlogPost->id ?>/blog-details" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                    <a href="mailto:?Subject=<?= $BlogPost->heading ?>&Body=<?= $BlogPost->heading ?>%0ARead More: https://aulmed.org/pages/<?= $BlogPost->id ?>/blog-details" target="_blank"><i class="fa fa-envelope"></i></a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </section>
                </div>


                <?php
                $sqlEvents = "SELECT * FROM events ORDER BY id DESC LIMIT 3";
                $Events = mysqli_query($Core->dbCon, $sqlEvents);
                $Template->assign("Events", $Events);
                ?>
                <!-- #right side -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <aside class="sidebar-widget">
                        <?php while ($Event = mysqli_fetch_object($Events)) : ?>
                            <section class="widget widget_search">
                                <div class="course-widget-price">
                                    <h2 class="widget-title"><?= $Event->title ?></h2>
                                    <ul>
                                        <li>
                                            <i class="fal fa-calendar-alt"></i>
                                            <span>Start Date</span>
                                            <span class="time"><?= date("l, jS M. Y", strtotime($Event->startDate)) ?></span>
                                        </li>
                                        <li>
                                            <i class="fal fa-clock"></i>
                                            <span>Time</span>
                                            <span class="time"><?= date("g:ia", strtotime($Event->startDate)) ?></span>
                                        </li>
                                        <li>
                                            <i class="fal fa-calendar-alt"></i>
                                            <span>End Date</span>
                                            <span class="time"><?= date("l, jS M. Y", strtotime($Event->endDate)) ?></span>
                                        </li>
                                        <li>
                                            <i class="fal fa-clock"></i>
                                            <span>Time</span>
                                            <span class="time"><?= date("g:ia", strtotime($Event->endDate)) ?></span>
                                        </li>
                                        <li>
                                            <i class="icon fal fa-map-marker-check"></i>
                                            <span>Venue</span>
                                            <span class="time"><?= $Event->venue ?></span>
                                        </li>
                                        <li>
                                            <i class="fal fa-plus-hexagon"></i>
                                            <span>Organizer</span>
                                            <span class="time"><?= $Event->organizer ?></span>
                                        </li>
                                        <li>
                                            <i class="icon fal fa-envelope"></i>
                                            <span>Email</span>
                                            <span class="time"><?= $Event->email ?></span>
                                        </li>
                                    </ul>

                                    <a class="btn ss-btn mt-30" href="#">Buy Ticket</a>
                                </div>
                            </section>
                        <?php endwhile; ?>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- inner-blog-end -->



</main>
<!-- main-area-end -->