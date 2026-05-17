@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('phone.phoneDetails') }}</h2>

<div class="card bg-dark border-secondary text-light">
    <div class="card-body">

        <div class="row">

            <!-- Image -->
            <div class="col-md-4 text-center mb-3">
                <img 
                    src="{{ app(App\Interfaces\ImageStorage::class)->url($phone->getImage()) }}" 
                    class="img-fluid rounded"
                    style="max-height: 250px;"
                >
            </div>

            <!-- Info -->
            <div class="col-md-8">

                <h3 class="mb-3">{{ $viewData['phone']->getName() }}</h3>

                <p><span class="text-secondary">{{ __('phone.brandTitle') }}:</span> {{ $viewData['phone']->getBrand() }}</p>
                <p><span class="text-secondary">{{ __('phone.memoryTitle') }}:</span> {{ $viewData['phone']->getMemory() }}</p>
                <p><span class="text-secondary">{{ __('phone.ramTitle') }}:</span> {{ $viewData['phone']->getRam() }}</p>
                <p><span class="text-secondary">{{ __('phone.batteryTitle') }}:</span> {{ $viewData['phone']->getBattery() }}</p>
                <p><span class="text-secondary">{{ __('phone.stockTitle') }}:</span> {{ $viewData['phone']->getQuantity() }} {{ __('phone.unitTitle') }}</p>

                <h4 class="mt-3 text-warning">${{ $viewData['phone']->getPrice() }}</h4>

            </div>

        </div>

        <!-- Actions -->
        <div class="mt-4 d-flex gap-2">

            <a href="{{ route('admin.phone.edit', $viewData['phone']->getId()) }}" 
               class="btn btn-outline-warning">
                {{ __('button.editButton') }}
            </a>

            <form action="{{ route('admin.phone.destroy', $viewData['phone']->getId()) }}" 
                  method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    {{ __('button.deleteButton') }}
                </button>
            </form>

            <a href="{{ route('admin.phone.index') }}" 
               class="btn btn-outline-light">
                {{ __('button.backButton') }}
            </a>

        </div>

    </div>
</div>

@endsection