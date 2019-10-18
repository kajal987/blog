@extends('layouts.app')
@section('content')
    <div class="modal fade" id="modal-default" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <form class="form-horizontal" id="insertuser" method="POST" action="{{ url('post_job') }}">
                        <input type="hidden" id="userid"  name="userid" class="form-control"  placeholder="Email">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 col-xs-2 control-label">Name</label>
                                <div class="col-sm-10 col-xs-10">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 col-xs-2 control-label">Email</label>
                                <div class="col-sm-10 col-xs-10">
                                    <input type="email"  name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <!-- /.box-footer -->
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveusers" class="btn btn-primary">Add</button>
                    <button type="button" id="upadteuser" class="btn btn-primary" style="display:none">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <button type="button" id="upadteuser" class="btn btn-primary" style="display:none">Update</button>

<div class="row">
    <div class="col-xs-12">

        <!-- /.box -->


        <!-- /.box -->
    </div><
    <!-- /.col -->
</div>

<input type="hidden" class="form-control" id="base_url"  value="{{url('')}}">
<input type="hidden" name="_token" id="csrftoken" value="{{ csrf_token() }}">
<script src="{{ URL::asset('js/user.js')}}"></script>
@endsection
