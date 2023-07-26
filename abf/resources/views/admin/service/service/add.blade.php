@extends('layouts.main')

@section('title', 'Add Service')

@section('content')



    <div class="container-fluid">

        <div class="page-header">

            <div class="row align-items-end">

                <div class="col-lg-8">

                    <div class="page-header-title">

                        <i class="ik ik-edit bg-blue"></i>

                        <div class="d-inline">

                            <h5>Service</h5>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <nav class="breadcrumb-container" aria-label="breadcrumb">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item">

                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>

                            </li>

                            <li class="breadcrumb-item"><a href="#">{{ __('Service') }}</a></li>

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

                        <h3>{{ __('Service') }}</h3>

                    </div>

                    <div class="card-body">

                        <form class="forms-sample" method="POST" action="{{ route('service-store') }}"

                            enctype="multipart/form-data">

                            @csrf

                            {{-- @method('PUT') --}}

                            <div class="row">

                                <div class="col-12 col-md-12">

                                    <div class="form-group">

                                        <label for="name">{{ __('Name') }}</label>

                                        <input type="hidden" class="form-control" name="id" id="exampleInputName4"

                                            value="{{ isset($data['id']) ? $data['id'] : '' }}" placeholder="id">

                                        <input type="text" class="form-control" name="name" id="name"

                                            value="{{ isset($data['name']) ? $data['name'] : '' }}" placeholder="Enter Name">

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 col-md-12">

                                    <div class="form-group">

                                        <label for="short_desc">{{ __('Short Description') }}</label>

                                        <textarea class="form-control" type="text" id="short_desc" name="short_desc" rows="2">{{ isset($data['short_desc']) ? $data['short_desc'] : '' }}</textarea>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 col-md-12">

                                    <div class="form-group">

                                        <label for="description">{{ __('Description') }}</label>

                                        <textarea class="form-control" type="text" id="description" name="description" rows="2">{{ isset($data['description']) ? $data['description'] : '' }}</textarea>                                    </div>

                                </div>

                            </div>









                            <div><label for="service_list">{{ __('Add Service List') }}</label></div>

                            <div class="row">

                                <div class="col-2 col-md-2">

                                    <span class="px-3 mb-3 btn btn-primary addfield" title="clilck to add field" countt="{{ isset($list_count) ? $list_count : '0' }}"> Add </span>

                                </div>

                            </div>

                            <div class="printfield"></div>



                            <?php

                            if (!empty($service_list) && isset($service_list)) {

                                foreach ($service_list as $key => $value) {

                            ?>

                                    <div class="row removee<?php echo $key; ?>">

                                        <div class="col-8 col-md-8">

                                            <div class="form-group">

                                                <input type="text" class="form-control" name="service_list[]" value="<?php echo $value->description; ?>" placeholder="Enter Service List">

                                            </div>

                                        </div>

                                        <div class="col-2 col-md-2">

                                            <span class="px-3 btn btn-danger remove" countt="<?php echo $key; ?>"> Remove </span>

                                        </div>

                                    </div>

                            <?php

                                }

                            }

                            ?>









                            <hr>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>{{ __('Image') }}</label>

                                        <input type="file" name="image" class="file-upload-default">

                                        <div class="input-group col-xs-12">

                                            <input type="text" name="image" class="form-control file-upload-info"

                                                disabled placeholder="Upload Image">

                                            <span class="input-group-append">

                                                <button class="file-upload-browse btn btn-primary"

                                                    type="button">{{ __('Upload') }}</button>

                                            </span>

                                        </div>

                                    </div>



                                    <?php

                                        if (isset($data['image'])) {

                                            $nam_arr = explode('.', $data['image']);

                                            $ext = end($nam_arr);



                                        if (strtolower($ext) == 'mp4') {

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <video width="200" controls>

                                                <source src="<?php echo asset('uploads/service/' . $data['image']); ?>" type="video/mp4">

                                                Your browser does not support the video tag.

                                            </video>

                                            </div>

                                    <?php

                                        }else{

                                    ?>

                                            <div class="col-md-6 mt-2 mb-3">

                                            <img src="<?php echo asset('uploads/service/' . $data['image']); ?>" width="200" class="table-user-thumb" alt="">

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

                            <div class="btn btn-light" onclick="location.href='{{ route('service-list') }}'">Cancel</div>

                        </form>

                    </div>

                </div>

            </div>

        </div>





    </div>



    <!-- push external js -->

    @push('script')

        <script src="{{ asset('js/form-components.js') }}"></script>

        <script src="{{ asset('js/services.js') }}"></script>

        <script type="text/javascript">

            $( document ).ready(function() {

                $('.addfield').click(function(){

                    var current_count = $(this).attr('countt');

                    console.log(current_count);

                    var new_count = parseInt(current_count);

                    var new_field = '<div class="row removee'+new_count+'"><div class="col-8 col-md-8"><div class="form-group"><input type="text" class="form-control" name="service_list[]" value="" placeholder="Enter Service List"></div></div><div class="col-2 col-md-2"><span class="px-3 btn btn-danger remove" countt="'+new_count+'"> Remove </span></div></div>';

                    new_count++;

                    $('.printfield').after(new_field);

                    $('.addfield').attr('countt', new_count);

                    $.getScript('/js/services.js');

                });

            });

        </script>

    @endpush

@endsection

