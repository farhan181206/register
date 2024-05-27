@extends('layouts.parent')

@section('title','Category')

@section('content')
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item => $index)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$index->title}}</td>
                    <td>{{$index->status}}</td>
                    <td>
                        <a href="{{route('category.show',$index->id)}}" class="btn btn-primary">Detail</a>
                        <a href="{{route('category.edit',$index->id)}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('category.destroy',$index->id)}}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection