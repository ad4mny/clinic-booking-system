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
                <form class="row g-3" method="post" action="<?php echo base_url(); ?>profile/update/submit">
                    <div class="col-12">
                        <small class="text-secondary">Username</small>
                        <input type="text" class="form-control" name="username" value="<?php echo $profiles['username']; ?>">
                    </div>
                    <div class="col-12">
                        <small class="text-secondary ">First Name</small>
                        <input type="text" class="form-control" name="firstName" value="<?php echo $profiles['firstName']; ?>">
                    </div>
                    <div class="col-12">
                        <small class="text-secondary ">Last Name</small>
                        <input type="text" class="form-control" name="lastName" value="<?php echo $profiles['lastName']; ?>">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary text-white">
                            Submit Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</div>