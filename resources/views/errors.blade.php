@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="list-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    <ul>
            <li class="list-item">{{ session('error') }}</li>
    </ul>
</div>
@endif