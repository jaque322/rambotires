<?= $this->extend('layout/app') ?>
<?= $this->section('body') ?>

<?= $this->include('frontend/navigation') ?>
<?= $this->include('frontend/header') ?>
<?= $this->include('frontend/services') ?>
<?= $this->include('frontend/gallery') ?>
<?= $this->include('frontend/about') ?>
<?= $this->include('frontend/hoursofbusiness') ?>
<?= $this->include('frontend/clients') ?>
<?= $this->include('frontend/contact') ?>
<?= $this->include('frontend/footer') ?>
<?= $this->endSection() ?>
