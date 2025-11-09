@include('include.header')

@if(session('success'))
<div id="alert-message" class="alert alert-success fw-bold position-fixed top-0 end-0 mt-3 me-3" style="z-index: 9999; width: auto;">
    {{ session('success') }}
</div>
@endif



<div class="container mt-5" style="min-height:540px">

    <h3 class="mb-4 text-center fw-bold">TODO LIST</h3>


    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('todolist.add') }}" class="btn btn-success fw-semibold shadow px-4 py-2">
            <i class="fas fa-plus me-2"></i> Add New Todo
        </a>
    </div>



    <div class="table-responsive shadow-sm">
        <table class="table table-dark table-hover table-bordered align-middle text-center">

            <thead class="table-secondary text-dark fw-bold">
                <tr>
                    <th width="70">SR No</th>
                    <th width="150">Name</th>
                    <th>Description</th>
                    <th width="120">Image</th>
                    <th width="120">Status</th>
                    <th width="120">Actions</th>
                </tr>
            </thead>

            <tbody>
                @if($data->isNotEmpty())
                @foreach($data as $key => $row)
                <tr>
                    <td>{{ ++$key }}</td>

                    <td class="fw-semibold">
                        {{ $row->name }}
                    </td>

                    <td>
                        {!! $row->description !!}
                    </td>

                    <td>
                        @if($row->image)
                        <img src="{{ asset('uploads/todo/' . $row->image) }}" width="80" class="rounded shadow-sm">
                        @else
                        <span class="text-warning">No Image</span>
                        @endif
                    </td>

                    <td>
                        <span class="badge 
                                    {{ $row->status == 'Active' ? 'bg-success' : 'bg-danger' }} 
                                    status-badge" style="cursor:pointer;" data-id="{{ $row->id }}" data-status="{{ $row->status }}">
                            {{ $row->status }}
                        </span>
                    </td>


                    <td>

                        <a href="{{ route('todolist.edit', $row->id) }}" class="btn btn-sm text-info border-0 bg-transparent p-0">
                            <i class="fas fa-eye fa-lg" title="View"></i>
                        </a>
                        <a href="{{ route('todolist.edit', $row->id) }}" class="btn btn-sm text-warning border-0 bg-transparent p-0">
                            <i class="fas fa-edit" title="Edit"></i>
                        </a>

                        <form class="d-inline" action="{{ route('todolist.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete ?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm text-danger border-0 bg-transparent p-0">
                                <i class="fas fa-trash-alt fa-lg" title="Delete"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>
    </div>

</div>

<script>
    setTimeout(function() {
        let alertBox = document.getElementById('alert-message');
        if (alertBox) {
            alertBox.style.transition = "opacity 0.5s";
            alertBox.style.opacity = "0";
            setTimeout(() => alertBox.remove(), 500);
        }
    }, 2000);

</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- For Active & Inactive jQuery AJAX Script --}}

<script>
    $(document).on('click', '.status-badge', function() {
        let badge = $(this);
        let id = badge.data('id');

        $.ajax({
            url: "{{ route('change.status') }}"
            , type: "POST"
            , data: {
                id: id
                , _token: "{{ csrf_token() }}"
            }
            , success: function(response) {
                if (response.status === "Active") {
                    badge.removeClass("bg-danger").addClass("bg-success").text("Active");
                } else {
                    badge.removeClass("bg-success").addClass("bg-danger").text("Inactive");
                }
            }
        });
    });

</script>

@include('include.footer')
