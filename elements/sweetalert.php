<!-- Sweet Alert -->
<script>
    swal({
        title: "<?php echo $_SESSION['status']; ?>",
        icon: "<?php echo $_SESSION['status_code']; ?>",
        button: "Ok!",
    });
</script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    unset($_SESSION['status']);
} ?>
<!-- End -->