@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>
                    <div class="card-body" style="margin-top: 16px;">
                        <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                            <div class="form-group">
                                @csrf
                                <label>Post Title: </label>
                                <input type="text" name="title" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label >Post Body: </label>
                                <textarea name="body" rows="10" cols="30" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type='file' id="imgInp" name="files" class="pagefile form-control"
                                           style="height: 10%"/>
                                    <input type="hidden" id="imagetool64" name="imagetool64"/>
                                    <div id="img_id" style="height: 10%"></div>

                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
