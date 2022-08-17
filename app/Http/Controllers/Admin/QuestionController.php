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
            $data = $request->validated();
            
            $questionData = [
                'content' => $data['content'],
                'category_id' => $data['category_id'],
            ];
            $question = $this->questionRepository->save($questionData);

            $answerData = [
                'answer_1' => $data['answer_1'],
                'answer_2' => $data['answer_2'],
                'answer_3' => $data['answer_3'],
                'answer_4' => $data['answer_4'],
            ];
            $correct = $data['correct'];

            $count = 0;
            foreach($answerData as $answerDatum) {
                $answer = $this->answerRepository->save([
                    'content' => $answerDatum,
                    'question_id' => $question->id,
                    'correct' => ($count == $correct),
                ]);
                $count++;
            }

            return redirect()->route('admin.question.index')->with('success',
            __('question.create.success'));

    }

}
