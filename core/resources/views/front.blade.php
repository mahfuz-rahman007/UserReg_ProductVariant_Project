@extends('layout')


@section('content')

    <section class="user mt-4">
        <div class="container">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-2">Users Table : </h3>
                    <div class="card-tools d-flex">
                        <a href="{{ route('user.add') }}" class="btn btn-primary">Register User</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-stripped text-bold">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Birth Date</th>
                                <th>Status</th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td> <h5>{{ $user->username }}</h5></td>
                                <td> <h5>{{ $user->email }}</h5></td>
                                <td> <h5>{{ $user->date_of_birth }}</h5></td>
                                <td>
                                    @if ($user->status == 1)
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-danger">Deactive</span>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                                    <form id="deleteform" class="d-inline-block ml-1" action="{{ route('user.delete') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <button type="submit"  class="btn btn-sm btn-danger" id="delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <section class="user mt-4">
        <div class="container">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title mt-2">Products Table : </h3>
                    <div class="card-tools d-flex">
                        <a href="{{ route('variant.index') }}" class="btn btn-info mr-2">New Variant</a>
                        <a href="{{ route('product.add') }}" class="btn btn-success">Add Product</a>
                    </div>
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
                            @foreach ($products as $product)
                                <tr>
                                    <td width="15%">{{ ++$i }}</td>
                                    <td width="35%">
                                        <h5>{{ $product->name }}</h5>
                                    </td>
                                    <td width="50%">
                                        <a href="{{ route('product.variant.manage', $product->id) }}"
                                            class="btn btn-sm btn-info mr-2">Manage Variants</a>

                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class="btn btn-sm btn-outline-success">Edit</a>

                                        <form id="deleteform" class="d-inline-block ml-2"
                                            action="{{ route('product.delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                id="delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

    <script>
        $(document).on("click", "#delete", function (e) {
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
