@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xs-12">

        <!-- /.box -->

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">User Management</h3>
            </div>
            <!-- /.box-header -->

                <div class="box-body" id="user-detail">
                </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div><
    <!-- /.col -->
</div>

<input type="hidden" class="form-control" id="base_url"  value="{{url('')}}">
<input type="hidden" name="_token" id="csrftoken" value="{{ csrf_token() }}">
<script src="{{ URL::asset('js/user.js')}}"></script>
@endsection
