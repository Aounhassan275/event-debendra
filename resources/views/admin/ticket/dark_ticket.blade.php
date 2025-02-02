@extends('layouts.app')

@section('title', 'Event Booking')

@section('content')
    <style>
        body {
            background: #14171a;
            color: #eee !important;
        }

        body, table, thead, tbody, tr, td, img {
            padding: 0;
            margin: 0;
            border: none;
            line-height: 26px;
            border-spacing: 0;
            border-collapse: collapse;
            vertical-align: top;
            user-select: none;
        }

        .wrapper {
            padding-left: 10px;
            padding-right: 10px;
        }

        strong {
            font-weight: 600;
            color: #ffff;
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

        img.social_icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 10px auto;
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

            table.section {
                width: 94%;
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

    <div class="wrapper" id="capture">
        <table class="section header" cellpadding="0" cellspacing="0" width="600" style="margin-bottom:20px;margin-top:20px">
            <tr>
                <td class="column" width="220" valign="top">
                    <img src="{{ asset('images/app_logo.png') }}" alt="" style="width: 150px; height: 150px; margin-top: 30px;" />
                </td>
                <td class="column" width="360" valign="top">
                    <p style="text-align:left;line-height: 30px;">
                        <strong>Name:</strong> <span style="color:#dddddd;">Samim Ansari</span><br>
                        <strong>Mobile:</strong> <span style="color:#dddddd;">6372963705</span><br>
                        <strong>Email:</strong> <span style="color:#dddddd;">samim@example.com</span><br>
                        <strong>Booked By:</strong> Rakesh<br>
                        <strong>User Email:</strong> <span style="color:#dddddd;">raka@example.com</span><br>
                        <strong>Booking Date:</strong> <span style="color:#dddddd;">22 Oct, 2024</span>
                    </p>
                </td>
            </tr>
        </table>

        <table class="section header" cellpadding="0" cellspacing="0" width="600">
            <tr>
                <td class="column">
                    <h1>Event Title Example</h1>
                </td>
            </tr>
        </table>

        <table class="section header" cellpadding="0" cellspacing="0" width="600">
            <tr>
                <td class="column">
                    <h2>Location</h2>
                    <p style="text-align:left;"><span style="color:#dddddd;">123 Event Street, City</span></p>
                </td>
            </tr>
        </table>

        <table class="section header" cellpadding="0" cellspacing="0" width="600">
            <tr>
                <td class="column">
                    <h2>Date</h2>
                    <p style="text-align:left;">
                        <span style="color:#dddddd;">
                            22 Oct, 2024, 10:00 AM<br>
                            23 Oct, 2024, 06:00 PM
                        </span>
                    </p>
                </td>
            </tr>
        </table>

        <table class="section" cellpadding="0" cellspacing="0" width="600" style="margin:0px auto 20px auto;background:#242a2f;border-radius:10px">
            <tr>
                <td class="column" width="150" valign="top">
                    <p style="text-align:center;">
                        <strong>Ticket No.</strong><br><span style="color:#dddddd;">12345</span>
                    </p>
                </td>
                <td class="column" width="150" valign="top">
                    <p style="text-align:center;">
                        <strong>Nos. Tickets</strong><br><span style="color:#dddddd;">2</span>
                    </p>
                </td>
                <td class="column" width="150" valign="top">
                    <p style="text-align:center;">
                        <strong>Ticket Price</strong><br><span style="color:#dddddd;">$50</span>
                    </p>
                </td>
                <td class="column" width="150" valign="top">
                    <p style="text-align:center;">
                        <strong>Total Price</strong><br><span style="color:#dddddd;">$100</span>
                    </p>
                </td>
            </tr>
        </table>

        <table class="section" cellpadding="0" cellspacing="0" width="600" style="margin:10px auto 0 auto;background:linear-gradient(90deg, rgba(169,121,59,1) 0%, rgba(179,110,22,1) 100%);border-radius:10px">
            <tr>
                <td class="column" width="200" valign="top">
                    <p style="text-align:center;">
                        <img class="social_icon" src="{{ asset('images/contact.png') }}" alt="" />
                        <a href="javascript:void(0)">+123456789</a>
                    </p>
                </td>
                <td class="column" width="200" valign="top">
                    <p style="text-align:center;">
                        <img class="social_icon" src="{{ asset('images/email.png') }}" alt="" />
                        <a href="javascript:void(0)">event@example.com</a>
                    </p>
                </td>
                <td class="column" width="200" valign="top">
                    <p style="text-align:center;">
                        <img class="social_icon" src="{{ asset('images/web.png') }}" alt="" />
                        <a href="javascript:void(0)">www.eventwebsite.com</a>
                    </p>
                </td>
            </tr>
        </table>

        <table class="section" cellpadding="0" cellspacing="0" width="600" style="margin:20px auto">
            <tr>
                <td class="column">
                    <h3>Thanks! - App Name</h3>
                </td>
            </tr>
        </table>
    </div>
@endsection
