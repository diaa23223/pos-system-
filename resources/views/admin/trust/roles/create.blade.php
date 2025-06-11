@extends('layouts.master')

@section('title',__('craete role'))


@section('content')
    <div class="container">
        <h2>{{ __('add role') }}</h2>
        <form action="{{ route('roles.store') }}" method="POST">
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

            

            
        <div class="mt-3">
            <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
        </div>
        </form>
    </div>
@endsection