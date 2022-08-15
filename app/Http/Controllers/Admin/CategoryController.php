<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use App\Repositories\Admin\Category\CategoryRepositoryInterface as CategoryRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    protected $categoryRepository;

    public function  __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index',[
            'categories' => $this->categoryRepository->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        DB::beginTransaction();

        try {
            $category = $this->categoryRepository->save($request->validated());
            DB::commit();
            return redirect()->route('admin.category.show', $category->id);
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                'Exception occured. Please try again later.'
            );
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! $category = $this->categoryRepository->findById($id)) {
            abort(404);
        }

        return view('admin.category.show', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! $category = $this->categoryRepository->findById($id)) {
            abort(404);
        }

        return view('admin.category.form', [
            'categories' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $this->categoryRepository->save($request->validated(), ['id' => $id]);
            DB::commit();
            return redirect()->route('admin.category.show', $id);
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                'Exception occured. Please try again later.'
            );
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $this->categoryRepository->deleteById($id);
            DB::commit();
            return redirect()->route('admin.category.index');
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                'Exception occured. Please try again later.'
            );
        }

        
    }
}
