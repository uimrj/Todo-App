@include('include.header')
<div class="container mt-5">
    <div class="row justify-content-center" style="height:650px">
        <div class="col-md-6">

            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <h4 class="mb-4 text-center">Add TODO LIST</h4>

                    <form method="post" enctype="multipart/form-data" action="{{ route('todolist.save') }}">
                        @csrf


                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{old('name')}}" name="name">

                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea class="form-control" id="description" rows="4" placeholder="Enter description" name="description">{{ old('description') }}</textarea>


                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
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
@include('include.footer')
