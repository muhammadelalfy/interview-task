<?php
namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\View\View;

interface UserContract
{
    public function index(): View;
    public function create(): View;
    public function store(array $attributes): Model;
}
