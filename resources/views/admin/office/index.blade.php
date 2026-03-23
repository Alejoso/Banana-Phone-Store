@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('messages.offices') }}</h2>

<div class="mb-3">
    <a href="{{ route('admin.office.create') }}" class="btn btn-warning">
        {{ __('messages.createOffice') }}
    </a>
</div>

<div class="table-responsive">
    <table class="table table-dark table-hover align-middle">
        <thead>
            <tr class="text-warning">
                <th>{{ __('messages.idLabel') }}</th>
                <th>{{ __('messages.nameLabel') }}</th>
                <th>{{ __('messages.addressTitle') }}</th>
                <th class="text-end">{{ __('messages.actionsLabel') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach($viewData['offices'] as $office)
            <tr>
                <td>{{ $office->getId() }}</td>
                <td>{{ $office->getName() }}</td>
                <td>{{ $office->getAddress() }}</td>

                <td class="text-end">

                    <a href="{{ route('admin.office.show', ['id'=> $office->getId()]) }}" 
                       class="btn btn-sm btn-outline-warning">
                        {{ __('messages.viewButton') }}
                    </a>

                    <a href="{{ route('admin.office.edit', ['id'=> $office->getId()]) }}" 
                       class="btn btn-sm btn-outline-light">
                        {{ __('messages.editButton') }}
                    </a>

                    <form action="{{ route('admin.office.destroy', ['id'=> $office->getId()]) }}" 
                          method="POST" 
                          class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger">
                            {{ __('messages.deleteButton') }}
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection