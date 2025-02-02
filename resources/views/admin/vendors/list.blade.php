@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            @if (isset($_SERVER['HTTP_REFERER']))
                <a href="{{ $_SERVER['HTTP_REFERER'] }}">
                    <h4 class="pull-left" style="font-size: 20px; color: #e91e63">
                        <i class="fa fa-arrow-left"></i> Back
                    </h4>
                </a>
            @endif

            <div class="card">
                @include('layouts.message')
                <div class="page_title_block">
                    <div class="col-md-6 col-xs-12">
                        <div class="page_title">Show Vendors</div>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered MyTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Vendor type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($all_vendors as $vendors)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $vendors->email }}</td>
                                    <td>
                                        @if ($vendors->get_vendor)
                                            {{ $vendors->get_vendor->name }}
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
