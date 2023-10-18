@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Paid Customer All</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Paid Customer All Data </h4>

                            <a href="{{ route('paid.customer.print.pdf') }}" target="_blank"
                                class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right"><i
                                    class="fa fa-print"></i>Print Paid
                                Customer</a><br><br>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Customer Name</th>
                                        <th>Invoice No</th>
                                        <th>Date</th>
                                        <th>Due Amount</th>
                                        <th>Action</th>

                                </thead>


                                <tbody>

                                    @foreach ($alldata as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item['customer']['name'] }} </td>
                                            @if (!empty($item) && !empty($item['invoice']))
                                                <td> {{ $item['invoice']['invoice_no'] }} </td>
                                            @else
                                                <td> N/A </td>
                                            @endif

                                            <td>
                                                @if (isset($item['invoice']['date']))
                                                    {{ date('d-m-Y', strtotime($item['invoice']['date'])) }}
                                                @else
                                                    N/A <!-- or any other default value or message you prefer -->
                                                @endif
                                            </td>
                                            <td> {{ $item->due_amount }} </td>

                                            <td>
                                                <a href="{{ route('customer.invoice.details.pdf', $item->invoice_id) }}"
                                                    class="btn btn-info sm" target="_blank" title="Customer Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>
@endsection
