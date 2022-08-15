@extends('layout')


@section('content')
    <section class="user mt-4">
        <div class="container">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-2">Add {{ $variant->name }} Value : </h3>
                    <div class="card-tools d-flex">
                        <a href="{{ route('variant.index') }}" class="btn btn-success">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('variant.value.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="attribute_id" value="{{ $variant->id }}">

                        <div class="form-group row pl-5 pr-5">
                            <label class="col-2" for="">Value :</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="value" placeholder="Variant Value">
                                @if ($errors->has('value'))
                                    <p class="text-danger">*{{ $errors->first('value') }}</p>
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

            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-2"> {{ $variant->name }} Value Table </h3>
                </div>
                <div class="card-body">
                    <table class="table table-stripped text-bold">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Variant Name</th>
                                <th>Value</th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($values as $value)
                                <tr>
                                    <td width="15%">{{ ++$i }}</td>
                                    <td width="25%">
                                        <h5>{{ $value->attribute->name }}</h5>
                                    </td>
                                    <td width="20%">
                                        <h5>{{ $value->value }}</h5>

                                    </td>
                                    <td width="40%">
                                        <a href="{{ route('variant.value.edit', $value->id) }}"
                                            class="btn btn-sm btn-outline-success">Edit</a>

                                        <form id="deleteform" class="d-inline-block ml-1"
                                            action="{{ route('variant.value.delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $value->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                id="deletevalue">Delete</button>
                                        </form>
                                    </td>
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
        $(document).on("click", "#deletevalue", function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
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
