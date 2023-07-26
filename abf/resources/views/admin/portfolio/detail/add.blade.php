@extends('layouts.main')

@section('title', 'Add Portfolio Details')

@section('content')



    <div class="container-fluid">

        <div class="page-header">

            <div class="row align-items-end">

                <div class="col-lg-8">

                    <div class="page-header-title">

                        <i class="ik ik-edit bg-blue"></i>

                        <div class="d-inline">

                            <h5>Portfolio Details</h5>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <nav class="breadcrumb-container" aria-label="breadcrumb">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item">

                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>

                            </li>

                            <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Portfolio Details') }}</a></li>

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

                        <h3>{{ __('Portfolio Details') }}</h3>

                    </div>

                    <div class="card-body">

                        <form class="forms-sample" method="POST" action="{{ route('port-detail-store') }}"

                            enctype="multipart/form-data">

                            @csrf

                            {{-- @method('PUT') --}}

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="exampleSelectGender1">Portfolio</label>

                                        <select class="form-control" name="product_id" id="exampleSelectGender1">

                                            @foreach ($Product as $Products)

                                                <option value="{{ $Products->id }}" <?php

                                                $id = $ProductDetails->product_id;

                                                if ($Products->id == $id) {

                                                    echo 'selected';

                                                } ?>>

                                                    {{ $Products->title }}

                                                </option>

                                            @endforeach

                                        </select>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="exampleInputName1">{{ __('Title on top') }}</label>

                                        <input type="hidden" class="form-control" name="id" id="exampleInputName4"

                                            value="{{ $ProductDetails->id }}" placeholder="id">

                                        <input type="text" class="form-control" name="title" id="exampleInputName1"

                                            value="{{ $ProductDetails->title }}" placeholder="Enter Title">

                                    </div>

                                </div>





                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="tags">Tags on top <i>(write it as coma seperated)</i></label>

                                        <input type="text" class="form-control" name="tags" id="tags"

                                            value="{{ $ProductDetails->tags }}" placeholder="tag1,tag2,tag3">

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="overview">{{ __('OVERVIEW') }}</label>

                                        <textarea class="form-control" type="text" id="overview" name="overview" rows="2">{{ $ProductDetails->overview }}</textarea>

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="challenge">{{ __('THE CHALLENGE') }}</label>

                                        <textarea class="form-control" type="text" id="challenge" name="challenge" rows="2">{{ $ProductDetails->challenge }}</textarea>

                                    </div>

                                </div>

                            </div>

                            <hr>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>{{ __('Wide Image 1') }}</label>

                                        <input type="file" name="img_1" class="file-upload-default">

                                        <div class="input-group col-xs-12">

                                            <input type="text" name="img_1" class="form-control file-upload-info"

                                                disabled placeholder="Upload Image">

                                            <span class="input-group-append">

                                                <button class="file-upload-browse btn btn-primary"

                                                    type="button">{{ __('Upload') }}</button>

                                            </span>

                                        </div>

                                    </div>



                                    <?php

                                        if ($ProductDetails->img_1) {

                                            $nam_arr = explode('.', $ProductDetails->img_1);

                                            $ext = end($nam_arr);



                                        if (strtolower($ext) == 'mp4') {

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <video width="200" controls>

                                                <source src="<?php echo asset('uploads/portfolio-detail/' . $ProductDetails->img_1); ?>" type="video/mp4">

                                                Your browser does not support the video tag.

                                            </video>

                                            </div>

                                    <?php

                                        }else{

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <img src="<?php echo asset('uploads/portfolio-detail/' . $ProductDetails->img_1); ?>" width="200" class="table-user-thumb" alt="">

                                            </div>

                                    <?php

                                        }

                                        }

                                    ?>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>{{ __('Wide Image 2') }}</label>

                                        <input type="file" name="img_2" class="file-upload-default">

                                        <div class="input-group col-xs-12">

                                            <input type="text" name="img_2" class="form-control file-upload-info"

                                                disabled placeholder="Upload Image">

                                            <span class="input-group-append">

                                                <button class="file-upload-browse btn btn-primary"

                                                    type="button">{{ __('Upload') }}</button>

                                            </span>

                                        </div>

                                    </div>



                                    <?php

                                        if ($ProductDetails->img_2) {

                                            $nam_arr = explode('.', $ProductDetails->img_2);

                                            $ext = end($nam_arr);



                                        if (strtolower($ext) == 'mp4') {

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <video width="200" controls>

                                                <source src="<?php echo asset('uploads/portfolio-detail/' . $ProductDetails->img_2); ?>" type="video/mp4">

                                                Your browser does not support the video tag.

                                            </video>

                                            </div>

                                    <?php

                                        }else{

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <img src="<?php echo asset('uploads/portfolio-detail/' . $ProductDetails->img_2); ?>" width="200" class="table-user-thumb" alt="">

                                            </div>

                                    <?php

                                        }

                                        }

                                    ?>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>{{ __('Small Image 1') }}</label>

                                        <input type="file" name="img_3" class="file-upload-default">

                                        <div class="input-group col-xs-12">

                                            <input type="text" name="img_3" class="form-control file-upload-info"

                                                disabled placeholder="Upload Image">

                                            <span class="input-group-append">

                                                <button class="file-upload-browse btn btn-primary"

                                                    type="button">{{ __('Upload') }}</button>

                                            </span>

                                        </div>

                                    </div>



                                    <?php

                                        if ($ProductDetails->img_3) {

                                            $nam_arr = explode('.', $ProductDetails->img_3);

                                            $ext = end($nam_arr);



                                        if (strtolower($ext) == 'mp4') {

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <video width="200" controls>

                                                <source src="<?php echo asset('uploads/portfolio-detail/' . $ProductDetails->img_3); ?>" type="video/mp4">

                                                Your browser does not support the video tag.

                                            </video>

                                            </div>

                                    <?php

                                        }else{

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <img src="<?php echo asset('uploads/portfolio-detail/' . $ProductDetails->img_3); ?>" width="200" class="table-user-thumb" alt="">

                                            </div>

                                    <?php

                                        }

                                        }

                                    ?>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>{{ __('Small Image 2') }}</label>

                                        <input type="file" name="img_4" class="file-upload-default">

                                        <div class="input-group col-xs-12">

                                            <input type="text" name="img_4" class="form-control file-upload-info"

                                                disabled placeholder="Upload Image">

                                            <span class="input-group-append">

                                                <button class="file-upload-browse btn btn-primary"

                                                    type="button">{{ __('Upload') }}</button>

                                            </span>

                                        </div>

                                    </div>



                                    <?php

                                        if ($ProductDetails->img_4) {

                                            $nam_arr = explode('.', $ProductDetails->img_4);

                                            $ext = end($nam_arr);



                                        if (strtolower($ext) == 'mp4') {

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <video width="200" controls>

                                                <source src="<?php echo asset('uploads/portfolio-detail/' . $ProductDetails->img_4); ?>" type="video/mp4">

                                                Your browser does not support the video tag.

                                            </video>

                                            </div>

                                    <?php

                                        }else{

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <img src="<?php echo asset('uploads/portfolio-detail/' . $ProductDetails->img_4); ?>" width="200" class="table-user-thumb" alt="">

                                            </div>

                                    <?php

                                        }

                                        }

                                    ?>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>{{ __('Small Image 3') }}</label>

                                        <input type="file" name="img_5" class="file-upload-default">

                                        <div class="input-group col-xs-12">

                                            <input type="text" name="img_5" class="form-control file-upload-info"

                                                disabled placeholder="Upload Image">

                                            <span class="input-group-append">

                                                <button class="file-upload-browse btn btn-primary"

                                                    type="button">{{ __('Upload') }}</button>

                                            </span>

                                        </div>

                                    </div>



                                    <?php

                                        if ($ProductDetails->img_5) {

                                            $nam_arr = explode('.', $ProductDetails->img_5);

                                            $ext = end($nam_arr);



                                        if (strtolower($ext) == 'mp4') {

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <video width="200" controls>

                                                <source src="<?php echo asset('uploads/portfolio-detail/' . $ProductDetails->img_5); ?>" type="video/mp4">

                                                Your browser does not support the video tag.

                                            </video>

                                            </div>

                                    <?php

                                        }else{

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <img src="<?php echo asset('uploads/portfolio-detail/' . $ProductDetails->img_5); ?>" width="200" class="table-user-thumb" alt="">

                                            </div>

                                    <?php

                                        }

                                        }

                                    ?>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>{{ __('Small Image 4') }}</label>

                                        <input type="file" name="img_6" class="file-upload-default">

                                        <div class="input-group col-xs-12">

                                            <input type="text" name="img_6" class="form-control file-upload-info"

                                                disabled placeholder="Upload Image">

                                            <span class="input-group-append">

                                                <button class="file-upload-browse btn btn-primary"

                                                    type="button">{{ __('Upload') }}</button>

                                            </span>

                                        </div>

                                    </div>



                                    <?php

                                        if ($ProductDetails->img_6) {

                                            $nam_arr = explode('.', $ProductDetails->img_6);

                                            $ext = end($nam_arr);



                                        if (strtolower($ext) == 'mp4') {

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <video width="200" controls>

                                                <source src="<?php echo asset('uploads/portfolio-detail/' . $ProductDetails->img_6); ?>" type="video/mp4">

                                                Your browser does not support the video tag.

                                            </video>

                                            </div>

                                    <?php

                                        }else{

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <img src="<?php echo asset('uploads/portfolio-detail/' . $ProductDetails->img_6); ?>" width="200" class="table-user-thumb" alt="">

                                            </div>

                                    <?php

                                        }

                                        }

                                    ?>

                                </div>

                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="exampleInputName2">{{ __('Meta Title') }}</label>

                                        <input type="text" class="form-control" name="meta_title" id="exampleInputName2"

                                            value="{{ $ProductDetails->meta_title }}" placeholder="Enter Meta Title">

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="exampleInputName2">{{ __('OG Tag') }}</label>

                                        <input type="text" class="form-control" name="og_tag" id="exampleInputName2"

                                            value="{{ $ProductDetails->og_tag }}" placeholder="Enter OG Tag">

                                    </div>

                                </div>

                                <div class="col-md-12">
                                <div class="form-group">

                                    <label for="exampleTextarea1">{{ __('Meta Description') }}</label>

                                    <textarea class="form-control ckeditor" type="text" id="exampleTextarea1" name="meta_description" rows="4">{!! stripslashes($ProductDetails->meta_description) !!}</textarea>

                                </div>
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary mr-2">{{ __('Submit') }}</button>

                            <div class="btn btn-light" onclick="location.href='{{ route('port-detail-list') }}'">Cancel</div>

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

