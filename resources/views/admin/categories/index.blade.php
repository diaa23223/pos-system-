@extends('layouts.master')

@section('title', __('Categories'))

@section('content')
    <div class="container">
        <h2>{{ __('Categories List') }}</h2>

        <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">{{ __('Add New Category') }}</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">{{ __('No category found.') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection