<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Machinetype;
use App\Models\Productiondepartment;
use App\Models\Site;
use Illuminate\Support\Facades\Validator;

class ItemsController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $itemsList = Item::with('machineType')->with('departmentType')->get();
        return view('admin.items.itemslist',compact('itemsList'));
    }  

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function viewList(Request $request, $id) {

        $itemsDetails = Item::with('machineType')->with('departmentType')->with('siteType')->find($id);
        
        return view('admin.items.itemview',compact('itemsDetails'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function additem(Request $request) {

        $machinetypeList = Machinetype::all();
        $departmentList = Productiondepartment::all();
        $siteList = Site::all();

        return view('admin.items.itemadd',compact('machinetypeList','departmentList','siteList'));
    }


     /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request) {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'item_no' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'status' => 400,
                'errorType' => 'validation',
                'messages' => $validator->getMessageBag()
            ]);
        } else {

            $itemArray = [
                'name' => $request->name,
                'item_no' => $request->item_no,
                'machine_type_id' => $request->machine_type,
                'department_id' => $request->department_id,
                'site_id' => $request->site_id,
                'setup_time' => $request->setup_time,
                'output_per_hours' => $request->output_pe_hour,
            ];

            $itemArrayInsert = Item::create($itemArray);

            return response()->json([
                'status' => 200,
                'messages' => "Item added successfully!"
            ]);
        }

    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Request $request, $id) {

        $getItemDetails = Item::with('machineType')->with('departmentType')->with('siteType')->find($id);
        
        return view('admin.items.itemedit',compact('itemsDetails'));
    }




     /**
     * Write code on Method
     *
     * @return response()
     */
    public function  deleteitem(Request $request) {
        $item_id = $request->id;

        $item=Item::find($item_id);

        $return = $item->delete(); //returns true/false

        if($return == true){
            return response()->json([
                'status' => 200,
                'message' => 'Deleted'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Not delete'
            ]);
        }
        
    }

   

}
