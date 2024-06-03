<x-main>
    <div class="box">
        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')

            <h1 class="title is-4">Edit the Task</h1>
            <h2 class="subtitle is-6 is-italic">
                Fields marked with a star (<span class="has-text-danger">*</span>) are required.
            </h2>

            {{-- Here are all the form fields --}}
            <div class="field">
                <label for="title" class="label">Title<span class="has-text-danger">*</span></label>
                <div class="control">
                    <input type="text" name="title" placeholder="Enter the task's title..."
                           class="input @error('title') is-danger @enderror"
                           value="{{ old('title', $task) }}" autocomplete="title" autofocus>
                </div>
                @error('title')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="description" class="label">Description</label>
                <div class="control">
                    <input type="text" name="description" placeholder="Enter the task's description..."
                           class="input textarea @error('description') is-danger @enderror"
                           value="{{ old('description', $task) }}">
                </div>
                @error('description')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="due_date" class="label">Due Date</label>
                <div class="control has-icons-right">
                    <input type="date" name="due_date"
                           class="input @error('due_date') is-danger @enderror"
                           value="{{ old('due_date', $task) }}">
                </div>
                @error('due_date')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="status" class="label">Status<span class="has-text-danger">*</span></label>
                <div class="control">
                    <input type="text" name="status"
                           class="input @error('status') is-danger @enderror"
                           value="{{ old('status', $task) }}">
                    <p class="help is-info">Enter the status as a number. 0 for uncompleted, 1 for completed.</p>
                </div>
                @error('status')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field is-grouped" style="margin-top: 2rem;">
                <div class="control">
                    <button type="submit" class="button is-primary">Submit</button>
                </div>
                <div class="control">
                    <a type="button" href="{{ url()->previous() }}" class="button is-light">Cancel</a>
                </div>
                <div class="control">
                    <button type="reset" class="button is-warning">Reset</button>
                </div>
            </div>

        </form>
    </div>
</x-main>
