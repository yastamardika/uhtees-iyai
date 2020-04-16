<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocMed;
use App\User;
use JWTAuth;
use Auth;

class SocMedController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function daftarSosmed() {
        $data = $this->user
        ->sosmed()
        ->get(['id','social_media', 'username'])
        ->toArray();
        $name = Auth::user()->name;
        return response()->json([
            'Nama Pemilik' => $name,
            'Hasil' => $data
        ],200);
    }

    public function show($id)
    {
        $sosmed = $this->user->sosmed()->find($id);

        if (!$sosmed) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product with id ' . $id . ' cannot be found'
            ], 400);
        }

        return $sosmed;
    }

    public function store(Request $request)
    {
        $sosmed = new SocMed();
        $sosmed->social_media = $request->social_media;
        $sosmed->username = $request->username;

        if ($this->user->sosmed()->save($sosmed))
            return response()->json([
                'success' => true,
                'sosmed' => $sosmed
            ]);
        else
            return response()->json([
                'success' => false,
                'sosmed' => 'Sorry, product could not be added'
            ], 500);
    }

    public function update(Request $request, $id)
    {
        $sosmed = $this->user->sosmed()->find($id);

        if (!$sosmed) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product with id ' . $id . ' cannot be found'
            ], 400);
        }

        $updated = $sosmed->fill($request->all())
            ->save();

        if ($updated) {
            return response()->json([
                'success' => true,
                'hasil' => $sosmed,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product could not be updated'
            ], 500);
        }
    }

    public function destroy($id)
    {  $sosmed = $this->user->sosmed()->find($id);


        if (!$sosmed) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, sosmed with id ' . $id . ' cannot be found'
            ], 400);
        }

        if ($sosmed->delete()) {
            return response()->json([
                'success' => 'berhasil dihapus dari peradaban bung!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product could not be deleted'
            ], 500);
        }
    }
}


