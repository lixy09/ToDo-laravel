<x-main>
    <div class="block">
        <a href="{{ route('home') }}" class="has-text-black is-underlined">Home</a>
        /
        <span>Task {{ $task->id }}</span>
    </div>
    <div class="navbar">
        <div class="navbar-start">
            <div class="block">
                <h1 class="title is-4">
                    {{ $task->title }}
                </h1>
                <div>
                    @if($task->status === 0)
                        <form id="complete-task" method="POST"
                              action="{{ route('tasks.complete', $task) }}">
                            @csrf
                            <button type="submit" class="button has-background-white">Complete</button>
                        </form>
                    @else
                        <span class="tag has-text-weight-bold">Completed</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="{{ route('tasks.edit', $task) }}" class="button is-primary">Edit</a>
                    <form id="deleteForm" method='POST' action="{{route('tasks.destroy', $task)}}" onsubmit="return confirm('Are you sure you want to delete this task?');">
                        @csrf
                        @method('delete')
                        <button type='submit' class="button is-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="block mt-3">
        <br>Created: {{ $task->created_at }}
        <br>Due Date: {{ $task->due_date }}
        <div class="section">
            <h2 class="subtitle is-6">
                {!! $task->description !!}
            </h2>
        </div>
    </div>
</x-main>
