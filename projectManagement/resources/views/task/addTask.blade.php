@extends('layouts.application')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h1>@lang('label.title.addtask')</h1>
    </div>

    <div class="container-fluid">
        <div class="row form-group" id="existingRow">
        <select name='taskList' id='taskList' class="form-control col-md-5">
            @foreach($tasks as $task)
                <option value="{{ $task['id'] }}">{{ $task['task_name'] }}</option>
            @endforeach
        </select>  
        <input type="date" name="assignDate" id="assignDate" class="form-control col-md-5">
        <button name="btn" id="btn" class="btn btn-outline-primary col-md-2"><i class="fa-solid fa-plus"></i>Add</button>
        </div>
        <div class="row form-group" id="newRow">
            
        </div>
    </div>

</div>
<script>
 $document.ready(function()
 {
     
 });
</script>
@endsection
