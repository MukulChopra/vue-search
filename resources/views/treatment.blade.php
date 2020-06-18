@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form enctype="multipart/form-data" method="post" role="form" action="/uploadtreatment">
                @csrf
                <div class="form-group">
                    <label for="exampleInputFile">File Upload</label>
                    <input type="file" name="file" id="file" size="150">
                    <p class="help-block">Only Excel/CSV File Import.</p>
                </div>
                <button type="submit" class="btn btn-default" name="Import" value="Import">Upload</button>
            </form>
        </div>
    </div>
</div>

@endsection