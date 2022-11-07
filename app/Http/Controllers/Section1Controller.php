<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Section1_name;
use Exception;

class Section1Controller extends Controller
{
    public function store(StoreSectionRequest $request) {
        try {

            $data = Section1_name::create([
                'name' => $request->input('name'),
                'birthdate' => $request->input('birthdate'),
                'created_at' => $request->input('created_at'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'new row added successfuly in section1',
                'data' => $data,
            ]);
        } catch(Exception $e) {
            return response()->json(['message' => 'Error: '.$e->getMessage()]);
        }
    }

    public function update(Request $request) {
        $row = Section1_name::find($request->id);
        if($row) {
            try {

                $row->update([
                    $request->cell_name => $request->cell_value
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'row updated successfuly in section1',
                ]);

            } catch(Exception $e) {
                return response()->json(['message' => 'Error: '.$e->getMessage()]);
            }
        }
        else {
            return response()->json(['message' => 'section1 row not found']);
        }
    }

    public function destroy(Request $request) {
        try {

            $section_row = Section1_name::find($request->id);
            if($section_row) {
                $section_row->delete();
                return response()->json([
                    'message' => 'section1 row deleted successfuly',
                    'id' => $request->id,
                ]);
            }
            else {
                return response()->json(['message' => 'section1 row not found']);
            }

        } catch(Exception $e) {
            return response()->json( ['message' => 'Error: '.$e->getMessage()]);
        }
    }
}
