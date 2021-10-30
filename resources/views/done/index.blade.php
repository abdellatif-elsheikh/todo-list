@extends('layout')

@section('links')

@endsection

@section('tilte')
    done work
@endsection

@section('content')
    <div class="container">

        @if ($list->isEmpty())
            <div class="my-3 mx-auto p-4 bg-light">
                You did not complete any tasks yet..
            </div>
        @else
        <div class="my-4">

            <a href="{{url('clear-all-tasks')}}" class="btn btn-danger">Clear All</a>
        </div>
        <div class="row my-3">
            @foreach (Auth::user()->doneLists as $item)
                <div class="col-lg-3 col-md-4 p-4 row">
                    <div class="card p-3 col-12">
                        <h2>{{ $item->name }}</h2>
                        <p class="lead">{{ $item->desc }}</p>
                        <div class="small"><strong>Done At:</strong> {{$item->updated_at}}</div>
                        <hr>
                        <div>
                            <a href="{{url('clear-task',$item->id)}}" class="btn btn-danger">Clear task</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection
