
<?php

class Helpers
{

  public static function server_response($state, $message)
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
  public static function response($data)
  {
    return json_decode(json_encode($data));
  }
  public static function back($pageDefault = '')
  {
    if (isset($_SERVER['HTTP_REFERER'])) {
      // Redirect to the referring page
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      exit;
    } else {
      // Fallback: Redirect to a default page if HTTP_REFERER is not set
      header('Location: ' . URLROOT . "/" . $pageDefault);
      exit;
    }
  }
  public static function flashMessage($data)
  {
    return '
        <script src="' . URLROOT . '/js/toastify-js.js"></script>
        <link rel="stylesheet" href="' . URLROOT . '/css/toastify.min.css"></script>
        <script>
        Toastify({
          text: "' . $data->message . '",
          duration: 3000,
          close: true,
          gravity: "top", 
          position: "center", 
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: ' . ($data->state == 0 ? "'var(--danger)'" : "'var(--success)'") . ',
          }
        }).showToast();
        </script>
        ';
  }
  public static function resetPasswordEmail($token)
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
  public static function verifyEmail($code)
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
                <p style='margin:1rem 0 0rem 0;' >" . $code . "</p>
                
                
    
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

  public static function contact_email($email, $fullname, $message)
  {
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
            <p style='margin:1rem 0 0rem 0;' >Name: " . $fullname . "</p>
            <p style='margin:1rem 0 0rem 0;' >Email: " . $email . "</p>
            <p style='margin:1rem 0 0rem 0;' >Message:</p> <br>
            <p style='margin:1rem 0 0rem 0;' >" . $message . "</p>
    
    
    
        </body>
    
        </html>";
  }
  public static function send_register_email($receiver)
  {
    $message =  "

      <!DOCTYPE html>
      <html lang='en'>
        <head>
          <meta charset='UTF-8' />
          <meta name='viewport' content='width=device-width, initial-scale=1.0' />
          <title>Welcome to Foreign Nurse</title>
          <style>
            * {
              margin: 0;
              padding: 0;
              box-sizing: border-box;
            }
            body {
              background: #fafafa;
              color: #12121F;
              min-height: 100vh;
              display: flex;
              align-items: center;
              justify-content: center;
              padding: 2rem;
              font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            .wrapper{
              max-width: 550px;
              margin: auto;
              background-color: #fff;
            }
            .head{
              background-color: #4E73DF;
              padding: 1rem 2rem;
              color: #fff;
              font-weight: 700;
            }
            .content{
              padding: 2rem;
              line-height: 1.5;
            }
            .section{
              margin-bottom: 3rem;
            }
            h3{
              border-bottom: 1px solid #2f2f369c;
            }
          </style>
        </head>
        <body>
          <div class='wrapper'>
            <div class='head'>Notice</div>
            <div class='content'>
              <div class='section'>
                <h3>Nigerian Residents</h3>
                <h1><b>N</b>5,000/month</h1>
                <p>
                  <b>Account Name:</b> <span>JOY WILLIAMS</span><br />
                  <b>Account No.:</b> <span>6093258632</span><br />
                  <b>Bank Name:</b> <span>9PAYMENT SERVICE</span>
                </p>
              </div>
              <div class='section'>
                <h3>Non Nigerian Residents</h3>
                <h1><b>$</b>20/month</h1>
                <p>
                  <b>VISA DIRECT PAYMENT OR WITHDRAWAL TO A VISA CARD</b><br />
                  <span>4173960051895058</span>
                </p>
              </div>
              <p>
                <span
                  >After payment kindly send the following details to admin@foreignnurseglobal.com
                  </span> <br>
                <span><b>Evidence of payment (Image), Name or service or class you paid
                    for, Whatsapp No. and Registered Email.</b></span>
                <span>(<i>Please be patient with us, we will surely get back to you</i>).</span>
              </p>
            </div>
          </div>
        </body>
      </html> 
      ";

    return Auth::sendMail($receiver, "NCLEX ENROLLMENT", $message);
  }
  public static function send_forgot_email($receiver, $code)
  {
    $message =  "
    Kindly <a href=" . URLROOT . "/forgot/reset_?token=" . $code . ">click here</a> to reset password or copy the reset link <br>
    " . URLROOT . "/forgot/reset_?token=" . $code . " 
    to a browser to reset your password
        ";

    return Auth::sendMail($receiver, "Password Reset", $message);
  }
  public static function send_enroll_email($name, $email, $class)
  {
    $name = ucwords($name);
    $class = strtoupper(CLASSESS[$class]);
    $message =  "
      <p> Hello $name</p>
      <br>
      <p>
        You have been enrolled for the $class [" . SESSION . "], you can now access the class on your portal. <br>
        <a href=" . URLROOT . ">" . URLROOT . "</a>
        <br><br>
      </p>
      <p>
        For Tech complaints or enquiries, send a message to the official admin. <br><br>
      </p>
      <p>
        Thank you.
      </p>
    ";

    return Auth::sendMail($email, "Enrollment Successful - $name", $message);
  }
  public static function send_report_email($data)
  {
    extract($data);
    extract($report);

    $message =  "
    <p>
    Hello $fullname, <br><br>
    </p>
    <p>
    
    Here is a Summary of your Class Tests for <b>". CLASSESS[$current_class] ." [$session] BATCH</b>. Your Final Result goes as follows:
    </p>
    <p>
      <ul>
        <li>
          <b>Total Class Tests:</b> $total_test
        </li>
        <li>
          <b>Attempted Tests/Unattempted Tests:</b> $attempted / $total_test
        </li>
        <li>
          <b>Score Percentage: </b>$average%
        </li>
        <li>
          <b>Pass Mark:</b> $pass_mark%
        </li>
        <li>
          <b>Number of Tests to be Attempted: </b> $total_test.
        </li>
      </ul>
    </p>
    <p><b>Final Remark</b></p>
    <p>
    $remark
    </p>
    <p>
    The Academy requires you to be diligent in taking your daily test in class and also attending class Lectures.
    </p>
    <p>
    Registration is ongoing.
    </p>
    <p>
    This has proven so far to help improve our student and we are recommending this for you.
    </p>

    <p>
    If you have any concerns, feel free to reach any of the instructors.
    </p>

    <p>
    For Registration, Kindly proceed to:
    " . URLROOT . "
    </p>
    ";
    return Auth::sendMail($email, "FGN: REPORT[$session] - ". CLASSESS[$current_class], $message);
  }
  public static function send_contact_email($name, $email, $phone, $message)
  {
    $message =  "
      <p>
        <b>Name:</b>$name <br>
        <b>Email:</b>$email <br>
        <b>Tel:</b>$phone <br>
      </p>
      <br><br>
      <p>
        $message 
      </p>
    ";

    return Auth::sendMail(EMAIL, "FNG Message from: $name", $message);
  }

  public static function base64ToImage($base64String, $outputDir)
    {
        // Check if the output directory exists, if not, create it
        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        // Split the base64 string to get the image type and the actual data
        list($type, $data) = explode(';', $base64String);
        list(, $data) = explode(',', $data);

        // Decode the base64 string
        $data = base64_decode($data);

        // Get the image extension
        preg_match('/^data:image\/(\w+);base64,/', $base64String, $matches);
        $extension = $matches[1];

        // Generate a unique name for the file
        $fileName = uniqid() . '.' . $extension;

        // Set the full path for the file
        // $filePath = $outputDir . DIRECTORY_SEPARATOR . $fileName;
        $filePath = $outputDir . "/" . $fileName;
        // Write the binary data to the file
        file_put_contents($filePath, $data);

        // Return the file path
        return $filePath;
    }
    public static function processHtmlContent($htmlContent, $outputDir)
    {
        // Load the HTML content into a DOMDocument
        $dom = new DOMDocument();
        @$dom->loadHTML('<div id="temp_div">' . $htmlContent . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Find all img tags
        $imgTags = $dom->getElementsByTagName('img');

        foreach ($imgTags as $imgTag) {
            $src = $imgTag->getAttribute('src');

            if (strpos($src, 'data:image') === 0) {
                // Convert base64 image to a file and get the new file path
                $filePath = self::base64ToImage($src, $outputDir);

                // Set the new src attribute to the file path
                $imgTag->setAttribute('src', $filePath);

                if ($imgTag->hasAttribute('width')) {
                    $imgTag->removeAttribute('width');
                }
                if ($imgTag->hasAttribute('height')) {
                    $imgTag->removeAttribute('height');
                }
                if ($imgTag->hasAttribute('style')) {
                    $imgTag->removeAttribute('style');
                }
            }
        }
        $innerHtml = '';
        foreach ($dom->getElementById("temp_div")->childNodes as $child) {
            $innerHtml .= $dom->saveHTML($child);
        }

        return $innerHtml;
    }
}
