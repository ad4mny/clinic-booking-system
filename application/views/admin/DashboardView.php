<div class="container p-5">
    <div class="row border-bottom b-2 mb-2">
        <div class="col">
            <h3 class="text-capitalize text-dark fw-light mb-0">
                Welcome, Admin.</span>
            </h3>
            <p class="text-secondary mb-0"><?php echo date('Y-m-d e H:i:s A'); ?></p>
        </div>
        <div class="col-3 text-end">
            <a href="<?php echo base_url(); ?>admin/patient" class="btn btn-primary text-white">Patient List</a>
        </div>
    </div>
    <div class="row">
        <div class="col-4 border-end pe-3">
            <form class="row g-2" method="post" action="<?php echo base_url(); ?>admin/dashboard/appointment/submit">
                <div class="col-12">
                    <small class="text-secondary ">Appointment Info</small>
                    <textarea class="form-control" name="description" max="200" col="5" placeholder="Max 200 characters." required></textarea>
                </div>
                <div class="col-12">
                    <small class="text-secondary ">Choose Doctor</small>
                    <select class="form-select" name="doctorID" required>
                        <?php foreach ($doctors as $doctor) {
                            echo '<option value="' . $doctor['userID'] . '">Dr ' . $doctor['firstName'] . ' ' . $doctor['lastName'] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="col-6">
                    <small class="text-secondary ">Date</small>
                    <input type="date" class="form-control" name="date" required>
                </div>
                <div class="col-6">
                    <small class="text-secondary ">Time</small>
                    <input type="time" class="form-control" name="time" required>
                </div>
                <div class="col-12">
                    <small class="text-secondary ">Status</small>
                    <select class="form-select" name="status" required>
                        <option value="Available">Available</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary text-white" name="submit">New Appointment</button>
                </div>
            </form>
        </div>
        <div class="col-8 ps-3">
            <div class="row m-auto">
                <div class="col">
                    <p class="text-secondary mb-0">All appointments with patient.</p>
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
                                    <div class="col-4 text-end">
                                        <a href="<?php echo base_url() . 'admin/dashboard/appointment/delete/' . $appointment['appointmentID']; ?>" class="btn btn-danger text-white">
                                            Delete
                                        </a>
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
                                    <div class="col-4 text-end">
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
                                        <div class="col-4">
                                            <a href="<?php echo base_url() . 'admin/dashboard/appointment/delete/' . $followup['followupID']; ?>" class="btn btn-danger text-white">
                                                Delete
                                            </a>
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
                                        <div class="col-4">
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