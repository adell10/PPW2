@if(session('error'))
    <div class="alert alert-danger text-center mb-4">
        {{ session('error') }}
    </div>
@endif