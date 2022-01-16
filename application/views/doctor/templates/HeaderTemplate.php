<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/image/favicon.ico" type="image/x-icon" />
    <title>Health: Clinic Booking</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-white">

    <div class="w-auto position-absolute m-5" style="top:5%;">
        <?php
        if ($this->session->tempdata('notice') != NULL) {
            echo '<div class="alert alert-light rounded-3 alert-dismissible fade show" role="alert">';
            echo '<p class="mb-0 text-success"><i class="fas fa-info-circle fa-fw fa-sm me-1"></i> ' . $this->session->tempdata('notice') . '</p>';
            echo '</div>';
        }
        if ($this->session->tempdata('error') != NULL) {
            echo '<div class="alert alert-light rounded-3 alert-dismissible fade show" role="alert">';
            echo '<p class="mb-0 text-danger"><i class="fas fa-exclamation-circle fa-fw fa-sm me-1"></i> ' . $this->session->tempdata('error') . '</p>';
            echo '</div>';
        }
        ?>
    </div>

    <nav class="navbar navbar-light bg-white px-4">
        <span class="navbar-brand mb-0 text-white">
            <a href="<?php echo base_url(); ?>doctor/dashboard" class="text-decoration-none d-flex">
                <h4 class="text-primary mb-0 me-2">
                    <i class="fas fa-heartbeat fa-fw"></i>
                </h4>
                <h4 class="text-primary mb-0">
                    Health <small class="text-secondary">Clinic Booking</small>
                </h4>
            </a>
        </span>
    </nav>