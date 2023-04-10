<!-- Page Title Section -->
<section class="page-title" style="background-image: url(<?= $assets ?>/images/background/2.jpg)">
    <div class="auto-container">
        <div class="content">
            <div class="text">Welcome to Greenfield Executive Education</div>
            <h1>Events</h1>
        </div>
        <div class="breadcrumb-outer">
            <ul class="page-breadcrumb">
                <li><a href="/">Home</a></li>
                <li>Events</li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title Section -->

<!-- Courses Page Section -->
<section class="courses-page-section">
    <div class="auto-container">
    <h5><?= $SELF->Toast(); ?></h5>

        <!-- Order Box -->
        <div class="order-box">
            <div class="clearfix">
                <div class="pull-left">
                    <!-- <div class="text">Showing 1-6 of 14 results</div> -->
                </div>
                <div class="pull-right clearfix">

                    <!-- Search -->
                    <div class="order-search-box">
                        <form method="post" action="contact.html">
                            <div class="form-group">
                                <input type="search" name="search-field" value="" placeholder="Search here..." required="">
                                <button type="submit"><span class="icon fa fa-search"></span></button>
                            </div>
                        </form>
                    </div>

                    <!-- Search Dropdown -->
                    <!-- <div class="search-dropdown form-group">
                        <select name="country" class="custom-select-box">
                            <option>Select Order</option>
                            <option>Order 01</option>
                            <option>Order 02</option>
                            <option>Order 03</option>
                            <option>Order 04</option>
                        </select>
                    </div> -->

                </div>
            </div>
        </div>
        <!-- End Order Box -->

        <div class="row clearfix">

            <!-- Course Block -->
            <?php while ($Event = mysqli_fetch_object($Events)) : ?>
                <div class="course-block col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="/pages/<?= $Event->id ?>/event-details"><img class="transition-500ms" src="<?= $Event->flyer ?>" alt="Event flyer" style="height: 415px;"></a>
                        </div>
                        <div class="lower-content">
                            <h5><a href="/pages/<?= $Event->id ?>/event-details"><?= $Event->evetTitle ?></a></h5>
                            <ul class="post-info">
                                <li><span class="icon flaticon-time"></span> Duration <span><?= $Event->eventDuration ?></span></li>
                                <li><span class="icon flaticon-book"></span><a href="/pages/<?= $Event->id ?>/registration">Register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
    </div>
</section>
<!-- End Courses Page Section -->