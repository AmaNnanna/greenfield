<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(<?= $assets ?>/img/testimonial/test-bg.png)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-left">
                        <div class="breadcrumb-title">
                            <h2>Blog</h2>
                            <div class="breadcrumb-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item
                                        active" aria-current="page">Blog</li>
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
    <section class="inner-blog mx-3 pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="bsingle__post mb-50">
                    <div class="bsingle__post-thumb">
                        <img src="<?= $EventDetails->eventImage ?>" alt="Event Image">
                    </div>
                    <div class="bsingle__content">
                        <div class="admin">
                            <a href="mailto:<?= $EventDetails->email ?>"><i class="far fa-user"></i>Organiser: <?= $EventDetails->organizer ?></a>
                        </div>

                        <h2><?= $EventDetails->title ?></h2>
                        <p><?= $EventDetails->eventDescription ?></p>
                        <div class="meta-info">
                            <ul>
                                <li>Event Duration</li>
                                <li><i class="fal fa-calendar-alt"></i><?= $EventDetails->startDate ?> to <?= $EventDetails->endDate ?></li>
                                <li><?= $EventDetails->venue ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>