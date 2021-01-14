@extends('app')
@section('title','住戶資料')
@section('contents')
@section('topic','顯示所有住戶的資料')
<p align="center"><a href="{{ route('residents.create')}}" class="ml-1 underline">新增住戶資料</a><br/>
    <a href="{{ route('residents.male')}}"> 男性住戶 </a>
    <a href="{{ route('residents.female')}}"> 女性住戶 </a>

<form action="{{url('residents/region')}}"method='POST'>
    {!! Form::label('reg','選取區域:') !!}
    {!! Form::select('reg',$regions,['class'=>'form-control']) !!}
    <input class="btn btn-default" type="submit" value="查詢"/>
    @csrf
</form>
<table boader="1"align="center"cellpadding="4">
    <tr>
        <th>編號</th>
        <th>卡號</th>
        <th>姓名</th>
        <th>連絡電話</th>
        <th>性別</th>
        <th>區域</th>
        <th>樓層</th>
        <th>操作1</th>
        <th>操作2</th>
        <th>操作3</th>
    </tr>
    @foreach($residents as $resident)
        <tr>
            <td>{{$resident->id}}</td>
            <td>{{$resident->n_ID}}</td>
            <td>{{$resident->p_name}}</td>
            <td>{{$resident->phone}}</td>
            <td>
                @if($resident->gender=='男')
                    <p style="color: blue;">
                @else
                    <p style="color: red;">
                        @endif
                        {{$resident->gender}}
                    </p>
            </td>
            <td>{{$resident->region}}</td>
            <td>{{$resident->floor}}</td>
                    <td><a href="{{ route('residents.show',['id'=>$resident->id])}}">
                            顯示
                        </a></td>
                    <td><a href="{{ route('residents.edit',['id'=>$resident->id])}}">
                            修改
                        </a></td>
                    <td>
                        <form action="{{url('/residents/delete',['id'=>$resident->id])}}"method="post">
                            <input class="btn btn-default"type="submit"value="刪除"/>
                            @method('delete')
                            @csrf
                        </form>
                    </td>
        </tr>
    @endforeach
</table>
@endsection
