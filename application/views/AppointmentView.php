<div class="col bg-white p-4 pb-5 rounded-3 shadow-sm m-1">
    <div class="row border-bottom m-auto">
        <div class="col">
            <h3 class="text-dark mb-0">New Appointment</h3>
            <p class="text-secondary">All available slot for new appointment.</p>
        </div>
    </div>
    <div class="row">
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
                    <div class="col-auto m-1 d-flex card shadow-sm px-3">
                        <div class="card-body">
                            <small>Date</small>
                            <h5 class="text-primary"><?php echo $schedule['date']; ?></h5>
                            <small>Time</small>
                            <h5 class="text-primary"><?php echo $schedule['time']; ?></h5>
                            <small>Doctor</small>
                            <h5 class="text-primary mb-0 text-capitalize">Dr <?php echo $schedule['firstName'] . ' ' . $schedule['lastName']; ?></h5>
                            <small>Status</small>
                            <h5 class="text-success mb-0"><i class="fas fa-check fa-fw me-1"></i><?php echo $schedule['status']; ?></h5>
                        </div>
                        <div class="card-footer bg-white text-center">
                            <a href="<?php echo base_url() . 'schedule/book/' . $schedule['appointmentID']; ?>" class="btn btn-primary text-white" onclick="return confirm('Are you sure you want to book this appointment slot?')">
                                Book Slot
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
                    <h5 class="text-primary mb-0">There is no available appointment slot.</h5>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>