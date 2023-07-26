@extends('layouts.main')

@section('title', 'Add Product Category')

@section('content')



    <div class="container-fluid">

        <div class="page-header">

            <div class="row align-items-end">

                <div class="col-lg-8">

                    <div class="page-header-title">

                        <i class="ik ik-edit bg-blue"></i>

                        <div class="d-inline">

                            <h5>Portfolio Category</h5>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <nav class="breadcrumb-container" aria-label="breadcrumb">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item">

                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>

                            </li>

                            <li class="breadcrumb-item"><a href="#">{{ __('Forms') }}</a></li>

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

                        <h3>{{ __('Portfolio Category') }}</h3>

                    </div>

                    <div class="card-body">

                        <form class="forms-sample" method="POST" action="{{ route('port-cat-store') }}"

                            enctype="multipart/form-data">

                            @csrf

                            {{-- @method('PUT') --}}

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="exampleInputName1">{{ __('Category Title') }}</label>

                                        <input type="hidden" class="form-control" name="id" id="exampleInputName4"

                                            value="{{ $ProductCategory->id }}" placeholder="id">

                                        <input type="text" class="form-control" name="cat_name" id="exampleInputName1"

                                            value="{{ $ProductCategory->cat_name }}" placeholder="Enter Title">

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

                                        if ($ProductCategory->img_name) {

                                            $nam_arr = explode('.', $ProductCategory->img_name);

                                            $ext = end($nam_arr);



                                        if (strtolower($ext) == 'mp4') {

                                    ?>

                                            <div class="mt-2 mb-3">

                                            <video width="200" controls>

                                                <source src="<?php echo asset('uploads/portfolio-category/' . $ProductCategory->img_name); ?>" type="video/mp4">

                                                Your browser does not support the video tag.

                                            </video>

                                            </div>

                                    <?php

                                        }else{

                                    ?>

                                            <div class="mt-2 mb-3">

                                            <img src="<?php echo asset('uploads/portfolio-category/' . $ProductCategory->img_name); ?>" width="200" class="table-user-thumb" alt="">

                                            </div>

                                    <?php

                                        }

                                        }

                                    ?>

                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mr-2">{{ __('Submit') }}</button>

                            <div class="btn btn-light" onclick="location.href='{{ route('port-cat-list') }}'">Cancel</div>

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

