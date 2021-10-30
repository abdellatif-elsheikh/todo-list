@extends('add-edit')

@section('title')
    Edit task
@endsection

@section('action')
    {{ url('todo/edit',$data->id) }}
@endsection
@section('name')
    {{$data->name}}
@endsection
@section('time')
    {{$data->estimatedTime}}
@endsection
@section('desc')
    {{$data->desc}}
@endsection