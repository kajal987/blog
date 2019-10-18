@extends('layouts.userapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{ url('post/create') }}" class="btn btn-primary" style="margin-top: 12px;" >Add Post</a>
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <!-- <th>Action</th> -->
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td>

                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary" >Show Post</a>
                                                        </td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
