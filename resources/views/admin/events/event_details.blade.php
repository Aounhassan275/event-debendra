@extends('layouts.admin')

@section('content')
<style type="text/css">
    .rewards_point_page_title {
        background: #e8e8e8;
        font-family: "Poppins", sans-serif;
        font-size: 18px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        font-weight: 600;
        display: inline-block;
        width: 100%;
        color: #424242;
        padding: 10px 0;
        margin-bottom: 0px;
        text-align: left;
    }
    .rewards_point_page_title .page_title {
        padding: 12px 0;
    }
    .rewards_point_page_title .page_title h3 {
        padding: 0;
        margin: 0;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body pt_top">
                <div class="rewards_point_page_title">
                    <div class="col-md-12 col-xs-12">
                        <img src="{{ asset('assets/images/event_img.jpg') }}" alt="">
                        <div class="page_item_contant">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="page_item_event">
                                        <h3>When</h3>
                                        <p>October 24, 2024 - 6:00 PM</p>
                                        <h3>Where</h3>
                                        <p>123 Event Location, City, State</p>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="page_item_detail">
                                        <h1>Event Title Here</h1>
                                        <p>This event is designed to bring together enthusiasts from various fields to network and learn.</p>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Samim</td>
                                                    <td>Ansari</td>
                                                    <td>samim@example.com</td>
                                                </tr>
                                                <tr>
                                                    <td>Rakesh</td>
                                                    <td>Kumar</td>
                                                    <td>raka@example.com</td>
                                                </tr>
                                                <tr>
                                                    <td>Bibhuti</td>
                                                    <td>Sir</td>
                                                    <td>manger@example.com</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>              
                </div>   
            </div>
        </div>
    </div>
</div>

@endsection
