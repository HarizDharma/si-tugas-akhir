<?php

namespace App\Repositories\Akademik;

use App\Http\Requests\Akademik\CreateAkademikRequest;
use App\Http\Requests\Akademik\UpdateAkademikRequest;

interface AkademikRepositoryInterface
{
    public function index();
    public function show($id);

    public function store(CreateAkademikRequest $request);
    public function update(UpdateAkademikRequest $request, $id);
    public function destroy($id);
}
