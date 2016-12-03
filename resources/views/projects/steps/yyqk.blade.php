@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 main-content">
            <div class="box-header">
                <h3 class="text-center">应用情况</h3>
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
                        <td class="table-label text-left">应用情况:<code>(不超过800个汉字)</code>:</td>
                    </tr>
                    <tr>
                        <td>{!! Form::textarea('yyqk', old('yyqk'), ['class'=>'form-control', 'rows'=>10]) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label text-left">成果转化、推广或产业化方面还需帮助解决的问题:</td>
                    </tr>
                    <tr>
                        <td>{!! Form::textarea('xjjwt', old('xjjwt'), ['class'=>'form-control', 'rows'=>8]) !!}</td>
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
