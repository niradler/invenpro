@extends('layouts.app')

@section('content')
<h1 class="page-header">Dashboard</h1>
<!-- /.panel -->
 
                           
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>Latest stock share
                                  <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Sort
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="{{ url('home?sort=updated_at') }}">Updated</a>
                                        </li>
                                        <li><a href="{{ url('home?sort=name&order=asc') }}">Name</a>
                                        </li>
                                        <li><a href="{{ url('home?sort=id&order=asc') }}">Id</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                                            <th>Updated</th>
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
                                            <td>{{$inven->updated_at}}</td>
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
             {{ $inventory->links() }}
@endsection
