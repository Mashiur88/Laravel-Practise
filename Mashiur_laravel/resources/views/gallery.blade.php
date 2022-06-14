@extends('layouts.app1')
@section('content')
<div class="container-fluid p-0 m-0 row">
    <div class="container-fluid col-lg-10 text-center">
        <div>
            <h3>Gallery</h3>
            <form action="{{ route('upload') }}" method="post" enctype='multipart/form-data'>
                @csrf            
                <label>Upload image here:</label><br>
                <input type="file" name="image" id="image"><br>
                <input type="submit" name="save" value="save">
            </form>
        </div>
        <div>
            <img class="img-fluid img-thumbnail shadow-lg bg-white" src="{{ asset($path) }}" alt="photos" width="500" height="200">
        </div>
    </div>
</div>
@endsection