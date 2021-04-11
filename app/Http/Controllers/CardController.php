<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Validator;

use App\Card;
use Str;

class CardController extends Controller

{

    /**

     * Show the application ajaxImageUpload.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $card=Card::all();
		
        return view('user',compact('card'));

    }


    public function store(Request $request)

    {  $validator = Validator::make($request->all(), [
             'uname' => 'unique:cards',
             ]);

              
       
 if ($validator->passes()) {
     $input = $request->all();
        
        $input['image'] = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $input['image']);

         $input['slug']=str_slug($request->uname);
		 
        $data=Card::create($input);
        
         //$data;
		 //dd($data);
        return response()->json(['success'=>'done','data'=>$data]);
 }
      return Response::json(['errors' => $validator->errors()]);
    	                   }
	  
	  public function edit($id)

    {

        $card=Card::findOrFail($id);
		
        return view('edit',compact('card'));

    }
	public function update(Request $request,$id)

    {  
	$input = $request->all();
	if(request()->hasFile('image')){
        $input['image'] = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $input['image']);
    }   
	
	$card=Card::findOrFail($id);

    $card->update($input);
        return back();

      }
public function show($id)

    {

        $card=Card::where('slug',$id)->first();
		
        return view('show',compact('card'));

    }

}