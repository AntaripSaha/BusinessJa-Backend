<?php

namespace App\Http\Controllers\API\EProvider;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProviderListResource;
use App\Models\EProvider;
use Illuminate\Http\Request;

class ProviderListAPIController extends Controller
{
    public function index(){
        return new ProviderListResource(EProvider::all());
    }
}
