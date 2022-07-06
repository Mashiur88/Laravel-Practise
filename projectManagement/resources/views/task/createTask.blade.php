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
                <label for="Project" class="col-md-4 col-form-label text-md-right @error('division') is-invalid @enderror">{{ __('Project') }}</label>

                <div class="col-md-6">
                    <select class="custom-select" id="projectId" name="project_id">
                        <option value='0'>Select Project</option>
                        @foreach($projects as $p) 
                        <option value="{{ $p['id'] }}">{{ $p['project_name'] }}</option>
                        @endforeach                          
                    </select>

                    @error('project_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
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
                <label for="task_detail" class="col-md-4 col-form-label text-md-right">{{ __('Task Detail') }}</label>

                <div class="col-md-6">
                    <textarea id="taskDetail" class="form-control" name="task_detail" rows="3" autocomplete="task_detail" autofocus></textarea>

                    @error('task_detail')
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
                        <option value='1'>Pending</option>
                        <option value='2'>In-Progress</option>       
                        <option value='3'>Paused</option>       
                        <option value='4'>Completed</option>       
                        <option value='5'>Cancelled</option>       
                    </select>

                    @error('t_status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class='form-group row'>
                <label for="assign_date" class="col-md-4 col-form-label text-md-right">{{__('Assign Date')}}</label>
                <div class="col-md-6">
                    <input type="text" id="assignDate" name="assign_date" class="form-control @error('assign_date') is-invalid @enderror" value="{{ old('assign_date') }}" autocomplete="assign_date" autofocus>
                    @error('assign_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class='form-group row'>
                <label for="deadline" class="col-md-4 col-form-label text-md-right">{{__('Deadline')}}</label>
                <div class="col-md-6">
                    <input type="text" id="deadLine" name="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{ old('deadline') }}" autocomplete="deadline" autofocus>
                    @error('deadline')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <input type="submit" class="btn btn-success" name="submit" value="create">
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
       
       $('#assignDate').datepicker({dateFormat: 'yy-mm-dd'});
       $('#deadLine').datepicker({dateFormat: 'yy-mm-dd'});
       
    });
</script>
@endsection

