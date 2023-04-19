/**===================
Show Password Function
===================**/
function showPassword() {
    const show = document.getElementById("password");
    if (show.type == "password") {
        show.type = "text";
    } else {
        show.type = "password";
    }
}
//End Method.

/**===================
Account Status Manage
===================**/
$(document).on('click','.status-check',function(){
    var status = ($(this).hasClass("btn-success")) ? '1' : '0';
    var msg = (status=='0')? 'Deactivate' : 'Activate';
    if(confirm("Are you sure to "+ msg +" this account?")){
        var currentElement = $(this);
        url = "actions/account_status.php";
        $.ajax({
        type:"POST",
        url: url,
        data: {id:$(currentElement).attr('data'),status:status},
        success: function(data)
        {   
            location.reload();
        }
    });
    }      
});
//End Method.


/**===================
cost x quantity = total_cost
===================**/
function multiply(value){
    var quantity = document.getElementById('quantity').value;
    var cost = document.getElementById('cost').value;
    var total_cost = quantity * cost;
    document.getElementById("total_cost").value = total_cost;
}
// End Method.

