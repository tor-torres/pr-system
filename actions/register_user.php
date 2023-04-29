<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED');

if (isset($_POST['submit'])) {
    // for the database
    $dept_id = stripslashes($_POST['dept_id']);
    $fullname = stripslashes($_POST['fullname']);
    $username = stripslashes($_POST['username']);
    $password = $_POST['password'];
    $password = crypt($_POST['password'], '$2a$10$'.bin2hex(random_bytes(22)));
    $usertype = stripslashes($_POST['usertype']);

    if (empty($error)) {
        $query = $DB->query(" SELECT username FROM users WHERE username = '$username' ");
        $check = mysqli_num_rows($query);
        if ($check > 0) {
            set_message("Username already exist! Please try again.", "danger");
        } else {
            $create = " INSERT INTO users SET dept_id = '$dept_id', fullname = '$fullname', username = '$username', password = '$password', usertype = '$usertype' ";
            if ($DB->query($create)) {
                set_message("Thank you for your registration. Please wait to activate your account by the admin!", "success");
                register_page();
            } else {
                set_message("Failed register.", "danger");
            }
            redirect("login");
        }
    }
}
// if( isset( $_POST ) ) {
//     $_POST['data']['password'] = md5($_POST['data']['password']);
//     $_POST['data']['usertype'] = "student";
// 	if( add_record( "users", $_POST[ 'data' ] ) ) {
//         set_message( "Thank you for your registration.", "success" );
//     } else {
//         set_message( "Failed register.", "danger" );
//     }
//     redirect( "login" );
// }	    