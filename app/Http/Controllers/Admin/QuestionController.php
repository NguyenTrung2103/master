<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\QuestionRequest;
use App\Repositories\Admin\Category\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Admin\Question\QuestionRepositoryInterface as QuestionRepository;
use App\Repositories\Admin\Answer\AnswerRepositoryInterface as AnswerRepository;

class QuestionController extends Controller
{
    protected $categoryRepository;

    protected $questionRepository;
    protected $answerRepository;
    public function __construct(CategoryRepository $categoryRepository, QuestionRepository $questionRepository, AnswerRepository $answerRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
    }
    public function index()
    {
        return view('admin.question.index', [
            'questions' => $this->questionRepository->paginate(),
        ]);
    }
    public function create()
    {
        return view('admin.question.form', [
            'categories' => $this->categoryRepository->getAll(),
        ]);
    }
    public function store(QuestionRequest $request)
    {
        try{
            $this->validate($request, [
                
                'content' => 'required',
                'category_id' => 'required',
                'answer_1' => 'required',
                'answer_2' => 'required',
                'answer_3' => 'required',
                'answer_4' => 'required',
                
            ]);
            dd($request);
            $question = $this->questionRepository->save([
                
                'content' => request('content'),
                'user_id' => auth()->id(),
                
            ]);
            $answer = [];

            foreach($answers as $answer) {
                 $answer[] = new Answer(['name' => $answer]);
                 }

             $question->answers()->saveMany($answer);

           

            return redirect()->route('admin.question.index')->with('success',
            __('question.create.success'));
        }
        catch (\Exception)
        {
            return redirect()->back()->with('error',
            __('question.create.error'));
        }
    }

}
