<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking</title>
    <style>
        body, table, thead, tbody, tr, td, img {
            padding: 0;
            margin: 0;
            border: none;
            line-height: 26px;
            border-spacing: 0px;
            border-collapse: collapse;
            vertical-align: top;
            user-select: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }
        .wrapper {
            padding-left: 10px;
            padding-right: 10px;
        }
        strong {
            font-weight: 600;
        }
        h1 {
            margin: 0;
            padding: 0;
            font-size: 22px;
            padding-bottom: 25px;
            line-height: 1.4;
            font-weight: 600;
            font-family: "Poppins", "Arial", sans-serif;
        }
        h2, h3 {
            margin: 0;
            padding: 0;
            line-height: 1.2;
            font-family: "Poppins", "Arial", sans-serif;
        }
        h2 {
            font-size: 18px;
            font-weight: 600;
        }
        h3 {
            font-size: 16px;
            font-weight: 500;
        }
        p, li, a {
            font-size: 15px;
            font-family: "Poppins", "Arial", sans-serif;
        }
        p {
            color: #424242;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        img.social_icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 10px;
        }
        img {
            width: 100%;
            display: block;
        }
        @media only screen and (max-width: 620px) {
            .wrapper .section {
                width: 100%;
            }
            .wrapper .column {
                width: 100%;
                display: block;
            }
            table.section {
                width: 94%;
            }
        }
    </style>
</head>
<body>
    <table width="100%">
        <tbody>
            <tr>
                <td class="wrapper" id="capture" width="600" align="center">            
                    <table class="section header" cellpadding="0" cellspacing="0" width="600" style="margin-bottom: 20px; margin-top: 20px;">
                        <tr>
                            <td class="column" width="220" valign="top">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><img src="{{ asset('admin/images/profile.png') }}" alt="App Logo" style="width: 150px; height: 150px; margin-top: 30px;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="column" width="20" valign="top">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="column" width="360" valign="top">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p style="text-align: left; line-height: 30px;">
                                                    <strong>Name:</strong> Samim Ansari<br>
                                                    <strong>Mobile:</strong> +91 6372963705<br>
                                                    <strong>Email:</strong> <span style="color: #424242;">samimsrdc@example.com</span><br>
                                                    <strong>Booked By:</strong> Rakesh Kumar<br>
                                                    <strong>User Email:</strong> <span style="color: #424242;">raka@example.com</span><br>
                                                    <strong>Booking Date:</strong> 25 Oct, 2024
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>                
                        </tr>
                    </table>
                    <table class="section header" cellpadding="0" cellspacing="0" width="600">
                        <tr>
                            <td class="column">
                                <h1>Sample Event Title</h1>
                            </td>
                        </tr>
                    </table>            
                    <table class="section" cellpadding="0" cellspacing="0">
                        <tr>
                            <table class="section header" cellpadding="0" cellspacing="0" width="600">
                                <tr>
                                    <td class="column">
                                        <h2>Location</h2>
                                        <p style="text-align: left;">123 Event Street, Event City, EC 12345</p>
                                    </td>
                                </tr>
                            </table>
                            <table class="section header" cellpadding="0" cellspacing="0" width="600">
                                <tr>
                                    <td class="column">
                                        <h2>Date</h2>
                                        <p style="text-align: left;">
                                            25 Oct, 2024, 10:00 AM<br>
                                            26 Oct, 2024, 4:00 PM
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </tr>
                    </table>
                    <table class="section" cellpadding="0" cellspacing="0" width="600" style="margin: 0 auto 20px; background: #f5f5f5; border-radius: 10px;">
                        <tr>
                            <td class="column" width="150" valign="top">
                                <p style="text-align: center;">
                                    <strong>Ticket No.</strong><br>
                                    ABC12345
                                </p>
                            </td>
                            <td class="column" width="150" valign="top">
                                <p style="text-align: center;">
                                    <strong>Nos. Tickets</strong><br>
                                    2
                                </p>
                            </td>
                            <td class="column" width="150" valign="top">
                                <p style="text-align: center;">
                                    <strong>Ticket Price</strong><br>
                                    $50
                                </p>
                            </td>
                            <td class="column" width="150" valign="top">
                                <p style="text-align: center;">
                                    <strong>Total Price</strong><br>
                                    $100
                                </p>
                            </td>                
                        </tr>
                    </table>
                    <table class="section" cellpadding="0" cellspacing="0" width="600" style="margin: 10px auto 0; background: linear-gradient(90deg, rgba(169,121,59,1) 0%, rgba(179,110,22,1) 100%); border-radius: 10px;">
                        <tr>
                            <td class="column" width="200" valign="top">
                                <p style="text-align: center;">
                                    <img class="social_icon" src="images/contact.png" alt="Contact Icon">
                                    <a href="tel:+1234567890">+1234567890</a>
                                </p>
                            </td>
                            <td class="column" width="200" valign="top">
                                <p style="text-align: center;">
                                    <img class="social_icon" src="images/email.png" alt="Email Icon">
                                    <a href="mailto:event@example.com">event@example.com</a>
                                </p>
                            </td>
                            <td class="column" width="200" valign="top">
                                <p style="text-align: center;">
                                    <img class="social_icon" src="images/web.png" alt="Website Icon">
                                    <a href="https://www.einvie.com">www.eventwebsite.com</a>
                                </p>
                            </td>
                        </tr>
                    </table>        
                    <table class="section" cellpadding="0" cellspacing="0" width="600" style="margin: 20px auto;">
                        <tr>
                            <td class="column">
                                <h3>Thanks! - Event Organizer</h3>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
