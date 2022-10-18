@extends('layouts.main')

@section('title', 'Absent')

@section('buttonallFunction')
        <a href="{{ route('absent.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
            class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
@endsection

@section('content')
    @section('pageTitle', 'Form Absent')

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('absent.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Name</label>
                                <div class="col-12">
                                    <select class="form-control" name="id_staff" id="id_staff">
                                        @foreach ($staff as $s)
                                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Date</label>
                                <div class="col-12">
                                    <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Time Start</label>
                                <div class="col-12">
                                    <input type="time" class="form-control" name="time_start" value="{{ old('time_start') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Time End</label>
                                <div class="col-12">
                                    <input type="time" class="form-control" name="time_end" value="{{ old('time_end') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Note</label>
                                <div class="col-12">
                                    <textarea class="form-control" name="note" id="note" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Overtime</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="overtime" value="{{ old('overtime') }}">
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