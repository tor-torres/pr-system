<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<div class="modal fade" id="modal-danger">
    <div class="modal-dialog modal-sm" id="end-session">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">End Session</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to log out?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a type="button" class="btn btn-outline-info btn-sm" data-dismiss="modal">
                    <i class="fas fa-times-circle"></i> No
                </a>

                <a href="?action=logout" class="btn btn-outline-danger btn-sm">
                    <i class="fas fa-power-off"></i> Log out
                </a>
            </div>
        </div>
    </div>
</div>