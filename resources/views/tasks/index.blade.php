<x-main>
    <div class="content">
        <div class="block">
            <h1 class="title is-4">My TODOs</h1>
        </div>
        <div class="block">
            <a href="{{ route('tasks.create') }}" class="button is-primary">Add</a>
        </div>
    </div>
    <section class="content">
            <table class="table is-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Due</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td><a href="{{ route('tasks.show', $task) }}" class="has-text-black">{{ $task->title }}</a></td>
                        <td>{{ $task->due_date }}</td>
                        <td>
                            @if($task->status === 0)
                                <form id="complete-task" method="POST"
                                      action="{{ route('tasks.complete', $task) }}">
                                    @csrf
                                    <button type="submit" class="button has-background-white">Complete</button>
                                </form>
                            @else
                                <span class="tag has-text-weight-bold">Completed</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    {{ $tasks->links() }}
</x-main>
