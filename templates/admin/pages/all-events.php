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
                                <li class="breadcrumb-item">Greenfield</li>
                                <li class="breadcrumb-item active"><a href="/admin/pages/admin-home">All Events</a></li>
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
                                        <th>Event Title</th>
                                        <th>Event Fee</th>
                                        <th>Event Organizers</th>
                                        <th>Date Created</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $num = 1; // incrementing number for the row.  This is done for the row number in the table.  It is not part of the table. 
                                    while ($Event = mysqli_fetch_object($Events)) :
                                    ?>

                                        <tr>
                                            <td><?= $num ?></td>
                                            <td><?= $Event->evetTitle ?></td>
                                            <td><?= $Event->eventFee ?></td>
                                            <td><?= $Event->eventOrganisers ?></td>
                                            <td><?= date("jS F, Y. g:ia", strtotime($Event->created_at)) ?></td>
                                            <td>
                                                <a href="" class="btn btn-secondary" data-toggle="modal" data-target="#addOrderModalside_<?= $Event->id ?>">Delete</a>

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
                                                                <form action="/delete-event/<?= $Event->id ?>" method="POST">
                                                                    <div class="form-group">
                                                                        <label class="text-black font-w500">Delete <?= $Event->evetTitle ?>?</label>
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
                                                <a href="/admin/pages/<?= $Event->id ?>/update-event" class="btn btn-success">Update</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $num++;
                                    endwhile;
                                    ?>
                                </tbody>
                            </table>
                            <div><a href="/admin/pages/admin-home" class="btn btn-primary">Go Back To Admin-Page</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Content body end-->