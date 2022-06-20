@extends('layouts.application')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h1>Project to Task</h1>
    </div>
    <!--action=""-->
    <div class="container-fluid">
        <form method="POST" action="{{ route('assignTask') }}">
            @csrf
            <div class="form-group row">
                <label for="Project" class="col-md-4 col-form-label text-md-right @error('division') is-invalid @enderror">{{ __('Project') }}</label>

                <div class="col-md-6">
                    <select class="custom-select" id="project_name" name="project_name">
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
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="selectall" id="selectall"> select all</th>
                                <th>Task</th>
                                <th>Assigned Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $i=>$t)
                            <input type="hidden" name="task_id" id="task_id" value="{{ $t['id'] }}">
                            <tr>                        
                                <td><input type="checkbox" name="select" id="select{{$i}}"></td>
                                <td>{{ $t['task_name'] }}</td>
                                <td><input type="text" class="datepick" name="" id="datepick{{$i}}"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" name="save">submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
$(document).ready(function() {
        
    $(".datepick").datepicker({ dateFormat: 'yy-mm-dd' });
    
    
    $("form").submit(function(){
        var url = "{{ url('assignTask') }}";
        var formdata = {
            project_id : $("#project_name option:selected").val(),
            task_id : $("#task_id").val(),
            assigned_date : $("#datepick").val()
        }
        console.log(formdata);
    $.ajax({
        type : "POST",
        url : url,
        data : formdata,
        headers :
        {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(res) {
            console.log(res);
        }
        
        });
    });
});
</script>
@endsection
