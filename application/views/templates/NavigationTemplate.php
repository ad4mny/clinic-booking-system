    <nav class="navbar navbar-light bg-white px-4">
        <span class="navbar-brand mb-0 text-white d-flex">
            <h4 class="text-primary mb-0 me-2">
                <i class="fas fa-heartbeat fa-fw"></i>
            </h4>
            <h4 class="text-primary mb-0">
                Health <small class="text-secondary">Clinic Booking</small>
            </h4>
        </span>
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
                    <a href="<?php echo base_url(); ?>dashboard" class="list-group-item list-group-item-action <?php if ($this->uri->segment(1) == 'dashboard') echo 'active'; ?>">Appointment</a>
                    <a href="<?php echo base_url(); ?>profile" class="list-group-item list-group-item-action <?php if ($this->uri->segment(1) == 'profile') echo 'active'; ?>">Profile</a>
                    <a href="<?php echo base_url(); ?>logout" class="list-group-item list-group-item-action text-danger <?php if ($this->uri->segment(1) == 'logout') echo 'active'; ?>">Logout</a>
                </div>
            </div>