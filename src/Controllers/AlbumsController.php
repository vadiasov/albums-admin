<?php

namespace Vadiasov\AlbumsAdmin\Controllers;

use App\Album;
use App\Artist;
use App\Genre;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vadiasov\AlbumsAdmin\Requests\AlbumRequest;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active  = 'albums';
        $user    = Auth::user();
        $albums  = Album::all();
        $genres  = Genre::all()->keyBy('id');
        $artists = Artist::all()->keyBy('id');
        
        return view('albums-admin::admin.albums.index', compact(
            'active',
            'user',
            'albums',
            'genres',
            'artists'
        ));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active  = 'albums';
        $user    = Auth::user();
        $genres  = Genre::all()->keyBy('id');
        $tags    = Tag::all()->keyBy('id');
        $artists = Artist::all()->keyBy('id');
        
        return view('albums-admin::admin.albums.create', compact(
            'active',
            'user',
            'genres',
            'tags',
            'artists'
        ));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Vadiasov\AlbumsAdmin\Requests\AlbumRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
        $dateFormatted = date_inverse('-', $request->release_date);
        
        $album = new Album([
            'artist_id'    => $request->artist_id,
            'title'        => $request->title,
            'release_date' => $dateFormatted,
            'price'        => $request->price,
            'free'         => $request->free,
            'donate'       => $request->donate,
            'genres'       => json_encode($request->genres),
            'about'        => $request->editor1,
        ]);
        
        $album->save();
        
        return redirect(route('admin/albums'))->with('status', 'New Album has been created!');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active         = 'albums';
        $user           = Auth::user();
        $album          = Album::whereId($id)->first();
        $genresSelected = json_decode($album->genres);
        $genres         = Genre::all()->keyBy('id');
        $artists        = Artist::all()->keyBy('id');
        
//        $date                = $album->release_date;
//        $array               = explode('-', $date);
//        $album->release_date = $array[2] . '-' . $array[1] . '-' . $array[0];
        $album->release_date = date_inverse('-', $album->release_date);
        
        
        $arrayJs = '[' . implode(",", $genresSelected) . ']';
        
        return view('albums-admin::admin.albums.edit', compact(
            'active',
            'user',
            'album',
            'arrayJs',
            'genres',
            'artists'
        ));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \Vadiasov\AlbumsAdmin\Requests\AlbumRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumRequest $request, $id)
    {
        $album = Album::whereId($id)->first();
        
        $dateFormatted = date_inverse('-', $request->release_date);
        
        $album->title        = $request->title;
        $album->artist_id    = $request->artist_id;
        $album->release_date = $dateFormatted;
        $album->price        = $request->price;
        $album->free         = $request->free;
        $album->donate       = $request->donate;
        $album->genres       = json_encode($request->genres);
        $album->about          = $request->editor1;
        
        $album->save();
        
        return redirect(route('admin/albums'))->with('status', 'The Album has been edited!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::whereId($id);
        
        $album->delete();
        
        return redirect(route('admin/albums'))->with('status', 'The Album has been deleted!');
    }
}
