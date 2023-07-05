<?php

namespace App\Repositories\Akademik;

use App\Http\Requests\Akademik\CreateAkademikRequest;
use App\Http\Requests\Akademik\UpdateAkademikRequest;

interface AkademikRepositoryInterface
{
    public function index($platform = 'api');
    public function show($platform = 'api', $id);

    public function store($platform = 'api', CreateAkademikRequest $request);
    public function update($platform = 'api', UpdateAkademikRequest $request, $id);
    public function destroy($platform = 'api', $id);

    // custom
    public function getSelf($platform = 'api' );
    public function updateSelf($platform = 'api', UpdateAkademikRequest $request);
}
