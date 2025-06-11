@extends('layouts.master')

@section('title', __('create supplier'))

@section('content')
    <div class="container">
        <h2>{{ __('add supplier') }}</h2>
        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">{{ __('name') }}</label>
                    <input type="text" id="name" name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">{{ __('email') }}</label>
                    <input type="email" id="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="phone" class="form-label">{{ __('phone') }}</label>
                    <input type="text" id="phone" name="phone"
                           class="form-control @error('phone') is-invalid @enderror"
                           value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="address" class="form-label">{{ __('address') }}</label>
                    <input type="text" id="address" name="address"
                           class="form-control @error('address') is-invalid @enderror"
                           value="{{ old('address') }}" required>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="company_name" class="form-label">{{ __('company name') }}</label>
                    <input type="text" id="company_name" name="company_name"
                           class="form-control @error('company_name') is-invalid @enderror"
                           value="{{ old('company_name') }}" required>
                    @error('company_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
    <label for="status" class="form-label">{{ __('status') }}</label>
    <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('active') }}</option>
        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>{{ __('inactive') }}</option>
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="tax_number" class="form-label">{{ __('tax_number') }}</label>
                    <input type="text" id="tax_number" name="tax_number"
                           class="form-control @error('tax_number') is-invalid @enderror"
                           value="{{ old('tax_number') }}" required>
                    @error('tax_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('add supplier') }}</button>
        </form>
    </div>
@endsection
