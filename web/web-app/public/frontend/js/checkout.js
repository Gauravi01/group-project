$(document).ready(function(){
    $('.razorpay_btn').click(function(e) {
        e.preventDefault();

        var firstname = $('firstname').val();
        var lastname = $('lastname').val();
        var address1 = $('address1').val();
        var address2 = $('address2').val();
        var phone = $('phone').val();
        var email = $('email').val();
        var city = $('city').val();
        var postalCode = $('postalCode').val();

        if(!firstname)
        {
            fname_error = "First name is required";
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
        }
        else
        {
            fname_error = "";
            $('#fname_error').html('');
        }

        
    });
});