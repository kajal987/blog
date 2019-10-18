@extends('layouts.app')
@section('content')
    <div class="modal fade" id="modal-default" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="addtitle" style="display: none;">Add User</h4>
                    <h4 class="modal-title" id="edittitle" style="display: none;">Edit User</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="insertuser" method="POST" action="{{ url('post_job') }}"
                          enctype="multipart/form-data">
                        <input type="hidden" id="userid" name="userid" class="form-control" placeholder="Email">
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
                                    <input type="email" name="email" class="form-control" id="email"
                                           placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-xs-2 control-label">Image</label>
                                <div style="border: 1px dashed;width: 264px;margin-left:14px;"
                                     class="col-sm-10 col-xs-10">
                                    <input type='file' id="imgInp" name="files" class="pagefile form-control"
                                           style="height: 10%"/>

                                    <div id="img_id" style="height: 10%"></div>
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
    <button type="button" id="adduser" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"
            style="float: right;margin-top: 12px;">
        Add user
    </button>
    <button type="button" id="upadteuser" class="btn btn-primary" style="display:none">Update</button>

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
        </div>
        <
        <!-- /.col -->
    </div>

    <input type="hidden" class="form-control" id="base_url" value="{{url('')}}">
    <input type="hidden" name="_token" id="csrftoken" value="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ url('js/user.js')}}"></script>
@endsection
