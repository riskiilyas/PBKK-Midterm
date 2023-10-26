<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Item;
use App\Models\ItemType;
use Encryption\Encryption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Condition;

class UploadController extends Controller
{
    public function store(Request $request) {
        // dd($request);
        // Validate the input
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:jpg,jpeg,png', // Specify the file validation rules
            'types' => 'required|string',
            'conditions' => 'required|string',
            'name' => 'required|string',
            'desc' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get the uploaded file
        $uploadedFile = $request->file('file');
        // Generate a unique filename for the image
        $filename = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
        // Store the uploaded image in the storage directory
        $path = $uploadedFile->storeAs('public/uploads', $filename);

        $item = new Item();
        $item->img = $path; // Store the file path in your item model
        $item->name = $request->input('name');
        $item->desc = $request->input('desc');
        $item->defects = $request->input('defects');
        $item->amount = $request->input('amount');

        // Find the Type by name and set the type_id
        $type = ItemType::firstOrCreate(['name' => $request->input('types')]);
        $item->type_id = $type->id;

        // Find the Condition by name and set the condition_id
        $condition = Condition::firstOrCreate(['name' => $request->input('conditions')]);
        $item->condition_id = $condition->id;

        $item->save();

        return redirect()->intended('/upload')->with('success', 'Berhasil Upload');
    }
}
