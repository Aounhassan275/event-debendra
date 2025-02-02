@extends('layouts.admin') <!-- Assuming you have a layout file in 'layouts/app.blade.php' -->

@section('title', 'Booking List')

@section('content')

<style type="text/css">
  .select2{
    width: 100% !important;
  }
  .select2 .select2-selection--single .select2-selection__rendered{
    padding: 8px 10px;
  }
</style>

<div class="row">
    <div class="col-xs-12">
        <div class="card mrg_bottom">
            <div class="page_title_block">
                <div class="col-md-5 col-xs-12">
                    <div class="page_title">Sample Event Title</div>
                </div>
                <div class="col-md-7 col-xs-12">              
                    <div class="search_list">
                        <div class="search_block">
                            <form method="post" action="#">
                                @csrf
                                <input class="form-control input-sm" placeholder="Search..." type="search" name="search_value" value="Sample Search Value" required>
                                <button type="submit" name="event_search" class="btn-search"><i class="fa fa-search"></i></button>
                            </form>  
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <p style="font-weight: 500;font-size: 16px">
                        Total Tickets: <span style="font-weight: 600">100</span> &nbsp; | &nbsp;
                        Booked Tickets: <span style="font-weight: 600">80</span> &nbsp; | &nbsp;
                        Remain Tickets: <span style="font-weight: 600">20</span>
                    </p>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 mrg-top">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr> 
                            <th>Ticket No.</th>   
                            <th>Name</th>		
                            <th>Email</th>
                            <th>Phone</th>    
                            <th>Tickets</th>    
                            <th>Booked By</th>    
                            <th>Date</th>	 
                            <th class="cat_action_list">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td>12345</td>
                            <td>Samim Ansari</td>   
                            <td>samim@example.com</td>   
                            <td>123-456-7890</td>   
                            <td>2</td>   
                            <td>samim</td>
                            <td nowrap="">23-10-2024</td>
                            <td>
                                <a href="#" target="_blank" class="btn btn-success btn_edit btn_ticket" data-toggle="tooltip" data-tooltip="Ticket"><i class="fa fa-ticket"></i></a>
                                <a href="javascript:void(0)" data-id="1" class="btn btn-danger btn_delete btn_delete_a" data-toggle="tooltip" data-tooltip="Delete !"><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr> 
                            <td>12346</td>
                            <td>Mary Jane</td>   
                            <td>mary.jane@example.com</td>   
                            <td>321-654-0987</td>   
                            <td>3</td>   
                            <td>John Smith</td>
                            <td nowrap="">23-10-2024</td>
                            <td>
                                <a href="#" target="_blank" class="btn btn-success btn_edit btn_ticket" data-toggle="tooltip" data-tooltip="Ticket"><i class="fa fa-ticket"></i></a>
                                <a href="javascript:void(0)" data-id="2" class="btn btn-danger btn_delete btn_delete_a" data-toggle="tooltip" data-tooltip="Delete !"><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-12 col-xs-12">
                <div class="pagination_item_block">
                    <nav>
                        <!-- Include your pagination here -->
                        <ul class="pagination">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>                 
                    </nav>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
  $(".btn_delete").click(function(e){
      e.preventDefault();

      var _id=$(this).data("id");

      swal({
          title: "Are you sure?",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger btn_edit",
          cancelButtonClass: "btn-warning btn_edit",
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false,
          showLoaderOnConfirm: true
        },
        function(isConfirm) {
          if (isConfirm) {
            // Fake Ajax request to delete the item
            console.log("Delete item with ID: " + _id);
            swal({
                title: "Successfully", 
                text: "Ticket is deleted...", 
                type: "success"
            },function() {
                location.reload();
            });
          }
          else{
            swal.close();
          }
      });
  });
</script>
@endsection
