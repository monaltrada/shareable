@extends('layouts.main')

@section('title', 'Testimonial')

@section('content')



    <div class="container-fluid">

        <div class="page-header">

            <div class="row align-items-end">

                <div class="col-lg-8">

                    <div class="page-header-title">

                        <i class="ik ik-edit bg-blue"></i>

                        <div class="d-inline">

                            <h5>Testimonial Form</h5>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <nav class="breadcrumb-container" aria-label="breadcrumb">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item">

                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>

                            </li>

                            <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Forms') }}</a></li>

                        </ol>

                    </nav>

                </div>

            </div>

        </div>



        @if ($errors->any())

            <div class="alert alert-danger">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif



        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">

                        <h3>{{ __('Testimonial') }}</h3>

                    </div>

                    <div class="card-body">

                        <form class="forms-sample" method="POST" action="{{ route('testimonial-store') }}"

                            enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="exampleInputName1">{{ __('name') }}</label>

                                        <input type="hidden" class="form-control" name="id" id="exampleInputName4"

                                            value="{{ $Banner->id }}" placeholder="id">

                                        <input type="text" class="form-control" name="name" id="exampleInputName1"

                                            value="{{ $Banner->name }}" placeholder="Enter Name">

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="company">{{ __('company') }}</label>

                                        <input type="text" class="form-control" name="company" id="company"

                                            value="{{ $Banner->company }}" placeholder="Enter Company">

                                    </div>

                                </div>





                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="rating">Rating (1 to 5)</label>

                                        <input type="number" min="1" max="5" class="form-control" name="rating" id="rating"

                                            value="{{ $Banner->rating }}" placeholder="rating out of 5">

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="challenge">{{ __('Description') }}</label>

                                        <textarea class="form-control" type="text" id="description" name="description" rows="2">{{ $Banner->description }}</textarea>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>{{ __('File upload') }}</label>

                                        <input type="file" name="img_name" class="file-upload-default">

                                        <div class="input-group col-xs-12">

                                            <input type="text" name="img_name" class="form-control file-upload-info"

                                                disabled placeholder="Upload Image">

                                            <span class="input-group-append">

                                                <button class="file-upload-browse btn btn-primary"

                                                    type="button">{{ __('Upload') }}</button>

                                            </span>

                                        </div>

                                    </div>



                                    <?php

                                    if ($Banner->img_name) {

                                            $nam_arr = explode('.', $Banner->img_name);

                                            $ext = end($nam_arr);



                                        if (strtolower($ext) == 'mp4') {

                                    ?>

                                            <div class="mt-2 mb-3">

                                            <video width="200" controls>

                                                <source src="<?php echo asset('uploads/testimonial/' . $Banner->img_name); ?>" type="video/mp4">

                                                Your browser does not support the video tag.

                                            </video>

                                            </div>

                                    <?php

                                        }else{

                                    ?>

                                            <div class="mt-2 mb-3">

                                            <img src="<?php echo asset('uploads/testimonial/' . $Banner->img_name); ?>" width="200" class="table-user-thumb" alt="">

                                            </div>

                                    <?php

                                        }

                                    }

                                    ?>

                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mr-2">{{ __('Submit') }}</button>

                            <div class="btn btn-light" onclick="location.href='{{ route('testimonial-list') }}'">Cancel</div>

                        </form>

                    </div>

                </div>

            </div>

        </div>





    </div>



    <!-- push external js -->

    @push('script')

        <script src="{{ asset('js/form-components.js') }}"></script>

    @endpush

@endsection

