@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" autocomplete="user_name" autofocus>

                                @error('user_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input id="male" type="radio" class="form-check-input @error('gender') is-invalid @enderror"  name="gender" value="1" autocomplete="male" autofocus><label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input id="female" type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" value="2" autocomplete="female" autofocus><label class="form-check-label" for="female">Female</label>
                                </div>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="division" class="col-md-4 col-form-label text-md-right @error('division') is-invalid @enderror">{{ __('Division') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select" id="division" name="division" onchange="showDistrict(this.value)">
                                    <option value='0'>Select Division</option>
                                    @foreach($division as $div) 
                                    @php echo "<option value=".$div['id'].">". $div['name'] ."</option>"; @endphp
                                    @endforeach                                    
                                </select>

                                @error('division')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="district" class="col-md-4 col-form-label text-md-right @error('district') is-invalid @enderror">{{ __('District') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select" id="district" name="district" onchange="showThana(this.value)">
                                    <option value='0'>Select District</option>
                                </select>

                                @error('district')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="thana" class="col-md-4 col-form-label text-md-right @error('thana') is-invalid @enderror">{{ __('Thana') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select" id="thana" name="thana" >
                                    <option value='0'>Select Thana</option>
                                </select>

                                @error('thana')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right @error('address') is-invalid @enderror">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control" name="address" rows="3" autocomplete="address" autofocus></textarea>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input id="active" type="radio" class="form-check-input @error('status') is-invalid @enderror" name="status" value="1" autocomplete="active" autofocus><label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check">
                                    <input id="inactive" type="radio" class=" form-check-input @error('status') is-invalid @enderror" name="status" value="0" autocomplete="inactive" autofocus><label class="form-check-label" for="inactive">Inactive</label>
                                </div>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    function showDistrict(id)
    {

        var url = "{{ url('/address/district/') }}/" + id;
        window.alert(id);
//        console.log("Hello World");
        if (id === 0)
        {
            document.getElementById("district").innerHTML = "<option value=''>No District Found</option>";
            document.getElementById("thana").innerHTML = "<option value=''>No Thana Found</option>";
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function ()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("district").innerHTML = this.responseText;
                document.getElementById("thana").innerHTML = "<option value=''>Select Thana</option>";
            }
        }
        xhttp.open("GET", url, true);
        xhttp.send();
    }

    function showThana(id)
    {  //name = document.getElementById("division").value;
//window.alert(id);
        var url = "{{url('/address/thana/')}}/" + id;
        if (id === 0)
        {
            document.getElementById("thana").innerHTML = "<option value=''>No Thana Found</option>";
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function ()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("thana").innerHTML = this.responseText;
            }
        }
        xhttp.open("GET", url, true);
        xhttp.send();
    }

</script>

<script src="{{ asset('public/js/Address.js') }}" ></script>

