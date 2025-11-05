@include('include.header')
<div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

</div>


<div class="container mt-5" style="min-height:540px">

    <h3 class="mb-4 text-center fw-bold">TODO LIST</h3>

    <div class="table-responsive">
        <table class="table table-dark table-hover table-bordered align-middle text-center">

            <thead class="table-secondary text-dark fw-bold">
                <tr>
                    <th>No.</th>
                    <th>TODO Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @if($data->isNotEmpty())
                @foreach($data as $todo_list)
                <tr>
                    <td>{{$todo_list->id}}</td>
                    <td>{{$todo_list->name}}</td>
                    <td>{{$todo_list->description}}</td>
                    <td>

                        <a href="{{ route('todolist.edit', $todo_list->id) }}" class="btn btn-sm btn-warning me-2">
                            Edit
                        </a>

                        <form  class="d-inline" action="{{ route('todolist.destroy', $todo_list->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete ?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
                @endif

            </tbody>

        </table>
    </div>

</div>

@include('include.footer')
