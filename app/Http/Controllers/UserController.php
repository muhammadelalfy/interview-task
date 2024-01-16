<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Country;
use App\Models\User;
use App\Repositories\SQL\UserRepository;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public $repository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $repository
     *
     * **/
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function create()
    {
        return $this->repository->create();

    }

    public function store(UserRequest $request) //need to refactor like above methods
    {
        DB::beginTransaction();
        try {
            $this->repository->create($request->validated());
            DB::commit();
            return response()->json(['success' => true, 'message' => 'user added successfully and its attachment is uploaded'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'reason' => $e], 422);

        }
    }


}
