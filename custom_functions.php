<?php

// Show a validation error message in log in form
function show_validation() {		
	if( isset( $_SESSION[ 'MESSAGE' ] ) && !empty( $_SESSION[ 'MESSAGE' ] ) ) {
		echo "<div class='text-danger text-center -" . $_SESSION[ 'MESSAGE_TYPE' ] . " m-2'>" . $_SESSION[ 'MESSAGE' ] . "</div>";	
		unset( $_SESSION[ 'MESSAGE' ] );	
		unset( $_SESSION[ 'MESSAGE_TYPE' ] );
	}
}
//End Method

// Redirect to profile if password updated successfully
function return_profile( $page = "profile", $q = "" ) {
	header( "Location: " . SITE_URL . "/$page" . ( !empty( $q ) ? '&' . $q : '' ) );
	exit;
}
// End Method

function return_category( $page = "category", $q = "" ) {
	header( "Location: " . SITE_URL . "/$page" . ( !empty( $q ) ? '&' . $q : '' ) );
	exit;
}

function return_itemlist( $page = "item-list", $q = "" ) {
	header( "Location: " . SITE_URL . "/$page" . ( !empty( $q ) ? '&' . $q : '' ) );
	exit;
}

function return_department( $page = "department", $q = "" ) {
	header( "Location: " . SITE_URL . "/$page" . ( !empty( $q ) ? '&' . $q : '' ) );
	exit;
}

function return_userlist( $page = "user-list", $q = "" ) {
	header( "Location: " . SITE_URL . "/$page" . ( !empty( $q ) ? '&' . $q : '' ) );
	exit;
}

function goto_pendinglist( $page = "pending-list", $q = "" ) {
	header( "Location: " . SITE_URL . "/$page" . ( !empty( $q ) ? '&' . $q : '' ) );
	exit;
}

function goto_report( $page = "report", $q = "" ) {
	header( "Location: " . SITE_URL . "/$page" . ( !empty( $q ) ? '&' . $q : '' ) );
	exit;
}
