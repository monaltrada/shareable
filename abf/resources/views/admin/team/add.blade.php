@extends('layouts.main')

@section('title', 'Team')

@section('content')



    <div class="container-fluid">

        <div class="page-header">

            <div class="row align-items-end">

                <div class="col-lg-8">

                    <div class="page-header-title">

                        <i class="ik ik-edit bg-blue"></i>

                        <div class="d-inline">

                            <h5>Team Form</h5>

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

                        <h3>{{ __('Team') }}</h3>

                    </div>

                    <div class="card-body">

                        <form class="forms-sample" method="POST" action="{{ route('team-store') }}"

                            enctype="multipart/form-data">

                            @csrf

                            {{-- @method('PUT') --}}

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="exampleInputName1">{{ __('Team Title') }}</label>

                                        <input type="hidden" class="form-control" name="id" id="exampleInputName4"

                                            value="{{ $Team->id }}" placeholder="id">

                                        <input type="text" class="form-control" name="title" id="exampleInputName1"

                                            value="{{ $Team->title }}" placeholder="Enter Title">

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="exampleInputName2">{{ __('Team Position') }}</label>

                                        <input type="text" class="form-control" name="pos" id="exampleInputName2"

                                            value="{{ $Team->pos }}" placeholder="Enter Sub Title">

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

                                    <img src="<?php echo asset('uploads/team/' . $Team->img_name); ?>" width="200" class="table-user-thumb" alt="">

                                </div>

                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="exampleInputName2">{{ __('Meta Title') }}</label>

                                        <input type="text" class="form-control" name="meta_title" id="exampleInputName2"

                                            value="{{ $Team->meta_title }}" placeholder="Enter Meta Title">

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="exampleInputName2">{{ __('OG Tag') }}</label>

                                        <input type="text" class="form-control" name="og_tag" id="exampleInputName2"

                                            value="{{ $Team->og_tag }}" placeholder="Enter OG Tag">

                                    </div>

                                </div>

                                <div class="col-md-12">
                                <div class="form-group">

                                    <label for="exampleTextarea1">{{ __('Meta Description') }}</label>

                                    <textarea class="form-control ckeditor" type="text" id="exampleTextarea1" name="meta_description" rows="4">{!! stripslashes($Team->meta_description) !!}</textarea>

                                </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">{{ __('Submit') }}</button>

                            <div class="btn btn-light" onclick="location.href='{{ route('team-list') }}'">Cancel</div>

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

