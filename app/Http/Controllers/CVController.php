<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CVController extends Controller
{
    public function showCV()
    {
        $data = [
            'name' => 'Suryanto',
            'placeOfBirth' => 'Bogor',
            'dateOfBirth' => '25th June 1988',
            'educationPeriod' => '2007-2010',
            'educationPlace' => 'SMA MANDIRI CIAWI, Ciawi, Bogor',
            'nonFormalEducationYear' => '2022',
            'nonFormalEducationTitle' => 'Townhall-Construction study PMO (Project Manager Office)',
        ];

        return view("cv",['page_title'=>'CURRICULUM VITAE (CV)'],$data);
    }
}