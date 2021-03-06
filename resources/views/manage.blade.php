@extends('layouts.app')

@section('content')
<h1 class="page-header">Manage</h1>
<style type="text/css">   
</style>
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Inventories list
                             <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Sort
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="{{ url('manage?sort=updated_at') }}">Updated</a>
                                        </li>
                                        <li><a href="{{ url('manage?sort=name&order=asc') }}">Name</a>
                                        </li>
                                        <li><a href="{{ url('manage?sort=id&order=asc') }}">Id</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                             @if(isset($inventory) &&count($inventory)>0)
                                <table class="table " >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Comment</th>
                                            <th>Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                 @foreach ($inventory as $inven)
                                        <tr>
                                            <td>{{$inven->id}}</td>
                                            <td>{{$inven->name}}</td>
                                            <td>{{$inven->comment}}</td>
                                            <td>{{$inven->updated_at}}</td>
                                            <td>
                                            <form action="{{ url('manage/'.$inven->id) }}" method="GET">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-btn fa-folder"></i> Show
                                                </button>
                                            </form>
                                                <div style="height: 10px"></div>
                                             <form action="{{ url('manage/'.$inven->id).'/share' }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" 
                                                    @if($inven->share)
                                                    {!! 'class="btn btn-success"' !!}
                                                    @else
                                                   {!! 'class="btn btn-primary"' !!}
                                                    @endif
                                                >
                                                    <i class="fa fa-btn fa-share-alt-square"></i> Share
                                                </button>
                                            </form>
                                            </td>
                                        </tr>
                                @endforeach
                                     
                                    </tbody>
                                </table>
                                @else
                                Empty
                                 @endif
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
