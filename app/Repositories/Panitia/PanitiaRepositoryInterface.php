<?php

namespace App\Repositories\Panitia;

use App\Http\Requests\Panitia\CreatePanitiaRequest;
use App\Http\Requests\Panitia\UpdatePanitiaRequest;

interface PanitiaRepositoryInterface
{
    public function index();
    public function show($id);

    public function store(CreatePanitiaRequest $request);
    public function update(UpdatePanitiaRequest $request, $id);
    public function destroy($id);
    public function getSelf();
    public function updateSelf(UpdatePanitiaRequest $request);
}
