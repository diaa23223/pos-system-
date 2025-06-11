@extends('layouts.master')

@section('title',__('edit role'))


@section('content')
    <div class="container">
        <h2>{{ __('add role') }}</h2>
        <form action="{{ route('roles.update',$role->id) }}" method="POST">
            @csrf
            @method('PUT')  
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">{{ __('name') }}</label>
                    <input type="text" id="name" name="name" 
                           class="form-control " 
                           value="{{$role->name }}" required>
                </div>

                <div class="col-md-6">
                    <label for="display_name" class="form-label">{{ __('display_name') }}</label>
                    <input type="display_name" id="display_name" name="display_name" 
                           class="form-control" 
                           value="{{ $role->display_name }}" required>
                                   </div>
            </div>

           <div class="mt-3">
            <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
        </div>
         </form>
    </div>
@endsection