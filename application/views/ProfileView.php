<div class="col bg-white p-4 pb-5 rounded-3 shadow-sm m-1">
    <div class="row border-bottom m-auto">
        <div class="col">
            <h3 class="text-dark mb-0">Profile</h3>
            <p class="text-secondary">Your profile information.</p>
        </div>
    </div>
    <?php
    if (
        isset($profiles) &&
        is_array($profiles) &&
        !empty($profiles) &&
        $profiles !== false
    ) {
    ?>
        <div class="row m-1 my-3">
            <div class="col-12 ">
                <small class="text-secondary">Username</small>
                <h5 class="text-primary"><?php echo $profiles['username']; ?></h5>
                <small class="text-secondary ">First Name</small>
                <h5 class="text-primary text-capitalize"><?php echo $profiles['firstName']; ?></h5>
                <small class="text-secondary ">Last Name</small>
                <h5 class="text-primary text-capitalize"><?php echo $profiles['lastName']; ?></h5>
                <a href="<?php echo base_url(); ?>profile/update" class="btn btn-primary text-white">
                    Update
                </a>
            </div>
        </div>
    <?php
    }
    ?>
</div>