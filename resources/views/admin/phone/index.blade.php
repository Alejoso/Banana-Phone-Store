@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">Phones</h2>

<div class="mb-3">
    <a href="{{ route('admin.phone.create') }}" class="btn btn-warning">
        Create Phone
    </a>
</div>

<div class="table-responsive">
    <table class="table table-dark table-hover align-middle">

        <thead>
            <tr class="text-warning">
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Office</th>
                <th>Stock</th>
                <th>Price</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($viewData['phones'] as $phone)
            <tr>
                <td>{{ $phone->getId() }}</td>

                <!-- Image -->
                <td>
                    <img 
                        src="{{ asset('storage/'.$phone->getImage()) }}" 
                        width="60"
                        class="rounded"
                    >
                </td>

                <td>{{ $phone->getName() }}</td>
                <td>{{ $phone->getOffice()->getName() }}</td>
                <td>{{ $phone->getQuantity() }}</td>
                <td>${{ $phone->getPrice() }}</td>

                <td class="text-end">

                    <!-- View -->
                    <a href="{{ route('admin.phone.show', ['id'=> $phone->getId()]) }}" 
                       class="btn btn-sm btn-outline-warning">
                        View
                    </a>

                    <!-- Edit -->
                    <a href="{{ route('admin.phone.edit', ['id'=> $phone->getId()]) }}" 
                       class="btn btn-sm btn-outline-light">
                        Edit
                    </a>

                    <!-- Delete -->
                    <form action="{{ route('admin.phone.destroy', ['id'=> $phone->getId()]) }}" 
                          method="POST" 
                          class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection