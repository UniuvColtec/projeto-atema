<?php

namespace App\Http\Controllers;

use App\Bootgrid;
use App\Models\Image;
use App\Models\Image_typical_foods;
use App\Models\Typical_food;
use App\Response;
use App\UploadHandler;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class TypicalFoodController extends Controller
{
    private $optionsUpload = array(
        'script_url' => '/admin/typical_food/uploadimage'
    );

    public function __construct(){
        $this->optionsUpload['upload_dir'] = base_path('public/' . env('FILE_UPLOAD')) . '/';
        $this->optionsUpload['upload_url'] = url(env('FILE_UPLOAD')) . '/';
    }
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('typical_food.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typical_food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typical_food= new Typical_food();
        $typical_food->name = $request->name;
        $typical_food->description = $request->description;
        $typical_food->save();
        if($request->images){
            foreach ($request->images as $image){
                $typical_food_image = new Image_Typical_foods();
                $typical_food_image->image_id = $image;
                $typical_food_image->typical_food_id = $typical_food->id;
                $typical_food_image->save();
            }
        }

        return Response::responseOK('Comida Típica cadastrada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Typical_food  $typical_food
     * @return \Illuminate\Http\Response
     */
    public function show(Typical_food $typical_food)
    {
        return view('typical_food.show', compact('typical_food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Typical_food  $typical_food
     * @return \Illuminate\Http\Response
     */
    public function edit(Typical_food $typical_food)
    {
        return view('typical_food.edit', compact('typical_food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Typical_food  $typical_food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Typical_food $typical_food)
    {
        $typical_food->name = $request->name;
        $typical_food->description = $request->description;
        $typical_food->save();
        return Response::responseOK('Alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Typical_food  $typical_food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typical_food $typical_food)
    {
        $typical_food_images = $typical_food->typical_food_image;
        if($typical_food->delete()) {
            foreach($typical_food_images as $typical_food_image){
                @unlink($this->optionsUpload['upload_dir'] . $typical_food_image->image->address);
                @unlink($this->optionsUpload['upload_dir'] . 'thumbnail/' . $typical_food_image->image->address);
                $image = Image::find($typical_food_image->image->id);
                $image->delete();
            }
            return Response::responseSuccess();
        } else {
            return Response::responseForbiden();
        }

    }
    public function bootgrid(Request $request)
    {
        $typical_foods = new Typical_food();
        $bootgrid = $typical_foods->bootgrid($request);
        return response()->json($bootgrid);
    }

    public function image()
    {
        return view('typical_food.image');
    }

    public function uploadImagePost($typical_food_id=null)
    {
        $upload_handler = new UploadHandler($this->optionsUpload, false);
        $return = $upload_handler->post(false, uniqid('typical_food-'));
        foreach ($return as &$itens){
            foreach($itens as &$item){
                $image = new Image();
                $image->address = $item->name;
                $image->save();
                $item->id = $image->id;

                if ($typical_food_id){
                    $image_typical_food = new Image_typical_foods();
                    $image_typical_food->typical_food_id = $typical_food_id;
                    $image_typical_food->image_id = $image->id;
                    $image_typical_food->save();
                }
            }
        }
        return $return;
    }
    public function uploadImageGet($typical_food_id=null)
    {
        if (!$typical_food_id) return;
        $return['files'] = [];

        $image_typical_foods = Image_typical_foods::where('typical_food_id', $typical_food_id)->get();
        foreach ($image_typical_foods as $image_typical_food){
            $return['files'][] = $this->uploadJsonGet($image_typical_food->image->address, $image_typical_food->id);
        }
        return json_encode($return);
    }
    public function uploadImageDelete($typical_food_id=null)
    {
        $upload_handler = new UploadHandler($this->optionsUpload, false);
        $return = $upload_handler->delete(false);
        foreach ($return as $item => $deleted){
            if ($deleted){
                $image = Image::where('address', $item)->first();
                if ($image) $image->delete();
            }
        }

        return ($return);
    }

    private function uploadJsonGet($imageName, $id){
        $jsonReturn = new \stdClass();

        $jsonReturn->deleteType = 'DELETE';
        $jsonReturn->deleteUrl = route('typical_food.uploadImageDelete') . "?file=" . $imageName;
        $jsonReturn->id = $id;
        $jsonReturn->name = $imageName;
        $jsonReturn->size = filesize($this->optionsUpload['upload_dir'] . $imageName);
        $jsonReturn->thumbnailUrl = url($this->optionsUpload['upload_url'] . 'thumbnail/' . $imageName);
        $jsonReturn->url = url($this->optionsUpload['upload_url'] . $imageName);

        return $jsonReturn;

    }

}
