<?php

namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\Image_partners;
use App\Http\Requests\PartnerRequest;
use App\Models\City;
use App\Models\Partner;
use App\Models\Partner_type;
use App\Response;
use App\UploadHandler;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    private $optionsUpload = array(
        'script_url' => '/admin/partner/uploadimage'
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
        return view('partner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::orderBy('name')->get(['id', 'name']);
        $partner_types = Partner_type::orderBy('name')->get(['id', 'name']);
        return view('partner.create', compact('partner_types', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
    {


        $partner = new Partner();
        if ( !$partner->validar_cnpj($request->cnpj)){
        return Response::responseError("Cnpj inválido");
        }
        $partner->name = $request->name;
        $partner->cnpj = $request->cnpj;
        $partner->email = $request->email;
        $partner->partner_type_id = $request->partner_type_id;
        $partner->site = $request->site;
        $partner->city_id = $request->cities;
        $partner->telephone = $request->telephone;
        $partner->address = $request->address;
        $partner->getCoordinates($request->localization);
        $partner->description = $request->description;
        $partner->district = $request->district;
        //upload da logo
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $requestlogo = $request->logo;
            $logoname = md5($requestlogo->getClientOriginalName() . strtotime("now")) . "." . $requestlogo->extension();
            $requestlogo->move(public_path(Partner::PARTNER_LOGO), $logoname);
            $partner->logo = $logoname;
        }
        $partner->save();
        if($request->images){
            foreach ($request->images as $image){
                $partner_image = new Image_partners();
                $partner_image->image_id = $image;
                $partner_image->partner_id = $partner->id;
                $partner_image->save();
            }

        }


        return Response::responseOK('Parceiro cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return view('partner.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        $cities = City::orderBy('name')->get(['id', 'name']);
        $partner_type = Partner_type::orderBy('name')->get(['id', 'name']);
        return view('partner.edit', compact('partner', 'partner_type', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerRequest $request, Partner $partner)
    {
        $partner->name = $request->name;
        $partner->email = $request->email;
        $partner->cnpj = $request->cnpj;
        $partner->description = $request->description;
        $partner->partner_type_id = $request->partner_type_id;
        $partner->site = $request->site;
        $partner->city_id = $request->cities;
        $partner->telephone = $request->telephone;
        $partner->address = $request->address;
        $partner->district = $request->district;
        if ($request->localization != '') {
            $partner->getCoordinates($request->localization);
        }

        $partner->save();
        return Response::responseOK('Alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner_images = $partner->partner_image;
        if($partner->delete()) {
            foreach($partner_images as $partner_image){
                @unlink($this->optionsUpload['upload_dir'] . $partner_image->image->address);
                @unlink($this->optionsUpload['upload_dir'] . 'thumbnail/' . $partner_image->image->address);
                $image = Image::find($partner_image->image->id);
                $image->delete();
            }
            return Response::responseSuccess();
        } else {
            return Response::responseForbiden();
        }

    }
    public function bootgrid(Request $request)
    {
        $partners = new Partner();
        $bootgrid = $partners->bootgrid($request);
        return response()->json($bootgrid);
    }

    public function image()
    {
        return view('partner.image');
    }

    public function uploadImagePost($partner_id=null)
    {
        $upload_handler = new UploadHandler($this->optionsUpload, false);
        $return = $upload_handler->post(false, uniqid('partner-'));
        foreach ($return as &$itens){
            foreach($itens as &$item){
                $image = new Image();
                $image->address = $item->name;
                $image->save();
                $item->id = $image->id;

                if ($partner_id){
                    $image_partner= new Image_partners();
                    $image_partner->partner_id = $partner_id;
                    $image_partner->image_id = $image->id;
                    $image_partner->save();
                }
            }
        }
        return $return;
    }
    public function uploadImageGet($partner_id=null)
    {
        if (!$partner_id) return;
        $return['files'] = [];

        $image_partners = Image_partners::where('partner_id', $partner_id)->get();
        foreach ($image_partners as $image_partner){
            $return['files'][] = $this->uploadJsonGet($image_partner->image->address, $image_partner->id);
        }
        return json_encode($return);
    }
    public function uploadImageDelete($partner_id=null)
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
        $jsonReturn->deleteUrl = route('partner.uploadImageDelete') . "?file=" . $imageName;
        $jsonReturn->id = $id;
        $jsonReturn->name = $imageName;
        $jsonReturn->size = filesize($this->optionsUpload['upload_dir'] . $imageName);
        $jsonReturn->thumbnailUrl = url($this->optionsUpload['upload_url'] . 'thumbnail/' . $imageName);
        $jsonReturn->url = url($this->optionsUpload['upload_url'] . $imageName);

        return $jsonReturn;

    }

}
