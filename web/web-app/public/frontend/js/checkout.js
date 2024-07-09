$(document).ready(function(){
    $('.razorpay_btn').click(function(e) {
        e.preventDefault();

        var firstname = $('.firstname').val();
        var lastname = $('.lastname').val();
        var address1 = $('.address1').val();
        var address2 = $('.address2').val();
        var phone = $('.phone').val();
        var email = $('.email').val();
        var city = $('.city').val();
        var postalCode = $('.postalCode').val();

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

        if(!lastname)
        {
            lname_error = "Last name is required";
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
        }
        else
        {
            lname_error = "";
            $('#lname_error').html('');
        }

        if(!address1)
        {
            address1_error = "Address1 is required";
            $('#address1_error').html('');
            $('#address1_error').html(address1_error);
        }
        else
        {
            address1_error = "";
            $('#address1_error').html('');
        }

        if(!address2)
        {
            address2_error = "Address2 is required";
            $('#address2_error').html('');
            $('#address2_error').html(address2_error);
        }
        else
        {
            address2_error = "";
            $('#address2_error').html('');
        }

        
        if(!phone)
        {
            phone_error = "Phone is required";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
        }
        else
        {
            phone_error = "";
            $('#phone_error').html('');
        }

        if(!email)
        {
        email_error = "Email is required";
            $('#email_error').html('');
            $('#email_error').html(email_error);
        }
        else
        {
            email_error = "";
            $('#email_error').html('');
        }

        if(!city)
        {
            city_error = "City is required";
            $('#city_error').html('');
            $('#city_error').html(city_error);
        }
        else
        {
            city_error = "";
            $('#city_error').html('');
        }

        if(!postalCode)
        {
            postalCode_error = "Postal Code is required";
            $('#postalCode_error').html('');
            $('#postalCode_error').html(postalCode_error);
        }
        else
        {
            postalCode_error = "";
            $('#postalCode_error').html('');
        }

        if(fname_error !=''|| lname_error !='' || address1_error !='' || address2_error !='' ||  phone_error !='' || email_error !='' || city_error !='' || postalCode !='' )
        {
            return false;

        }
        else
        {
            var data={
                ' firstname':firstname,
                ' lastname':lastname,
                ' address1':address1,
                ' address2':address2,
                ' phone':phone,
                ' email':email,
                ' city':city,
                ' postalCode':postalCode,
            }

        }

        $.ajax({
            method: 'POST',
            url: '/proceed-to-pay',
            data: data,
            success: function(response){
                alert(response.total_price)
            }
        });
    
        
    });
});