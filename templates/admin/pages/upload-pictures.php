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
                        <form action="/post_picture" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="eventPictures" class="text-black font-w600">Select/Upload Multiple Images</label>
                        <input type="file" class="form-control" name="pictures[]" multiple>
                    </div>
                    <!-- <div class="form-group">
                        <label class="text-black font-w500">Event Title</label>
                        <input type="text" class="form-control" name="title" required />
                    </div> -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Upload Images</button>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Content body end-->