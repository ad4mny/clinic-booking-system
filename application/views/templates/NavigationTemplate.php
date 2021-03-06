    <nav class="navbar navbar-light bg-white px-4">
        <a href="<?php echo base_url(); ?>dashboard" class="text-decoration-none d-flex py-1">
            <h4 class="text-primary mb-0 me-2">
                <i class="fas fa-heartbeat fa-fw"></i>
            </h4>
            <h4 class="text-primary mb-0">
                Health <small class="text-secondary">Clinic Booking</small>
            </h4>
        </a>
        <a href="<?php echo base_url(); ?>logout" class="btn btn-danger text-white">Logout</a>
    </nav>

    <div class="container p-5">
        <div class="row">
            <div class="col-4 m-1">
                <!-- Navigations -->
                <div class="bg-white rounded-3 shadow-sm p-3 mb-3">
                    <h3 class="text-capitalize text-dark fw-light mb-0">
                        Welcome, <span class="text-primary"><?php echo $_SESSION['fullName']; ?></span>
                    </h3>
                    <p class="text-secondary mb-0"><?php echo date('Y-m-d e H:i:s A'); ?></p>
                </div>
                <div class="list-group shadow-sm">
                    <a href="<?php echo base_url(); ?>dashboard" class="list-group-item list-group-item-action <?php if ($this->uri->segment(1) == 'dashboard') echo 'active'; ?>">Dashboard</a>
                    <a href="<?php echo base_url(); ?>appointment" class="list-group-item list-group-item-action <?php if ($this->uri->segment(1) == 'appointment') echo 'active'; ?>">New Appointment</a>
                    <a href="<?php echo base_url(); ?>profile" class="list-group-item list-group-item-action <?php if ($this->uri->segment(1) == 'profile') echo 'active'; ?>">Profile</a>
                </div>
            </div>