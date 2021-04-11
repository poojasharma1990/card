<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Validator;

use App\Testing;


class AjaxImageUploadController extends Controller

{

    /**

     * Show the application ajaxImageUpload.

     *

     * @return \Illuminate\Http\Response

     */

    public function ajaxImageUpload()

    {

        return view('ajaxImageUpload');

    }


    /**

     * Show the application ajaxImageUploadPost.

     *

     * @return \Illuminate\Http\Response

     */

    public function ajaxImageUploadPost(Request $request)

    {  //dd($request);

     $input = $request->all();
        
        $input['image'] = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $input['image']);


        Testing::create($input);
        

        return response()->json(['success'=>'done']);

      


      return response()->json(['error'=>$validator->errors()->all()]);

    }

}