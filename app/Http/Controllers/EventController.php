<?php

namespace App\Http\Controllers;
set_time_limit(10);

use App\Http\Requests\EventRequest;
use App\Models\Category;
use App\Models\Event;
use App\Models\City;
use App\Models\Event_category;
use App\Models\Image;
use App\Models\Image_events;
use App\Models\Partner;
use App\Models\Typical_event_food;
use App\Models\Typical_food;
use App\Response;
use App\UploadHandler;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Intervention\Image\Facades\Image as Img;

class EventController extends Controller
{
    private $optionsUpload = array(
        'script_url' => '/admin/event/uploadimage'
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
        return view('event.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $typical_foods = Typical_food::all();
        $categories = Category::all();
        $todays_date = date('Y-m-d\TH:i:s');
        return view('event.create', compact('cities','typical_foods','categories','todays_date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        if ($request->cities == 0) {
            return Response::responseError('Não foi selecionada nenhuma cidade');
        }
        $event= new Event();
        $event->name = $request->name;
        $event->subtitle = $request->subtitle;
        $event->description = $request->description;
        $event->contact = $request->contact;
        $event->website = $request->website;
        $event->start_date = $request->start_date;
        $event->final_date = $request->final_date;
        $event->address = $request->address;
        $event->district= $request->district;
        $event->city_id = $request->cities;
        $event->annual_calendar = $request->annual_calendar;
        $event->getCoordinates($request->localization);
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $requestlogo = $request->logo;
            $logoname = md5($requestlogo->getClientOriginalName() . strtotime("now")) . "." . $requestlogo->extension();
            $requestlogo->move(public_path(Event::EVENT_LOGO), $logoname);
            $event->logo = $logoname;
        }
        $event->save();

        foreach ($request->categories as $category){
            $event_category = new Event_category();
            $event_category->category_id = $category;
            $event_category->event_id = $event->id;
            $event_category->save();
        }
        foreach ($request->typical_foods as $typical_food){
            $event_category = new Typical_event_food();
            $event_category->typical_food_id = $typical_food;
            $event_category->event_id = $event->id;
            $event_category->save();
        }
        if($request->images){
            foreach ($request->images as $image){
                $event_image = new Image_events();
                $event_image->image_id = $image;
                $event_image->event_id = $event->id;
                $event_image->save();
            }
        }


        return Response::responseOK("Evento cadastrado com sucesso");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $cities = City::all();
        $event_categories = Event_category::all();
        $categories = Category::all();
        $typical_event_foods = Typical_event_food::all();
        $typical_foods = Typical_food::all();
        $images = Image::all();
        $image_events = Image_events::all();
        return view('event.show', compact('event','cities','event_categories','categories','typical_event_foods','typical_foods','images','image_events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $cities = City::all();
        $typical_foods = Typical_food::all();
        $categories = Category::all();
        $partners = Partner::all();
        return view('event.edit', compact('event','cities','typical_foods','categories','partners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $event->name = $request->name;
        $event->subtitle = $request->subtitle;
        $event->description = $request->description;
        $event->contact = $request->contact;
        $event->website = $request->website;
        $event->start_date = $request->start_date;
        $event->final_date = $request->final_date;
        $event->address = $request->address;
        $event->district = $request->district;
        $event->city_id = $request->cities;
        if($request->localization != ''){
            $event->getCoordinates($request->localization);
        }
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $pathLogo = public_path(Event::EVENT_LOGO). $event->logo;
            if (file_exists($pathLogo)){
                @unlink($pathLogo);
            }
            $requestlogo = $request->logo;
            $logoname = md5($requestlogo->getClientOriginalName() . strtotime("now")) . "." . $requestlogo->extension();
            $requestlogo->move(public_path(Event::EVENT_LOGO), $logoname);
            $event->logo = $logoname;
        }

        foreach ($event->event_category as $event_category){
            $event_category->delete();
        }
        foreach ($event->event_typical_food as $event_typical_food){
            $event_typical_food->delete();
        }

        foreach ($request->categories as $category){
            $event_category = new Event_category();
            $event_category->category_id = $category;
            $event_category->event_id = $event->id;
            $event_category->save();
        }
        foreach ($request->typical_foods as $typical_food){
            $event_typical_food = new Typical_event_food();
            $event_typical_food->typical_food_id = $typical_food;
            $event_typical_food->event_id = $event->id;
            $event_typical_food->save();
        }

        $event->save();
        return Response::responseOK('Evento alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $pathLogo = public_path(Event::EVENT_LOGO). $event->logo;
            @unlink($pathLogo);
        $event_images = $event->event_image;
        if($event->delete()) {
            foreach($event_images as $event_image){
                @unlink($this->optionsUpload['upload_dir'] . $event_image->image->address);
                @unlink($this->optionsUpload['upload_dir'] . 'thumbnail/' . $event_image->image->address);
                $image = Image::find($event_image->image->id);
                $image->delete();
            }
            return Response::responseSuccess();
        } else {
            return Response::responseForbiden();
        }

    }
    public function bootgrid(Request $request)
    {
        $events = new Event();
        $bootgrid = $events->bootgrid($request);
        return response()->json($bootgrid);
    }

    public function image()
    {
        return view('event.image');
    }

    public function uploadImagePost($event_id=null)
    {
        $upload_handler = new UploadHandler($this->optionsUpload, false);
        $return = $upload_handler->post(false, uniqid('event-'));
        foreach ($return as &$itens){
            foreach($itens as &$item){
                $image = new Image();
                $image->address = $item->name;
                $image->save();
                $image->imageCarrosel();
                $item->id = $image->id;

                if ($event_id){
                    $image_event = new Image_events();
                    $image_event->event_id = $event_id;
                    $image_event->image_id = $image->id;
                    $image_event->save();
                }
            }
        }
        return $return;
    }
    public function uploadImageGet($event_id=null)
    {
        if (!$event_id) return;
        $return['files'] = [];

        $image_events = Image_events::where('event_id', $event_id)->get();
        foreach ($image_events as $image_event){
            $return['files'][] = $this->uploadJsonGet($image_event->image->address, $image_event->id);
        }
        return json_encode($return);
    }
    public function uploadImageDelete($event_id=null)
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
        $jsonReturn->deleteUrl = route('event.uploadImageDelete') . "?file=" . $imageName;
        $jsonReturn->id = $id;
        $jsonReturn->name = $imageName;
        $jsonReturn->size = filesize($this->optionsUpload['upload_dir'] . $imageName);
        $jsonReturn->thumbnailUrl = url($this->optionsUpload['upload_url'] . 'thumbnail/' . $imageName);
        $jsonReturn->url = url($this->optionsUpload['upload_url'] . $imageName);

        return $jsonReturn;

    }

}
