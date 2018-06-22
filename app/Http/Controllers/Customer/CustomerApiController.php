<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/22/18
 * Time: 4:27 PM
 */

namespace App\Http\Controllers\Customer;


use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerApiController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function signUp(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return $this->badRequest([
                "messages" => $validator->messages()
            ]);
        }
        return "true";
    }

    public function signIn(Request $request)
    {

    }
}