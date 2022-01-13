<div class="col bg-white p-4 pb-5 rounded-3 shadow-sm m-1">
    <div class="row border-bottom m-auto">
        <div class="col">
            <h3 class="text-dark mb-0">Appointments</h3>
            <p class="text-secondary">Your upcoming appointment list.</p>
        </div>
        <div class="col-4 text-end">
            <button class="btn btn-primary text-white">New Appointment</button>
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
                <div class="col-12 bg-white shadow-sm rounded-3 border p-3 ">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-primary mb-0"><?php echo $appointment['description']; ?></h5>
                            <small class="text-secondary mb-0"><?php echo $appointment['date']; ?></small>
                            <small class="text-secondary mb-0"><?php echo $appointment['time']; ?></small>
                        </div>
                        <div class="col text-end">
                            <h5 class="text-success mb-0"><?php echo $appointment['status']; ?></h5>
                            <small class="text-secondary mb-0 text-capitalize">
                                Dr <?php echo $appointment['firstName'] . ' ' . $appointment['lastName']; ?>
                            </small>
                        </div>
                    </div>
                </div>
                <?php foreach ($appointment['followup'] as $followup) { ?>
                    <div class="col-12">
                        <div class="row text-truncate text-white  mx-1 bg-info rounded-3 border p-1">
                            <div class="col-5 ">
                                <p class="mb-0"><?php echo $followup['description']; ?></p>
                            </div>
                            <div class="col">
                                <p class="mb-0"><?php echo $followup['date']; ?></p>
                            </div>
                            <div class="col">
                                <p class="mb-0"><?php echo $followup['time']; ?></p>
                            </div>
                            <div class="col">
                                <p class="mb-0"><?php echo $followup['status']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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