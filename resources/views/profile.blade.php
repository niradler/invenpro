@extends('layouts.app')

@section('content')
<h1 class="page-header">Profile</h1>
 <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User profile
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="{{ url('profile/update') }}" method="POST">
                                     {{ csrf_field() }}
                                     {{ method_field('PUT') }}
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" value="{{$user->name}}">
                                        </div>
                                            <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" value="{{$user->email}}">
                                        </div>
                                            <div class="form-group">
                                          <a href="{{ url('/profile/reset') }}" class="btn btn-danger">Password reset</a>
                                        </div>
                                          <div class="form-group">
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
@endsection
