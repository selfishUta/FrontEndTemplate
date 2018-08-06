@extends('layouts/admin')
@section('container')         
<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">修改分类</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="typeform" class="form-inline" action="{{url('admin/type/edit',['id'=>$cols->id])}}" method="post">
                            <div class="form-group">
                                <label for="exampleInputName1">名称</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="分类名" name="title" value="{{$cols->title}}">
                                <span>{{$errors->first('title')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2">英文简称</label>
                                <input type="text" class="form-control" id="exampleInputName2" placeholder="英文简称" name="foreign_title" value="{{$cols->foreign_title}}">
                                <span>{{$errors->first('foreign_title')}}</span>
                            </div>
                            {{csrf_field()}}
                            <button type="submit" onclick="typeSave()" class="btn btn-default">修改</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

