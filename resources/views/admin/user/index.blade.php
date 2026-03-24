@extends('layouts.admin')

@section('content')

<h2 class="mb-4 text-warning">{{ __('user.userList') }}</h2>

<div class="mb-3">
    <a href="{{ route('admin.user.create') }}" class="btn btn-warning">
        {{ __('button.createButton')}}
    </a>
</div>

<div class="table-responsive">
    <table class="table table-dark table-hover align-middle">

        <thead>
            <tr class="text-warning">
                <th>{{ __('common.idLabel') }}</th>
                <th>{{ __('common.nameLabel') }}</th>
                <th class="text-end">{{ __('common.actionsLabel') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($viewData['users'] as $user)
            <tr>
                <td>{{ $user->getId() }}</td>

                <td>
                    {{ $user->getFirstName() }} {{ $user->getLastName() }}
                </td>

                <td class="text-end">

                    <!-- View -->
                    <a href="{{ route('admin.user.show', ['id' => $user->getId()]) }}" 
                       class="btn btn-sm btn-outline-warning">
                        {{ __('button.viewButton') }}
                    </a>

                    <!-- Edit -->
                    <a href="{{ route('admin.user.edit', ['id' => $user->getId()]) }}" 
                       class="btn btn-sm btn-outline-light">
                        {{ __('button.editButton') }}
                    </a>

                    <!-- Delete -->
                    <form action="{{ route('admin.user.destroy', ['id' => $user->getId()]) }}" 
                          method="POST" 
                          class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger">
                            {{ __('button.deleteButton') }}
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection