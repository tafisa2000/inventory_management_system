@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Customer Wise Report</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <strong> Customer Wise Credit Report</strong>
                                    <input type="radio" name="customer_wise_report" value="customer_wise_credit"
                                        class="search_value">&NonBreakingSpace; &NonBreakingSpace;


                                    <strong> Customer Wise Paid Report</strong>
                                    <input type="radio" name="customer_wise_report" value="customer_wise_paid"
                                        class="search_value">
                                </div>
                            </div>
                            {{-- end row --}}
                            {{-- customer credit wise --}}

                            <div class="show_credit" style="display: none">
                                <form action="{{ route('customer.wise.credit.report') }}" method="GET" id="myForm">
                                    <div class="row">
                                        <div class="col-sm-8 form-group ">
                                            <label>Customer Name</label>
                                            <select name="customer_id" class="form-select select2"
                                                aria-label="Default select example">
                                                <option value="">Select Customer Name</option>
                                                @foreach ($customers as $cus)
                                                    <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                        <div class="col-sm-4" style="padding-top: 30px">

                                            <button type="submit" class="btn btn-primary">search</button>
                                        </div>

                                    </div>

                                </form>

                            </div>
                            {{-- end customer credit wise --}}
                            {{-- customer paid wise --}}

                            <div class="show_paid" style="display: none">
                                <form action="{{ route('customer.wise.paid.report') }}" method="GET" id="myForm">
                                    <div class="row">
                                        <div class="col-sm-8 form-group ">
                                            <label>Customer Name</label>
                                            <select name="customer_id" class="form-select select2"
                                                aria-label="Default select example">
                                                <option value="">Select Customer Name</option>
                                                @foreach ($customers as $cus)
                                                    <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                        <div class="col-sm-4" style="padding-top: 30px">

                                            <button type="submit" class="btn btn-primary">search</button>
                                        </div>

                                    </div>

                                </form>

                            </div>
                            {{-- end customer paid wise --}}


                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>


    {{-- <script type="text/javascript">
        $(function() {
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-product') }}",
                    type: "GET",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        var html = '<option value="">Select Category</option>';
                        $.each(data, function(key, v) {
                            html += '<option value=" ' + v.id + ' "> ' + v.name +
                                '</option>';
                        });
                        $('#product_id').html(html);
                    }
                })
            });
        });
    </script>
 --}}


    <script type="text/javascript">
        $(document).on('change', '.search_value', function() {
            var search_value = $(this).val();
            if (search_value == 'customer_wise_credit') {
                $('.show_credit').show();
            } else {
                $('.show_credit').hide();
            }
        });
    </script>

    <script type="text/javascript">
        $(document).on('change', '.search_value', function() {
            var search_value = $(this).val();
            if (search_value == 'customer_wise_paid') {
                $('.show_paid').show();
            } else {
                $('.show_paid').hide();
            }
        });
    </script>


    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    supplier_id: {
                        required: true,
                    },

                },


                messages: {
                    supplier_id: {
                        required: 'Please Choose Suplier ',
                    },

                },


                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script> --}}
@endsection
