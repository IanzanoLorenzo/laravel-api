<?php

namespace App\Http\Controllers\Api;

use App\Models\Lead;
use App\Mail\NewMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{  
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:50',
            'surname' => 'required|max:50',
            'email' => 'required|email',
            'message' => 'required|max:255'
        ],[
            '*.required' => 'Questo campo è obbligatorio.',
            '*.max' => 'Questo campo può contenere massimo :max caratteri.',
            'email.email' => 'La mail fornita non è valida'
        ] );

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $data = $request->all();

        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('info@boolfolio.com')->send(new NewMail($new_lead));

        return response()->json([
            'status' => true
        ]);
    }
}
