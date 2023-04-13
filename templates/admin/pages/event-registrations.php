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

        <div class="d-flex flex-wrap mb-2 align-items-center
                        justify-content-between">
            <div class="mb-3 mr-3">
                <h6 class="fs-16 text-black font-w600 mb-0">Applications for Upcoming events</h6>
                <span class="fs-14">List of everyone who applied for verious events</span>
            </div>

            <div class="d-flex mb-3">
                <select class="form-control style-2 mr-3" id="event">
                    <option>Select an Event</option>
                    <?php $EventNames = mysqli_query($Core->dbCon, "SELECT * FROM events");
                    while ($EventName = mysqli_fetch_object($EventNames)) : ?>
                        <option id="<?=$EventName->id?>" value="<?=$EventName->id?>"><?= $EventName->evetTitle ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="tab-content">
                    <div id="All" class="tab-pane active fade show">
                        <div class="table-responsive">
                            <table id="example2" class="table
                                            card-table display dataTablesCard">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Surename</th>
                                        <th>Other Names</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Business Number</th>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Country</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php $Registrations = mysqli_query($Core->dbCon, "SELECT * FROM registrations");
                                while ($Registration = mysqli_fetch_object($Registrations)) : ?>
                                        <tr>
                                            <td><?= $Registration->id ?></td>
                                            <td><?= $Registration->sureName ?></td>
                                            <td><?= $Registration->otherNames ?></td>
                                            <td><?= $Registration->email ?></td>
                                            <td><?= $Registration->mobileNumber ?></td>
                                            <td><?= $Registration->businessNumber ?></td>
                                            <td><?= $Registration->jobTitle ?></td>
                                            <td><?= $Registration->company ?></td>
                                            <td><?= $Registration->country ?></td>
                                        </tr>

                                        <?php endwhile; ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Content body end-->