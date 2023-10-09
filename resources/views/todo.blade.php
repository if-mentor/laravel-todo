@extends('layout')

@section('content')
    <div class="container w-50">
        <div class="row justtify-content-center">
            <form class="pt-3" method="POST" action="{{ route('update', $todo->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input class="form-control" id="title" name="title" value="{{ $todo->title }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description">{{ $todo->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select for="status" class="form-select" aria-label="status" name="status">
                        <option value="0" {{ $todo->status == '0' ? 'selected' : '' }}>not started
                        </option>
                        <option value="1" {{ $todo->status == '1' ? 'selected' : '' }}>working
                        </option>
                        <option value="2" {{ $todo->status == '2' ? 'selected' : '' }}>done
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="limit_at" class="form-label">Limit_at</label>
                    <input for="limit_at" aria-label="limit_at" type="date" name="limit_at"
                        value="{{ $todo->limit_at }}" />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
