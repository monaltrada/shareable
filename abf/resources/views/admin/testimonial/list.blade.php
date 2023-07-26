@extends('layouts.main')

@section('title', 'Testimonial')

@section('content')

    <!-- push external head elements to head -->

    @push('head')

        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">

    @endpush



    <div class="card-body">

        @if (session()->has('message'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ session('message') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <i class="ik ik-x"></i>

                </button>

            </div>

        @endif

    </div>



    <div class="container-fluid">

        <div class="page-header">

            <div class="row align-items-end">

                <div class="col-lg-8">

                    <div class="page-header-title">

                        <i class="ik ik-inbox bg-blue"></i>

                        <div class="d-inline">

                            <h5>Testimonials</h5>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <nav class="breadcrumb-container" aria-label="breadcrumb">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item">

                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>

                            </li>

                            <li class="breadcrumb-item">

                                <a href="javacriptVoid:(0);">Testimonials</a>

                            </li>

                        </ol>

                    </nav>

                </div>

            </div>

        </div>



        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header justify-content-between">

                        <h3>Testimonial list</h3>

                        <div class=""><a class="btn btn-primary" href="{{ route('testimonial-add') }}">Add Testimonial</a></div>

                    </div>

                    <div class="card-body">

                        <table id="data_table" class="table">

                            <thead>

                                <tr>

                                    <th>No</th>

                                    <th class="text-center">Image/video</th>

                                    <th>Name</th>

                                    <th>Company</th>

                                    <th>Rating</th>

                                    <th class="nosort text-center">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                @if (!empty($Banner))

                                    @php $i = 1; @endphp



                                    @foreach ($Banner as $Banners)

                                        <tr>

                                            <td>{{ $i, $i++ }}</td>

                                            <td class="text-center">

                                                <?php

                                                    if ($Banners->img_name) {

                                                        $nam_arr = explode('.', $Banners->img_name);

                                                        $ext = end($nam_arr);

                                                    }



                                                    if (strtolower($ext) == 'mp4') {

                                                ?>

                                                        <video width="250" controls>

                                                            <source src="<?php echo asset('uploads/testimonial/' . $Banners->img_name); ?>" type="video/mp4">

                                                            Your browser does not support the video tag.

                                                        </video>

                                                <?php

                                                    }else{

                                                ?>

                                                        <img abd="<?php echo $ext; ?>" src="<?php echo asset('uploads/testimonial/' . $Banners->img_name); ?>" width="250" height="150" alt="img">

                                                <?php

                                                    }

                                                ?>

                                            </td>

                                            <td>{{ $Banners->name }}</td>

                                            <td>{{ $Banners->company }}</td>

                                            <td>{{ $Banners->rating }}</td>

                                            <td>

                                                <div class="table-actions">

                                                    <a href="{{ route('testimonial-edit', $Banners->id) }}"><i

                                                        class="ik ik-edit-2"></i></a>

                                                    <a href="{{ route('testimonial-delete', $Banners->id) }}"><i

                                                            class="ik ik-trash-2"></i></a>

                                                </div>

                                            </td>

                                        </tr>

                                    @endforeach

                                @endif

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>





    <!-- push external js -->

    @push('script')

        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>

        <script src="{{ asset('js/datatables.js') }}"></script>

    @endpush

@endsection

