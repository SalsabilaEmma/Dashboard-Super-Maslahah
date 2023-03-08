<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RecaptchaController extends Controller
{
    //

    public function index()
    {
        return view('login');
    }

    function get_recaptcha()
    {
        $arr = array();

        for ($i = 0; $i <= 4; $i++) {
            //make random number
            $random_number = $this->__get_random_number();
            if (isset($arr)) {
                //perulangan untuk menghindari value angka sama
                while (in_array($random_number, $arr)) {
                    $random_number = $this->__get_random_number();
                }
            }
            array_push($arr,  $random_number);
        }
        $random_index = rand(0, 4);

        session(['data_recapt' => $random_index]);
        $data = array(
            'rc' => $arr[$random_index],
            'captcha' => $arr
        );

        return json_encode($data);
    }

    function __get_random_number()
    {
        $random_number = rand(10, 99);
        return $random_number;
    }

    function cek_recaptcha(Request $request)
    {
        $recaptcha_index = $request->input('recaptcha');
        $sess_index = session::get('data_recapt');
        // dd($recaptcha_index);
        if ($recaptcha_index == $sess_index) {
            return "berhasil recaptcha";
        }
        return "tidak masuk";
    }
}
