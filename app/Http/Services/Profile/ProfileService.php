<?php namespace Intranet\Http\Services\Profile;

use DB;
use Auth;
use Session;
use Intranet\Models\ProfilexPermission;
use Intranet\Models\Permission;
use Intranet\Models\Profile;

class ProfileService{
    public function findAll()
    {
        return Profile::get();
    }

    public function find($request)
    {
        $profile = Profile::where('IdPerfil', $request["profileCode"])->first();
        return $profile;
    }

    public function findByProfile($request)
    {
        $profilexPermission = ProfilexPermission::where('IdPerfil', $request["profileCode"])->get();
        return $profilexPermission;
    }

    public function findPermission($idProfile)
    {
        $profilexPermission = ProfilexPermission::where('IdPerfil', $idProfile)->get();
        return $profilexPermission;
    }

    public function create($request)
    {
        if ( array_key_exists('objsCheck', $request) ) {
            Profile::create([
                'Nombre' => $request['profilename'],
                'Descripcion' => $request['profiledescription'],
            ]);

            $matchThese = ['Nombre' => $request['profilename'], 'Descripcion' => $request['profiledescription']];
            $profile = Profile::where($matchThese)->first();

            foreach ($request['objsCheck'] as $idObj) {
                ProfilexPermission::create([
                    'IdPerfil' => $profile->IdPerfil,
                    'IdAccion' => $idObj
                ]);
            }
            return 1;
        }else{
            return 2;
        }
    }

    public function update($request)
    {
        $id = $request["profilecode"];
        $profile = Profile::where("IdPerfil",$id)
            ->update([
                'Nombre' => $request['profilename'],
                'Descripcion' => $request['profiledescription'],
            ]);

        ProfileService::deletePermissionsAll($id);

        if ( array_key_exists('objsCheck', $request) ){
            foreach($request['objsCheck'] as $idObj){
                ProfilexPermission::create([
                    'IdPerfil' => $id,
                    'IdAccion' => $idObj
                ]);
            }
        }

        if($id == Session::get('user')->IdPerfil) {
            Auth::logout();
        }
    }

    public function delete($request)
    {
        ProfilexPermission::where(
            'IdPerfil', $request['profile-id']
        )->delete();

        Profile::where(
            'IdPerfil', $request['profile-id']
        )->delete();
    }

    public function findPermissionsAll()
    {
        return Permission::get();//simplePaginate(10);
    }

    public function deletePermissionsAll($idProfile){
        $proxper = ProfilexPermission::where('IdPerfil', $idProfile)->where('deleted_at', null)->get();
        foreach($proxper as $per){
            $per->delete();
        }
    }
}