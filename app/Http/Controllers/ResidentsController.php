<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateResidentRequest;
use App\Models\cards;
use App\Models\residents;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class ResidentsController extends Controller
{
    //
    public function create()
    {

        return view('residents.create');
    }

    public function show($id)
    {
        $temp=residents::findOrFail($id);
        $residents=$temp->toArray();
        return view('residents.show',$residents);

    }

    public function edit($id)
    {

        $resident=residents::findOrFail($id);
        return view('residents.edit',['resident'=>$resident]);
    }
    public function index()
        {
            $residents=residents::all();
            $regions = residents::AllRegions()->get();
            $data = [];
            foreach ($regions as $region)
            {
                $data["$region->region"] = $region->region;
            }
            return view('residents.index',['residents'=>$residents, 'regions'=>$data]);
        }
        public function  api_residents()
        {
            return Resident::all();

        }
        public  function api_update(Request $request)
        {
            $resident = Resident::find($request->input('id'));
            if  ($resident ==null)
            {
                return response()->json([
                   'status' => 0,
                ]);
            }
            $resident->n_ID = $request->input('n_ID');
            $resident->p_name = $request->input('p_name');
            $resident->phone = $request->input('phone');
            $resident->gender = $request->input('gender');
            $resident->region = $request->input('region');
            $resident->floor = $request->input('floor');
            if ($resident->save())
            {
                return  response()->json([
                    'status' => 1,
                ]);
            }else{
                return response()->json([
                    'status' => 0,
                ]);
            }
        }
    public  function api_delete(Request $request)
    {
        $resident = Resident::find($request->input('id'));
        if ($resident ==null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }
         if ($resident->delete()){
             return response()->json([
                 'status' => 0,
             ]);
        }
    }
    public function store(CreateResidentRequest $request)
    {
        $n_ID=$request->input('n_ID');
        $p_name=$request->input('p_name');
        $phone=$request->input('phone');
        $gender=$request->input('gender');
        $region=$request->input('region');
        $floor=$request->input('floor');


        residents::create([
            'n_ID'=>$n_ID,
            'p_name'=>$p_name,
            'phone'=>$phone,
            'gender'=>$gender,
            'region'=>$region,
            'floor'=>$floor,
            'created_at'=>Carbon::now()
        ]);
        return redirect('residents');

    }
    public function update($id,CreateResidentRequest $request)
    {
        $resident=residents::findOrFail($id);
        $resident->n_ID=$request->input('n_ID');
        $resident->p_name=$request->input('p_name');
        $resident->phone=$request->input('phone');
        $resident->gender=$request->input('gender');
        $resident->region=$request->input('region');
        $resident->floor=$request->input('floor');
        $resident->save();
        return redirect('residents');
    }
    public function destroy($id)
    {
        $resident=residents::findOrFail($id);
        $resident->delete();
        return redirect('residents');
    }
    public function male()
    {
        $residents =residents::male()->get();
        $regions = residents::AllRegions()->get();
        $data = [];
        foreach ($regions as $region)
        {
            $data["$region->region"] = $region->region;
        }
        return view('residents.index',['residents'=>$residents, 'regions'=>$data]);
    }
    public function female()
    {
        $residents =residents::female()->get();
        $regions = residents::AllRegions()->get();
        $data = [];
        foreach ($regions as $region)
        {
            $data["$region->region"] = $region->region;
        }
        return view('residents.index',['residents'=>$residents, 'regions'=>$data]);
    }
    public function region(Request $request)
    {
        $residents=residents::region($request->input('reg'))->get();
        $regions = residents::AllRegions()->get();
        $data = [];
        foreach ($regions as $region)
        {
            $data["$region->region"] = $region->region;
        }
        return view('residents.index',['residents'=>$residents, 'regions'=>$data]);
    }
}

