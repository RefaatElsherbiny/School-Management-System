<?php

namespace App\Http\Livewire;

use App\Models\clender;
use Livewire\Component;

class Calender extends Component
{
    public $events = '';


     /**
    * Write code on Method
    *
    * @return response()
    */
    
    public function render()
    {
        return view('admin.livewire.calender');
    }


    public function getevent()
    {       
        $events = clender::select('id','title','start')->get();

        return  json_encode($events);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */ 
    public function addevent($event)
    {
        $input['title'] = $event['title'];
        $input['start'] = $event['start'];
        clender::create($input);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function eventDrop($event, $oldEvent)
    {
      $eventdata = clender::find($event['id']);
      $eventdata->start = $event['start'];
      $eventdata->save();
    }

   
    
}
