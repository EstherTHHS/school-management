<?php

namespace App\Http\Controllers\API;

use App\Models\Lab;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Event\EventRepositoryInterface;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class EventController extends Controller implements HasMiddleware
{
    private EventRepositoryInterface $eventRepository;
    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

<<<<<<< HEAD
    public function getEvents()
    {
=======
    public static function middleware(): array
    {
        return [
            new Middleware('permission:getEvents', only: ['getEvents']),
            new Middleware('permission:getEventById', only: ['getEventById']),
            new Middleware('permission:storeEvent', only: ['storeEvent']),
            new Middleware('permission:deleteEventById', only: ['deleteEventById']),
            new Middleware('permission:updateOrCreateLab', only: ['updateOrCreateLab']),
            new Middleware('permission:getLabs', only: ['getLabs']),
            new Middleware('permission:getLabById', only: ['getLabById']),
            new Middleware('permission:deleteLabById', only: ['deleteLabById']),
            new Middleware('permission:updateOrCreateTimetable', only: ['updateOrCreateTimetable']),
            new Middleware('permission:getTimetablesByYearId', only: ['getTimetablesByYearId']),
            new Middleware('permission:getTimetables', only: ['getTimetables']),
            new Middleware('permission:getTimetableById', only: ['getTimetableById']),
            new Middleware('permission:deleteTimetableById', only: ['deleteTimetableById']),
        ];
    }
    public function getEvents(){
>>>>>>> ca8402634154fa9596eb254bacf485f07c71cfbb
        $events = $this->eventRepository->getEvents();
        ResponseData($events);
    }
    public function getEventById($id)
    {
        $event = $this->eventRepository->getEventById($id);
        ResponseData($event);
    }

    public function storeEvent(Request $request)
    {
        $event = $this->eventRepository->storeEvent($request->all());
        ResponseData($event);
    }
    public function deleteEventById($id)
    {
        $event = $this->eventRepository->deleteEventById($id);
        ResponseData($event);
    }

    public function updateOrCreateLab(Request $request)
    {
        $lab = $this->eventRepository->updateOrCreateLab($request->all());
        ResponseData($lab);
    }

    public function getLabs()
    {
        $labs = $this->eventRepository->getLabs();
        ResponseData($labs);
    }

    public function getLabById($id)
    {
        $lab = $this->eventRepository->getLabById($id);
        ResponseData($lab);
    }

    public function deleteLabById($id)
    {
        $lab = $this->eventRepository->deleteLabById($id);
        ResponseData($lab);
    }

    public function updateOrCreateTimetable(Request $request)
    {
        $timetable = $this->eventRepository->updateOrCreateTimetable($request->all());
        ResponseData($timetable);
    }

    public function getTimetablesByYearId($yearId)
    {
        $timetables = $this->eventRepository->getTimetablesByYearId($yearId);
        ResponseData($timetables);
    }

    public function getTimetables(Request $request)
    {
        $timetables = $this->eventRepository->getTimetables($request);
        ResponseData($timetables);
    }

    public function getTimetableById($id)
    {
        $timetable = $this->eventRepository->getTimetableById($id);
        ResponseData($timetable);
    }

    public function deleteTimetableById($id)
    {
        $timetable = $this->eventRepository->deleteTimetableById($id);
        ResponseData($timetable);
    }
}
