@extends('layouts.application')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h1>Create Project</h1>
    </div>
    <div class="container-fluid">
        <form method="POST" action="{{ route('project.submit') }}">
            @csrf
            <div class="form-group row">
                <label for="project_name" class="col-md-4 col-form-label text-md-right">{{ __('Project Name') }}</label>

                <div class="col-md-6">
                    <input id="project_name" type="text" class="form-control @error('project_name') is-invalid @enderror" name="project_name" value="{{ old('project_name') }}" autocomplete="project_name" autofocus>

                    @error('project_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="project_code" class="col-md-4 col-form-label text-md-right">{{ __('Project Code') }}</label>

                <div class="col-md-6">
                    <input id="project_code" type="text" class="form-control @error('project_code') is-invalid @enderror" name="project_code" value="{{ old('project_code') }}" autocomplete="project_code" autofocus>

                    @error('project_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class='form-group row'>
                <label for="deadline" class="col-md-4 col-form-label text-md-right">{{__('Deadline')}}</label>
                <div class="col-md-6">
                    <input type="text" id="datepick" name="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{ old('deadline') }}" autocomplete="deadline" autofocus>
                    @error('deadline')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="p_status" class="col-md-4 col-form-label text-md-right @error('p_status') is-invalid @enderror">{{ __('Project Status') }}</label>

                <div class="col-md-6">
                    <select class="custom-select" id="p_status" name="p_status">
                        <option value=''>Select Project Status</option>
                        <option value='1'>Active</option>
                        <option value='0'>Inactive</option>       
                    </select>
                    @error('p_status')
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
<script>
    $(document).ready(function () {
        $(function () {
            $("#datepick").datepicker({dateFormat: 'yy-mm-dd'});
        });
    });

</script>
@endsection

