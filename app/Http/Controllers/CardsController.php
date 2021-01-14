<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCardRequest;
use App\Models\cards;
use App\Models\residents;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardsController extends Controller
{
    //
    public function index()
    {

        /*$cards=cards::all();*/
        $cards=DB::table('cards')
            ->join('residents','cards.n_ID','=','residents.n_ID')
            ->orderBy('cards.id')
            ->select('cards.id',
                'cards.n_ID',
                'residents.p_name',
                'cards.p_time',
                'cards.status'
            )->get();
      return view('cards.index',['cards'=>$cards]);
    }

    public  function  api_cards()
    {
        return Cards::all();
    }

    public  function  api_update(Request $request)
    {
        $card = Card::find($request->input('id'));
        if ($card == null)
        {
            return response()->json([
                'status' =>0,
            ]);
        }
        $card->n_ID = $request->input('n_ID');
        $card->p_time = $request->input('p_time');
        $card->status = $request->input('status');

        if ($card->save())
        {
            return response()->json([
                'status' =>1,

            ]);
        }
        else
        {return  response()->json([
            'status' =>0,
        ]);
        }

    }
    public  function  api_delete(Request $request)
    {
        $card = Card::find($request->input('id'));

        if ($card == null)
        {
            return response()->json([
                'status' =>0,
            ]);
        }

        if ($card->delete())
        {
            return  response()->json([
                'status' =>1,
            ]);
        }
    }

    public function create()
    {
        $residents=DB::table('residents')
            ->select('residents.n_ID','residents.p_name')
            ->orderBy('residents.n_ID','asc')
            ->get();
        $data=[];
        foreach ($residents as $resident)
        {
            $data[$resident->n_ID]=$resident->p_name;
        }

        return view('cards.create',['residents'=>$data]);
    }
    public function edit($id)
    {
        $residents=DB::table('residents')
        ->select('residents.n_ID','residents.p_name')
        ->orderBy('residents.n_ID','asc')
        ->get();
        $data=[];
        foreach ($residents as $resident)
        {
            $data[$resident->n_ID]=$resident->p_name;
        }
    $card=cards::findOrFail($id);
    return view('cards.edit',['card'=>$card,'residents'=>$data]);
        /*
        $temp=cards::findOrFail($id);
        $cards=$temp->toArray();
        return view('cards.edit')->with([
            'id'=>$cards['id'],
            'n_ID'=>$cards['n_ID'],
            'p_time'=>$cards['p_time'],
            'status'=>$cards['status']]);

        $data=[];
        if ($id==5)
        {
            $data['cards_name']="123";
            $data['cards_time']="456";
            $data['cards_status']="789";
        }else
        {
            $data['cards_name']="123";
            $data['cards_time']="123";
            $data['cards_status']="123";
        }

        return view('cards.edit',$data);
        */
    }
    public function show($id)
    {
        $card=cards::findOrFail($id);
        return view('cards.show',['card'=>$card]);
        //$card=cards::findOrFail($id);
        //$resident=residents::findOrFail($id->n_ID);
        //return view('cards.show',['card'=>$card,'resident_name'=>$resident->p_name]);
        //$card=cards::findOrFail($n_ID);
        //$resident=residents::findOrFail($card->n_ID);
        //return view('cards.show',['card'=>$card,'resident_name'=>$resident->p_name]);


        /*
                if($id==5)
                {
                    $cards_name="123";
                    $cards_time="456";
                    $cards_status="789";
                }else
                {
                    $cards_name="123";
                    $cards_time="213";
                    $cards_status="2132";
                }
                return view('cards.show')->with (["name"=>$cards_name,"time"=>$cards_time,"status"=>$cards_status]);
               */
    }
    public function store(CreateCardRequest $request)
    {
        $n_ID=$request->input('n_ID');
        $p_time=$request->input('p_time');
        $status=$request->input('status');


        cards::create([
            'n_ID'=>$n_ID,
            'p_time'=>$p_time,
            'status'=>$status,
            'created_at'=>Carbon::now()
        ]);
        return redirect('cards');

    }
    public function update($id,CreateCardRequest $request)
    {
        $card=cards::findOrFail($id);
        $card->n_ID=$request->input('n_ID');
        $card->p_time=$request->input('p_time');
        $card->status=$request->input('status');
        $card->save();

        return redirect('cards');
    }
    public function destroy($id)
    {
        $card=cards::findOrFail($id);
        $card->delete();
        return redirect('cards');
    }
    public function enter()
    {
        $cards =cards::enter()->get();
        $n_IDs =cards::AllNid()->get();
        $data = [];
        foreach ($n_IDs as $n_ID)
        {
            $data["$n_ID->n_ID"] = $n_ID->n_ID;
        }
        return view('cards.index',['cards'=>$cards,'n_ID'=>$data]);
    }

}
