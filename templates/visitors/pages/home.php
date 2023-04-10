<?php
    include_once 'sidebar.php';
?>


<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->

    <div class="container-fluid">
        <!-- Add Order -->
        <div class="modal fade" id="addOrderModalside">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Event</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="text-black font-w500">Event Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Event Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Description</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-titles">
            <ul>
                <li>
                    <h5><?= $SELF->Toast(); ?></h5>
                </li>

                
                <li>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">AULmed</li>
                        <li class="breadcrumb-item">Welcome- <span class="text-primary"><?= "{$User->fullName}" ?></span></li>
                    </ol>
                </li>
            </ul>
        </div>


        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Write a Review for AULmed</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Write a short review for AULmed that other visitors will read.</p>
                    </div>
                    <div class="card-footer d-sm-flex justify-content-between align-items-center">
                        <a href="/visitors/pages/testimonial" class="btn btn-primary">Write a Review</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>