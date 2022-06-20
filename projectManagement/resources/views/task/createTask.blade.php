@extends('layouts.application')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h1>Create Task</h1>
    </div>
    <div class="container-fluid">
        <form method="POST" action="{{ route('task.submit') }}">
            @csrf
        <div class="form-group row">
            <label for="task_name" class="col-md-4 col-form-label text-md-right">{{ __('Task Name') }}</label>

            <div class="col-md-6">
                <input id="task_name" type="text" class="form-control @error('task_name') is-invalid @enderror" name="task_name" value="{{ old('task_name') }}" autocomplete="task_name" autofocus>

                @error('task_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="task_code" class="col-md-4 col-form-label text-md-right">{{ __('Task Code') }}</label>

            <div class="col-md-6">
                <input id="task_code" type="text" class="form-control @error('task_code') is-invalid @enderror" name="task_code" value="{{ old('task_code') }}" autocomplete="task_code" autofocus>

                @error('task_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="t_status" class="col-md-4 col-form-label text-md-right @error('t_status') is-invalid @enderror">{{ __('Task Status') }}</label>

            <div class="col-md-6">
                <select class="custom-select" id="t_status" name="t_status">
                    <option value=''>Select Task Status</option>
                    <option value='1'>Active</option>
                    <option value='0'>Inactive</option>       
                </select>

                @error('t_status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <input type="submit" name="submit" value="create">
            </div>
        </div>
        </form>
    </div>
</div>
@endsection

