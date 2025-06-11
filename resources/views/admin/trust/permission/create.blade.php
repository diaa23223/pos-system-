@extends('layouts.master')

@section('title',__('craete permission'))


@section('content')
    <div class="container">
        <h2>{{ __('add permission') }}</h2>
        <form action="{{ route('permissions.store') }}" method="POST">
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
                    <label for="display_name" class="form-label">{{ __('display_name') }}</label>
                    <input type="display_name" id="display_name" name="display_name" 
                           class="form-control @error('display_name') is-invalid @enderror" 
                           value="{{ old('display_name') }}" required>
                    @error('display_name') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>
            </div>

            
                <div class="col-md-6">
                    <label for="table" class="form-label">{{ __('table') }}</label>
                    <input type="table" id="table" name="table" 
                           class="form-control @error('table') is-invalid @enderror" 
                           value="{{ old('table') }}" required>
                    @error('table') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>
            </div>

            
        <div class="mt-3">
            <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
            <a href="{{ route('permissions.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
        </div>
        </form>
    </div>
@endsection