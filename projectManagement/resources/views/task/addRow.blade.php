<div class="row form-group drop">
    <label id ="newlab" serial="{{ $i }}" class="text-center h4 col-md-1 label">{{ $i }}</label>
    <select name='taskList' id='taskList{{ $i }}' class="form-control col-md-4">
            <option value="0">Select Task</option>
            @foreach($tasks as $task)
                <option value="{{ $task['id'] }}">{{ $task['task_name'] }}</option>
            @endforeach
    </select>  
    <input type="date" name="assignDate" id="assignDate" class="form-control col-md-5 task-list">
    <button name="removeBtn" class="btn btn-outline-danger col-md-2 remove"><i class="fa-solid fa-xmark"></i>Drop</button>
</div>
