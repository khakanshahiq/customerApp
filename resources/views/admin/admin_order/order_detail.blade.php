<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@extends('admin.admin_dashboard')
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Invoice</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="invoice-title">
                                    <h4 class="float-end font-size-16"><strong>Order # 12345</strong></h4>
                                    <h3>
                                        <img src="{{asset('backend/assets/images/logo-sm.png')}}" alt="logo" height="24"/>
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <address>
                                            <strong>Billed To:</strong><br>
                                            {{$orderDetail->first_name}} {{$orderDetail->last_name}}<br>
                                            {{$orderDetail->address}}<br>
                                           
                                        </address>
                                    </div>
                                    <div class="col-6 text-end">
                                        <address>
                                            <strong>Shipped To:</strong><br>
                                            {{$orderDetail->first_name}} {{$orderDetail->last_name}}<br>
                                            {{$orderDetail->address}}<br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-4">
                                        <address>
                                            <strong>Payment Method:</strong><br>
                                            {{$orderDetail->payment}}<br>
                                            {{$orderDetail->email}}
                                        </address>
                                    </div>
                                    <div class="col-6 mt-4 text-end">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                            {{ \Carbon\Carbon::parse($orderDetail->created_at)->format('F d, Y') }}<br><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <div class="p-2">
                                        <h3 class="font-size-16"><strong>Order summary</strong></h3>
                                    </div>
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <td><strong>Item</strong></td>
                                                    <td class="text-center"><strong>Price</strong></td>
                                                    <td class="text-center"><strong>Quantity</strong>
                                                    </td>
                                                    <td class="text-end"><strong>Totals</strong></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                @foreach($arr as $ar)
                                                <tr>
                                                    <td>{{$ar['name']}}</td>
                                                    <td class="text-center">{{$ar['price']}}Rs</td>
                                                    <td class="text-center">{{$ar['quantity']}}</td>
                                                    <td class="text-end">{{$ar['price']*$ar['quantity']}}Rs</td>
                                                </tr>
                                                @endforeach
                                                
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center">
                                                        <strong>Shipping</strong></td>
                                                    <td class="no-line text-end">$15</td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center">
                                                        <strong>Total</strong></td>
                                                    <td class="no-line text-end"><h4 class="m-0">{{$orderDetail->total_price}}Rs</h4></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-print-none">
                                            <div class="float-end">
                                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="{{route('deliverOrder',$orderDetail->id)}}" class="btn btn-primary waves-effect waves-light ms-2">Send</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection

 