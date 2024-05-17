<?php

// app/Http/Controllers/ItemController.php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ItemController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $items = Item::orderBy('order')->get();
            return Datatables::of($items)
                ->addIndexColumn()
                ->make(true);
        }

        return view('items.index');
    }

    public function updateOrder(Request $request)
    {
        $items = $request->items;

        foreach ($items as $order => $id) {
            $item = Item::find($id);
            $item->order = $order + 1;
            $item->save();
        }

        return response('Update successful.', 200);
    }
}

