@extends('layout')
{{-- Start CSS Links --}}
@section('links')
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
@endsection
{{-- End CSS Links --}}

{{-- ---------Start Title---------- --}}
@section('title')
    @yield('title')
@endsection
{{-- ---------End Title---------- --}}

{{-- Start Body Content --}}
@section('content')
    <section class="form-section">
        <div class="layer">
            <div class="container">
                <form action="@yield('action')" method="POST" class="form m-auto" enctype="multipart/form-data">
                    @csrf
                    @include('errors')
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="@yield('name')">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="estimatedTime" class="form-label">Estimated Time</label>
                            <input type="text" name="estimatedTime" class="form-control" id="estimatedTime" value="@yield('time')">
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Deascreption</label>
                            <textarea class="form-control" name="desc" id="desc" rows="5">@yield('desc')</textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
{{-- End Body Content --}}
