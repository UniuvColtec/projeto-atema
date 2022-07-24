<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class FrontendPartnerController extends Controller
{
    function index(){
        echo 'parceiro - listagem';
    }

    function show(Partner $partner){
        dd($partner);
    }
}
