
<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
        <link rel="stylesheet" href="{{ asset('public/css/pdf.css') }}">
        <title>Pdf View</title>
    </head>
    <body>
        <div class="container" id="generateReport">
            <div class="container">
                <h2>Task Report</h2>
                <table class="table table-bordered table-responsive-sm table-hover text-center">
                    <thead>
                    <td><b>@lang('label.thead.status')</b></td>
                    <td><b>@lang('label.thead.taskno')</b></td>
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
                <table class="table table-warning table-hover table-bordered border-dark text-center">
                    <thead>
                    <td><b>@lang('label.thead.sl')</b></td>
                    <td><b>@lang('label.thead.tname')</b></td>
                    <td><b>@lang('label.thead.tdetail')</b></td>
                    <td><b>@lang('label.thead.status')</b></td>
                    <td><b>@lang('label.thead.adate')</b></td>
                    <td><b>@lang('label.thead.edate')</b></td>
                    </thead>
                    <tbody>
                        @if(!empty($tTasks))
                        @foreach($tTasks as $i=>$task)
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
        <script>
            //DOMContentLoaded
        window.addEventListener('DOMContentLoaded',() => {
            window.print();
        });
        </script>
    </body>

</html>
