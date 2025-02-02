@extends('layouts.admin')
@section('content')
{{-- <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="alert alert-danger alert-dismissible fade in" role="alert"> --}}
      {{-- <h4 id="oh-snap!-you-got-an-error!">
        <i class="fa fa-exclamation-triangle"></i> SMTP Setting is not configured
      </h4>
      <p style="margin-bottom: 10px">Configure the SMTP setting, otherwise <strong>forgot password</strong> or
        <strong>email</strong> feature will not work.</p>
    </div>
  </div> --}}
  {{--
</div> --}}

<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <a href="{{ route('category.index')}}" class="card card-banner card-green-light">
      <div class="card-body">
        <i class="icon fa fa-sitemap fa-4x"></i>
        <div class="content">
          <div class="title">Event Categories</div>
          <div class="value"><span class="sign"></span>50</div>
        </div>
      </div>
    </a>
  </div>

  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <a href="{{route('manage_event')}}" class="card card-banner card-yellow-light">
      <div class="card-body">
        <i class="icon fa fa-calendar fa-4x"></i>
        <div class="content">
          <div class="title">Admin Events</div>
          <div class="value"><span class="sign"></span>{{ $total_events }}</div>
        </div>
      </div>
    </a>
  </div>

  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <a href="{{route('user_events')}}" class="card card-banner card-aliceblue-light">
      <div class="card-body">
        <i class="icon fa fa-calendar fa-4x"></i>
        <div class="content">
          <div class="title">Users Events</div>
          {{-- <div class="value"><span class="sign"></span>{{ $total_user_events }}</div> --}}

          <div class="value"><span class="sign"></span>50</div>
        </div>
      </div>
    </a>
  </div>

  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <a href="{{route('normal_users.index')}}" class="card card-banner card-pink-light">
      <div class="card-body">
        <i class="icon fa fa-users fa-4x"></i>
        <div class="content">
          <div class="title">Users</div>
          <div class="value"><span class="sign"></span>200</div>
        </div>
      </div>
    </a>
  </div>

  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <a href="{{route('event_booking')}}" class="card card-banner card-blue-light">
      <div class="card-body">
        <i class="icon fa fa-book fa-4x"></i>
        <div class="content">
          <div class="title">Event Booking</div>
          <div class="value"><span class="sign"></span>35</div>
        </div>
      </div>
    </a>
  </div>

  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <a href="{{route('manage_contact')}}" class="card card-banner card-orange-light">
      <div class="card-body">
        <i class="icon fa fa-envelope fa-4x"></i>
        <div class="content">
          <div class="title">Contact List</div>
          <div class="value"><span class="sign"></span>80</div>
        </div>
      </div>
    </a>
  </div>

  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <a href="{{route('manage_reports')}}" class="card card-banner card-alicerose-light">
      <div class="card-body">
        <i class="icon fa fa-bug fa-4x"></i>
        <div class="content">
          <div class="title">Reports</div>
          <div class="value"><span class="sign"></span>10</div>
        </div>
      </div>
    </a>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-lg-12">
    <div class="container-fluid" style="background: #FFF; box-shadow: 0px 5px 10px 0px #CCC; border-radius: 2px;">
      <div class="col-lg-10">
        <h3>Users Analysis</h3>
      </div>
      <div class="col-lg-2" style="padding-top: 20px">
        <form method="get" id="graphFilter">
          <select class="form-control" name="filterByYear"
            style="box-shadow: none; height: auto; border-radius: 0px; font-size: 16px;">
            @for ($i = 2024; $i >= 2015; $i--)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>
        </form>
      </div>
      <div class="col-lg-12">
        <h3 class="text-muted text-center" style="padding-bottom: 2em">No data found!</h3>
      </div>
    </div>
  </div>
</div>
<br>

@endsection
