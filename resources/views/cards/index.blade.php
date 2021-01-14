@extends('app')
@section('title','卡片資料')
@section('contents')
@section('topic','顯示所有卡片的資料')
<p align="center"><a href="{{ route('cards.create')}}" class="ml-1 underline">新增卡片資料</a><br/>
    <a href="{{ route('cards.enter')}}"> 進入卡片 </a>
<table boader="1"align="center"cellpadding="4">
    <tr>
        <th>編號</th>
        <th>卡號</th>
        <th>住戶姓名</th>
        <th>通行時間</th>
        <th>狀態</th>
        <th>操作1</th>
        <th>操作2</th>
        <th>操作3</th>
    </tr>
    @foreach($cards as $card)
        <tr>
            <td>{{$card->id}}</td>
            <td>{{$card->n_ID}}</td>
            <td>{{$card->p_name}}</td>
            <td>{{$card->p_time}}</td>

            <td>
                @if($card->status=='進入')
                    <p style="color: blue;">
                @else
                    <p style="color: red;">
                @endif
                    {{$card->status}}
                    </p>
            </td>
                    <td><a href="{{ route('cards.show',['id'=>$card->id])}}">顯示</a></td>
                    <td><a href="{{ route('cards.edit',['id'=>$card->id])}}">修改</a></td>
            <td>
                <form action="{{url('/cards/delete',['id'=>$card->id])}}"method="post">
                    <input class="btn btn-default"type="submit"value="刪除"/>
                    @method('delete')
                    @csrf
                </form>
            </td>

        </tr>
    @endforeach
</table>

@endsection

