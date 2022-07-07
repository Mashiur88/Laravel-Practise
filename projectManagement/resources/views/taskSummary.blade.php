@extends('layouts.application')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <h1 class='col-md-6'>@lang('label.title.tasksummary')</h1>
        @if(!empty(Request::get('id')))
        <a class='col-md-1.5' name='pdf' id='pdf' href="{{ route('downloadPDF',['id' => Request::get('id'),'sdate' => Request::get('sdate'),'edate' => Request::get('edate'),'type' => 'none']) }}"><button class='btn btn-primary'>Generate Pdf</button></a>
        <a class='col-md-2' name='print' id='print' href="{{ route('downloadPDF',['id' => Request::get('id'),'sdate' => Request::get('sdate'),'edate' => Request::get('edate'),'type' => 'print']) }}"><button class='btn btn-primary'>Print Pdf</button></a>
        @endif
    </div>
    <div class='container'>
        <form name="generate_report" method="POST" action="{{ route('generateReport')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-0">
                <div class="col-md-3"><p>@lang('label.project')</p></div>
                <div class="col-md-3"><p>@lang('label.fdate')</p></div>
                <div class="col-md-3"><p>@lang('label.tdate')</p></div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <select class="custom-select" id="projectId" name="project_id">
                        <option value='0'>Select Project</option>
                        @foreach($projects as $p)
                        <option value="{{ $p['id'] }}" @php echo (!empty(Request::get('id')) && $p['id'] == Request::get('id')) ? 'selected' : ''; @endphp>{{ $p['project_name'] }}</option>                     
                        @endforeach                          
                    </select>

                    @error('project_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <input type="text" id="startDate" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ Request::get('sdate') }}" autocomplete="start_date" autofocus>
                    @error('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <input type="text" id="endDate" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ Request::get('edate') }}" autocomplete="end_date" autofocus>
                    @error('end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-3 offset-md-0">
                    <input type="submit" class="btn btn-success" id="generate" name="submit" value="Generate">
                </div>
            </div>
        </form>
        <div class="container" id="generateReport">
            <div class="container">
                <table class="table table-bordered table-responsive-sm table-hover">
                    <thead>
                    <th>@lang('label.thead.status')</th>
                    <th>@lang('label.thead.taskno')</th>
                    </thead>
                    <tbody>
                        @foreach($count as $count)
                        @if($count['task_status'] == 1)
                        @php $temp = 'Pending'; @endphp
                        @elseif($count['task_status'] == 2)
                        @php $temp = 'In-Progress'; @endphp
                        @elseif($count['task_status'] == 3)
                        @php $temp = 'Paused'; @endphp
                        @elseif($count['task_status'] == 4)
                        @php $temp = 'Completed'; @endphp
                        @elseif($count['task_status'] == 5)
                        @php $temp = 'Cancelled'; @endphp
                        @endif
                        <tr>
                            <td>{{ $temp }}</td>
                            <td>{{ $count['s_count'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="container">
                <table class="table table-warning table-hover table-bordered border-dark">
                    <thead>
                    <th>@lang('label.thead.sl')</th>
                    <th>@lang('label.thead.tname')</th>
                    <th>@lang('label.thead.tdetail')</th>
                    <th>@lang('label.thead.status')</th>
                    <th>@lang('label.thead.adate')</th>
                    <th>@lang('label.thead.edate')</th>
                    </thead>
                    <tbody>
                        @if(!empty($tasks))
                        @foreach($tasks as $i=>$task)
                        @if($task['task_status'] == 1)
                        @php $temp = 'Pending'; @endphp
                        @elseif($task['task_status'] == 2)
                        @php $temp = 'In-Progress'; @endphp
                        @elseif($task['task_status'] == 3)
                        @php $temp = 'Paused'; @endphp
                        @elseif($task['task_status'] == 4)
                        @php $temp = 'Completed'; @endphp
                        @elseif($task['task_status'] == 5)
                        @php $temp = 'Cancelled'; @endphp
                        @endif
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $task['task_name'] }}</td>
                            <td>{{ $task['task_detail'] }}</td>
                            <td>{{ $temp }}</td>
                            <td>{{ $task['assign_date'] }}</td>
                            <td>{{ $task['deadline'] }}</td>                            
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        $('#startDate').datepicker({dateFormat: 'yy-mm-dd'});
        $('#endDate').datepicker({dateFormat: 'yy-mm-dd'});
        $(document).on("click", '#generate', function () {
            $('#generateReport').show();
            $('#pdf').prop("class", "disable");
        });
        
        
    });



</script>
@endsection