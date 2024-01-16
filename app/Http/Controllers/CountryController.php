<?php

namespace App\Http\Controllers;

use App\Repositories\SQL\CountryRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CountryController extends BaseController
{
    public $repository;

    /**
     * UserController constructor.
     *
     * @param CountryRepository $repository
     *
     * **/
    public function __construct(CountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function search(Request $request)
    {
        return $this->repository->search($request);
    }
}
