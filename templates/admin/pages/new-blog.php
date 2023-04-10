<!--Sidebar start-->
<?php
include_once 'sidebar.php';
?>
<!--Sidebar end-->

<!--Content body start-->
<div class="content-body">
    <div class="container-fluid">

        <!--Sidebar event-->
        <?php include_once 'new-event.php'; ?>
        <!--Sidebar event ends-->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="comment-respond" id="respond">
                        <h4 class="comment-reply-title text-primary mb-3" id="reply-title">Create Event</h4>
                        <form class="comment-form" id="commentform" action="/new_blog" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="evetTitle" class="text-black font-w600">Enter Event Heading<span class="required" style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="evetTitle">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="professionalLevel" class="text-black font-w600">For What Class of Professionals</label>
                                        <input type="text" class="form-control" name="professionalLevel">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="flyer" class="text-black font-w600">Upload Event Flyer</label>
                                        <input type="file" class="form-control" name="flyer">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="eventFee" class="text-black font-w600">Set Fee For this Event</label>
                                        <input type="text" class="form-control" name="eventFee">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="eventDescription" class="text-black font-w600">Write a Description For this Event</label>
                                        <textarea id="firstContentArea" class="form-control" name="eventDescription"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="videoImage" class="text-black font-w600">Upload an Image Thumbnail For Video</label>
                                        <input type="file" class="form-control" name="videoImage">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="videoLink" class="text-black font-w600">Copy and Paste Video Link Here</label>
                                        <input type="text" class="form-control" name="videoLink">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="text-black font-w500">Event Start Date</label>
                                        <input type="text" class="form-control" id="min-date-start-event" name="startDate">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="text-black font-w500">Event End Date</label>
                                        <input type="text" class="form-control" id="min-date-end-event" name="endDate">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="eventDuration" class="text-black font-w600">How Long Will this Event Last?</label>
                                        <input type="text" class="form-control" name="eventDuration">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="eventOrganisers" class="text-black font-w600">Who Are the Organisers?</label>
                                        <input type="text" class="form-control" name="eventOrganisers">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="submit" value="Create Event" class="submit btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Content body end-->