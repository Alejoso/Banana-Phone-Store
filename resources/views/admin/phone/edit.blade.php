@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('messages.editPhone') }}</h2>

<div class="card bg-dark border-secondary text-light">
    <div class="card-body">

        <form action="{{ route('admin.phone.update', $viewData['phone']->getId()) }}" 
              method="POST" 
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                <!-- Image preview -->
                <div class="col-md-4 text-center mb-3">
                    <img 
                        src="{{ asset('storage/'.$viewData['phone']->getImage()) }}" 
                        class="img-fluid rounded mb-3"
                        style="max-height: 200px;"
                    >

                    <div>
                        <label class="form-label text-secondary">{{ __('messages.changeImageTitle') }}</label>
                        <input type="file" name="image" 
                               class="form-control bg-dark text-light border-secondary">
                    </div>
                </div>

                <!-- Fields -->
                <div class="col-md-8">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-secondary">{{ __('messages.nameLabel') }}</label>
                                <input type="text" name="name"
                                       class="form-control bg-dark text-light border-secondary"
                                       value="{{ $viewData['phone']->getName() }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary">{{ __('messages.brandTitle') }}</label>
                                <input type="text" name="brand"
                                       class="form-control bg-dark text-light border-secondary"
                                       value="{{ $viewData['phone']->getBrand() }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary">{{ __('messages.memoryTitle') }}</label>
                                <input type="text" name="memory"
                                       class="form-control bg-dark text-light border-secondary"
                                       value="{{ $viewData['phone']->getMemory() }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary">{{ __('messages.ramTitle') }}</label>
                                <input type="text" name="ram"
                                       class="form-control bg-dark text-light border-secondary"
                                       value="{{ $viewData['phone']->getRam() }}">
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label text-secondary">{{ __('messages.batteryTitle') }}</label>
                                <input type="text" name="battery"
                                       class="form-control bg-dark text-light border-secondary"
                                       value="{{ $viewData['phone']->getBattery() }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary">{{ __('messages.priceTitle') }}</label>
                                <input type="number" name="price"
                                       class="form-control bg-dark text-light border-secondary"
                                       value="{{ $viewData['phone']->getPrice() }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary">{{ __('messages.stockTitle') }}</label>
                                <input type="number" name="quantity"
                                       class="form-control bg-dark text-light border-secondary"
                                       value="{{ $viewData['phone']->getQuantity() }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary">{{ __('messages.officeNameTitle') }}</label>
                                <select name="office_id" 
                                        class="form-select bg-dark text-light border-secondary">
                                    @foreach($viewData['offices'] as $office)
                                        <option 
                                            value="{{ $office->getId() }}"
                                            @if($office->getId() == $viewData['phone']->office->getId()) selected @endif
                                        >
                                            {{ $office->getName() }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-warning">
                    {{ __('messages.updateButton') }}
                </button>

                <a href="{{ route('admin.phone.index') }}" class="btn btn-outline-light">
                    {{ __('messages.cancelButton') }}
                </a>
            </div>

        </form>

    </div>
</div>

@endsection