@extends('layouts.admin') <!-- Assuming you have a base layout called app.blade.php -->

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <a href="{{ url('admin/dashboard') }}">
                <h4 class="pull-left" style="font-size: 20px; color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4>
            </a>
            <div class="card mrg_bottom">
                <div class="page_title_block">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="col-md-5 col-xs-12">
                        <div class="page_title">Manage Users</div>
                    </div>
                    <div class="col-md-7 col-xs-12">
                        <div class="search_list">
                            <div class="search_block">
                                <form method="get" action="">
                                    <input class="form-control input-sm" placeholder="Search..."
                                        aria-controls="DataTables_Table_0" type="search" name="keyword" required>
                                    <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="add_btn_primary"> <a href="{{ route('normal_users.create') }}">Add User</a> </div>
                        </div>
                        {{-- </div>
                    <div class="col-md-4 col-xs-12 text-right" style="float: right;">
                        <div class="checkbox"
                            style="width: 95px; margin-top: 5px; margin-left: 10px; right: 148px; position: absolute;">
                            <input type="checkbox" id="checkall_input">
                            <label for="checkall_input">Select All</label>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle btn_cust" type="button"
                                data-toggle="dropdown">Action
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" style="right:0; left:auto;">
                                <li><a href="#" class="actions" data-action="enable">Enable</a></li>
                                <li><a href="#" class="actions" data-action="disable">Disable</a></li>
                                <li><a href="#" class="actions" data-action="delete">Delete!</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12 mrg-top">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th nowrap="" style="width:40px">
                                        {{-- <div class="checkbox" style="margin-top: 0px; margin-bottom: 0px;">
                                    <input type="checkbox" name="checkall" id="checkall" value="">
                                    <label for="checkall"></label>
                                </div> --}}
                                        Sl no.
                                    </th>
                                    <th>User Type</th>
                                    <th>Device ID</th>
                                    <th>Name</th>
                                    <th>Email/Google/Facebook ID</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th class="cat_action_list" style="width:200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($normalUsers as $user)
                                    <tr style="{{ $loop->index % 2 == 0 ? 'background-color: rgba(255,0,0,0.1);' : '' }}">
                                        <td>{{ $i }}</td>
                                        <td>Normal</td>
                                        @php
                                            $devide_id = $user->id + 12450;
                                        @endphp
                                        <td>{{ $devide_id }}</td>
                                        <td><a href="{{ url('edit-user', $user->id) }}">{{ $user->name }}</a></td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>

                                        <td>
                                            <a title="Change Status" class="toggle_btn_a" href="javascript:void(0)"
                                                data-id="{{ $user->id }}"
                                                data-action="{{ $user->status == 'active' ? 'deactivate' : 'activate' }}"
                                                data-column="status">
                                                <span
                                                    class="badge badge-{{ $user->status == '1' ? 'success' : 'danger' }} badge-icon custom-badge">
                                                    <i class="fa {{ $user->status == '1' ? 'fa-check' : 'fa-times' }}"
                                                        aria-hidden="true"></i>
                                                    <span
                                                        class="status-text">{{ $user->status == '1' ? 'ENABLE' : 'DISABLE' }}</span>
                                                </span>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="#" data-id="{{ $user->id }}"
                                                class="btn btn-success btn_edit" data-toggle="tooltip"
                                                data-tooltip="Profile">
                                                <i class="fa fa-history"></i>
                                            </a>
                                            <a href="{{ route('normal.users.edit', $user->id) }}" class="btn btn-primary btn_cust"
                                                data-toggle="tooltip" data-tooltip="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('normal.users.destroy', $user->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn_cust"
                                                    onclick="return confirm('Are you sure you want to delete this user?');"
                                                    data-toggle="tooltip" data-tooltip="Delete!">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="pagination_item_block">
                            <nav>
                                {{-- Include pagination here --}}
                            </nav>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <!-- Assuming you have a section for scripts in your base layout -->
        <script type="text/javascript">
            // JavaScript functions for toggle and delete actions

            $(".toggle_btn_a").on("click", function(e) {
                e.preventDefault();
                var _for = $(this).data("action");
                var _id = $(this).data("id");
                var _column = $(this).data("column");
                var _table = 'tbl_users';

                $.ajax({
                    type: 'post',
                    url: '{{ url('processData') }}', // Change to your actual route
                    dataType: 'json',
                    data: {
                        id: _id,
                        for_action: _for,
                        column: _column,
                        table: _table,
                        'action': 'toggle_status',
                        'tbl_id': 'id'
                    },
                    success: function(res) {
                        if (res.status == '1') {
                            location.reload();
                        }
                    }
                });
            });
            // Additional JavaScript for delete and multi-action would go here...
        </script>
    @endpush
