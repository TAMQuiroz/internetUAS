<?php

namespace Intranet\Http\Services\User;

use DB;
use Mail;
use Carbon\Carbon;
use Intranet\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;

class PasswordService
{
    protected $password_table = 'PasswordResets';
    protected $hashKey;
    protected $expired;

    public function __construct()
    {
        $this->hashKey = env('APP_KEY');
    }

    /**
     * Sent password link to given user
     */
    public function sendSetPasswordLink(User $user, $mail)
    {
        $token = $this->createToken($user);

        $this->sendMailWithToken($mail, $user->Usuario, $token);
    }

    public function sendMailWithToken($mail, $username, $token)
    {
        $password_link = url("/password_reset/{$token}");

        Mail::send('emails.password_reset', compact('password_link', 'username'), function($m) use($mail) {
            $m->subject('Cuenta Registrada');
            $m->to($mail);
        });
    }

    /**
     * Create a new token record.
     */
    protected function createToken(User $user)
    {
        $user_id = $user->IdUsuario;

        $this->deleteExisting($user_id);

        $token = $this->createNewToken();

        DB::table($this->password_table)->insert($this->getPayload($user_id, $token));

        return $token;
    }

    /**
     * Create a new token for the user.
     */
    public function createNewToken()
    {
        return hash_hmac('sha256', Str::random(40), $this->hashKey);
    }

    /**
     * Build the record payload for the table.
     */
    protected function getPayload($user_id, $token)
    {
        return ['user_id' => $user_id, 'token' => $token, 'created_at' => new Carbon];
    }

    /**
     * Delete existing tokens.
     */
    protected function deleteExisting($user_id)
    {
        DB::table($this->password_table)->where('user_id', $user_id)->delete();
    }

    /*
     * Validate if the token exists and doesnt expired
     */
    public function isValid($data)
    {
        $user = User::where('Usuario', $data['user'])->first();

        return $user && $this->exists($data['token'], $user->IdUsuario);
    }

    /**
     * Determine if token record exists
     */
    public function exists($token, $user_id)
    {
        $token = DB::table($this->password_table)
                   ->where('user_id', $user_id)
                   ->where('token', $token)
                   ->first();

        return ! is_null($token);
    }

    /**
     * Reset password of given user.
     */
    public function resetPassword($data)
    {
        $user = User::where('Usuario', $data['user'])->first();
        $user->Contrasena = bcrypt($data['password']);
        $user->save();

        $this->deleteExisting($data['user']);
        
        return $user;
    }
    public function resetMyOwnPassword($data)
    {
        $user = User::where('IdUsuario', $data['user'])->first();
        $user->Contrasena = bcrypt($data['password']);
        $user->save();

        return $user;
    }

}