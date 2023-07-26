@extends('layouts.main')

@section('title', 'Service Details')

@section('content')



    <div class="container-fluid">

        <div class="page-header">

            <div class="row align-items-end">

                <div class="col-lg-8">

                    <div class="page-header-title">

                        <i class="ik ik-edit bg-blue"></i>

                        <div class="d-inline">

                            <h5>Service Details</h5>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <nav class="breadcrumb-container" aria-label="breadcrumb">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item">

                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>

                            </li>

                            <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Service Details') }}</a></li>

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

                        <h3>{{ __('Service Details') }}</h3>

                    </div>

                    <div class="card-body">

                        <form class="forms-sample" method="POST" action="{{ route('service-detail-store') }}"

                            enctype="multipart/form-data">

                            @csrf

                            {{-- @method('PUT') --}}

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="exampleSelectGender1">Service</label>

                                        <select class="form-control" name="service_id" id="exampleSelectGender1">

                                            @foreach ($services as $service)

                                                <option value="{{ $service->id }}" {{ (isset($data->service_id) && ($data->service_id==$service->id)) ? 'selected' : '' }}>

                                                    {{ $service->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="exampleInputName1">{{ __('Title on top') }}</label>

                                        <input type="hidden" class="form-control" name="id" id="exampleInputName4"

                                            value="{{ $data->id }}" placeholder="id">

                                        <input type="text" class="form-control" name="title" id="exampleInputName1"

                                            value="{{ $data->title }}" placeholder="Enter Title">

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="tags">Tags on top <i>(write it as coma seperated)</i></label>

                                        <input type="text" class="form-control" name="tags" id="tags"

                                            value="{{ $data->tags }}" placeholder="tag1,tag2,tag3">

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="desc_1">{{ __('Description 1') }}</label>

                                        <textarea class="form-control" type="text" id="desc_1" name="desc_1" rows="2">{{ $data->desc_1 }}</textarea>

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="desc_2">{{ __('Description 2') }}</label>

                                        <textarea class="form-control" type="text" id="desc_2" name="desc_2" rows="2">{{ $data->desc_2 }}</textarea>

                                    </div>

                                </div>

                            </div>

                            <hr>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>{{ __('Wide Image 1') }}</label>

                                        <input type="file" name="wide_img_1" class="file-upload-default">

                                        <div class="input-group col-xs-12">

                                            <input type="text" name="wide_img_1" class="form-control file-upload-info"

                                                disabled placeholder="Upload Image">

                                            <span class="input-group-append">

                                                <button class="file-upload-browse btn btn-primary"

                                                    type="button">{{ __('Upload') }}</button>

                                            </span>

                                        </div>

                                    </div>



                                    <?php

                                        if ($data->wide_img_1) {

                                            $nam_arr = explode('.', $data->wide_img_1);

                                            $ext = end($nam_arr);



                                        if (strtolower($ext) == 'mp4') {

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <video width="200" controls>

                                                <source src="<?php echo asset('uploads/service-detail/' . $data->wide_img_1); ?>" type="video/mp4">

                                                Your browser does not support the video tag.

                                            </video>

                                            </div>

                                    <?php

                                        }else{

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <img src="<?php echo asset('uploads/service-detail/' . $data->wide_img_1); ?>" width="200" class="table-user-thumb" alt="">

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

                                        <input type="file" name="wide_img_2" class="file-upload-default">

                                        <div class="input-group col-xs-12">

                                            <input type="text" name="wide_img_2" class="form-control file-upload-info"

                                                disabled placeholder="Upload Image">

                                            <span class="input-group-append">

                                                <button class="file-upload-browse btn btn-primary"

                                                    type="button">{{ __('Upload') }}</button>

                                            </span>

                                        </div>

                                    </div>



                                    <?php

                                        if ($data->wide_img_2) {

                                            $nam_arr = explode('.', $data->wide_img_2);

                                            $ext = end($nam_arr);



                                        if (strtolower($ext) == 'mp4') {

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <video width="200" controls>

                                                <source src="<?php echo asset('uploads/service-detail/' . $data->wide_img_2); ?>" type="video/mp4">

                                                Your browser does not support the video tag.

                                            </video>

                                            </div>

                                    <?php

                                        }else{

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <img src="<?php echo asset('uploads/service-detail/' . $data->wide_img_2); ?>" width="200" class="table-user-thumb" alt="">

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

                                            value="{{ isset($data['meta_title']) ? $data['meta_title'] : '' }}" placeholder="Enter Meta Title">

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="exampleInputName2">{{ __('OG Tag') }}</label>

                                        <input type="text" class="form-control" name="og_tag" id="exampleInputName2"

                                            value="{{ isset($data['og_tag']) ? $data['og_tag'] : '' }}" placeholder="Enter OG Tag">

                                    </div>

                                </div>

                                <div class="col-md-12">
                                <div class="form-group">

                                    <label for="exampleTextarea1">{{ __('Meta Description') }}</label>

                                    <textarea class="form-control ckeditor" type="text" id="exampleTextarea1" name="meta_description" rows="4">{!! isset($data['meta_description']) ? $data['meta_description'] : '' !!}</textarea>

                                </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">{{ __('Submit') }}</button>

                            <div class="btn btn-light" onclick="location.href='{{ route('service-detail-list') }}'">Cancel</div>

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

