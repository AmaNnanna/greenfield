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
                    <h4 class="comment-reply-title text-primary mb-3" id="reply-title">Add a New Dairy</h4>
                    <form class="comment-form" id="commentform" action="/new_slide" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="slideTitle" class="text-black font-w600">Set a title for the dairy<span class="required" style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="slideTitle">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="slideImage" class="text-black font-w600">Upload an Image for this slide</label>
                                    <input type="file" class="form-control" name="slideImage">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="videoLink" class="text-black font-w600">Paste a video link (if any)</label>
                                    <input type="text" class="form-control" name="videoLink">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="doctor_id" class="text-black font-w600">Please select your name from this list<span class="required" style="color: red;">*</span></label>
                                    <select class="form-control" name="doctor_id">
                                        <option class="form-control" value="value">Value 1</option>
                                        <option class="form-control" value="value">Value 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="slideDescription" class="text-black font-w600">Write a Brief Description for this dairy (200 characters max.)</label>
                                    <input type="text" class="form-control" name="slideDescription" maxlength="200">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="submit" value="Send this Dairy" class="submit btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>