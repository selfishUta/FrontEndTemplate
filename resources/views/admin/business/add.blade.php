@extends('layouts/admin')
@section('container')         
<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title">添加公司服务</span>
            <div class="description">请认真填写</div>
        </div>
        <form action="{{url('admin/business/add')}}" method="post">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="sub-title">公司服务标题</div>
                        <div>
                            <input type="text" class="form-control" value="{{old('title')}}" name="title" placeholder="标题">
                            <span style="color:red">{{$errors->first('title') ?? ''}}</span>
                        </div>
                  
                        <div class="sub-title">公司服务介绍</div>
                        <div>
                            <textarea class="form-control" rows="3" name="content">{{old('content')}}</textarea>
                            <span style="color:red">{{$errors->first('content') ?? ''}}</span>
                        </div> 
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-default">添加</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

