@extends('layouts.main')

@section('title', 'Service Details')

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

                            <h5>{{ __('Service Details') }}</h5>

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

                                <a href="javascript:void(0)">Service</a>

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

                        <h3>{{ __('Service Details List') }}</h3>

                        <div class=""><a class="btn btn-primary" href="{{ route('service-detail-add') }}"> Add</a></div>

                    </div>

                    <div class="card-body">

                        <table id="data_table" class="table">

                            <thead>

                                <tr>

                                    <th>{{ __('No.') }}</th>

                                    <th>{{ __('Service name') }}</th>

                                    <th>{{ __('Title') }}</th>

                                    <th>{{ __('Image 1') }}</th>

                                    <th>{{ __('Image 2') }}</th>

                                    <th class="nosort text-center">{{ __('Action') }}</th>

                                </tr>

                            </thead>

                            <tbody>



                                <?php

                                $i = 1;

                                ?>



                                @foreach ($list as $row)

                                    <tr>

                                        <td>{{ $i, $i++ }}</td>

                                        <td>{{ $row->service_name }}</td>

                                        <td>{{ $row->title }}</td>

                                        <td>

                                            <?php

                                                if ($row->wide_img_1) {

                                                    $nam_arr = explode('.', $row->wide_img_1);

                                                    $ext = end($nam_arr);

                                                }



                                                if (strtolower($ext) == 'mp4') {

                                            ?>

                                                    <video width="100" controls>

                                                        <source src="<?php echo asset('uploads/service-detail/' . $row->wide_img_1); ?>" type="video/mp4">

                                                        Your browser does not support the video tag.

                                                    </video>

                                            <?php

                                                }else{

                                            ?>

                                                    <img abd="<?php echo $ext; ?>" src="<?php echo asset('uploads/service-detail/' . $row->wide_img_1); ?>" width="100" height="150" alt="img">

                                            <?php

                                                }

                                            ?>

                                        </td>

                                        <td>

                                            <?php

                                                if ($row->wide_img_2) {

                                                    $nam_arr = explode('.', $row->wide_img_2);

                                                    $ext = end($nam_arr);

                                                }



                                                if (strtolower($ext) == 'mp4') {

                                            ?>

                                                    <video width="100" controls>

                                                        <source src="<?php echo asset('uploads/service-detail/' . $row->wide_img_2); ?>" type="video/mp4">

                                                        Your browser does not support the video tag.

                                                    </video>

                                            <?php

                                                }else{

                                            ?>

                                                    <img abd="<?php echo $ext; ?>" src="<?php echo asset('uploads/service-detail/' . $row->wide_img_2); ?>" width="100" height="150" alt="img">

                                            <?php

                                                }

                                            ?>

                                        </td>

                                        <td>

                                            <div class="table-actions text-center">

                                                <a href="{{ route('service-detail-edit', $row->id) }}"><i

                                                        class="ik ik-edit-2"></i></a>

                                                <a href="{{ route('service-detail-delete', $row->id) }}"><i

                                                        class="ik ik-trash-2"></i></a>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

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

