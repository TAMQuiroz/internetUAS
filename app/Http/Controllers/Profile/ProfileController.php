<?php namespace Intranet\Http\Controllers\Profile;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Intranet\Http\Services\Profile\ProfileService;

class ProfileController extends BaseController {

    protected $profileService;

    public function __construct() {
        $this->profileService = new ProfileService();
    }

    public function index() {
        $data = [];
        try {
            $data['profiles'] = $this->profileService->findAll();
        } catch(\Exception $e) {
            dd($e);
        }
        return view('profile.index', $data);
    }

    public function create() {
        $data = [];
        try {
            $data['permissions'] = $this->profileService->findPermissionsAll();
        } catch (\Exception $e) {
            dd($e);
        }

        return view('profile.form', $data);
    }

    public function save(Request $request) {
        $response = null;
        try {
            $response = $this->profileService->create($request->all());
        } catch(\Exception $e) {
            dd($e);
        }
        if($response==1){
            return redirect()->route('index.profile')->with('success', 'El perfil se ha registrado exitosamente');
        }else{
            return redirect()->route('index.profile')->with('success', 'Debe colocar por lo menos un permiso para el perfil');
        }
    }

    public function edit(Request $request) {
        $data = [];
        try {
            $data['profile'] = $this->profileService->find($request->all());
            $data['profilexpermissions'] = $this->profileService->findByProfile($request->all());
            $data['permissions'] = $this->profileService->findPermissionsAll();
        } catch (\Exception $e) {
            dd($e);
        }
        return view('profile.edit', $data);
    }

    public function update(Request $request) {
        try{
            $this->profileService->update($request->all());
        } catch(\Exception $e){
            dd($e);
        }
        return redirect()->route('index.profile')->with('success', 'Las modificaciones se han guardado exitosamente');
    }

    public function delete(Request $request) {
        try{
            $this->profileService->delete($request->all());
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.profile')->with('success', 'El registro ha sido eliminado exitosamente');
    }

    //View course
    public function view(Request $request)
    {
        $data = [];
        try {
            $data['profile'] = $this->profileService->find($request->all());
            $data['profilexpermissions'] = $this->profileService->findByProfile($request->all());
        } catch(\Exception $e) {
            dd($e);
        }
        return view('profile.view', $data);
    }

}