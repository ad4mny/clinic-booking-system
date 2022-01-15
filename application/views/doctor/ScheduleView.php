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
                    <a href="<?php echo base_url(); ?>doctor/dashboard" class="btn btn-primary text-white">Check Appointment</a>
                </div>
            </div>
            <div class="row m-auto">
                <div class="col">
                    <p class="text-secondary mb-0">Your appointment schedule list.</p>
                </div>
            </div>

            <?php
            if (
                isset($schedules) &&
                is_array($schedules) &&
                !empty($schedules) &&
                $schedules !== false
            ) {
            ?>
                <div class="row row-cols-auto g-3 m-1">
                    <?php
                    foreach ($schedules as $schedule) {
                    ?>
                        <div class="col-auto m-1 d-flex card shadow-sm">
                            <div class="card-body">
                                <small>Date</small>
                                <h5 class="text-primary"><?php echo $schedule['date']; ?></h5>
                                <small>Time</small>
                                <h5 class="text-primary"><?php echo $schedule['time']; ?></h5>
                                <small>Status</small>
                                <h5 class="text-success mb-0"><i class="fas fa-check fa-fw me-1"></i><?php echo $schedule['status']; ?></h5>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="<?php echo base_url() . 'doctor/schedule/unavailable/' . $schedule['appointmentID']; ?>" class="btn btn-danger text-white" onclick="return confirm('Are you sure to mark this time slot as unavailable?')">
                                    <i class="fas fa-times fa-fw me-1"></i>
                                    Mark Unavailable
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            } else {
            ?>
                <div class="row m-1 my-3">
                    <div class="col bg-white rounded-3 border p-3 text-center shadow-sm">
                        <h5 class="text-primary mb-0">You have no available schedule.</h5>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</div>