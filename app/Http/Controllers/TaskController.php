<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class TaskController extends Controller
{
    public function index()
    {
        try {
            $data['active_class']  = "task-class";
            $data['page'] = "Task - Home";
            $data['title']  = "Task";

            $stockData    = Task::orderBy('created_at', 'DESC')->get();
            $data['taskData']  = $stockData;

            return view('task',$data);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function getData()
    {
        $items = Task::select(['id', 'name', 'readingOrder', 'created_at', 'updated_at']);
//        return DataTables::of($items)->make(true);
        return DataTables::of($items)
            ->editColumn('created_at', function ($item) {
                return strtotime($item->created_at);
            })
            ->addColumn('DT_RowId', function ($item) {
                return 'row_' . $item->id;
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        if($request->action == "edit") {
            $arrid = explode("_", key($request->data));
            $obj = Task::where("id", $arrid[1])->update(["name"=>$request->data[key($request->data)]["name"], "readingOrder"=>$request->data[key($request->data)]["readingOrder"]]);
        }

        if($request->action == "remove") {
            $arrid = explode("_", key($request->data));
            $obj = Task::destroy($arrid[1]);
        }

        if($request->action == "create") {
            $data = $request->data[0];
            $obj = new Task();

            $obj->name = $data["name"];
            $obj->readingOrder = $data["readingOrder"];

            $obj->save();
        }

        return response()->json($obj);
    }

    public function update(Request $request, $id)
    {
        $item = Task::findOrFail($id);
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = Task::destroy($id);
        return response()->json($item);
    }
}

