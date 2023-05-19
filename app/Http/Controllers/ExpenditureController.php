<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ab = DB::table('expenditures')
            ->get();
        $imex = Item::all();
        $ex = Expenditure::all();
        return view('expenditure.create', compact('ex', 'imex'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


        //
        $ex = new Expenditure();
        $ex->expenditure_name = $request['expenditure_name'];
        $ex->expenditure_type = $request['expenditure_type'];
        $ex->expenditure_amount = $request['expenditure_amount'];
        $ex->item_id = $request['item_id'];
        $ex->user_id = auth()->user()->id;
        try {
            $ex->save();
            return redirect()->route('expenditure.index');
            //code...
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        // $ex = Expenditure::findOrFail($id);


        $ex = Expenditure::find($id);
        if ($user->id === $ex->user_id || Auth::user()->id == '1') {

            $itemEx = DB::table('expenditures')
                ->join('items', 'items.id', '=', 'expenditures.item_id')
                ->get();
            return view('expenditure.edit', compact('ex', 'itemEx'));
        } else {
            return \response()->json("can not show");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = Auth::user();
        // dd($user);
        $ex = Expenditure::findOrFail($id);
        if ($user->id == $ex->user_id || Auth::user()->id == '1') {

            $ex =  Expenditure::find($id);
            $ex->expenditure_name = $request['expenditure_name'];
            $ex->expenditure_type = $request['expenditure_type'];
            $ex->expenditure_amount = $request['expenditure_amount'];
            $ex->item_id = $request['item_id'];
            $ex->user_id = auth()->user()->id;
            try {
                $ex->save();
                return redirect()->route('expenditure.index');
                //code...
            } catch (\Throwable $th) {
                throw $th;
            }
        } else {
            return \response()->json("can not Updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        // dd($user);
        $ex = Expenditure::findOrFail($id);
        if ($user->id == $ex->user_id || Auth::user()->id == '1') {

            Expenditure::find($id)->delete();
            return redirect()->route('expenditure.index');
        } else {
            return \response()->json("can not Deleted");
        }

        //
    }
}
