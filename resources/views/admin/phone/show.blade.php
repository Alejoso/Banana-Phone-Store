@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('messages.phoneDetails') }}</h2>

<div class="card bg-dark border-secondary text-light">
    <div class="card-body">

        <div class="row">

            <!-- Image -->
            <div class="col-md-4 text-center mb-3">
                <img 
                    src="{{ asset('storage/'.$viewData['phone']->getImage()) }}" 
                    class="img-fluid rounded"
                    style="max-height: 250px;"
                >
            </div>

            <!-- Info -->
            <div class="col-md-8">

                <h3 class="mb-3">{{ $viewData['phone']->getName() }}</h3>

                <p><span class="text-secondary">{{ __('messages.brandTitle') }}:</span> {{ $viewData['phone']->getBrand() }}</p>
                <p><span class="text-secondary">{{ __('messages.memoryTitle') }}:</span> {{ $viewData['phone']->getMemory() }}</p>
                <p><span class="text-secondary">{{ __('messages.ramTitle') }}:</span> {{ $viewData['phone']->getRam() }}</p>
                <p><span class="text-secondary">{{ __('messages.batteryTitle') }}:</span> {{ $viewData['phone']->getBattery() }}</p>
                <p><span class="text-secondary">{{ __('messages.stockTitle') }}:</span> {{ $viewData['phone']->getQuantity() }} {{ __('messages.unitsTitle') }}</p>

                <h4 class="mt-3 text-warning">${{ $viewData['phone']->getPrice() }}</h4>

            </div>

        </div>

        <!-- Actions -->
        <div class="mt-4 d-flex gap-2">

            <a href="{{ route('admin.phone.edit', $viewData['phone']->getId()) }}" 
               class="btn btn-outline-warning">
                {{ __('messages.editButton') }}
            </a>

            <form action="{{ route('admin.phone.destroy', $viewData['phone']->getId()) }}" 
                  method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    {{ __('messages.deleteButton') }}
                </button>
            </form>

            <a href="{{ route('admin.phone.index') }}" 
               class="btn btn-outline-light">
                {{ __('messages.backButton') }}
            </a>

        </div>

    </div>
</div>

@endsection