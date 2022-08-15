@extends('layout')


@section('content')
    <section class="user mt-4">
        <div class="container">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-2">Variant Update</h3>
                    <div class="card-tools d-flex">
                        <a href="{{ route('product.variant.manage', $product_variant->product_id) }}" class="btn btn-success">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.variant.manage.update') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $product_variant->id }}">

                        <div class="form-group row pl-5 pr-5" id="attribute_view">

                                <div class="col-12 row">
                                    <label for="file" class="col-3 control-label mt-1">Sku :</label>
                                    <input type="text" class="col-4 form-control mb-2" name="sku" placeholder="Sku" value="{{ $product_variant->sku }}">
                                    @if ($errors->has('sku'))
                                    <p class="text-danger">*{{ $errors->first('sku') }}</p>
                                    @endif
                                </div>


                                <?php $var =  json_decode($product_variant->variants) ?>
                                @foreach ($var as $key => $value)
                                <div class="col-12 row my-2">
                                        <label for="file" class="col-3 control-label mt-1">Select {{ $key}} :</label>
                                        <select name="variants[{{ $key }}]" class="col-3 form-control" id="">
                                            @php
                                                $attr = App\Attribute::where('name', $key)->first();
                                                $attr_values = App\AttributeValue::where('attribute_id', $attr->id)->get();
                                            @endphp
                                            @foreach ($attr_values as $attr_value)
                                                <option value="{{ $attr_value->value }}" {{ $attr_value->value ==  $value ? 'selected':''}}>{{ $attr_value->value }}</option>
                                            @endforeach
                                            <option value=""  {{ $value ==  null ? 'selected':''}}>Not Selected</option>

                                        </select>
                                </div>
                                @if ($errors->has('variants'))
                                <p class="text-danger">*{{ $errors->first('variants') }}</p>
                                @endif
                                @endforeach

                                <div class="col-12 row my-3">
                                    <label for="stock" class="col-1 control-label mt-1">Stock :</label>
                                    <input type="number" class="col-4 form-control mb-2" name="stock" placeholder="Product Stock" value="{{ $product_variant->stock }}">
                                    <label for="price" class="col-1 control-label mt-1">Price :</label>
                                    <input type="number" type="0.01" class="col-4 form-control mb-2" name="price" placeholder="Product Price" value="{{ $product_variant->price }}">
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
                                <button type="submit" class=" btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
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
