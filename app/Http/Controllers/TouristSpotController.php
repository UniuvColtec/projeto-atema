<?php

namespace App\Http\Controllers;
set_time_limit(10);
use App\Models\City;
use App\Models\Image;
use App\Models\Image_tourist_spots;
use App\Models\Tourist_spot;
use App\Response;
use App\UploadHandler;
use Illuminate\Http\Request;
use App\Http\Requests\TouristSpotRequest;
use \Intervention\Image\Facades\Image as Img;

class TouristSpotController extends Controller
{
    private $optionsUpload = array(
        'script_url' => '/admin/tourist_spot/uploadimage'
    );

    public function __construct(){
        $this->optionsUpload['upload_dir'] = base_path('public/' . env('FILE_UPLOAD')) . '/';
        $this->optionsUpload['upload_url'] = url(env('FILE_UPLOAD')) . '/';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tourist_spot = Tourist_Spot::all();
        return view('tourist_spot.index', compact('tourist_spot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::orderBy('name')->get(['id', 'name']);
        return view('tourist_spot.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TouristSpotRequest $request)
    {
        $tourist_spot = new Tourist_spot();
        $tourist_spot->city_id = $request->cities;
        $tourist_spot->name = $request->name;
        $tourist_spot->description= $request->description;
        $tourist_spot->address = $request->address;
        $tourist_spot->district = $request->district;
        $tourist_spot->getCoordinates($request->localization);
        $tourist_spot->save();
        if($request->images){
            foreach ($request->images as $image){
                $tourist_spot_image = new Image_tourist_spots();
                $tourist_spot_image->image_id = $image;
                $tourist_spot_image->tourist_spot_id = $tourist_spot->id;
                $tourist_spot_image->save();

            }
        }
        return Response::responseOK('Ponto Turistico cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tourist_spot  $tourist_spot
     * @return \Illuminate\Http\Response
     */
    public function show(Tourist_spot $tourist_spot)
    {
        return view('tourist_spot.show', compact('tourist_spot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tourist_spot  $tourist_spot
     * @return \Illuminate\Http\Response
     */
    public function edit(Tourist_spot $tourist_spot)
    {
        $cities = City::orderBy('name')->get(['id', 'name']);
        return view('tourist_spot.edit', compact('tourist_spot','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tourist_spot  $tourist_spot
     * @return \Illuminate\Http\Response
     */
    public function update(TouristSpotRequest $request, Tourist_spot $tourist_spot)
    {
        $tourist_spot->name = $request->name;
        $tourist_spot->city_id = $request->cities;
        $tourist_spot->description= $request->description;
        $tourist_spot->address = $request->address;
        $tourist_spot->district = $request->district;
        if($request->localization != ''){
            $tourist_spot->getCoordinates($request->localization);
        }
        $tourist_spot->save();
        return Response::responseOK('Alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tourist_spot  $tourist_spot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tourist_spot $tourist_spot)
    {
        $tourist_spot_images = $tourist_spot->tourist_spot_image;
        if($tourist_spot->delete()) {
            foreach($tourist_spot_images as $tourist_spot_image){
                @unlink($this->optionsUpload['upload_dir'] . $tourist_spot_image->image->address);
                @unlink($this->optionsUpload['upload_dir'] . 'thumbnail/' . $tourist_spot_image->image->address);
                $image = Image::find($tourist_spot_image->image->id);
                $image->delete();
            }
            return Response::responseSuccess();
        } else {
            return Response::responseForbiden();
        }

    }
    public function bootgrid(Request $request)
    {
        $tourist_spots = new Tourist_spot();
        $bootgrid = $tourist_spots->bootgrid($request);
        return response()->json($bootgrid);
    }

    public function image()
    {
        return view('tourist_spot.image');
    }

    public function uploadImagePost($tourist_spot_id=null)
    {
        $upload_handler = new UploadHandler($this->optionsUpload, false);
        $return = $upload_handler->post(false, uniqid('tourist_spot-'));
        foreach ($return as &$itens){
            foreach($itens as &$item){
                $image = new Image();
                $image->address = $item->name;
                $image->save();
                $image->imageCarrosel();
                $item->id = $image->id;

                if ($tourist_spot_id){
                    $image_tourist_spot = new Image_tourist_spots();
                    $image_tourist_spot->tourist_spot_id = $tourist_spot_id;
                    $image_tourist_spot->image_id = $image->id;
                    $image_tourist_spot->save();
                }
            }
        }
        return $return;
    }
    public function uploadImageGet($tourist_spot_id=null)
    {
        if (!$tourist_spot_id) return;
        $return['files'] = [];

        $image_tourist_spots = Image_tourist_spots::where('tourist_spot_id', $tourist_spot_id)->get();
        foreach ($image_tourist_spots as $image_tourist_spot){
            $return['files'][] = $this->uploadJsonGet($image_tourist_spot->image->address, $image_tourist_spot->id);
        }
        return json_encode($return);
    }
    public function uploadImageDelete($tourist_spot_id=null)
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
        $jsonReturn->deleteUrl = route('tourist_spot.uploadImageDelete') . "?file=" . $imageName;
        $jsonReturn->id = $id;
        $jsonReturn->name = $imageName;
        $jsonReturn->size = filesize($this->optionsUpload['upload_dir'] . $imageName);
        $jsonReturn->thumbnailUrl = url($this->optionsUpload['upload_url'] . 'thumbnail/' . $imageName);
        $jsonReturn->url = url($this->optionsUpload['upload_url'] . $imageName);

        return $jsonReturn;

    }

}
