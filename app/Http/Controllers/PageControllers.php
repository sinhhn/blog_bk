<?php
/**
 * Created by PhpStorm.
 * User: sinhhn
 * Date: 2017/05/24
 * Time: 6:10
 */

namespace App\Http\Controllers;


class PageControllers extends Controller
{
    public function getIndex()
    {
        return view('pages.welcome');
    }

    public function getAbout()
    {
        $firstName = "Linh";
        $lastName = "Ngo";
        $fullName = $firstName . " " . $lastName;
        $email = "sinhhn@gmail.com";
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullName;
        //$data['ip'] = Request::ip();
        // return view('pages.about')->with('fullname', $fullName)->withEmail($email);
        return view('pages.about')->withData($data);
    }

    public function getContact()
    {
        return view('pages.contact');
    }
}