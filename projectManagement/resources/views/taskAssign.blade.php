@extends('layouts.application')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h1>Project to Task</h1>
    </div>
    <!--action=""-->
    <div class="container-fluid">
        <form method="POST" action="" id="assignTaskForm">
            @csrf
            <!--@csrf_field-->
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
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="selectall" id="selectAll">select all</th>
                                <th>@lang('label.task')</th>
                                <th>Assigned Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $i=>$task)
                            <tr>                        
                                <td><input type="checkbox" class="check data-check" data-id="{{ $task['id'] }}" name="task_id[{{ $task['id'] }}]" id="taskId{{ $task['id'] }}" value="{{ $task['id'] }}"></td>
                                <td>{{ $task['task_name'] }}</td>
                                <td><input type="text" class="datepick data-check-date" name="assign_date[{{ $task['id'] }}]" id="assignDate{{ $task['id'] }}" disabled></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <input type="button" class="btn btn-success" id="savedata" name="save" value="submit">
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    
    $(document).ready(function () {
        var options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

        $(".datepick").datepicker({dateFormat: 'yy-mm-dd'});

        $(".check").click(function () {
            var id = $(this).attr('data-id');
            if ($(this).prop('checked') == true)
            {
                $('#assignDate' + id).prop('disabled', false);

            } else
            {
                $('#assignDate' + id).prop('disabled', true);
            }
        });

        $("#selectAll").click(function () {
            if ($(this).prop('checked'))
            {
                $(".check").each(function ()
                {
                    $(this).prop('checked', true);
                    $(".data-check-date").prop('disabled', false);
                });
            } else
            {
                $(".check").each(function ()
                {
                    $(this).prop('checked', false);
                    $(".data-check-date").prop('disabled', true);
                });
            }
        });

        $(document).on("click", "#savedata", function () {
            var formData = new FormData($('#assignTaskForm')[0]);
            $.ajax({
                type: "POST",
                url: "{{ URL::to('/assignTask') }}",
                contentType: false,
                cache: false,
                processData: false,
                headers:
                        {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                data: formData,
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    toastr.success(res.msg,options);
                },
                error: function (res) {
                   toastr.warning(res.msg,options);
                }


            });
        });

    });
</script>
@endsection
