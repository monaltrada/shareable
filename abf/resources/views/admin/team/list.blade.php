@extends('layouts.main')

@section('title', 'Team')

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

                            <h5>{{ __('Team') }}</h5>

                            {{-- <span>{{ __('lorem ipsum dolor sit amet, consectetur adipisicing elit') }}</span> --}}

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

                                <a href="#">Team</a>

                            </li>

                            {{-- <li class="breadcrumb-item active" aria-current="page">Team Home section</li> --}}

                        </ol>

                    </nav>

                </div>

            </div>

        </div>





        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header justify-content-between">

                        <h3>{{ __('Team List') }}</h3>

                        <div class=""><a class="btn btn-primary" href="{{ route('team-add') }}" > Add Team</a></div>

                    </div>

                    <div class="card-body">

                        <table id="data_table" class="table">

                            <thead>

                                <tr>

                                    <th>{{ __('No.') }}</th>

                                    <th>{{ __('Image') }}</th>

                                    <th>{{ __('Title') }}</th>

                                    <th>{{ __('Position') }}</th>

                                    <th class="nosort text-right">{{ __('Action') }}</th>

                                </tr>

                            </thead>

                            <tbody>



                                <?php

                                $i = 1;

                                ?>



                                @foreach ($Team as $Teams)

                                    <tr>

                                        <td>{{ $i, $i++ }}</td>

                                        <td><img src="<?php echo asset('uploads/team/' . $Teams->img_name); ?>" width="100" height="150" alt="img">

                                        <td>{{ $Teams->title }}</td>

                                        <td>{{ $Teams->pos }}</td>

                                        <td>

                                            <div class="table-actions">

                                                <a href="{{ route('team-edit', $Teams->id) }}"><i

                                                        class="ik ik-edit-2"></i></a>

                                                <a href="{{ route('team-delete', $Teams->id) }}"><i

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

