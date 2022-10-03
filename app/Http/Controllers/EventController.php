<?php

namespace App\Http\Controllers;

use App\Events\EProviderChangedEvent;
use App\models\Event;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\CustomFieldRepository;




class EventController extends Controller
{

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;


    public function show(){
        $events = Event::all();
        try {
            return $this->success('Events Retrieved Successfully',[
                'data'=>$events
            ]);
        } catch (\Throwable $th) {
            return $this->error('Some Errors Happend',[
                'errors'=>$th,
            ]);
        }
        
    }
    public function store(Request $request){
        // return $request;
        $event = new Event;
        $event->provider_id = $request->providerId;
        $event->title = $request->title;
        $event->address = $request->address;
        $event->start_date= $request->startDate;
        $event->start_time= $request->startTime;
        $event->end_date= $request->endDate;
        $event->end_time = $request->endTime;
        $event->tags = $request->tags;
        $event->description = $request->description;
        $event->favourite = $request->favourite;
        $event->status = $request->status;
        $event->price = $request->price;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $event['image']= $filename;
        }

        if($event->save()){
            return $this->success('Data Saved Successfully',[]);
        }
  
        
    }
}
