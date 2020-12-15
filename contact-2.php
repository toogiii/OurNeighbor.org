<?php
/* Set e-mail recipient */
/* $myemail  = "booksthatchangelives@gmail.com"; */

/* Check all form inputs using check_input function */
$yourname = check_input($_POST['yourname'], "Enter your name");
$subject  = check_input($_POST['subject'], "Book donation pickup request");
$email    = check_input($_POST['email']);
$website  = check_input($_POST['website']);$likeit   = check_input($_POST['likeit']);
$how_find = check_input($_POST['how']);
$street = check_input($_POST['street']);
$city = check_input($_POST['city']);
$state = check_input($_POST['state']);
$zip = check_input($_POST['zip']);
$phone = check_input($_POST['phone']);
$comments = check_input($_POST['comments'], "Write your comments");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* Let's prepare the message for the e-mail */
$message = "Hello!

Your contact form has been submitted by:

Name: $yourname

E-mail: $email

Like the website? $likeit

How did he/she find it? $how_find

Address:
Street: $street

City: $city

State: $state

Zip: $zip

Phone: $phone 

Comments:
$comments

End of message
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: thanks-2.htm');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>

