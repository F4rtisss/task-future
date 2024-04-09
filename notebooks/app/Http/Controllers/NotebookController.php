<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNotebookRequest;
use App\Models\Notebook;
use Illuminate\Http\Request;

class NotebookController extends Controller
{
    /**
     *
     */
    public function list(Request $request): \Illuminate\Http\JsonResponse
    {
        return $this->success(
            Notebook::query()
                ->take($request->query('take', 10))
                ->offset($request->query('offset', 0))
                ->get()
                ->toArray()
        );
    }

    /**
     *
     */
    public function create(CreateNotebookRequest $request): \Illuminate\Http\JsonResponse
    {
        $notebook = Notebook::query()->create($request->validated());

        return $this->success(['id' => $notebook->id]);
    }

    /**
     *
     */
    public function getById(Notebook $notebook): \Illuminate\Http\JsonResponse
    {
        return $this->success($notebook->toArray());
    }

    /**
     *
     */
    public function update(CreateNotebookRequest $request, Notebook $notebook): \Illuminate\Http\JsonResponse
    {
        $notebook->update($request->validated());

        return $this->success();
    }

    /**
     *
     */
    public function destroy(Notebook $notebook): \Illuminate\Http\JsonResponse
    {
        return $this->success(['result' => $notebook->delete()]);
    }
}
