@extends('layouts.parent')

@section('title','Category Create')

@section('main','Category Create')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{route('category.process')}}" method="POST" class="col-6">
                @csrf
                @method('POST')
                <div class="form-group mb-5">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group mb-5">
                    <label for="">Status</label>
                    <div class="d-block">
                        <div class="">
                            <input type="checkbox" name="status" value="on" class="form-checkbox">
                            <label for="" class="form-label">On</label>
                        </div>
                        <div class="">
                            <input type="checkbox" name="status" value="off" class="form-checkbox">
                            <label for="" class="form-label">Off</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection