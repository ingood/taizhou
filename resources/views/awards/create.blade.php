<div class="panel panel-default create-panel {{$errors->any() ? 'show' : ''}}">
{{--<div class="panel panel-default create-panel show">--}}
    <!-- Default panel contents -->
    <div class="panel-heading">添加新的奖励情况</div>

        @if ($errors->any())
        <div class="panel-body create-error">
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        </div>
        @endif

    <!-- Table -->
    <table class="table">
        {!! Form::open(['route' => 'awards.store', 'id' => 'submit-form']) !!}
            <input type="hidden" name="project_id" value="{{$project->id}}" />
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
        {!! Form::close() !!}
    </table>
    <div class="box-footer">
        <div class="footer-center">
            <a href="#" class="btn btn-primary submit">保存</a>
            <button class="btn btn-default create-cancel">取消</button>
        </div>
    </div>
</div>