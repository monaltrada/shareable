@extends('layouts.main')

@section('title', 'Service')

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

                            <h5>{{ __('Service') }}</h5>

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

                                <a href="JavaScript:void(0)">Service</a>

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

                        <h3>{{ __('Service List') }}</h3>

                        <div class=""><a class="btn btn-primary" href="{{ route('service-add') }}"> Add</a></div>

                    </div>

                    <div class="card-body">

                        <table id="data_table" class="table">

                            <thead>

                                <tr>

                                    <th>{{ __('No.') }}</th>

                                    <th>{{ __('image') }}</th>

                                    <th>{{ __('name') }}</th>

                                    <th class="nosort text-center">{{ __('Action') }}</th>

                                </tr>

                            </thead>

                            <tbody>



                                <?php

                                $i = 1;

                                ?>



                                @foreach ($service as $row)

                                    <tr>

                                        <td>{{ $i, $i++ }}</td>

                                        <td>

                                            <?php

                                                if ($row['image']) {

                                                    $nam_arr = explode('.', $row['image']);

                                                    $ext = end($nam_arr);



                                                if (strtolower($ext) == 'mp4') {

                                            ?>

                                                    <video width="200" controls>

                                                        <source src="<?php echo asset('uploads/service/' . $row['image']); ?>" type="video/mp4">

                                                        Your browser does not support the video tag.

                                                    </video>

                                            <?php

                                                }else{

                                            ?>

                                                    <img abd="<?php echo $ext; ?>" src="<?php echo asset('uploads/service/' . $row['image']); ?>" width="200" height="150" alt="img">

                                            <?php

                                                }

                                                }

                                            ?>

                                        </td>

                                        <td>{{ $row['name'] }}</td>

                                        <td>

                                            <div class="table-actions">

                                                <a href="{{ route('service-edit', $row['id']) }}"><i

                                                        class="ik ik-edit-2"></i></a>

                                                <a href="{{ route('service-delete', $row['id']) }}"><i

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

