@extends('layout')

@section('content')

<section class="user mt-4">
    <div class="container">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title mt-2">Edit Product : </h3>
                <div class="card-tools d-flex">
                    <a href="{{ route('front.index') }}" class="btn btn-success">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('product.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="form-group row pl-5 pr-5">
                        <label class="col-2" for="">Product Name :</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Product Name">
                            @if ($errors->has('name'))
                            <p class="text-danger">*{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                    </div>

                    <div class="form-group row pl-5 pr-5">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class=" btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

