@extends('layouts.app')
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Profile
    </h1>
</section>
<div class="modal fade" id="modal-default" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" >
                <form class="form-horizontal" id="submit_profile_img" method="post" >
                    <input type="hidden" id="userid"  name="userid" class="form-control"  placeholder="Email">
                    <input type="hidden" name="users_id"  value="{{ Auth::user()->id }}">
                    <input type="hidden" name="upload_imgval"  id="upload_imgval"  value="0">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="fileinput fileinput-new" data-provides="fileinput" style="text-align: center;
						padding-bottom: 11px;">
							<span class="btn btn-primary btn-file">
								<span>Choose file</span>
								<input type="file" name="bookingFile" id="upload" class="custom-file-input">
							</span>
                            <span class="fileinput-filename"></span><span class="fileinput-new custom-file-control">No file chosen</span>
                        </div>
                        <div id="upload-demo"></div>
                        <input type="hidden" id="imagebase64" name="imagebase64">
                        <input type="hidden" class="" style="margin-left:320px;" name="image_name" id="image_name" value="">
                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-footer -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn btn-light" data-dismiss="modal">Close</button>
                <!-- <button type="button" id="saveusers" class="btn btn-primary">Add</button>-->
                <button type="button" id="Upload_adminimage" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    @if(file_exists(public_path('uploads/').Auth::user()->profilePicture) && Auth::user()->profilePicture )
                        <img class="profilepic2 profile-user-img img-responsive img-circle" src="{{ asset('uploads/' . Auth::user()->profilePicture) }}" alt="User profile picture">
                    @else
                        <img class="profilepic2  profile-user-img img-responsive img-circle" src="{{ asset('uploads/defaultUser.png') }}" alt="User profile picture">
                    @endif
                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- About Me Box -->
            <div class="box box-primary">

                <!-- /.box-header -->

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
                    <li><a href="#timeline" data-toggle="tab">Change password</a></li>
                </ul>
                <div class="tab-content">
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        <!-- The timeline -->
                        <form class="form-horizontal" role="form" id="changepassword" name="changepassword">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ Auth::user()->id }}" class="form-control" name="userid">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-4 control-label">New Password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="password" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-4 control-label">Confirm Password</label>
                                <div class="col-sm-6">
                                    <input  type="password" name="password_confirmation" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="button" id="savepassword" name="savepassword" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="active tab-pane" id="settings">
                        @if(file_exists(public_path('uploads/').Auth::user()->profilePicture) && Auth::user()->profilePicture)
                            <img class="profilepic1 profile_model profile-user-img img-responsive img-circle" src="{{ asset('uploads/' . Auth::user()->profilePicture) }}" alt="User profile picture">
                        @else
                            <img class="profilepic1 profile_model profile-user-img img-responsive img-circle" src="{{ asset('uploads/defaultUser.png') }}" alt="User profile picture">
                        @endif
                        <form class="form-horizontal" id="userupdate" name="userupdate" style="margin-top: 14px;">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ Auth::user()->id }}" class="form-control" name="userid">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label" >Name</label>
                                <div class="col-sm-10">
                                    <input type="email" name="name" value="{{ Auth::user()->name }}" class="form-control" id="inputName" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail"  class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" value="{{ Auth::user()->email }}" class="form-control" id="inputEmail" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="button" id="saveuserdata" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<input type="hidden" name="_token" id="csrftoken" value="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ URL::asset('js/user.js')}}"></script>

@endsection
