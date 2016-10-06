@extends('layouts.app')

@section('content')
<h1 class="page-header">
{{$item->name}}
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
                                <form action="{{ url('manage/'.$item->inventory_id .'/item/' .$item->id) }}" method="POST" class="form-horizontal" role="form">
                                  {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" id="name" class="form-control" required="" value="{{$item->name}}">
                                             <label>Amount</label>
                                            <input type="number" name="amount" id="amount" class="form-control" required="" value="{{$item->amount}}">
                                            <label>Url</label>
                                            <input type="url" name="url" id="url" class="form-control" value="{{$item->url}}">
                                            <label>Image url</label>
                                            <input type="url" name="image_url" id="image_url" class="form-control" value="{{$item->image_url}}">
                                             <label>Comment</label>
                                            <textarea  type="text" name="comment" id="comment" class="form-control" value="{{$item->comment}}"></textarea>
                           {{--                  <p class="help-block">Example block-level help text here.</p> --}}
                                        </div>
                                        
                                        <div class="form-group ">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><i class="fa  fa-pencil-square"></i> Update
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
@endsection
