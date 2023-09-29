@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit supplier Page</h4><br><br>

                            <form method="POST" action="{{ route('supplier.update') }}" id="myForm">
                                @csrf

                                <input type="hidden" name="id" value="{{ $supplier->id }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">supplier Name</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" value="{{ $supplier->name }}" name="name"
                                            type="text">
                                    </div>
                                </div>

                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label ">supplier Mobile</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" value="{{ $supplier->mobile_no }}" name="mobile_no"
                                            type="text">
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">supplier Email</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" value="{{ $supplier->email }}" name="email"
                                            type="email">
                                    </div>
                                </div>

                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">supplier Address</label>
                                    <div class="col-sm-10 form-group">
                                        <input class="form-control" value="{{ $supplier->address }}" name="address"
                                            type="text">
                                    </div>
                                </div>

                                <!-- end row -->




                                <input type="submit" class="btn btn-info waves-effect waves-light" value="update supplier">
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
