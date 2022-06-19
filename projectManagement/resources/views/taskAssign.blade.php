@extends('layouts.application')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <h1>Project to Task</h1>
    </div>
    <div class="container-fluid">
        <form method="POST" action="{{ route('assignTask') }}">
            <div class="form-group row">
                <label for="Project" class="col-md-4 col-form-label text-md-right @error('division') is-invalid @enderror">{{ __('Project') }}</label>

                <div class="col-md-6">
                    <select class="custom-select" id="division" name="division">
                        <option value='0'>Select Project</option>
                        {{--        @foreach($division as $div) 
                        @php echo "<option value=".$div['id'].">". $div['name'] ."</option>"; @endphp
                        @endforeach                           --}}         
                    </select>

                    @error('division')
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
                                <th><input type="checkbox" name="" id=""> select all</th>
                                <th>Task</th>
                                <th>Assigned Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--@foreach($division as $div)--}}
                            @for($i=0;$i<5;$i++)
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endfor
                        </tbody>
                        
                    </table>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <input type="submit" name="submit" value="submit">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
<script>

</script>