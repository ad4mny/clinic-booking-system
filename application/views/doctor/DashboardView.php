<div class="container p-5">
    <div class="row">
        <div class="col ">
            <div class="row border-bottom m-auto pb-2 mb-2">
                <div class="col">
                    <h3 class="text-capitalize text-dark fw-light mb-0">
                        Welcome, <span class="text-primary">Dr <?php echo $_SESSION['fullName']; ?></span>
                    </h3>
                    <p class="text-secondary mb-0"><?php echo date('Y-m-d e H:i:s A'); ?></p>
                </div>
                <div class="col-4 text-end">
                    <button class="btn btn-primary text-white">Check Schedule</button>
                </div>
            </div>
            <div class="row m-auto">
                <div class="col">
                    <p class="text-secondary mb-0">Your upcoming appointments with patient.</p>
                </div>
            </div>
            <?php
            if (
                isset($appointments) &&
                is_array($appointments) &&
                !empty($appointments) &&
                $appointments !== false
            ) {
                foreach ($appointments as $appointment) {
            ?>
                    <div class="row m-1 my-3">
                        <?php if ($appointment['status'] !== 'Completed') { ?>
                            <div class="col-12 bg-white shadow-sm rounded-3 border p-3 ">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="text-primary mb-0"><?php echo $appointment['description']; ?></h5>
                                        <small class="text-secondary mb-0"><?php echo $appointment['date']; ?></small>
                                        <small class="text-secondary mb-0"><?php echo $appointment['time']; ?></small>
                                    </div>
                                    <div class="col-2">
                                        <div class="btn-group">
                                            <a class="text-decoration-none text-success dropdown-toggle fs-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <?php echo $appointment['status']; ?>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="<?php echo base_url() . 'doctor/dashboard/appointment/view/' . $appointment['appointmentID']; ?>" class="dropdown-item">
                                                        View
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url() . 'doctor/dashboard/appointment/update/' . $appointment['appointmentID']; ?>" class="dropdown-item">
                                                        Update
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url() . 'doctor/dashboard/appointment/delete/' . $appointment['appointmentID']; ?>" class="dropdown-item">
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-12 bg-light rounded-3 border p-3 ">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="text-secondary mb-0"><?php echo $appointment['description']; ?></h5>
                                        <small class="text-secondary mb-0"><?php echo $appointment['date']; ?></small>
                                        <small class="text-secondary mb-0"><?php echo $appointment['time']; ?></small>
                                    </div>
                                    <div class="col-2 text-end">
                                        <h5 class="text-secondary mb-0"><i class="fas fa-check fa-fw me-1"></i><?php echo $appointment['status']; ?></h5>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        foreach ($appointment['followup'] as $followup) {
                            if ($followup['status'] !== 'Completed') {
                            ?>
                                <div class="col-12">
                                    <div class="row text-white  mx-1 bg-info rounded-3 border p-1">
                                        <div class="col">
                                            <p class="mb-0 text-truncate"><i class="fas fa-chevron-right fa-fw me-1"></i><?php echo $followup['description']; ?></p>
                                        </div>
                                        <div class="col-3">
                                            <p class="mb-0"><?php echo $followup['date'] . ' UTC ' . $followup['time']; ?></p>
                                        </div>
                                        <div class="col-2">
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
                                </div>
                            <?php } else { ?>
                                <div class="col-12">
                                    <div class="row text-secondary mx-1 bg-light rounded-3 border p-1">
                                        <div class="col">
                                            <p class="mb-0 text-truncate"><i class="fas fa-chevron-right fa-fw me-1"></i><?php echo $followup['description']; ?></p>
                                        </div>
                                        <div class="col-3">
                                            <p class="mb-0"><?php echo $followup['date'] . ' UTC ' . $followup['time']; ?></p>
                                        </div>
                                        <div class="col-2">
                                            <p class="mb-0"><i class="fas fa-check fa-fw me-1"></i><?php echo $followup['status']; ?></p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } ?>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="row m-auto">
                    <div class="col">
                        <p class="text-secondary">You have no upcoming appointments.</p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>