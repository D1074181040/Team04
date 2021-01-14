<div class="form-group">
    {!! Form::label('n_ID','卡號:') !!}
    {!! Form::text('n_ID',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('p_name','住戶姓名:') !!}
    {!! Form::select('p_name',$residents,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('p_time','通行時間:') !!}
    {!! Form::date('p_time',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('status','狀態:') !!}
    {!! Form::text('status',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>
