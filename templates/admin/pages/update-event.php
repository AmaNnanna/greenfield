<!--Sidebar start-->
<?php
include_once 'sidebar.php';
?>
<!--Sidebar end-->

<div class="content-body">
    <div class="container-fluid">

        <?php include_once 'new-event.php'; ?>


        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="comment-respond" id="respond">
                        <h4 class="comment-reply-title text-primary mb-3" id="reply-title">Update this Event</h4>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#addOrderModalside_<?= $newEventUpdate->id ?>">Change Event Flyer?</button>

                                <!-- Change Campaign Image -->
                                <div class="modal fade" id="addOrderModalside_<?= $newEventUpdate->id ?>">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Cancel</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <form class="comment-form" id="commentform" action="/update_event/<?= $newEventUpdate->id ?>/flyer" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Replace Exiting Flyer?</label>
                                                        <input type="file" class="form-control" name="flyer">
                                                        <p>Doing this will remove the current image!</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Change Image</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <form class="comment-form" id="commentform" action="/update_event/<?= $newEventUpdate->id ?>/body" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="evetTitle" class="text-black font-w600">Change Event Heading<span class="required" style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="evetTitle" value="<?= $newEventUpdate->evetTitle ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="startDate" class="text-black font-w600">Change Event Start Date</label>
                                        <input type="text" class="form-control" name="startDate" value="<?= $newEventUpdate->startDate ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="endDate" class="text-black font-w600">Change Event End Date</label>
                                        <input type="text" class="form-control" name="endDate" value="<?= $newEventUpdate->endDate ?>">
                                    </div>
                                </div>


                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="eventDescription" class="text-black font-w600">Update this Section?</label>
                                        <textarea id="firstContentArea" class="form-control" name="eventDescription"><?= $newEventUpdate->eventDescription ?></textarea>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="eventFee" class="text-black font-w600">Change Event Fee</label>
                                        <input type="text" class="form-control" name="eventFee" value="<?= $newEventUpdate->eventFee ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="professionalLevel" class="text-black font-w600">Change Professional Level</label>
                                        <input type="text" class="form-control" name="professionalLevel" value="<?= $newEventUpdate->professionalLevel ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="eventDuration" class="text-black font-w600">Change Event Duration</label>
                                        <input type="text" class="form-control" name="eventDuration" value="<?= $newEventUpdate->eventDuration ?>">
                                    </div>
                                </div>

                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="eventOrganisers" class="text-black font-w600">Change Event Organizers</label>
                                        <input type="text" class="form-control" name="eventOrganisers" value="<?= $newEventUpdate->eventOrganisers ?>">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="submit" value="Update Event" class="submit btn btn-primary">
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