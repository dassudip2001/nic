<?php

namespace App\Http\Controllers\ItemGroup;

use App\Http\Controllers\Controller;
use App\Models\ItemGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = ItemGroup::all();
        return view('itemGroup.create', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $item = new ItemGroup();
        $item->itemGroupName = $request['itemGroupName'];
        $item->itemGroupDescription = $request['itemGroupDescription'];
        $item->user_id = auth()->user()->id;
        try {
            $item->save();
            return redirect()->route('item-group.create');
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


        $ex = ItemGroup::find($id);
        if ($user->id === $ex->user_id || Auth::user()->id == '1') {

            $item = ItemGroup::find($id);
            return view('itemGroup.edit', compact('item'));
        } else {
            return response()->json("you cannot view");
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
        // $ex = Expenditure::findOrFail($id);


        $ex = ItemGroup::find($id);
        if ($user->id === $ex->user_id || Auth::user()->id == '1') {

            $item = ItemGroup::find($id);
            $item->itemGroupName = $request['itemGroupName'];
            $item->itemGroupDescription = $request['itemGroupDescription'];
            $item->user_id = auth()->user()->id;

            try {
                //code...
                $item->save();
                return  redirect()->route('item-group.index');
            } catch (\Throwable $th) {
                throw $th;
            }
        } else {
            return response()->json("you cannot edit");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        // $ex = Expenditure::findOrFail($id);


        $ex = ItemGroup::find($id);
        if ($user->id === $ex->user_id || Auth::user()->id == '1') {

            ItemGroup::find($id)->delete();
            return redirect()->route('item-group.index');
        } else {
            return response()->json("you cannot delete");
        }
    }
}
