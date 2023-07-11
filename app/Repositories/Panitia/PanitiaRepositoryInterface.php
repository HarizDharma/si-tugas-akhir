<?php

namespace App\Repositories\Panitia;

use App\Http\Requests\Panitia\CreatePanitiaRequest;
use App\Http\Requests\Panitia\UpdatePanitiaRequest;

interface PanitiaRepositoryInterface
{
    public function index($platform = 'api');
    public function show($platform = 'api', $id);

    public function store($platform = 'api', CreatePanitiaRequest $request);
    public function update($platform = 'api', UpdatePanitiaRequest $request, $id);
    public function destroy($platform = 'api', $id);
    public function getSelf($platform = 'api');
    public function updateSelf($platform = 'api', UpdatePanitiaRequest $request);
}
