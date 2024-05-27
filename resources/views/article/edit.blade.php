@extends('layouts.parent')

@section('title','Category Edit')

@section('main','Edit Category')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{route('article.update',$data->id)}}" method="POST" class="col-6" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-5">
                    <label for="" class="form-label">Image <strong class="text-danger">*Max 100kb</strong></label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group mb-5">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$data->title}}">
                </div>
                <div class="form-group mb-5">
                    <label for="">Status</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($category as $item)
                            <option value="{{$item->id}}" {{$data->category->id == $item->id ? 'selected' : ''}}>{{$item->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-5">
                    <label for="" class="form-label">Desc</label>
                    <textarea name="desc" class="form-control" cols="10" rows="5">{{$data->desc}}</textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection