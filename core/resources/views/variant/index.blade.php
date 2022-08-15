@extends('layout')


@section('content')
    <section class="user mt-4">
        <div class="container">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-2">Add Variant Name : </h3>
                    <div class="card-tools d-flex">
                        <a href="{{ route('front.index') }}" class="btn btn-success">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('variant.store') }}" method="POST">
                        @csrf
                        <div class="form-group row pl-5 pr-5">
                            <label class="col-2" for="">Name :</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="name" placeholder="Variant Name">
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

            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-2">Variant Table </h3>
                </div>
                <div class="card-body">
                    <table class="table table-stripped text-bold">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($variants as $variant)
                                <tr>
                                    <td width="15%">{{ ++$i }}</td>
                                    <td width="35%">
                                        <h5>{{ $variant->name }}</h5>
                                    </td>
                                    <td width="50%">
                                        <a href="{{ route('variant.value.index', $variant->id) }}"
                                            class="btn btn-sm btn-dark mr-2">Add Variants Value</a>

                                        <a href="{{ route('variant.edit', $variant->id) }}"
                                            class="btn btn-sm btn-success">Edit</a>

                                        <form id="deleteform" class="d-inline-block ml-2"
                                            action="{{ route('variant.delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $variant->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                id="deletevariant">Delete</button>
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
        $(document).on("click", "#deletevariant", function(e) {
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
