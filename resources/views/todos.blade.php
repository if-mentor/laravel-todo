@extends('layout')

@section('content')
    @php
        $statusList = ['not started', 'working', 'done'];
    @endphp
    <div class="container">
        <div class="row">
            <form class="col-4 pt-3" method="POST" action="{{ route('store') }}">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="limit_at" class="form-label">Limit_at</label>
                    <input for="limit_at" aria-label="limit_at" type="date" name="limit_at" />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div class="col pt-3">
                <form class="d-flex justify-content-between align-items-center mb-3" method="POST"
                    action="{{ route('search') }}">
                    @csrf
                    @method('POST')
                    <div>
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control" id="title" name="title"
                            value="{{ session('search')['title'] ?? '' }}">
                    </div>
                    <div>
                        <label for="status" class="form-label">Status</label>
                        <select for="status" class="form-select" aria-label="status" name="status">
                            <option value=""
                                {{ session('search') && is_null(session('search')['status']) && 'selected' }}> --- </option>
                            <option value="0"
                                {{ session('search') && session('search')['status'] === '0' ? 'selected' : '' }}>not started
                            </option>
                            <option value="1"
                                {{ session('search') && session('search')['status'] === '1' ? 'selected' : '' }}>working
                            </option>
                            <option value="2"
                                {{ session('search') && session('search')['status'] === '2' ? 'selected' : '' }}>done
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="limit_at" class="form-label">Limit_at</label>
                        <input for="limit_at" aria-label="limit_at" type="date" class="d-block" name="limit_at"
                            value="{{ session('search')['limit_at'] ?? '' }}" />
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <form class="d-flex justify-content-end align-items-center mb-3" method="POST"
                    action="{{ route('sort') }}">
                    @csrf
                    @method('POST')
                    <label for="status" class="form-label me-3">Limit_at</label>
                    <select for="status" class="form-select w-25 me-3" aria-label="status" name="limit_at">
                        <option value="" {{ session('sort') && is_null(session('sort')['limit_at']) && 'selected' }}>
                            --- </option>
                        <option value="ASC"
                            {{ session('sort') && session('sort')['limit_at'] === 'ASC' ? 'selected' : '' }}>Asc</option>
                        <option value="DESC"
                            {{ session('sort') && session('sort')['limit_at'] === 'DESC' ? 'selected' : '' }}>Desc</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Sort</button>
                </form>
                @foreach ($todos as $todo)
                    <div class="card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            {{ $todo->title }}
                            <div class="d-flex align-items-center">
                                <span class="badge bg-secondary me-3">{{ $statusList[$todo->status] }}</span>

                                <a href={{ route('edit', $todo->id) }} class="btn btn-outline-primary btn-sm me-3">Detail</a>

                                <form method="POST" action="{{ route('delete', ['id' => $todo->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
