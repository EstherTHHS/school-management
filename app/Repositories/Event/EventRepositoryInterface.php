<?php

namespace App\Repositories\Event;

interface EventRepositoryInterface
{
    public function getEvents();
    public function storeEvent($data);
    public function getEventById($id);
    public function deleteEventById($id);
    public function updateOrCreateLab($data);
    public function getLabs();
    public function getLabById($id);
    public function deleteLabById($id);
}
