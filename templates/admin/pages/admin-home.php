<?php
include_once 'sidebar.php';
?>


<!--Content body start-->
<div class="content-body">
    <!--Row-->
    <div class="container-fluid">

        <?php include_once 'new-event.php'; ?>

        <div class="page-titles">
            <ul>
                <li>
                    <h5><?= $SELF->Toast(); ?></h5>
                </li>
                <li>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Greenfield</li>
                        <li class="breadcrumb-item active"><a href="/admin/pages/admin-home">Admin Page</a></li>
                    </ol>
                </li>
            </ul>
        </div>


        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Add a New Event</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Post your upcoming event to your website.</p>
                    </div>
                    <div class="card-footer d-sm-flex justify-content-between align-items-center">
                        <div class="card-footer-link mb-4 mb-sm-0">
                            <a href="/admin/pages/all-events" class="card-text text-dark d-inline">See all Events</a>
                        </div>

                        <a href="/admin/pages/create-event" class="btn btn-primary">Add Upcoming Event</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">See People Who Rigistered for Events</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">View the list of everyone who registered for each event.</p>
                    </div>
                    <div class="card-footer d-sm-flex justify-content-between align-items-center">
                        <div class="card-footer-link mb-4 mb-sm-0">
                            <a href="/admin/pages/#" class="card-text text-dark d-inline"></a>
                        </div>

                        <a href="/admin/pages/event-registrations" class="btn btn-primary">See People registered</a>
                    </div>
                </div>
            </div>

            <!-- <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Doctor's Diary</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Add your diary & Manage other Doctors.</p>
                    </div>
                    <div class="card-footer d-sm-flex justify-content-between align-items-center">
                        <div class="card-footer-link mb-4 mb-sm-0">
                            <a href="/admin/pages/all-diaries" class="card-text text-dark d-inline">View & Manage Diaries</a>
                        </div>

                        <a href="/admin/pages/new-diary" class="btn btn-primary">Create a New Diary</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Create a New Event</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Add an Ongoing, or Upcoming Campaign.</p>
                    </div>
                    <div class="card-footer d-sm-flex justify-content-between align-items-center">
                        <div class="card-footer-link mb-4 mb-sm-0">
                            <a href="/admin/pages/all-campaigns" class="card-text text-dark d-inline">View & Manage Events</a>
                        </div>

                        <div>
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="addOrderModalside">Add New Event</a>
                            
                            <?php include_once 'new-event.php'; ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Health Topic</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Create a new health topic.</p>
                    </div>
                    <div class="card-footer d-sm-flex justify-content-between align-items-center">
                        <div class="card-footer-link mb-4 mb-sm-0">
                            <a href="/admin/pages/all-health-topics" class="card-text text-dark d-inline">View all Health Topics</a>
                        </div>

                        <a href="/admin/pages/post-health-topic" class="btn btn-primary">Create New Health Topic</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Video Tutorial</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Add a new video tutorial.</p>
                    </div>
                    <div class="card-footer d-sm-flex justify-content-between align-items-center">
                        <div class="card-footer-link mb-4 mb-sm-0">
                            <a href="/admin/pages/all-video-tutorials" class="card-text text-dark d-inline">View all Video Tutorials</a>
                        </div>

                        <a href="/admin/pages/post-video-tutorial" class="btn btn-primary">Create New Video Tutorial</a>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
</div>