@extends('layouts.app')

@section('content')
<h1 class="page-header">Dashboard</h1>
<!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Stock Example
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Inventory list
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>User</th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($inventory))
                                 @foreach ($inventory as $inven)
                                        <tr>
                                            <td>{{$inven->id}}</td>
                                            <td>{{$inven->name}}</td>
                                            <td>{{$inven->user}}</td>
                                            <td>{{$inven->comment}}</td>
                                            <td>
                                          <form action="{{ url('inventory/'.$inven->id) }}" method="GET">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-btn fa-folder"></i>Show
                                                </button>
                                            </form>
                                            </td>
                                        </tr>
                                @endforeach
                                    
                                @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
@endsection
