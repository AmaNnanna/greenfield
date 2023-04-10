        <!--Sidebar start-->
        <?php
        include_once 'sidebar.php';
        ?>
        <!---->



        <!--Content body start-->
        <div class="content-body">
            <div class="container-fluid">

                <?php include_once 'new-event.php'; ?>

                <div class="page-titles">
                    <ul>
                        <li>
                            <h5><?= $SELF->Toast(); ?></h5>
                        </li>
                        <li>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">AULmed</li>
                                <li class="breadcrumb-item active"><a href="/admin/pages/admin-home">Admin Page</a></li>
                            </ol>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="table-responsive">
                            <table id="example2" class="table card-table display dataTablesCard">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Blog Title</th>
                                        <th>Blog Creator</th>
                                        <th>About Blog</th>
                                        <th>Date Created</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($Blog = mysqli_fetch_object($Blogs)) : ?>
                                        <tr>
                                            <td><?= $Blog->id ?></td>
                                            <td><?= $Blog->heading ?></td>
                                            <td><?= $Blog->postCreator ?></td>
                                            <td><?= $Blog->shortDescription ?></td>
                                            <td><?= date("jS F, Y. g:ia", strtotime($Blog->postDate)) ?></td>
                                            <td>
                                                <a href="" class="btn btn-secondary" data-toggle="modal" data-target="#addOrderModalside_<?= $Blog->id ?>">Delete</a>

                                                <!-- Pop Modal -->
                                                <div class="modal fade" id="addOrderModalside_<?= $Blog->id ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Cancel</h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <form action="/delete-blog/<?= $Blog->id ?>" method="POST">
                                                                    <div class="form-group">
                                                                        <label class="text-black font-w500">Delete this blog?</label>
                                                                        <p>This cannot be undone!</p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <a href="/admin/pages/<?= $Blog->id ?>/update-blog" class="btn btn-success">Update</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                            <div><a href="/admin/pages/admin-home" class="btn btn-primary">Go Back To Admin-Page</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Content body end-->