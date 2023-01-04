<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\Image;
use App\Models\Image_banners;
use App\Response;
use App\UploadHandler;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    private $optionsUpload = array(
        'script_url' => '/admin/banner/uploadimage'
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
        return view('banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $banner = new Banner();
        $banner->save();

        if($request->images){
            foreach ($request->images as $image){
                $banner_image = new Image_banners();
                $banner_image->image_id = $image;
                $banner_image->banner_id = $banner->id;
                $banner_image->save();
            }

        }

        return Response::responseOK('Banner cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        $banner->save();
        return Response::responseOK('Alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner_images = $banner->banner_image;
        if($banner->delete()) {
            foreach($banner_images as $banner_image){
                @unlink($this->optionsUpload['upload_dir'] . $banner_image->image->address);
                @unlink($this->optionsUpload['upload_dir'] . 'thumbnail/' . $banner_image->image->address);
                $image = Image::find($banner_image->image->id);
                $image->delete();
            }
            return Response::responseSuccess();
        } else {
            return Response::responseForbiden();
        }

    }
    public function bootgrid(Request $request)
    {
        $banners = new Banner();
        $bootgrid = $banners->bootgrid($request);
        return response()->json($bootgrid);
    }

    public function image()
    {
        return view('banner.image');
    }

    public function uploadImagePost($banner_id=null)
    {
        $upload_handler = new UploadHandler($this->optionsUpload, false);
        $return = $upload_handler->post(false, uniqid('banner-'));
        foreach ($return as &$itens){
            foreach($itens as &$item){
                $image = new Image();
                $image->address = $item->name;
                $image->save();
                $image->imageCarrosel();
                $item->id = $image->id;

                if ($banner_id){
                    $image_banner= new Image_banners();
                    $image_banner->banner_id = $banner_id;
                    $image_banner->image_id = $image->id;
                    $image_banner->save();
                }
            }
        }
        return $return;
    }
    public function uploadImageGet($banner_id=null)
    {
        if (!$banner_id) return;
        $return['files'] = [];

        $image_banners = Image_banners::where('banner_id', $banner_id)->get();
        foreach ($image_banners as $image_banner){
            $return['files'][] = $this->uploadJsonGet($image_banner->image->address, $image_banner->id);
        }
        return json_encode($return);
    }
    public function uploadImageDelete($banner_id=null)
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
        $jsonReturn->deleteUrl = route('banner.uploadImageDelete') . "?file=" . $imageName;
        $jsonReturn->id = $id;
        $jsonReturn->name = $imageName;
        $jsonReturn->size = filesize($this->optionsUpload['upload_dir'] . $imageName);
        $jsonReturn->thumbnailUrl = url($this->optionsUpload['upload_url'] . 'thumbnail/' . $imageName);
        $jsonReturn->url = url($this->optionsUpload['upload_url'] . $imageName);

        return $jsonReturn;

    }
}
