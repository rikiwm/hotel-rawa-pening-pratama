<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomInclude;
use App\Models\Tag;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class RoomsController extends Controller
{
    private $selectedSort = null;
    public function index(Request $request)
    {
        $query = Room::where('is_active', 1);

        $selectedSort = url('rooms');
        $sorts = [
            url('rooms') => 'Sort by ',
            url('rooms?sort=type_room-asc') => 'Sort by Type Rooms',
            url('rooms?sort=type_room-desc') => 'Sort by Type Villas',
            url('rooms?sort=name_room-desc') => 'Sort by Z to A',
        ];
        $query = $this->_sortrooms($query, $request);

        $rooms = $query->paginate(4);
        $titel = 'Room and Villas';
        return view('frontend.rooms.index', compact('titel', 'rooms', 'selectedSort', 'sorts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $room = Room::where('slug',$slug)->firstOrFail();

        $t = $room->tag;
        $i = $room->room_fasilitas;
        $tagRoom = Tag::whereIn('id', $t)->get();
        $inc = RoomInclude::whereIn('id', $i)->get();

        SEOMeta::setTitle($room->seo_title ?: $room->name);
        SEOMeta::setDescription($room->seo_description ?: Str::limit($room->description, 160));
        SEOMeta::addMeta('penginapan:section', $room->typeRoom->name, 'property');
        // SEOMeta::addKeyword([$t]);
        OpenGraph::setTitle($room->seo_title ?: $room->name);
        OpenGraph::setDescription($room->seo_description ?: Str::limit($room->description, 160));
        OpenGraph::setUrl(url()->current());
        TwitterCard::setTitle($room->seo_title ?: $room->name);
        TwitterCard::setDescription($room->seo_description ?: Str::limit($room->description, 160));
        JsonLd::setTitle($room->seo_title ?: $room->name);
        JsonLd::setDescription($room->seo_description ?: Str::limit($room->description, 160));
        JsonLd::setUrl(url()->current());

        $images = $room->getMedia('rooms');

        $imageUrls = $images->map(function($image) {
            return $image->getUrl();
        });
        return view('frontend.rooms.show',compact('room','imageUrls','tagRoom','inc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function _sortrooms($query, Request $request)
{
    if ($request->has('sort')) {
        $sort = explode('-', $request->get('sort'));
        $query = $query->orderBy($sort[0], $sort[1]);
        $this->selectedSort = url('rooms?sort=' . $request->get('sort'));
    }

    return $query;
}
    // private function _sortrooms($rooms, $request)
    // {
    //     if ($sort = preg_replace('/\s+/', '', $request->query('sort'))) {
	// 		$availableSorts = ['name_room', 'created_at'];
	// 		$availableOrder = ['asc', 'desc'];
	// 		$sortAndOrder = explode('-', $sort);

	// 		$sortBy = strtolower($sortAndOrder[0]);
	// 		$orderBy = strtolower($sortAndOrder[1]);

	// 		if (in_array($sortBy, $availableSorts) && in_array($orderBy, $availableOrder)) {
	// 			$rooms = $rooms->orderBy($sortBy, $orderBy);
	// 		}

    //         $this->selectedSort = url('rooms?sort='. $sort);
	// 	}

	// 	return $rooms;
    // }
}
