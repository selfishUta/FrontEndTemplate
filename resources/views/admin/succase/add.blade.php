@extends('layouts/admin')
@section('container')         
<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title">添加成功案例</span>
            <div class="description">请认真填写</div>
        </div>
        <form action="{{url('admin/succase/add')}}" method="post" enctype="multipart/form-data">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="sub-title">成功案例标题</div>
                        <div>
                            <input type="text" class="form-control" name="title" placeholder="标题" value="{{old('title')}}">
                            <span style="color:red">{{$errors->first('title') ?? ''}}</span>
                        </div>

                        
                        <div class="sub-title">成功案例网址</div>
                        <div>
                            <input type="url" class="form-control" name="url" placeholder="主页网址" value="{{old('url')}}">
                            <span style="color:red">{{$errors->first('url') ?? ''}}</span>
                        </div>

                        <div class="sub-title">类型</div>
                        <select name="typeid">
                            @foreach($typeCols as $v)
                            <option value="{{$v->id}}">{{$v->title}}</option>
                            @endforeach
                        </select>
                        <span style="color:red">{{$errors->first('typeid') ?? ''}}</span> 

                        <div class="sub-title">图片</div>
                        <div>
                            <input type="file" name="image">
                        </div>
                        <span style="color:red">{{session()->get('message') ?? ''}}</span>
                        <div class="sub-title">案例描述</div>
                        <div>
                            <textarea class="form-control" rows="3" name="description">{{old('description')}}</textarea>
                            <span style="color:red">{{$errors->first('description') ?? ''}}</span>
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

