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

    public function getData(Request $request)
    {
        if($request->has("pid")) {
            $items = Task::select(['id', 'name', 'readingOrder', 'created_at', 'updated_at'])->where("project_id", $request->input("pid"))->orderBy("readingOrder", "DESC");
        } else {
            $items = Task::select(['id', 'name', 'readingOrder', 'created_at', 'updated_at'])->orderBy("readingOrder", "DESC");
        }
//        return DataTables::of($items)->make(true);
        return DataTables::of($items)
            ->editColumn('created_at', function ($item) {
                return date("F j, Y H:i:s", strtotime($item->created_at));
            })
            ->addColumn('DT_RowId', function ($item) {
                return 'row_' . $item->id;
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        $resp = [];
        if($request->action == "edit") {

            if(count($request->data) > 1) {
                foreach($request->data as $k=>$v) {
                    $arrid = explode("_", $k);
                    $obj = Task::where("id", $arrid[1])->update(["readingOrder"=>$request->data[$k]["readingOrder"]]);
                    $resp["data"][] = array("DT_RowId" => $k, "readingOrder" => $request->data[$k]["readingOrder"]);
                }
            } else {
                $arrid = explode("_", key($request->data));
                $obj = Task::where("id", $arrid[1])->update(["name"=>$request->data[key($request->data)]["name"], "readingOrder"=>$request->data[key($request->data)]["readingOrder"]]);
                $resp["data"][] = array("DT_RowId" => key($request->data), "name"=>$request->data[key($request->data)]["name"], "readingOrder"=>$request->data[key($request->data)]["readingOrder"]);
            }
        }

        if($request->action == "remove") {
            $arrid = explode("_", key($request->data));
            $obj = Task::destroy($arrid[1]);
            $resp["data"][] = array("DT_RowId" => key($request->data), "name"=>$request->data[key($request->data)]["name"], "readingOrder"=>$request->data[key($request->data)]["readingOrder"]);
        }

        if($request->action == "create") {
            $data = $request->data[0];
            $obj = new Task();

            $obj->name = $data["name"];
            $obj->readingOrder = $data["readingOrder"];

            $obj->save();
            $resp["data"][] = array("DT_RowId" => key($request->data), "name"=>$request->data[key($request->data)]["name"], "readingOrder"=>$request->data[key($request->data)]["readingOrder"], "created_at"=>$obj->created_at);
        }

        return response()->json($resp);
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

