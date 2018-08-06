@extends('layouts/admin')
@section('container')         
<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title">编辑公司服务</span>
            <div class="description">请认真填写</div>
        </div>
        <form action="{{url('admin/business/edit',['id'=>$cols->id])}}" method="post">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="sub-title">公司服务标题</div>
                        <div>
                            <input type="text" class="form-control" name="title" value="{{$cols->title}}" placeholder="标题">
                            <span style="color:red">{{$errors->first('title') ?? ''}}</span>
                        </div>
                        <div class="sub-title">公司服务介绍</div>
                        <div>
                            <textarea class="form-control" rows="3" name="content">{{$cols->content}}</textarea>
                            <span style="color:red">{{$errors->first('content') ?? ''}}</span>
                        </div> 
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-default">更改</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

