<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function addGifts() {

    $users = User::select('id', 'name')->get();

    return view('gifts.addgifts', compact('users'));
    }

    public function allGifts() {
        $gifts = Gift::join(
            'users',
            'users.id',
            '=',
            'gifts.user_id'
            )
        ->select(
            'gifts.id',
            'gifts.name',
            'gifts.expected_cost',
            'gifts.user_id',
            'gifts.actual_cost',
            'users.name as user_name')
            ->selectRaw(
                'IF(
                gifts.actual_cost IS NOT NULL,
                gifts.expected_cost - gifts.actual_cost,
                NULL
                )
                AS cost_difference'
                )
        ->get();

        return view('gifts.allgifts', compact('gifts'));
    }

    public function storeGifts(Request $request){

        $request->validate([
            'name' => 'required|string|max:50',
            'expected_cost' => 'required|numeric|min:0',
            'actual_cost' => 'nullable|numeric|min:0',
            'user_id' => 'required|exists:users,id'

        ]);
        Gift::insert([
        'name' => $request->name,
        'expected_cost' => $request->expected_cost,
        'actual_cost' => $request->actual_cost,
        'user_id' => $request->user_id,
    ]);

        return redirect()->route('gifts.all')
        ->with('message', 'Prenda adicionada com sucesso');
    }

    public function editGifts(int $id) {

    $giftInfo = Gift::where('id', $id)->firstOrFail();

    $users = User::all();

    return view('gifts.editgift', compact('giftInfo', 'users'));
    }

    public function deleteGifts(int $id)
    {
    $gift = Gift::findOrFail($id);

    $gift->delete();

    return redirect()->route('gifts.all')
        ->with('message', 'Prenda apagada com sucesso!');
    }

    public function updateGifts(Request $request, int $id)
    {
    $request->validate([
        'name' => 'required|string|max:50',
        'expected_cost' => 'required|numeric|min:0',
        'actual_cost' => 'nullable|numeric|min:0',
        'user_id' => 'required|exists:users,id'
    ]);

    $gift = Gift::findOrFail($id);

    $gift->name = $request->name;
    $gift->expected_cost = $request->expected_cost;
    $gift->actual_cost = $request->actual_cost;
    $gift->user_id = $request->user_id;

    $gift->save();

    return redirect()->route('gifts.all')
        ->with('message', 'Prenda atualizada com sucesso!');
    }


}

