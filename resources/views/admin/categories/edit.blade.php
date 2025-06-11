@extends('layouts.master')

@section('title',__('craete category'))


@section('content')
    <div class="container">
    <h2>{{ __('Edit category') }}</h2>
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @foreach (['ar' => __('Arabic'), 'en' => __('English')] as $locale => $language)
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="disabledTextInput" class="form-label">{{ __('category') }} {{ $language }}</label>
                    <input type="text" id="disabledTextInput" name="{{ $locale }}[name]"
                        class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="disabledTextInput" class="form-label">{{ __('category') }} {{ $language }}</label>
                    <input type="text" id="disabledTextInput" name="{{ $locale }}[description]"
                        class="form-control @error('description') is-invalid @enderror" value="{{ $category->description }}">
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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