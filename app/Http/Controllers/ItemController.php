<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imGroup = ItemGroup::all();
        $im = Item::all();
        return view('item.create', compact('im', 'imGroup'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $im = new Item();
        $im->itemName = $request['itemName'];
        $im->itemCode = $request['itemCode'];
        $im->itemDescription = $request['itemDescription'];
        $im->itemGroupId = $request['itemGroupId'];
        $im->user_id = auth()->user()->id;
        try {
            $im->save();
            return redirect()->route('item.create');
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


        $ex = Item::find($id);
        if ($user->id === $ex->user_id || Auth::user()->id == '1') {

            $im = Item::find($id);
            $imgroup = DB::table('items')
                ->join('item_groups', 'item_groups.id', '=', 'items.itemGroupId')
                ->get();
            return view('item.edit', compact('im', 'imgroup'));
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        // $ex = Expenditure::findOrFail($id);


        $ex = Item::find($id);
        if ($user->id === $ex->user_id || Auth::user()->id == '1') {

            $im = Item::find($id);
            $im = new Item();
            $im->itemName = $request['itemName'];
            $im->itemCode = $request['itemCode'];
            $im->itemDescription = $request['itemDescription'];
            $im->itemGroupId = $request['itemGroupId'];
            $im->user_id = auth()->user()->id;
            try {
                $im->save();
                return redirect()->route('item.index');
                //code...
            } catch (\Throwable $th) {
                throw $th;
            }
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        // $ex = Expenditure::findOrFail($id);


        $ex = Item::find($id);
        if ($user->id === $ex->user_id || Auth::user()->id == '1') {

            Item::find($id)->delete();
            return redirect()->route('item.index');
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        //
    }
}
