<?php

namespace App\Http\Controllers;

use App\Mechanics;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $location_new = $request->location;
        $location = serialize($location_new);
        // $decrypted = Crypt::decryptString($encrypted);

        $user = new User;
        if ($request->location) {
            $location = serialize($request->location);
            // Location
            $loc = $request->location;
            // var_dump($loc); die;
            $longitude = $loc['longitude'];
            $latitude = $loc['latitude'];
            $country = $loc['country'];

            if (in_array($loc['administrative_area_level_1'], $loc)) {
                $locality = $loc['administrative_area_level_1'];
            } elseif (in_array('locality', $loc)) {
                $locality = $loc['locality'];
            } else {
                $locality = '';
            }
            // var_dump($locality);die;
            // var_dump($locality); die;

            $user->longitude = $longitude;
            $user->latitude = $latitude;
            $user->country = $country;
            $user->locality = $locality;
            $user->locality = $locality;
            $user->location = $location;
        }
        // return 'no location';

        $password = Hash::make($request->form['password']);
        $user->name = $request->form['name'];
        $user->password = $password;
        $user->email = $request->form['email'];
        $user->phone = $request->form['phone'];
        $user->id_no = $request->form['id_no'];
        // $user->country = $request->form['country'];
        $user->city = $request->form['city'];
        $user->address = $request->form['address'];
        // $user->county = $request->form['county'];
        $user->age = $request->form['age'];
        // $user->address = $request->address;
        // $user->city = $request->city;
        // $user->country = $request->country;
        $user->location = $location;
        // var_dump($location); die;
        $user->save();
        return $user;

        /*if ($user->save()) {
            $user_role = new Role_user;
            $user_role->user_id = $user->id;
            $user_role->role_id = $request->role_id;
            $user_role->save();
        }*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mechanics  $mechanics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mechanics $mechanics, $id)
    {
        // return $request->all();
        $user = User::find($id);
        
        if ($request->location) {
            $location = serialize($request->location);
            // Location
            $loc = $request->location;
            // var_dump($loc); die;
            $longitude = $loc['longitude'];
            $latitude = $loc['latitude'];
            $country = $loc['country'];

            if (in_array($loc['administrative_area_level_1'], $loc)) {
                $locality = $loc['administrative_area_level_1'];
            } elseif (in_array('locality', $loc)) {
                $locality = $loc['locality'];
            } else {
                $locality = '';
            }
            // var_dump($locality);die;
            // var_dump($locality); die;

            $user->longitude = $longitude;
            $user->latitude = $latitude;
            $user->country = $country;
            $user->locality = $locality;
            $user->locality = $locality;
            $user->location = $location;
        }
        /*if ($request->location) {
            $location_new = $request->location;
            $location = serialize($location_new);
            $user->location = $location;
        }*/
        $password = Hash::make($request->form['password']);
        $user->name = $request->form['name'];
        $user->password = $password;
        $user->email = $request->form['email'];
        $user->phone = $request->form['phone'];
        $user->country = $request->form['country'];
        $user->city = $request->form['city'];
        $user->address = $request->form['address'];
        $user->county = $request->form['county'];
        $user->id_no = $request->form['id_no'];
        $user->age = $request->form['age'];
        $user->save();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mechanics  $mechanics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mechanics $mechanics)
    {
        //
    }

    public function getUsers()
    {
        // return json_decode(json_encode(User::all()), true);
        return User::all();
    }
    
    public function profile(Request $request, User $user, $id) {
        // return $request->all;
        $upload = User::find($request->id);
        if ($request->hasFile('image')) {
            $imagename = time() . $request->image->getClientOriginalName();
            $request->image->storeAs('public/profile', $imagename);
            // return response();
        }
        $image_name = '/storage/profile/' . $imagename;
        $upload->profile = $image_name;
        $upload->save();
    }

    public function userUpdate(Request $request, User $user)
    {
        $user = User::find(Auth::id());
        if ($request->location) {
            $location_new = $request->location;
            $location = serialize($location_new);
            $user->location = $location;
        }
        if ($request->password) {
            $password = Hash::make($request->user['password']);
            $user->password = $password;
        }
        $user->name = $request->user['name'];
        $user->email = $request->user['email'];
        $user->country = $request->user['country'];
        $user->city = $request->user['city'];
        $user->address = $request->user['address'];
        $user->county = $request->user['county'];
        $user->phone = $request->user['phone'];
        $user->id_no = $request->user['id_no'];
        $user->age = $request->user['age'];
        // $user->address = $request->address;
        // $user->city = $request->city;
        // $user->country = $request->country;
        // var_dump($location); die;
        $user->save();
        return $user;

    }
}
