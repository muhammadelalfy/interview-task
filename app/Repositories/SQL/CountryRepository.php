<?php

namespace App\Repositories\SQL;

use App\Enums\StatusTypes;
use App\Models\Country;
use App\Repositories\Contracts\CountryContract;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CountryRepository implements CountryContract
{
    protected $model;

    /**
     * CountryRepository constructor.
     *
     * @param Country $model
     *
     * **/
    public function __construct(Country $model)
    {
        $this->model = $model;
    }

    /**
     *
     * @param Request $request
     *
     * **/

    public function search(Request $request)
    {

        $term = $request->input('q');

        DB::beginTransaction();
        try {
            $countries = Country::
            when($term, function ($query) use ($term) {
                return $query->where('name', 'like', '%' . $term . '%');
            })
            ->when($term == null, function ($query) {
                    return $query->where('status', StatusTypes::Active);
                })
                ->get();
            DB::commit();
            return response()->json($countries);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'reason' => $e], 422);
        }

    }
}
