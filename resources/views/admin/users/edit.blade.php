@extends('layouts.master')

@section('title',__('edit user'))

@section('content')
    <div class="container">
        <h2>{{ __('add_user') }}</h2>
        <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')       
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">{{ __('name') }}</label>
                    <input type="text" id="name" name="name" 
                           class="form-control @error('name') is-invalid @enderror" 
                           value="{{ $user->name }}" required>
                    @error('name') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">{{ __('email') }}</label>
                    <input type="email" id="email" name="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           value="{{$user->email }}" required>
                    @error('email') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="password" class="form-label">{{ __('password') }}</label>
                    <input type="password" id="password" name="password" 
                           class="form-control @error('password') is-invalid @enderror" required>
                    @error('password') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="role" class="form-label">{{ __('Role') }}</label>
                    <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                        <option value="">{{ __('select_role') }}</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->display_name }} </option>
                        @endforeach 
                    </select>
                    @error('role') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('edit user') }}</button>
        </form>
    </div>
@endsection