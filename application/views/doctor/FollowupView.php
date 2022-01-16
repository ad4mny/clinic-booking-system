<div class="container p-5">
    <div class="row bg-white shadow-sm rounded-3 border p-5">
        <?php
        if (
            isset($followups) &&
            is_array($followups) &&
            !empty($followups) &&
            $followups !== false
        ) {
        ?>
            <div class="col-6">
                <h2 class="text-dark">Follow Up</h2>
                <small class="text-secondary">ID</small>
                <h5 class="text-primary"><?php echo $followups['followupID']; ?></h5>
                <small class="text-secondary ">Follow Up Info</small>
                <h5 class="text-primary"><?php echo $followups['description']; ?></h5>
                <small class="text-secondary ">Date</small>
                <h5 class="text-primary"><?php echo $followups['date']; ?></h5>
                <small class="text-secondary ">Time</small>
                <h5 class="text-primary"><?php echo $followups['time']; ?></h5>
                <small class="text-secondary ">Status</small>
                <h5 class="text-success"><?php echo $followups['status']; ?></h5>
            </div>
            <div class="col-6">
                <h2 class="text-dark">Appointments</h2>
                <small class="text-secondary">ID</small>
                <h5 class="text-primary"><?php echo $followups['appointment']['appointmentID']; ?></h5>
                <small class="text-secondary ">Appointment Info</small>
                <h5 class="text-primary"><?php echo $followups['appointment']['description']; ?></h5>
                <small class="text-secondary ">Date</small>
                <h5 class="text-primary"><?php echo $followups['appointment']['date']; ?></h5>
                <small class="text-secondary ">Time</small>
                <h5 class="text-primary"><?php echo $followups['appointment']['time']; ?></h5>
                <small class="text-secondary ">Status</small>
                <h5 class="text-success"><?php echo $followups['appointment']['status']; ?></h5>
            </div>
        <?php
        } else {
            redirect(base_url() . 'dashboard');
        }
        ?>
        <div class="col-6 mt-5">
            <a href="<?php echo base_url() . 'doctor/dashboard/followup/delete/' . $followups['followupID']; ?>" class="btn btn-outline-danger me-1">
                Delete Follow Up
            </a>
            <a href="<?php echo base_url() . 'doctor/dashboard/followup/update/' . $followups['followupID']; ?>" class="btn btn-primary text-white">
                Update Follow Up
            </a>
        </div>
        <div class="col-6 mt-5">
            <a href="<?php echo base_url() . 'doctor/dashboard/appointment/view/' . $followups['appointmentID']; ?>" class="btn btn-primary text-white">
                View Appointment
            </a>
        </div>
    </div>
</div>