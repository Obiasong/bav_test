<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Encrypter extends Model
{

    /**
     * encode url ids
     * @return string
     *
     */
    public static function encode($data)
    {
        return  Crypt::encryptString($data);
    }

    /**
     * decode url ids
     * @param $id
     * @return mixed
     */
    public static function decode($data)
    {
        try {
            return Crypt::decryptString($data);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }
}
