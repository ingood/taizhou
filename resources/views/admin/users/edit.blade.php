@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 main-content">
            <div class="box-header">
                <div class="col-md-6"><h3>编辑用户信息</h3></div>
                <div class="col-md-6"></div>
            </div>
            <div class="box-content">

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <!--- Form Field --->
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method'=>'PUT', 'id' => 'submit-form']) !!}
                <table class="table table-bordered">
                    <tr>
                        <td class="table-label">申报单位:</td>
                        <td>{!! Form::select('corporation_id', $corporations, old('corporation_id'), ['placeholder' => '请选择单位名称', 'class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">登录用户名:</td>
                        <td>{!! Form::text('username', old('email'), ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">登录密码:</td>
                        <td>{!! Form::password('password', ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">确认密码:</td>
                        <td>{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">联系人姓名:</td>
                        <td>{!! Form::text('name', old('name'), ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">联系电话:</td>
                        <td>{!! Form::text('cellphone', old('cellphone'), ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">所属用户组:</td>
                        <td>
                            @foreach($roles as $value => $name)
                                <label class="radio-inline">
                                    {!! Form::radio('role_id', $value, old('role_id')==$value||$user->roles->first()->id==$value?true:false) !!}{{$name}}
                                </label>
                            @endforeach
                        </td>
                    </tr>
                </table>
                {!! Form::close() !!}
            </div>
            <div class="box-footer">
                <div class="footer-center">
                    <a href="#" class="btn btn-primary submit">保存</a>
                    <a href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal">取消</a>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">确认离开此页面吗?</h4>
                        </div>
                        <div class="modal-body">
                            如果离开此页面, 您将丢失尚未保存的内容。
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                            <button type="button" class="btn btn-primary cancel" href="{{route('users.index')}}">确定离开</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
