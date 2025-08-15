<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@extends('admin.admin_dashboard')
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Data Tables</h4>

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                       

                        <table id="table2" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Status</th>

                                <th>Action</th>
                               
                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($pendingOrders as $key=> $item)
                                    
                              
                            <tr>
                                <td class="text-center">{{$key+1}}</td>
                                <td class="text-center">{{$item->first_name}} {{$item->last_name}}</td>
                                <td class="text-center">{{$item->email}}</td>
                              
                                <td class="text-center"><span class="badge badge-danger p-3">{{$item->status}}</span></td>
                                
                                <td class="text-center">
                                    <a href="{{route('orderDetail',$item->id)}}" class="btn btn-primary">Order Detail</a>
                                    
                                    
                                </td>
                                
                            </tr>
                          
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        
        
    </div>
    
</div>
@endsection
<script src="{{asset('backend/assets/js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('backend/assets/js/datatables.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table2').DataTable({
            "language": {
                "paginate": {
                    "previous": '<i class="fa-solid fa-chevron-left p-5px"></i>',
                    "next": '<i class="fa-solid fa-chevron-right p-5px"></i>',
                },
                "lengthMenu": "",
                search: "",
                searchPlaceholder: "Search..."
            },

            "ordering": true
        });

    });
    </script>