@extends('layouts.main')
@section('title', 'Position')
@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>Position</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Position') }}</a></li>
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
        @if (session()->has('message'))
            <div class="card-body">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ik ik-x"></i>
                        </button>
                    </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Position') }}</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('position-store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="hidden" class="form-control" name="id" id="exampleInputName4"
                                            value="{{ isset($position->id) ? $position->id : '' }}" placeholder="id">
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ isset($position->name) ? $position->name : '' }}" placeholder="Enter Position">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="experience">{{ __('Experience') }}</label>
                                        <input type="text" class="form-control" name="experience" id="experience"
                                            value="{{ isset($position->experience) ? $position->experience : '' }}" placeholder="Enter Experience">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 col-md-3">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" {{ (isset($position->status))&&($position->status==1) ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ (isset($position->status))&&($position->status==0) ? 'selected' : '' }}>Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">{{ __('Submit') }}</button>
                            <div class="btn btn-light" onclick="location.href='{{ route('position-list') }}'">Cancel</div>
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
