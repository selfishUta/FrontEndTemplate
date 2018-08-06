@extends('layouts/admin')
@section('container')         
<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title">案例类型</span>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">添加分类</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="typeform" class="form-inline" action="#">
                            <div class="form-group">
                                <label for="exampleInputName1">名称</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="分类名" name="title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2">英文简称</label>
                                <input type="text" class="form-control" id="exampleInputName2" placeholder="英文简称" name="foreign_title">
                            </div>
                            <a href="Javascript:void(0)" onclick="typeSave()" class="btn btn-default">添加</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">

                        <div class="card-title">
                        <div class="title">列表区域</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>类型名</th>
                                    <th>英文简称</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody id="typelist">
                                @foreach($listCols as $cols)
                                <tr>
                                    <td>{{$cols->title}}</td>
                                    <td>{{$cols->foreign_title}}</td>
                                    <td>
                                        <a href="{{url('admin/type/edit',['id'=>$cols->id])}}" class="glyphicon glyphicon-edit">编辑</a>
                                        <a href="{{url('admin/type/del',['id'=>$cols->id])}}" class="glyphicon glyphicon-remove-circle">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{asset('admin')}}/js/card.js"></script>
<!-- 展示ajax -->
<script type="text/javascript">
    function typeSave(){
        $.ajax({
            url:'{{url("admin/type/add")}}',
            data:$('#typeform').serialize(),
            type:'get',
            dataType:'json',
            success:function(re){
                var id = re.data.id;
                var title = re.data.title;
                var foreign_title = re.data.foreign_title;
                var url = re.data.url;
                var item = '<tr><td>' + title + '</td><td>';
                var item = item + '<tr><td>' + foreign_title + '</td><td>';
                item = item + '<a href="' + url + '/edit/' + id + '" class="glyphicon glyphicon-edit">编辑</a><a href="' + url + '/del/' + id + '" class="glyphicon glyphicon-remove-circle">删除</a></td></tr>';
                $('#typelist').append(item);
            }
        });
    }
</script>
@endsection

