<?php

namespace App\Repositories\SQL;

use App\Models\Country;
use App\Models\User;
use App\Repositories\Contracts\UserContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class UserRepository implements UserContract
{
    protected $model;

    /**
     * UserRepository constructor.
     *
     * @param User $model
     *
     * **/
    public function __construct(User $model)
    {
        $this->model = $model;
    }



    public function index(): View
    {
        $users = User::paginate(10);
        return view('user.list', compact('users'));

    }

    public function create(): View
    {
        $countries = Country::all();
        return view('user.create', compact('countries'));

    }
    /**
     *
     * /**
     * @return Model
     */
    public function store($attributes): Model
    {
            return $this->model->create($attributes);
    }


}
