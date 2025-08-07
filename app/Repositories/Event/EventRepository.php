<?php

namespace App\Repositories\Event;

use App\Models\Lab;
use App\Models\Event;
use Illuminate\Support\Facades\DB;


class EventRepository implements EventRepositoryInterface
{
    public function getEvents()
    {
        return Event::with(['media'])->orderBy('id', 'desc')->paginate(config('common.list_count'));
    }
    public function storeEvent($data)
    {
        DB::beginTransaction();
        try {
            $uploadedFile = $data['file'] ?? null;
            $event = Event::updateOrCreate(['id' => $data['id'] ?? null], $data);
            if($uploadedFile){
                $event->clearMediaCollection('event');
                $event->addMedia($uploadedFile)
                ->usingName($uploadedFile->getClientOriginalName())
                ->toMediaCollection('event');
            }
            DB::commit();
            return $event;
        } catch (\Throwable $th) {
            DB::rollBack();
            ResponseMessage($th->getMessage(), 402);
            throw $th;
        }
    }

    public function getEventById($id)
    {
        return Event::with(['media'])->findOrFail($id);
    }

    public function deleteEventById($id)
    {
        $event = Event::findOrFail($id);
        $event->clearMediaCollection('event');
        $event->delete();
    }

    public function updateOrCreateLab($data)
    {
        DB::beginTransaction();
        try {
            $uploadedFile = $data['file'] ?? null;
            $lab = Lab::updateOrCreate(['id' => $data['id'] ?? null], $data);
            if($uploadedFile){
                $lab->clearMediaCollection('lab');
                $lab->addMedia($uploadedFile)
                ->usingName($uploadedFile->getClientOriginalName())
                ->toMediaCollection('lab');
            }
            DB::commit();
            return $lab;
        } catch (\Throwable $th) {
            DB::rollBack();
            ResponseMessage($th->getMessage(), 402);
            throw $th;
        }
    }

    public function getLabs()
    {
        return Lab::with(['media'])->orderBy('id', 'desc')->paginate(config('common.list_count'));
    }

    public function getLabById($id)
    {
        return Lab::with(['media'])->findOrFail($id);
    }

    public function deleteLabById($id)
    {
        $lab = Lab::findOrFail($id);
        $lab->clearMediaCollection('lab');
        $lab->delete();
    }
}
