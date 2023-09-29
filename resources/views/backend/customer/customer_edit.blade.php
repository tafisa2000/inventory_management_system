@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Customer Page</h4><br><br>

                            <form method="POST" action="{{ route('customer.update') }}" id="myForm">
                                @csrf

                                <input type="hidden" name="id" value="{{ $customer->id }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" value="{{ $customer->name }}" name="name"
                                            type="text">
                                    </div>
                                </div>

                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label ">Customer Mobile</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" value="{{ $customer->mobile_no }}" name="mobile_no"
                                            type="text">
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Email</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" value="{{ $customer->email }}" name="email"
                                            type="email">
                                    </div>
                                </div>

                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Address</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" value="{{ $customer->address }}" name="address"
                                            type="text">
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Image</label>
                                    <div class="col-sm-10">
                                        <input name="customer_image" class="form-control" type="file" id="image">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">

                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ asset($customer->customer_image) }}" alt="Card image cap">

                                    </div>
                                </div>





                                <input type="submit" class="btn btn-info waves-effect waves-light" value="update customer">
                            </form>
                            <!-- end row -->


                        </div>
                    </div>
                </div> <!-- end col -->
            </div>




        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    mobile_no: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                },


                messages: {
                    name: {
                        required: 'Please Enter supplier Name',
                    },
                    mobile_no: {
                        required: 'Please Enter supplier Mobile number',
                    },
                    email: {
                        required: 'Please Enter supplier Email',
                    },
                    address: {
                        required: 'Please Enter supplier Address',
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
    </script>
@endsection
