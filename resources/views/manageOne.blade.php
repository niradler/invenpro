@extends('layouts.app')

@section('content')
<h1 class="page-header">
{{$inventory->name}}
</h1>

         <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create new item
                        </div>
                        <div class="panel-body">
                            <div class="row container">
                                <div class="col-lg-6">
                                <form action="{{ url('manage/'.$inventory->id) }}" method="POST" class="form-horizontal" role="form">
                                  {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" id="name" class="form-control" required="">
                                             <label>Amount</label>
                                            <input type="number" name="amount" id="amount" class="form-control" required="">
                                            <label>Url</label>
                                            <input type="url" name="url" id="url" class="form-control" >
                                            <label>Image url</label>
                                            <input type="url" name="image_url" id="image_url" class="form-control" >
                                            <label>Comment</label>
                                            <textarea  type="text" name="comment" id="comment" class="form-control" ></textarea>
                           {{--                  <p class="help-block">Example block-level help text here.</p> --}}
                                        </div>
                                        
                                        <div class="form-group ">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><i class="fa  fa-plus"></i> Add
                                                </button>
                                            </span>
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
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Inventory list
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
                                            <th>Action</th>
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
                                            <td>
                                                <form action="{{ url('manage/'.$inventory->id.'/item/'.$item->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i> Delete
                                                </button>
                                            </form>
                                                     <div style="height: 10px"></div>
                                             <form action="{{ url('manage/'.$inventory->id) .'/item/' .$item->id  }}" method="GET">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-pencil-square"></i> Update
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
            {{ $items->links() }}
@endsection
