<div class="container position-relative vh-100 w-50">
    <div class="position-absolute top-50 start-50 translate-middle">
        <form class="row g-2 bg-white p-4 shadow rounded-3" method="post" action="<?php echo base_url(); ?>register/submit">
            <div class="col-12 m-auto d-flex align-items-center justify-content-center">
                <h1 class="text-primary me-2">
                    <i class="fas fa-heartbeat fa-fw fa-lg"></i>
                </h1>
                <h2 class="text-primary">
                    Health<br>
                    <small class="text-secondary">Clinic Booking</small>
                </h2>
            </div>
            <div class="col-12">
                <small class="text-muted">Select your identity:</small>
                <select class="form-select" name="role">
                    <option value="0" selected>Patient</option>
                    <option value="1">Doctor</option>
                </select>
            </div>
            <div class="col-12">
                <input type="text" class="form-control" name="firstName" placeholder="Enter your first name" required>
            </div>
            <div class="col-12">
                <input type="text" class="form-control" name="lastName" placeholder="Enter your last name" required>
            </div>
            <div class="col-12">
                <input type="text" class="form-control" name="username" placeholder="Create your username" required>
            </div>
            <div class="col-12">
                <input type="password" class="form-control mb-1" name="password" placeholder="Choose a password" required>
                <input type="password" class="form-control" name="comparePassword" placeholder="Confirm your password" required>
            </div>
            <div class="col-12 text-center py-3">
                <input type="submit" name="submit" class="btn btn-primary text-white" value="Register">
            </div>
            <div class=" col-12 text-center">
                <a href="<?php echo base_url(); ?>login" class="text-primary text-decoration-none">
                    <i class="fas fa-chevron-left fa-fw fa-sm"></i> Back to login</a>
            </div>
        </form>
    </div>
</div>