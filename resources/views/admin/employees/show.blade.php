@extends('layouts.master')

@section('title', __('Employee Details'))

@section('content')
    <div class="container">
        <h2>{{ __('Employee Details') }}</h2>

        <div class="card">
            <div class="card-body">
                <p><strong>{{ __('Name') }}:</strong> {{ $employee->name }}</p>
                <p><strong>{{ __('Position') }}:</strong> {{ $employee->position }}</p>
                <p><strong>{{ __('Hire Date') }}:</strong> {{ $employee->hire_date }}</p>
                <p><strong>{{ __('Salary') }}:</strong> {{ $employee->salary }}</p>
                <p><strong>{{ __('Status') }}:</strong>
                    <span class="badge bg-{{ $employee->status == 'active' ? 'success' : 'secondary' }}">
                        {{ __($employee->status) }}
                    </span>
                </p>

                <a href="{{ route('employees.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>
            </div>
        </div>
    </div>
@endsection
