<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        body, table, thead, tbody, tr, td, img {
            padding: 0;
            margin: 0;
            border: none;
            line-height: 26px;
            border-spacing: 0px;
            border-collapse: collapse;
            vertical-align: top;
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
        h2 {
            margin: 0;
            padding: 0;
            font-size: 18px;
            padding-bottom: 0px;
            line-height: 1.2;
            font-weight: 600;
            font-family: "Poppins", "Arial", sans-serif;
        }
        h3 {
            margin: 0;
            padding: 0;
            font-size: 16px;
            padding-bottom: 0px;
            line-height: 1.2;
            font-weight: 500;
            font-family: "Poppins", "Arial", sans-serif;
        }
        p {
            font-size: 15px;
            color: #424242;
            font-family: "Poppins", "Arial", sans-serif;
        }
        a {
            font-size: 15px;
            color: #fff;
            text-decoration: none;
            font-family: "Poppins", "Arial", sans-serif;
        }
        .social_icon {
            width: 60px;
            height: 60px;
            margin: 10px auto;
            text-align: center;
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
            .section td.column h3 {
                padding-left: 5px;
            }
            .section td.column {
                width: 100%;
                display: block;
            }
        }
    </style>
</head>
<body>
    <form class="form" style="max-width: none; width: 1005px;">
        <table width="100%">
            <tbody>
                <tr>
                    <td class="wrapper" id="capture" width="600" align="center">
                        <table class="section header" cellpadding="0" cellspacing="0" width="600" style="margin-bottom: 20px; margin-top: 20px">
                            <tr>
                                <td class="column" width="220" valign="top">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td><img src="{{asset('admin/images/profile1.png')}}" alt="" style="width: 150px; height: 150px; margin-top: 30px;" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="column" width="20" valign="top"></td>
                                <td class="column" width="360" valign="top">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p style="text-align: left; line-height: 30px;">
                                                        <strong>Name:</strong>Demo Name<br>
                                                        <strong>Mobile:</strong> +91 4548245781<br>
                                                        <strong>Email:</strong><span style="color: #424242"> srdc@example.com</span><br>
                                                        <strong>Booked By:</strong> James Goshlin<br>
                                                        <strong>User Email:</strong><span style="color: #424242"> hr.srcd@example.com</span><br>
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
                                            <p style="text-align: left;">123 Event Street, City, Country</p>
                                        </td>
                                    </tr>
                                </table>

                                <table class="section header" cellpadding="0" cellspacing="0" width="600">
                                    <tr>
                                        <td class="column">
                                            <h2>Date</h2>
                                            <p style="text-align: left;">
                                                25 Oct, 2024, 10:00 AM<br>
                                                26 Oct, 2024, 05:00 PM
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </tr>
                        </table>

                        <table class="section" cellpadding="0" cellspacing="0" width="600" style="margin: 0px auto 20px auto; background: #f5f5f5; border-radius: 10px">
                            <tr>
                                <td class="column" width="150" valign="top">
                                    <p style="text-align: center;"><strong>Ticket No.</strong><br>12345</p>
                                </td>
                                <td class="column" width="150" valign="top">
                                    <p style="text-align: center;"><strong>Nos. Tickets</strong><br>2</p>
                                </td>
                                <td class="column" width="150" valign="top">
                                    <p style="text-align: center;"><strong>Ticket Price</strong><br>$50</p>
                                </td>
                                <td class="column" width="150" valign="top">
                                    <p style="text-align: center;"><strong>Total Price</strong><br>$100</p>
                                </td>
                            </tr>
                        </table>

                        <table class="section" cellpadding="0" cellspacing="0" width="600" style="margin: 10px auto 0 auto; background: linear-gradient(90deg, rgba(169,121,59,1) 0%, rgba(179,110,22,1) 100%); border-radius: 10px">
                            <tr>
                                <td class="column" width="200" valign="top">
                                    <p style="text-align: center;">
                                        <img class="social_icon" src="contact.png" alt="" />
                                        <a href="#">+1 234 567 890</a>
                                    </p>
                                </td>
                                <td class="column" width="200" valign="top">
                                    <p style="text-align: center;">
                                        <img class="social_icon" src="email.png" alt="" />
                                        <a href="#">eventemail@example.com</a>
                                    </p>
                                </td>
                                <td class="column" width="200" valign="top">
                                    <p style="text-align: center;">
                                        <img class="social_icon" src="web.png" alt="" />
                                        <a href="#">www.eventwebsite.com</a>
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <table class="section" cellpadding="0" cellspacing="0" width="600" style="margin: 20px auto">
                            <tr>
                                <td class="column">
                                    <h3>Thanks! - EventApp</h3>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>
