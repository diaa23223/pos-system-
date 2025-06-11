@extends('layouts.master')

@section('title', __('Roles'))

@section('content')
    <div class="container">
        <h2>{{ __('Roles List') }}</h2>

        <a href="{{ route('roles.create') }}" class="btn btn-success mb-3">{{ __('Add New Role') }}</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Display Name') }}</th>
                    <th>{{ __('Table') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->table }}</td>
                        <td>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">{{ __('No role found.') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection