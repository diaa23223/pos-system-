@extends('layouts.master')

@section('title',__('craete category'))


@section('content')
    <div class="container">
    <h2>{{ __('Add category') }}</h2>
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            
    @foreach (['ar' => __('Arabic'), 'en' => __('English')] as $locale => $language)
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name_{{ $locale }}" class="form-label">{{ __('category name') }} {{ $language }}</label>
                <input type="text" id="name_{{ $locale }}" name="{{ $locale }}[name]" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="description_{{ $locale }}" class="form-label">{{ __('category description') }} {{ $language }}</label>
                <input type="text" id="description_{{ $locale }}" name="{{ $locale }}[description]" class="form-control">
            </div>
        </div>
    @endforeach


      
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="image">{{__('category image')}}</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{old('image')}}">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
  
    
            
            {{-- <div class="row mb-3">
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
                    <label for="description" class="form-label">{{ __('description') }}</label>
                    <input type="description" id="description" name="description" 
                           class="form-control @error('description') is-invalid @enderror" 
                           value="{{ old('description') }}" required>
                    @error('description') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>
            </div> --}}

            
        <div class="mt-3">
            <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
        </div>
        </form>
    </div>
@endsection