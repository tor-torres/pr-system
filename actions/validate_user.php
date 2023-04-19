<?php 
	if( !empty( $_POST[ 'username' ] ) && !empty( $_POST[ 'password' ] ) ) {
		$username = $_POST[ 'username' ];
		$password = $_POST[ 'password' ];
		$q = "SELECT * FROM users WHERE username = '$username' LIMIT 1";		
		$check = $DB->query( $q );

		if( $check && $check->num_rows ) {
			$user = $check->fetch_assoc();			
			if( $user[ 'status' ] == 0 ) {
				set_message( "Your account is not yet activated." . $DB->error, "danger" );
				redirect( LOGIN_REDIRECT );
			}
			if(password_verify($password, $user['password'])){
				
			$_SESSION[ AUTH_ID ] = $user[ 'id' ];
			$_SESSION[ AUTH_NAME ] = $user[ 'fullname' ];			
			$_SESSION[ AUTH_EMAIL ] = $user[ 'username' ];
			$_SESSION[ AUTH_TYPE ] = $user[ 'usertype' ];
			$_SESSION['message'] = "<div class='text-capitalize'>Welcome Back {$user['usertype']}!</div>";
			redirect();		
		} else {		
			set_message( "Incorrect Credentials, Please try again." . $DB->error, "danger" );
			}	
		} else {		
			set_message( "Incorrect Credentials, Please try again." . $DB->error, "danger" );
		}
	} else {		
		set_message( "You must specify the username and password." . $DB->error, "danger" );
	}