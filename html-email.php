<?php

/*
|------------------------
|
|   build the html email for admin / customer
|   1. message top
|   2. thankyou message - for customer version only
|   3. message header - order info
|   4. message middle - order items
|   5. message bottom
|
|-------------------------
 */

function sendHtmlEmails($order, $selectedDishes)
{

    $orderDetails = getOrderDetails($order);
    // build the html order

    $messageTop = '

                <table class="body-wrap" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
                <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                <td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                <td class="container" width="600" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                    <div class="content" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                        <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff">
                            <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="content-wrap aligncenter" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 20px;" align="center" valign="top">
                                <table width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                        <h1 class="aligncenter" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 32px; color: #000; line-height: 1.2em; font-weight: 500; text-align: center; margin: 40px 0 0;" align="center">' . $orderDetails['menuTitle'] . '</h1>
                                        </td>
                                    </tr>';

    $thankyouMessage = '<tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <td class="content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                        <h2 class="aligncenter" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 24px; color: #000; line-height: 1.2em; font-weight: 400; text-align: center; margin: 40px 0 0;" align="center">Thanks we have received your order</h2>
                        <p align="center">A member of our team will be in touch within 48hrs with your order confirmation.</p>
                        </td>
                    </tr>';

    $messageHeader = '<tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                        <h2 class="aligncenter" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 24px; color: #000; line-height: 1.2em; font-weight: 400; text-align: center; margin: 40px 0 0;" align="center">' . $orderDetails['menuName'] . ' # ' . $orderDetails['orderNumber'] . '</h2>
                                        </td>
                                    </tr>
                                    <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block aligncenter" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">
                                        <table class="invoice" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 80%; margin: 40px auto;">
                                            <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">Pick Up Day<br style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />' . $orderDetails['pickUpDay'] . ' </td>
                                            </tr>
                                            <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">Pick Up Time<br style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />' . $orderDetails['pickUpTime'] . '</td>
                                            </tr>
                                            <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">Customer Name<br style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />' . $orderDetails['contactName'] . '</td>
                                            </tr>
                                            <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">Contact Number<br style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />' . $orderDetails['contactNumber'] . '</td>
                                            </tr>

                                            <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">Notes<br style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />' . $orderDetails['notes'] . '</td>
                                            </tr>


                                            <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; margin: 0;">
                                                    ';
    $messageMiddle = '';
    foreach ($selectedDishes as $key => $value) {
        $messageMiddle .= ' <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">' . str_replace('_', ' ', $key) . '</td>
                                <td class="alignright" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">' . $value . '</td>
                                </tr>';

    }
    $messageBottom = '
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        </td>
                                    </tr>

                                    <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block aligncenter" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">
                                        Lox Stock and Barrel <br />140 Glenayr Avenue<br />Bondi Beach 2026
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            </tr>
                        </table>

                    </div>
                </td>
                <td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                </tr>
            </table>';

    // html parts
    $adminHtmlMessage = $messageTop . $messageHeader . $messageMiddle . $messageBottom;
    $adminAddress = getAdminEmail();

    require './PHPMailer-5.2/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                                     // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    //$mail->SMTPDebug = 2;
    $mail->Host = 'secure55.webhostinghub.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'developer@loxstockandbarrel.com.au'; // SMTP username - must have email account on server for this work
    $mail->Password = 'bagels123'; // SMTP password
    $mail->SMTPSecure = 'ssl'; // Enable ssl encryption, `tsl` also accepted on 587
    $mail->Port = 465; // TCP port to connect to
    $mail->setFrom($orderDetails['emailField']); // sender email
    $mail->addAddress($adminAddress); // Add a recipient
    $mail->addReplyTo($orderDetails['emailField']); // reply to
    $mail->addAttachment('orders/' . getCSVFile($orderDetails) . '.csv'); // Add csv file we made earlier
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $orderDetails['menuName'] . ': order number: ' . $orderDetails['orderNumber'];
    $mail->Body = $adminHtmlMessage; // set the html message into email body

    if (!$mail->send()) {
        //  return if admin email send fails
        return $mail->ErrorInfo;
        // echo 'Message could not be sent.';
        // echo 'Mailer Error: ' . $mail->ErrorInfo;

    } else {

        // 2. customer email  -  new instance of phpmailer

        $customerHtmlMessage = $messageTop . $thankyouMessage . $messageHeader . $messageMiddle . $messageBottom;
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        $mail1 = new PHPMailer;
        $mail1->isSMTP(); // Set mailer to use SMTP
        //$mail->SMTPDebug = 2;
        $mail1->Host = 'secure55.webhostinghub.com'; // Specify main and backup SMTP servers
        $mail1->SMTPAuth = true; // Enable SMTP authentication
        $mail1->Username = 'developer@loxstockandbarrel.com.au'; // SMTP username
        $mail1->Password = 'bagels123'; // SMTP password
        $mail1->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
        $mail1->Port = 465;
        $mail1->setFrom($adminAddress, 'Lox Stock and Barrel');
        $mail1->addAddress($orderDetails['emailField']); // Add a recipient
        $mail1->addReplyTo($adminAddress);

        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail1->isHTML(true); // Set email format to HTML
        $mail1->Subject = 'Lox Stock and Barrel:  ' . $orderDetails['menuName'] . ': order number: ' . $orderDetails['orderNumber'];
        $mail1->Body = $customerHtmlMessage;

        if (!$mail1->send()) {
            //  return if customer  email send fails
            return $mail1->ErrorInfo;
            // echo 'Message could not be sent.';
            // echo 'Mailer Error: ' . $mail1->ErrorInfo;

        } else {
            //  return if customer  email succeeds
            return 1;

            // cover our tracks delete csv
            // unlink($ $fileURL);

            // lets push customer to thankyou page.
            // echo "<script type='text/javascript'>window.location.href='./thanks.html'</script>";
        }
    }
}
