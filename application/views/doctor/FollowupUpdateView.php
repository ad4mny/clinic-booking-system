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
                <form class="row g-3" method="post" action="<?php echo base_url(); ?>doctor/dashboard/followup/update/submit">
                    <h2 class="text-dark">Update Follow Up</h2>
                    <div class="col-12">
                        <small class="text-secondary">Follow Up ID</small>
                        <h5 class="text-primary"><?php echo $followups['followupID']; ?></h5>
                    </div>
                    <div class="col-12">
                        <small class="text-secondary ">Follow Up Info</small>
                        <textarea class="form-control" name="description" max="200" col="5" placeholder="Max 200 characters.">
                            <?php echo $followups['description']; ?></textarea>
                    </div>
                    <div class="col-6">
                        <small class="text-secondary ">Date</small>
                        <input type="date" class="form-control" name="date" value="<?php echo $followups['date']; ?>">
                    </div>
                    <div class="col-6">
                        <small class="text-secondary ">Time</small>
                        <input type="time" class="form-control" name="time" value="<?php echo $followups['time']; ?>">
                    </div>
                    <div class="col-6">
                        <small class="text-secondary ">Status</small>
                        <select class="form-select" name="status">
                            <option value="Upcoming">Upcoming</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <input type="hidden" value="<?php echo $followups['followupID']; ?>" name="followupID">
                    <div class="col-12">
                        <a href="<?php echo base_url() . 'doctor/dashboard/followup/delete/' . $followups['followupID']; ?>" class="btn btn-outline-danger me-1">
                            Delete
                        </a>
                        <button type="submit" class="btn btn-primary text-white" name="submit">Update</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <h2 class="text-dark">Appointments</h2>
                <small class="text-secondary">Appointment ID</small>
                <h5 class="text-primary"><?php echo $followups['appointment']['appointmentID']; ?></h5>
                <small class="text-secondary ">Appointment Info</small>
                <h5 class="text-primary"><?php echo $followups['appointment']['description']; ?></h5>
                <small class="text-secondary ">Date</small>
                <h5 class="text-primary"><?php echo $followups['appointment']['date']; ?></h5>
                <small class="text-secondary ">Time</small>
                <h5 class="text-primary"><?php echo $followups['appointment']['time']; ?></h5>
                <small class="text-secondary ">Status</small>
                <h5 class="text-success"><?php echo $followups['appointment']['status']; ?></h5>
                <a href="<?php echo base_url() . 'doctor/dashboard/appointment/view/' . $followups['appointmentID']; ?>" class="btn btn-primary text-white mt-3">
                View Appointment
            </a>
            </div>
        <?php
        } else {
            redirect(base_url() . 'dashboard');
        }
        ?>
    </div>
</div>