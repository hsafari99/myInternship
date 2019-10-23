<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorageController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Grant access to a photo.
     * 
     * @param string $string
     * @return Request $response
     */
    public function getPhoto($path)
    {
        try {
            $photo = storage_path('photos/'.$path);
            $response = response()->file($photo);
        } catch (Exception $ex) {
            $response = null;
        }
        return $response;
    }
}
