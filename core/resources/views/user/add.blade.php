@extends('layout')

@section('content')

<section class="user mt-4">
    <div class="container">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title mt-2">Register New User : </h3>
                <div class="card-tools d-flex">
                    <a href="{{ route('front.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">Username :</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="username" placeholder="User Name">
                            @if ($errors->has('username'))
                            <p class="text-danger">*{{ $errors->first('username') }}</p>
                            @endif
                        </div>

                    </div>
                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">Email :</label>
                        <div class="col-10">
                            <input type="email" class="form-control" name="email" placeholder="Enter Email">
                            @if ($errors->has('email'))
                            <p class="text-danger">*{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                    </div>
                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">City :</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="city" placeholder="City">
                            @if ($errors->has('city'))
                            <p class="text-danger">*{{ $errors->first('city') }}</p>
                            @endif
                        </div>

                    </div>
                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">Country :</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="country" placeholder="Country">
                            @if ($errors->has('country'))
                            <p class="text-danger">*{{ $errors->first('country') }}</p>
                            @endif
                        </div>

                    </div>
                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">Birth Date :</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="birth_date" name="date_of_birth" placeholder="Birth Date">
                            @if ($errors->has('date_of_birth'))
                            <p class="text-danger">*{{ $errors->first('date_of_birth') }}</p>
                            @endif
                        </div>

                    </div>
                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">Password :</label>
                        <div class="col-10">
                            <input type="text" class="form-control col-10" name="password" placeholder="Enter Password">
                            @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                    </div>
                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">Status :</label>
                        <div class="col-10">
                             <input type="radio" class="" name="status" id="active" value="1">
                             <label for="active" class="mr-2">Active</label>
                             <input type="radio" name="status" id="deactive" value="0">
                             <label for="deactive">Deactive</label>
                             @if ($errors->has('status'))
                             <p class="text-danger">{{ $errors->first('status') }}</p>
                             @endif
                        </div>

                    </div>

                    <div class="form-group row pl-5 pr-5">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class=" btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
