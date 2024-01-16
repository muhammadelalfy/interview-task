<?php
namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface CountryContract
{
    public function search(Request $request);
}
