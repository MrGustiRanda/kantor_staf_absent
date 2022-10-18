@extends('layouts.main')

@section('title', 'Staff')

@section('buttonallFunction')
        <a href="{{ route('staff.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
            class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
@endsection

@section('content')
    @section('pageTitle', 'Form Staff')

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('staff.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Name</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="name" placeholder="Name.." value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Phone</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="phone_number" placeholder="Phone Number.." value="{{ old('phone_number') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Position</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="position" placeholder="Position.." value="{{ old('position') }}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block px-5"><i class="fas fa-plus"></i> Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection