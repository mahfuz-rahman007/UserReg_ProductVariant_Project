@extends('layout')

@section('content')

<section class="user mt-4">
    <div class="container">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title mt-2">Update Register User Information: </h3>
                <div class="card-tools d-flex">
                    <a href="{{ route('front.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">Username :</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="username" value="{{ $user->username }}" placeholder="User Name">
                            @if ($errors->has('username'))
                            <p class="text-danger">*{{ $errors->first('username') }}</p>
                            @endif
                        </div>

                    </div>
                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">Email :</label>
                        <div class="col-10">
                            <input type="email" class="form-control" name="email"  value="{{ $user->email }}" placeholder="Enter Email">
                            @if ($errors->has('email'))
                            <p class="text-danger">*{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                    </div>
                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">City :</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="city"  value="{{ $user->city }}" placeholder="City">
                            @if ($errors->has('city'))
                            <p class="text-danger">*{{ $errors->first('city') }}</p>
                            @endif
                        </div>

                    </div>
                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">Country :</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="country"  value="{{ $user->country }}" placeholder="Country">
                            @if ($errors->has('country'))
                            <p class="text-danger">*{{ $errors->first('country') }}</p>
                            @endif
                        </div>

                    </div>
                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">Birth Date :</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="birth_date"  value="{{ $user->date_of_birth }}" name="date_of_birth" placeholder="Birth Date">
                            @if ($errors->has('date_of_birth'))
                            <p class="text-danger">*{{ $errors->first('date_of_birth') }}</p>
                            @endif
                        </div>

                    </div>

                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">Status :</label>
                        <div class="col-10">
                             <input type="radio" {{ $user->status == '1' ? 'checked':'' }} name="status" id="active" value="1">
                             <label for="active" class="mr-2">Active</label>
                             <input type="radio" {{ $user->status == '0' ? 'checked':'' }} name="status" id="deactive" value="0">
                             <label for="deactive">Deactive</label>
                             @if ($errors->has('status'))
                             <p class="text-danger">{{ $errors->first('status') }}</p>
                             @endif
                        </div>

                    </div>

                    <div class="form-group row pl-5 pr-5">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class=" btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="user mt-4">
    <div class="container">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title mt-2">Update Register User Password: </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('user.changepass') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">Old Password :</label>
                        <div class="col-10">
                            <input type="text" class="form-control col-10" name="old_password" placeholder="Enter Old Password" >
                            @if ($errors->has('old_password'))
                                <p class="text-danger">{{ $errors->first('old_password') }}</p>
                            @elseif($errors->has('oldPassMatch'))
                                <p class="text-danger">{{ $errors->first('oldPassMatch') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">New Password :</label>
                        <div class="col-10">
                            <input type="text" class="form-control col-10" name="password" placeholder="Enter New Password">
                            @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                    </div>

                    <div class="form-group row pl-5 pr-5">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class=" btn btn-primary">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
