@extends('layouts.master')

@section('title',__('craete category'))


@section('content')
    <div class="container">

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <legend>{{ __('add_product') }}</legend>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">{{ __('select_category') }}</label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                <option value="">{{ __('select_category') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>



            
    @foreach (['ar' => __('Arabic'), 'en' => __('English')] as $locale => $language)
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name_{{ $locale }}" class="form-label">{{ __('product name') }} {{ $language }}</label>
                <input type="text" id="name_{{ $locale }}" name="{{ $locale }}[name]" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="description_{{ $locale }}" class="form-label">{{ __('product description') }} {{ $language }}</label>
                <input type="text" id="description_{{ $locale }}" name="{{ $locale }}[description]" class="form-control">
            </div>
        </div>
    @endforeach
{{-- 
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="disabledTextInput" class="form-label">{{ __('product_name') }} {{ __('Arabic') }}</label>
            <input type="text" id="disabledTextInput" name="ar[name]" 
                   class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('ar.name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="disabledTextInput" class="form-label">{{ __('product_name') }} {{ __('English') }}</label>
            <input type="text" id="disabledTextInput" name="en[name]" 
                   class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('en.name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

  --}}

    


    <div class="row mb-3">
        <div class="col-md-6">
            <label for="disabledTextInput" class="form-label">{{ __('product slug') }}</label>
            <input type="text" id="disabledTextInput" name="slug" 
                   class="form-control @error('slug') is-invalid @enderror" 
                   value="{{ old('slug') }}">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="image">{{__('product image')}}</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                   name="image" value="{{old('image')}}">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="disabledTextInput" class="form-label">{{ __('product price') }}</label>
            <input type="text" id="disabledTextInput" name="price" 
                   class="form-control @error('price') is-invalid @enderror" 
                   value="{{ old('price') }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="disabledTextInput" class="form-label">{{ __('product quantity') }}</label>
            <input type="text" id="disabledTextInput" name="quantity" 
                   class="form-control @error('quantity') is-invalid @enderror" 
                   value="{{ old('quantity') }}">
            @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

<div class="mt-3">
            <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
        </div>
    </form>
    
@endsection