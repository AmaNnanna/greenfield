<!--**********************************
            Sidebar start
        ***********************************-->
<!--**********************************
  Sidebar start
***********************************-->
<?php
include_once 'sidebar.php';
?>
<!--**********************************
  Sidebar end
***********************************-->
<!--**********************************
            Sidebar end
        ***********************************-->

<div class="content-body">
    <div class="container-fluid">

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="comment-respond" id="respond">
                        <h4 class="comment-reply-title text-primary mb-3" id="reply-title">Write a Review for Our Website</h4>
                        <form class="comment-form" id="commentform" action="/review" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="picture" class="text-black font-w600">Please Upload Your Picture</label>
                                        <input type="file" class="form-control" name="picture">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="fullName" class="text-black font-w600">Enter Your Name<span class="required" style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="fullName">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="text-black font-w600">Enter Your Email<span class="required" style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="jobDescription" class="text-black font-w600">What is Your Job Description<span class="required" style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="jobDescription">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="review" class="text-black font-w600">Write Your Review Here. 200 characters max.</label>
                                        <textarea class="form-control" name="review" maxlength="200"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit Your Review" class="submit btn btn-primary">
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