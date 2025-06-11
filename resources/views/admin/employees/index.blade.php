@extends('layouts.master')

@section('title', __('Employees'))

@section('content')
    <div class="container">
        <h2>{{ __('Employee List') }}</h2>

        <a href="{{ route('employees.create') }}" class="btn btn-success mb-3">{{ __('Add New Employee') }}</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Position') }}</th>
                    <th>{{ __('Hire Date') }}</th>
                    <th>{{ __('Salary') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->hire_date }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>
                            <span class="badge bg-{{ $employee->status == 'active' ? 'success' : 'secondary' }}">
                                {{ __($employee->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">{{ __('Show') }}</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">{{ __('No employees found.') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
