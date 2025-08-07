<?php

namespace App\Http\Controllers\API;

use App\Models\Lab;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Event\EventRepositoryInterface;

class EventController extends Controller
{
    private EventRepositoryInterface $eventRepository;
    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }
    public function getEvents(){
        $events = $this->eventRepository->getEvents();
        ResponseData($events);
    }
    public function getEventById($id){
        $event = $this->eventRepository->getEventById($id);
        ResponseData($event);
    }
    
    public function storeEvent(Request $request){
        $event = $this->eventRepository->storeEvent($request->all());
        ResponseData($event);
    }
    public function deleteEventById($id){
        $event = $this->eventRepository->deleteEventById($id);
        ResponseData($event);
    }

    public function updateOrCreateLab(Request $request){
        $lab = $this->eventRepository->updateOrCreateLab($request->all());
        ResponseData($lab);
    }

    public function getLabs(){
        $labs = $this->eventRepository->getLabs();
        ResponseData($labs);
    }

    public function getLabById($id){
        $lab = $this->eventRepository->getLabById($id);
        ResponseData($lab);
    }

    public function deleteLabById($id){
        $lab = $this->eventRepository->deleteLabById($id);
        ResponseData($lab);
    }
}
