@extends('layouts.parent')

@section('title','Category Create')

@section('main','Category Create')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{route('article.store')}}" method="POST" class="col-6" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group mb-5">
                    <label for="" class="form-label">Image <strong class="text-danger">*Max 100kb</strong></label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group mb-5">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group mb-5">
                    <label for="">Category</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-5">
                    <label for="" class="form-label">Desc</label>
                    <textarea name="desc" class="form-control" cols="10" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection