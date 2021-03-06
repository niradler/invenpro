@extends('layouts.app')

@section('content')
<h1 class="page-header">Inventory</h1>
<!-- /.panel -->
                    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Inventory item list
                             <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Sort
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                     @if(isset($items))
                                        <li><a href="{{ url('inventory/'.$items[0]->inventory_id .'?sort=updated_at') }}">Updated</a>
                                        </li>
                                        <li><a href="{{ url('inventory/'.$items[0]->inventory_id .'?sort=name&order=asc') }}">Name</a>
                                        </li>
                                        <li><a href="{{ url('inventory/'.$items[0]->inventory_id .'?sort=id&order=asc') }}">Id</a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            @if(isset($items)&&count($items)>0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Link</th>
                                            <th>Image</th>
                                            <th>Comment</th>
                                            <th>Updated</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                 @foreach ($items as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                             <td>{{$item->amount}}</td>
                                             <td>
                                             @if($item->url)
                                             <a href="{{$item->url}}">{{$item->name}}</a>
                                             @endif
                                             </td>
                                             <td>
                                              @if($item->image_url)
                                              <img src="{{$item->image_url}}" style="width:128px;height:128px;">
                                             @endif
                                             </td>
                                            <td>{{$item->comment}}</td>
                                            <td>{{$item->updated_at}}</td>
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
            @if(isset($items))
            {{ $items->links() }}
             @endif
@endsection
