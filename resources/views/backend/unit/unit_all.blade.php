@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Unit All</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title"> All Unit</h4>

                            <a href="{{ route('unit.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light"
                                style="float:right"><i class="fas fa-ad  fas fa-plus-circle"></i>Add Unit</a><br><br>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th width="5%">Sl</th>
                                        <th>Name</th>
                                        <th width="20%">Action</th>

                                </thead>


                                <tbody>

                                    @foreach ($units as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item->name }} </td>


                                            <td>
                                                <a href="{{ route('unit.edit', $item->id) }}" class="btn btn-info sm"
                                                    title="Edit Data">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{ route('unit.delete', $item->id) }}" class="btn btn-danger sm"
                                                    title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i>
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
