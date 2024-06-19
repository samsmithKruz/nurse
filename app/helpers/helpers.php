
<?php

function server_response($state, $message)
{
    $state = $state ? 'green' : '#DC143C';
    $text = $state ? 'white' : 'inherit';
    return "
        <div class='fixed' id='server_res' style='position: fixed;top: 0;left: 0;right: 0; width: 100%;color: $text;background-color: $state;display: flex;justify-content: space-between;flex-wrap: wrap;gap: 8px;align-items: center;z-index: 10000 !important;'>
        <p style='margin-left: 10px;'>$message</p> <p id='close_res' style='font-size: 1rem;margin-right: 10px;cursor: pointer;user-select: none;'>&#215;</p>     
        </div>
        <script>
        document.querySelector('#close_res').onclick=(e)=>{
            document.querySelector('#server_res').classList.add('hide');
        }
    </script>
    
    ";
}

function resetPasswordEmail($token)
{
    return "
            <!DOCTYPE html>
        <html lang='en'>

        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>RESET PASSWORD :: OctexFx</title>
            <style>
                *{
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
            </style>
        </head>

        <body style='padding: 8px;' >
            <p style='margin:1rem 0 0rem 0;' >We have received a request to reset the password for your account on otecfx. If you did not initiate this request, please disregard this email.</p>
            <p style='margin: 1rem 0;'>To proceed with the password reset, please click the following link:</p>

            <a href='" . URLROOT . "/reset_password/reset/" . $token . "' style='display: block;background-color: black;color: white;padding: 5px 5px;width: 10rem;border-radius: 8px;text-align: center;text-decoration: none;' >Password Reset Link</a>

            <p style='margin: 1rem 0;'>This link will expire after 30 minutes, so please act promptly.</p>

            <P >Thank you for choosing OctexFx.</P>
            <P style='margin: 1rem 0;'>
                Best regards, <br>
                OctecFx Team
            </P>

        </body>

        </html>
    ";
}
function verifyEmail($code)
{
    return "
            <!DOCTYPE html>
        <html lang='en'>

        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>VERIFY EMAIL :: OctecFx</title>
            <style>
                *{
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
            </style>
        </head>

        <body style='padding: 8px;' >
            <p style='margin:1rem 0 0rem 0;' >Thank you for signin up, to verify your account, use the code below.</p>
            <p style='margin:1rem 0 0rem 0;' >".$code."</p>
            
            

            <p style='margin: 1rem 0;'>This code will expire after 30 minutes, so please act promptly.</p>

            <P >Thank you for choosing OctecFx.</P>
            <P style='margin: 1rem 0;'>
                Best regards, <br>
                OctecFx
            </P>

        </body>

        </html>
    ";
}

function contact_email($email,$fullname,$message){
    return "
    <!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>CONTACT :: OctecFx</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body style='padding: 8px;' >
    <p style='margin:1rem 0 0rem 0;' >New message from contact form.</p>
    <p style='margin:1rem 0 0rem 0;' >Name: ".$fullname."</p>
    <p style='margin:1rem 0 0rem 0;' >Email: ".$email."</p>
    <p style='margin:1rem 0 0rem 0;' >Message:</p> <br>
    <p style='margin:1rem 0 0rem 0;' >".$message."</p>



</body>

</html>
";
}
