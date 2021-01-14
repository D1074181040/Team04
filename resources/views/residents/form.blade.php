<div class="form-group">
    {!! Form::label('n_ID','卡號:') !!}
    {!! Form::text('n_ID',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('p_name','姓名:') !!}
    {!! Form::text('p_name',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('phone','連絡電話:') !!}
    {!! Form::text('phone',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('gender','性別:') !!}
    {!! Form::text('gender',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('region','區域:') !!}
    {!! Form::text('region',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('floor','樓層:') !!}
    {!! Form::text('floor',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>
