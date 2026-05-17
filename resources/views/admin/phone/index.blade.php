@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('phone.phonesTitle') }}</h2>

<div class="mb-3">
    <a href="{{ route('admin.phone.create') }}" class="btn btn-warning">
        {{ __('phone.createPhone') }}
    </a>
</div>

<div class="table-responsive">
    <table class="table table-dark table-hover align-middle">

        <thead>
            <tr class="text-warning">
                <th>{{ __('common.idTitle') }}</th>
                <th>{{ __('common.imageTitle') }}</th>
                <th>{{ __('common.nameLabel') }}</th>
                <th>{{ __('common.officeTitle') }}</th>
                <th>{{ __('phone.stockTitle') }}</th>
                <th>{{ __('phone.priceTitle') }}</th>
                <th class="text-end">{{ __('common.actionsTitle') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($viewData['phones'] as $phone)
            <tr>
                <td>{{ $phone->getId() }}</td>

                <td>
                    <img 
                        src="{{ app(App\Interfaces\ImageStorage::class)->url($phone->getImage()) }}" 
                        width="60"
                        class="rounded"
                    >
                </td>

                <td>{{ $phone->getName() }}</td>
                <td>{{ $phone->getOffice()->getName() }}</td>
                <td>{{ $phone->getQuantity() }}</td>
                <td>${{ $phone->getPrice() }}</td>

                <td class="text-end">
                    <a href="{{ route('admin.phone.show', ['id'=> $phone->getId()]) }}" 
                       class="btn btn-sm btn-outline-warning">
                        {{ __('button.viewButton') }}
                    </a>

                    <a href="{{ route('admin.phone.edit', ['id'=> $phone->getId()]) }}" 
                       class="btn btn-sm btn-outline-light">
                        {{ __('button.editButton') }}
                    </a>

                    <form action="{{ route('admin.phone.destroy', ['id'=> $phone->getId()]) }}" 
                          method="POST" 
                          class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger">
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