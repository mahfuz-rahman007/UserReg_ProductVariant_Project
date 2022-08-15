@extends('layout')


@section('content')
    <section class="user mt-4">
        <div class="container">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-2">Product Name : <strong>{{ $product->name }}</strong></h3>
                    <div class="card-tools d-flex">
                        <a href="{{ route('front.index') }}" class="btn btn-success">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.variant.manage.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $product->id }}">

                        <div class="form-group row pl-5 pr-5" id="attribute_view">

                                <div class="col-12 row">
                                    <label for="file" class="col-3 control-label mt-1">Sku :</label>
                                    <input type="text" class="col-4 form-control mb-2" name="sku" placeholder="Sku" value="">
                                    @if ($errors->has('sku'))
                                    <p class="text-danger">*{{ $errors->first('sku') }}</p>
                                    @endif
                                </div>


                                <?php  $i=0; ?>
                                @foreach ($all_variants as $variant)
                                <div class="col-12 row my-2">
                                        <label for="file" class="col-3 control-label mt-1">Select {{ $variant->name }} :</label>
                                        <select name="variants[{{ $variant->name }}]" class="col-3 form-control" id="">
                                            @php
                                                $values = App\AttributeValue::where('attribute_id', $variant->id)->get();
                                            @endphp
                                            @foreach ($values as $value)
                                                <option value="{{ $value->value }}">{{ $value->value }}</option>
                                            @endforeach
                                            <option value="" >Not Selected</option>

                                        </select>
                                </div>
                                @if ($errors->has('variants'))
                                <p class="text-danger">*{{ $errors->first('variants') }}</p>
                                @endif
                                @endforeach

                                <div class="col-12 row my-3">
                                    <label for="stock" class="col-1 control-label mt-1">Stock :</label>
                                    <input type="number" class="col-4 form-control mb-2" name="stock" placeholder="Product Stock" value="">
                                    <label for="price" class="col-1 control-label mt-1">Price :</label>
                                    <input type="number" type="0.01" class="col-4 form-control mb-2" name="price" placeholder="Product Price" value="">
                                </div>
                                @if ($errors->has('stock'))
                                <p class="text-danger">*{{ $errors->first('stock') }}</p>
                                @endif
                                @if ($errors->has('price'))
                                <p class="text-danger">*{{ $errors->first('price') }}</p>
                                @endif

                        </div>


                        <div class="form-group row pl-5 pr-5">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class=" btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-2">Variant Table </h3>
                </div>
                <div class="card-body">
                    <table class="table table-stripped text-bold">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action </th>
                                <th>Sku</th>
                                <th>Price - Stock</th>
                                @foreach ($all_variants as $variant)
                                    <th>{{ $variant->name }}</th>
                                @endforeach

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($product_variants as $product_variant)
                                <tr>
                                    <td width="5%">{{ ++$i }}</td>
                                    <td  width="15%">
                                        <a href="{{ route('product.variant.manage.edit', $product_variant->id) }}"
                                            class="btn btn-sm btn-success">Edit</a>

                                        <form id="deleteform" class="d-inline-block ml-2"
                                            action="{{ route('product.variant.manage.delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product_variant->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                id="delete">Delete</button>
                                        </form>
                                    </td>

                                    <td  width="10%">
                                        <h5>{{ $product_variant->sku }}</h5>
                                    </td>

                                    <td  width="15%">
                                        <h5>${{ $product_variant->price }} - {{ $product_variant->stock }}</h5>
                                    </td>

                                    <?php $var =  json_decode($product_variant->variants) ?>

                                    @foreach ($var as $key => $value)
                                        @foreach ($all_variants as $variant)
                                            @if ($key == $variant->name)
                                                <td><h5>{{ $value }}</h5></td>
                                            @endif
                                        @endforeach

                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        </div>
    </section>
@endsection

@section('scripts')
    <script>

        $(document).on("click", "#delete", function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "If you Delete this Variant all the values in this variant will be deleted",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $(this).parent("#deleteform").submit();
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    Swal.fire(
                        'Cancelled',
                        'Your file is safe :)',
                        'error'
                    )
                }
            });
        });
    </script>
@endsection
