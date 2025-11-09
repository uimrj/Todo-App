@include('include.header')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <h4 class="mb-4 text-center">Add ToDo</h4>

                    <form method="post" enctype="multipart/form-data" action="{{ route('todolist.save') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{ old('name') }}" name="name">
                            @error('name')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="editor" class="form-label fw-bold">Description</label>
                            <textarea class="form-control" id="editor" rows="6" placeholder="Enter description" name="description">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label fw-bold">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            @error('image')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>

                            @error('status')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- CKEditor 5: load from official CDN (no local build required) -->
<script src="https://cdn.ckeditor.com/ckeditor5/latest/classic/ckeditor.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ensure the element exists
        const el = document.querySelector('#editor');
        if (!el) {
            console.error('Editor element not found: #editor');
            return;
        }

        // Initialize CKEditor Classic build
        ClassicEditor
            .create(el)
            .then(editor => {
                // optional: keep a reference for debugging
                window.todoEditor = editor;
            })
            .catch(error => {
                console.error('CKEditor init error:', error);
            });
    });

</script>

<style>
    /* Make sure CKEditor editable area has min-height so page doesn't jump */
    .ck-editor__editable_inline {
        min-height: 220px;
        /* adjust as needed */
        max-height: 60vh;
        overflow: auto;
    }

    /* Small responsive tweak so the card stays visually centered and doesn't awkwardly move */
    @media (min-width: 992px) {
        .container>.row {
            margin-top: 40px;
        }
    }

</style>

@include('include.footer')
