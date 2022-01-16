<div class="container p-5">
    <div class="row border-bottom b-2 mb-2">
        <div class="col">
            <h3 class="text-capitalize text-dark fw-light mb-0">
                Welcome, Admin.</span>
            </h3>
            <p class="text-secondary mb-0"><?php echo date('Y-m-d e H:i:s A'); ?></p>
        </div>
        <div class="col-3 text-end">
            <a href="<?php echo base_url(); ?>admin/dashboard" class="btn btn-primary text-white">Dashboard</a>
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
                    <p class="text-secondary mb-0">All patient list.</p>
                </div>
            </div>
            <?php
            if (
                isset($patients) &&
                is_array($patients) &&
                !empty($patients) &&
                $patients !== false
            ) {
                $i = 0;
                foreach ($patients as $patient) {
            ?>
                    <div class="row m-1 my-3">
                        <div class="col-12 bg-white shadow-sm rounded-3 border p-3 ">
                            <div class="row m-auto">
                                <div class="col">
                                    <small class="text-secondary">No</small>
                                    <h5 class="text-primary mb-0"><?php echo ++$i; ?></h5>
                                </div>
                                <div class="col">
                                    <small class="text-secondary">Username</small>
                                    <h5 class="text-primary mb-0"><?php echo $patient['username']; ?></h5>
                                </div>
                                <div class="col">
                                    <small class="text-secondary">First Name</small>
                                    <h5 class="text-primary mb-0 text-capitalize"><?php echo $patient['firstName']; ?></h5>
                                </div>
                                <div class="col">
                                    <small class="text-secondary">Last Name</small>
                                    <h5 class="text-primary mb-0 text-capitalize"><?php echo $patient['lastName']; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="row m-auto">
                    <div class="col">
                        <p class="text-secondary">No registered patient in the system.</p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>