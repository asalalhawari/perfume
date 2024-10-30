@extends('layouts.master')

{{-- @extends('layouts.app') --}}
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Create Brand</h1>
    <form action="{{ route('brands.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Brand Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter brand name" required>
            <div class="invalid-feedback">
                Please provide a brand name.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<script>
    // JavaScript for Bootstrap validation
    (function () {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
    })();
</script>
@endsection
