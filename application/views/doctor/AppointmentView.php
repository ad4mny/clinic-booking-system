<div class="container p-5">
    <div class="row bg-white shadow-sm rounded-3 border p-5">
        <?php
        if (
            isset($appointments) &&
            is_array($appointments) &&
            !empty($appointments) &&
            $appointments !== false
        ) {
            foreach ($appointments as $appointment) {
        ?>
                <div class="col-6">
                    <h2 class="text-dark">Appointments</h2>
                    <small class="text-secondary">ID</small>
                    <h5 class="text-primary"><?php echo $appointment['appointmentID']; ?></h5>
                    <small class="text-secondary ">Appointment Info</small>
                    <h5 class="text-primary"><?php echo $appointment['description']; ?></h5>
                    <small class="text-secondary ">Date</small>
                    <h5 class="text-primary"><?php echo $appointment['date']; ?></h5>
                    <small class="text-secondary ">Time</small>
                    <h5 class="text-primary"><?php echo $appointment['time']; ?></h5>
                    <small class="text-secondary ">Status</small>
                    <h5 class="text-success"><?php echo $appointment['status']; ?></h5>
                </div>
                <div class="col-6">
                    <h2 class="text-dark">Follow Up</h2>
                    <?php foreach ($appointment['followup'] as $followup) {
                        if ($followup['status'] !== 'Completed') {  ?>
                            <div class="row text-white my-1 bg-info rounded-3 border p-1">
                                <div class="col">
                                    <p class="mb-0 text-truncate">
                                        <i class="fas fa-chevron-right fa-fw me-1"></i>
                                        <?php echo $followup['description']; ?>
                                    </p>
                                    <p class="mb-0">
                                        <i class="fas fa-clock fa-fw me-1"></i>
                                        <?php echo $followup['date'] . ' UTC ' . $followup['time']; ?>
                                    </p>
                                </div>
                                <div class="col-4">
                                    <div class="btn-group">
                                        <a class="text-decoration-none text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo $followup['status']; ?>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?php echo base_url() . 'doctor/dashboard/followup/view/' . $followup['followupID']; ?>" class="dropdown-item">
                                                    View
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url() . 'doctor/dashboard/followup/update/' . $followup['followupID']; ?>" class="dropdown-item">
                                                    Update
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url() . 'doctor/dashboard/followup/delete/' . $followup['followupID']; ?>" class="dropdown-item">
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row text-secondary my-1 bg-light rounded-3 border p-1">
                                <div class="col">
                                    <p class="mb-0 text-truncate">
                                        <i class="fas fa-chevron-right fa-fw me-1"></i>
                                        <?php echo $followup['description']; ?>
                                    </p>
                                    <p class="mb-0">
                                        <i class="fas fa-clock fa-fw me-1"></i>
                                        <?php echo $followup['date'] . ' UTC ' . $followup['time']; ?>
                                    </p>
                                </div>
                                <div class="col-4">
                                    <p class="mb-0"><i class="fas fa-check fa-fw me-1"></i><?php echo $followup['status']; ?></p>
                                </div>
                            </div>
                    <?php }
                    } ?>
                    <a href="<?php echo base_url() . 'doctor/dashboard/followup/add/' . $appointment['appointmentID'] ?>" class="btn btn-primary text-white">
                    <i class="fas fa-plus fa-fw"></i>
                    Add new follow up
                </a>
                </div>
        <?php
            }
        } else {
            redirect(base_url() . 'dashboard');
        }
        ?>
        <div class="col-6 mt-5">
            <a href="<?php echo base_url() . 'doctor/dashboard/appointment/delete/' . $appointment['appointmentID']; ?>" class="btn btn-outline-danger me-1">
                Delete
            </a>
            <a href="<?php echo base_url() . 'doctor/dashboard/appointment/update/' . $appointment['appointmentID']; ?>" class="btn btn-primary text-white">
                Update
            </a>
        </div>
    </div>
</div>