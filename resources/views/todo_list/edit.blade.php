@include('include.header')

<div class="container mt-5">
    <div class="row justify-content-center" style="height:650px">
        <div class="col-md-6">

            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <h4 class="mb-4 text-center">EDIT TODO</h4>

                    <form method="POST" action="{{ route('todolist.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name', $data->name) }}">

                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea class="form-control" id="editor" rows="4" name="description" placeholder="Enter description">{{ old('description', $data->description) }}</textarea>

                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*">

                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                            @if($data->image)
                            <div class="mt-2">
                                <img src="{{ asset('uploads/todo/' . $data->image) }}" width="120" class="rounded shadow-sm">
                            </div>
                            @endif
                        </div>

                   

                        <!-- Submit Button -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Update</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            window.editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

</script>

<style>
    /*  CKEditor height*/
    .ck-editor__editable_inline {
        min-height: 220px;
        max-height: 60vh;
        overflow: auto;
    }

</style>

@include('include.footer')
