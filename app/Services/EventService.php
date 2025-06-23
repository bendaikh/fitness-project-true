<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

class EventService
{
    public function getEvents($limit = 10): Collection
    {
        return Event::limit($limit)->get();
    }

    public function getEvent($id): ?Event
    {
        return Event::find($id);
    }

    public function getEventBySlug($slug): ?Event
    {
        return Event::where('slug', $slug)->first();
    }

    public function getFeaturedEvents($limit = 10): Collection
    {
        return Event::where('is_featured', 1)->limit($limit)->get();
    }

    public function getUpcomingEvents($limit = 10): Collection
    {
        return Event::where('is_upcoming', 1)->limit($limit)->get();
    }

    public function getPastEvents($limit = 10): Collection
    {
        return Event::where('is_past', 1)->limit($limit)->get();
    }

    public function getRelatedEvents($event_id, $limit = 10): Collection
    {
        return Event::where('id', '!=', $event_id)->limit($limit)->get();
    }
}
