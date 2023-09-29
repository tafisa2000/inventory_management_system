@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">home slider page</h4>
                            <form method="POST" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="tittle" type="text"
                                            value="{{ $homeslide->tittle }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">short title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="short_tittle	" type="text"
                                            value="{{ $homeslide->short_tittle }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="home_slide" type="file"
                                            value="{{ $homeslide->home_slide }}" id="example-text-input">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> video_url</label>
                                    <div class="col-sm-10">
                                        <input name="video_url" class="form-control" type="text" id="image"
                                            value="{{ $homeslide->video_url }}" id="example-text-input">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">

                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ !empty($homeslide->home_slide) ? url('upload/home_slides/' . $homeslide->home_slide) : url('upload/no_image.jpg') }}"
                                            alt="Card image cap">

                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update slide">
                            </form>
                            <!-- end row -->


                        </div>
                    </div>
                </div> <!-- end col -->
            </div>




        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
