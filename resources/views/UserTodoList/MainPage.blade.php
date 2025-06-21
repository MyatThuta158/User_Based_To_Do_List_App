@extends('Layout.AppLayout')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Your To-Do Lists</h2>
            <!-- Search Form -->
            <form class="d-flex" method="GET" action="">
                <input class="form-control me-2" type="search" name="q" placeholder="Search to-do..."
                    value="{{ request('q') }}" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
            <!-- Add Button -->
            <button id="btn-add" class="btn btn-primary ms-3">Add</button>
        </div>

        <!-- Add Form (hidden by default) -->
        <div id="add-form" class="card mb-4" style="display: none;">
            <div class="card-body">
                <form method="POST" action="{{ route('todolsits.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="todo-input" class="form-label">To-Do Item</label>
                        <input type="text" class="form-control" id="todo-input" name="ToDoList"
                            placeholder="Enter new to-do" required>
                    </div>
                    <input type="hidden" name="app_user_id" value="{{ auth()->id() }}">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" id="btn-cancel" class="btn btn-secondary ms-2">Cancel</button>
                </form>
            </div>
        </div>

        <!-- To-Do List Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>To-Do</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($toDoLists as $index => $todo)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $todo->ToDoList }}</td>
                            <td>
                                <form action="{{ route('todolsits.delete', $todo->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this item?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No to-do items found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{-- {{ $todos->withQueryString()->links() }} --}}
        </div>
    </div>
@endsection
