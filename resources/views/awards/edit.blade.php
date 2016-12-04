@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 main-content">
            <div class="box-header">
                <h3 class="text-center">编辑获奖项目</h3>
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
                    {!! Form::model($award, ['route' => ['awards.update', $award->id], 'method'=>'PUT', 'id' => 'submit-form']) !!}
                <table class="table table-bordered">
                    <tr>
                        <td class="table-label">获奖项目名称:</td>
                        <td>{!! Form::text('name_project', old('name_project'), ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">奖励年度:</td>
                        <td>{!! Form::text('date', old('date'), ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">奖项名称:</td>
                        <td>{!! Form::text('name', old('name'), ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">获奖等级:</td>
                        <td>{!! Form::text('ranking', old('ranking'), ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">授奖部门:</td>
                        <td>{!! Form::text('organization', old('organization'), ['class'=>'form-control']) !!}</td>
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
                            <button type="button" class="btn btn-primary cancel" href="{{route('projects.awards', $award->project_id)}}">确定离开</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
