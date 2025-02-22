<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CategoryController extends AppBaseController
{

    public function __construct(
        private readonly CategoryRepository $categoryRepository
    ){}

    /**
     * Display a listing of the Category.
     */
    public function index(Request $request)
    {
        $categories = $this->categoryRepository->paginate(10);

        return view('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Category.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created Category in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();

        $category = $this->categoryRepository->create($input);

        Flash::success('Categoria adicionada com sucesso.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Category.
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Categoria não encontrada');

            return redirect(route('categories.index'));
        }

        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified Category.
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Categoria não encontrada');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Categoria não encontrada');

            return redirect(route('categories.index'));
        }

        $category = $this->categoryRepository->update($request->all(), $id);

        Flash::success('Categoria atualizada com sucesso.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Categoria não encontrada');

            return redirect(route('categories.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('Categoria deletada com sucesso.');

        return redirect(route('categories.index'));
    }
}
