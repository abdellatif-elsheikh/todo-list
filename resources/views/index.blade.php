@extends('layout')

@section('title')
    TODO | Main Page
@endsection

@section('content')
    <section class="todo my-5">
        <div class="container p-3">
            <h1 class="h1">TODO APP</h1>
            <a href="{{ url('add/task') }}" class="btn btn-primary">Add task</a>
            <div class="row my-3">
                @foreach (Auth::user()->todoLists as $item)
                    <div class="col-lg-3 col-md-4 p-4 row">
                        <div class="card p-3 col-12">
                            <h2>{{ $item->name }}</h2>
                            <p class="lead">{{ $item->desc }}</p>
                            <div class="small"><strong>Time to finish:</strong>
                                @if ($item->estimatedTime > 1)
                                    {{ $item->estimatedTime }} Hours
                                @else{
                                    {{ $item->estimatedTime }} Hour
                                    }
                                @endif
                            </div>
                            <hr>
                            <div class="col-12">
                                <div class="mb-2">
                                    <form action="{{ url('todo/done',$item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-info" href="">Mark as done</button>
                                    </form>
                                </div>
                                <a class="d-inline-block text-muted small" href="{{ url('todo/delete',$item->id) }}"><i
                                        class="far fa-trash-alt"></i> Delete </a>
                                <a class="d-inline-block text-muted small mx-3" href="{{ url('todo/edit',$item->id) }}"><i
                                        class="far fa-edit"></i> Edit </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
