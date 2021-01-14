@extends('app')
@section('title','單一主戶資料')
@section('topic','顯示你所選取住戶的資料')
@section('contents')

卡號:{{$n_ID}}<br/>
姓名:{{$p_name}}<br/>
聯絡電話:{{$phone}}<br/>
性別:{{$gender}}<br/>
區域:{{$region}}<br/>
樓層:{{$floor}}<br/>
<table>
<tr>
    <th>編號</th>
    <th>卡號</th>
    <th>住戶姓名</th>
    <th>通行時間</th>
    <th>狀態</th>

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

    </tr>
    @endforeach
</table>
@endsection

