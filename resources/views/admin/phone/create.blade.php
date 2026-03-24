@extends('layouts.admin')

@section('content')

    <h2 class="mb-4 text-warning">{{ __('phone.createPhone') }}</h2>

    <div class="card bg-dark border-secondary text-light">
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.phone.save') }}">
                @csrf

                <div class="row">

                    <!-- Left column -->
                    <div class="col-md-6">

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __('common.nameLabel') }}</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" name="name"
                                value="{{ old('name') }}">
                        </div>

                        <!-- Brand -->
                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __('phone.brandTitle') }}</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" name="brand"
                                value="{{ old('brand') }}">
                        </div>

                        <!-- Memory -->
                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __('phone.memoryTitle') }}</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" name="memory"
                                value="{{ old('memory') }}">
                        </div>

                        <!-- RAM -->
                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __('phone.ramTitle') }}</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" name="ram"
                                value="{{ old('ram') }}">
                        </div>

                    </div>

                    <!-- Right column -->
                    <div class="col-md-6">

                        <!-- Battery -->
                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __('phone.batteryTitle') }}</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" name="battery"
                                value="{{ old('battery') }}">
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __('phone.priceTitle') }}</label>
                            <input type="number" class="form-control bg-dark text-light border-secondary" name="price"
                                value="{{ old('price') }}">
                        </div>

                        <!-- Quantity -->
                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __('phone.stockTitle') }}</label>
                            <input type="number" class="form-control bg-dark text-light border-secondary" name="quantity"
                                value="{{ old('quantity') }}">
                        </div>

                        <!-- Office -->
                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __('office.officeNameTitle') }}</label>
                            <select name="office_id" class="form-select bg-dark text-light border-secondary">
                                @foreach($viewData['offices'] as $office)
                                    <option value="{{ $office->getId() }}">
                                        {{ $office->getName() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __('common.imageTitle') }}</label>
                            <input type="file" name="image" class="form-control bg-dark text-light border-secondary">
                        </div>

                    </div>

                </div>

                <!-- Actions -->
                <div class="d-flex gap-2 mt-3">
                    <button type="submit" class="btn btn-warning">
                        {{ __('button.saveButton') }}
                    </button>

                    <a href="{{ route('admin.phone.index') }}" class="btn btn-outline-light">
                        {{ __('button.cancelButton') }}
                    </a>
                </div>

            </form>

        </div>
    </div>

@endsection