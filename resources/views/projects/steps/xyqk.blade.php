@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 main-content">
            <div class="box-header">
                <h3 class="text-center">经济、社会效益</h3>
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
                {!! Form::model($project, ['route' => ['projects.steps.update', $project->id, $step->id], 'method'=>'PUT', 'id' => 'submit-form']) !!}
                <table class="table table-bordered">
                    <tr>
                        <td class="table-label">项目投资总额:</td>
                        <td>
                        <div class="col-md-6 input-col">{!! Form::text('xmztze', old('xmztze'), ['class'=>'form-control']) !!}</div>
                        <div class="col-md-6 input-col-info">万元(人民币)</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-label">回收期:</td>
                        <td>
                            <div class="col-md-6 input-col">{!! Form::text('hsq', old('hsq'), ['class'=>'form-control']) !!}</div>
                            <div class="col-md-6 input-col-info">年</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="table-label text-left">经济效益额的计算依据<code>(不超过200个汉字)</code>:</td>
                    </tr>
                    <tr>
                        <td colspan="2">{!! Form::textarea('jjxyjsyj', old('jjxyjsyj'), ['class'=>'form-control', 'rows'=>5]) !!}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="table-label text-left">社会效益:</td>
                    </tr>
                    <tr>
                        <td colspan="2">{!! Form::textarea('shxy', old('shxy'), ['class'=>'form-control', 'rows'=>5]) !!}</td>
                    </tr>
                </table>
                {!! Form::close() !!}
            </div>
            <div class="box-footer">
                <div class="footer-center">
{{--                    <a href="{{route('projects.steps.edit', ['project'=>$project->id, '5'])}}" class="btn btn-primary">下一步</a>--}}
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
