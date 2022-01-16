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
                    <form class="row g-2" method="post" action="<?php echo base_url(); ?>doctor/dashboard/appointment/update/submit">
                        <h2 class="text-dark">Update Appointments</h2>
                        <div class="col-12">
                            <small class="text-secondary">ID</small>
                            <h5 class="text-primary"><?php echo $appointment['appointmentID']; ?></h5>
                        </div>
                        <div class="col-12">
                            <small class="text-secondary ">Appointment Info</small>
                            <textarea class="form-control" name="description" max="200" col="5" placeholder="Max 200 characters.ß">
                            <?php echo $appointment['description']; ?></textarea>
                        </div>
                        <div class="col-auto">
                            <small class="text-secondary ">Date</small>
                            <input type="date" class="form-control" name="date" value="<?php echo $appointment['date']; ?>">
                        </div>
                        <div class="col-auto">
                            <small class="text-secondary ">Time</small>
                            <input type="time" class="form-control" name="time" value="<?php echo $appointment['time']; ?>">
                        </div>
                        <div class="col-auto">
                            <small class="text-secondary ">Status</small>
                            <select class="form-select" name="status">
                                <option value="Upcoming">Upcoming</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <input type="hidden" value="<?php echo $appointment['appointmentID']; ?>" name="appointmentID">
                        <div class="col-auto">
                            <a href="<?php echo base_url() . 'doctor/dashboard/appointment/delete/' . $appointment['appointmentID']; ?>" class="btn btn-outline-danger me-1">
                                Delete
                            </a>
                            <button type="submit" class="btn btn-primary text-white" name="submit">Update</button>
                        </div>
                    </form>
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
    </div>
</div>