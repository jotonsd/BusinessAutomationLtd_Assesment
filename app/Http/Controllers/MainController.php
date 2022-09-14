<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index($id)
    {
        if ($id == 1) {
            // getting the data from the api
            $response = Http::get('http://103.219.147.17/api/json.php')->json();
            $result = explode(', ',$response['data']);
            $j = 0;

            // converting the json response string into array
            for($i = 0; $i < count($result); $i++)
            {
                $item[$j] = array(
                    'key' => substr($result[$i],4),
                    'speed' => substr($result[$i+1],6),
                );
                $i++;
                $j++;
            }

            // checking the value for greater than 60!
            $k = 0;
            foreach ($item as  $value) {
                if ($value['speed']>60) {
                    $speeds[$k] = array('value' => $value['speed'], );
                    $k++;
                }
            }
            // storing data into a array for returning
            $data = array(
                'speeds' => $speeds,
                'solution_no' => $id
            );
            // returning the data with speed and solution no
            return view('welcome', $data);


        } else if ($id == 2) {
            $arr=array('0'=>'z1', '1'=>'Z10', '2'=>'z12', '3'=>'Z2', '4'=>'z3');
            uasort($arr, function($a, $b) {
                return strnatcasecmp($a, $b);
            });

            $data = array(
                'sorted' => $arr,
                'solution_no' => $id
            );
            // returning the data with solution no
            return view('welcome', $data);

        }else if ($id == 3){

            $data = array(
                'solution_no' => $id
            );
            // returning the data with solution no
            return view('welcome', $data);
        }else {

            dd('nothing');
        }
    }

    // function check ip
    function check_ip(Request $request)
    {
        $ip = $request->ip_address;

        $valid = preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/', $ip);

        if ($valid == 1) {
            $response = 'TRUE';
        } else {
            $response = 'FALSE';
        }

        // validation by default function
        // if (filter_var($request->ip_address, FILTER_VALIDATE_IP)) {
        //     $response = 'TRUE';
        // } else {
        //     $response = 'FALSE';
        // }

        // storing data into a array for returning
        $data = array(
            'response' => $response,
            'ip_address' => $ip,
            'solution_no' => 3
        );
        // returning the data with speed and solution no
        return view('welcome', $data);
    }
}
