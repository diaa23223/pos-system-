@extends('layouts.master')

@section('title', __('create employee'))

@section('content')
    <div class="container">
        <h2>{{ __('add employee') }}</h2>
        <form action="{{ route('employees.store') }}" method="POST">
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
                    <label for="position" class="form-label">{{ __('position') }}</label>
                    <input type="text" id="position" name="position"
                           class="form-control @error('position') is-invalid @enderror"
                           value="{{ old('position') }}" required>
                    @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="hire_date" class="form-label">{{ __('hire date') }}</label>
                    <input type="date" id="hire_date" name="hire_date"
                           class="form-control @error('hire_date') is-invalid @enderror"
                           value="{{ old('hire_date') }}" required>
                    @error('hire_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="salary" class="form-label">{{ __('salary') }}</label>
                    <input type="number" id="salary" name="salary"
                           class="form-control @error('salary') is-invalid @enderror"
                           value="{{ old('salary') }}" required>
                    @error('salary')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="status" class="form-label">{{ __('status') }}</label>
                    <select id="status" name="status"
                            class="form-select @error('status') is-invalid @enderror" required>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('active') }}</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>{{ __('inactive') }}</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('add employee') }}</button>
        </form>
    </div>
@endsection
