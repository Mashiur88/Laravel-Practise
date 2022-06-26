@extends('layouts.application')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h1>@lang('label.title.addtask')</h1>
    </div>

    <div class="container-fluid">
        <div class="row form-group" id="existingRow">
            <label id ="lab" class="text-center h4 col-md-1 label" serial="{{ $i }}">{{ $i }}</label>
            <select name='taskList' id='taskList{{ $i }}' class="form-control col-md-4 task-list">
                <option value="0">Select Task</option>
                @foreach($tasks as $task)
                <option value="{{ $task['id'] }}">{{ $task['task_name'] }}</option>
                @endforeach
            </select>  
            <input type="date" name="assignDate" id="assignDate" class="form-control col-md-5">
            <button name="addBtn" id="addBtn" class="btn btn-outline-primary col-md-2"><i class="fa-solid fa-plus"></i>Add</button>
        </div>
        <div id="newRow">
            
        </div>
    </div>

</div>
<script>
    $(document).ready(function ()
    {
        var store = [];
        var i, value = 0;
        $(document).on("change", '.task-list', function () {
            $('select option:selected').each(function () {                
                value = $(this).val();
                store.push(value);
            });
        });

        $('#addBtn').click(function () 
        {
            if ($('#newlab').length)
            {
                i = $('.label').last().attr('serial');
                value = $('.task-list').find(":selected").val();
//                store.push(value);
//                console.log(i);               
            } 
            else
            {
                i = $('.label').attr('serial');
                value = $('.task-list').find(":selected").val();

            }
            console.log(store.toString());
            $.ajax({
                type: "POST",
                url: "{{ URL::to('/addNewRow') }}",
                data: {'i': i},
                dataType: 'json',
                headers:
                        {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                success: function (res) {
                    console.log(res);

                    $('#newRow').append(res.row);
                    //$('#newRow ')
                    toastr.success(res.msg);
                }
            });
        });

        $(document).on("click", ".remove", function () {
            //$('.drop').last().remove();
            var child = $(this).parent();
            console.log(child);
            child.remove();
            i = 1;
            $('.label').each(function ()
            {
                //console.log(i);
                $(this).html(i);
                $(this).attr('serial', i);
                i++;
            });

        });

    });
</script>
@endsection
