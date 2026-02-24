@extends('admin.master.main')
@section('content')
<div class="content">
    <nav class="mb-2" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ $role->name }}</li>
        </ol>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                <div id="alertMessage" class="alert bg-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <script>
                    // Wait until the DOM is fully loaded
                    document.addEventListener('DOMContentLoaded', function() {
                        // Find the alert message element by ID
                        const alertMessage = document.getElementById('alertMessage');

                        // If the alert message exists, set a timeout to hide it after 5 seconds
                        if (alertMessage) {
                            setTimeout(function() {
                                alertMessage.classList.remove('show'); // Remove 'show' class to hide the alert
                                alertMessage.classList.add('fade'); // Add 'fade' class for CSS transition
                            }, 5000); // 5000 milliseconds = 5 seconds
                        }
                    });
                </script>
                @endif


                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const selectAllBtn = document.getElementById('selectAllBtn');
                        const checkboxes = document.querySelectorAll('.permission-checkbox');

                        function updateButtonText() {
                            const allChecked = Array.from(checkboxes).every(cb => cb.checked);
                            selectAllBtn.textContent = allChecked ? 'DeSelect All' : 'Select All';
                        }

                        // Initial check
                        updateButtonText();

                        selectAllBtn.addEventListener('click', function() {
                            const allChecked = Array.from(checkboxes).every(cb => cb.checked);
                            checkboxes.forEach(cb => cb.checked = !allChecked);
                            updateButtonText();
                        });

                        // Update button text when individual checkboxes change
                        checkboxes.forEach(cb => {
                            cb.addEventListener('change', updateButtonText);
                        });
                    });
                </script>

                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header  text-white">
                        <h4 class="mb-0">Role : {{ $role->name }}
                            <a href="{{ url('roles') }}" class="btn btn-light float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body p-4">

                        <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                @error('permission')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <label for="">Permissions</label>
                                <div class="mb-3">
                                    <button type="button" id="selectAllBtn" class="btn btn-secondary">Select All</button>
                                </div>

                                <div class="row">
                                    @foreach ($permissions as $permission)
                                    <div class="col-md-3 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input permission-checkbox" type="checkbox" name="permission[]" value="{{ $permission->name }}" id="perm-{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }} />
                                            <label class="form-check-label" for="perm-{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection