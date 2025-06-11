@extends('layouts.master')

@section('title', __('Permissions'))

@section('content')
    <div class="container">
        <h2>{{ __('Permission List') }}</h2>

        <a href="{{ route('permissions.create') }}" class="btn btn-success mb-3">{{ __('Add New Permission') }}</a>

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
                @forelse ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->display_name }}</td>
                        <td>{{ $permission->table }}</td>
                        <td>
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">{{ __('No permission found.') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
