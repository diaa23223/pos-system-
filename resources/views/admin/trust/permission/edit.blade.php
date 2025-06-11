@extends('layouts.master')

@section('title',__('edit permission'))


@section('content')
    <div class="container">
        <h2>{{ __('add permission') }}</h2>
        <form action="{{ route('permissions.update',$permission->id) }}" method="POST">
            @csrf
            @method('PUT')  
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">{{ __('name') }}</label>
                    <input type="text" id="name" name="name" 
                           class="form-control " 
                           value="{{$permission->name }}" required>
                </div>

                <div class="col-md-6">
                    <label for="display_name" class="form-label">{{ __('display_name') }}</label>
                    <input type="display_name" id="display_name" name="display_name" 
                           class="form-control" 
                           value="{{ $permission->display_name }}" required>
                                   </div>
            </div>

            
                <div class="col-md-6">
                    <label for="table" class="form-label">{{ __('table') }}</label>
                    <input type="table" id="table" name="table" 
                           class="form-control" 
                           value="{{$permission->table }}" required>
                                   </div>
            </div>
<div>        <button type="submit" class="btn btn-primary">{{ __('edit permission') }}</button>
</div>
        </form>
    </div>
@endsection