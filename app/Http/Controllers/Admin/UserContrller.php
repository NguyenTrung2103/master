<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\SendMailUserProfileRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Mail\Mailable;
use App\Services\MailService;
use App\Mail\InformUserProfile;
use App\Rules\Validate;
use Mail;

class UserContrller extends Controller
{
    public $listuser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->listuser = session()->get('users');
        return view('admin.users.index', ['users' => $this->listuser]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        
        session()->push('users', $request->only(['name','email','address']));
        return  redirect('/admin/user');
    }

    public function sendMail()
    {
        $this->listuser = session()->get('users');
        return view('sendmail', ['users' => $this->listuser]);
    }

    protected $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    public function sendMailUser(SendMailUserProfileRequest $request)
    {
        $targetMail = $request->validated()['email'];
        $users = $this->getUsers();
        if (!strcmp($targetMail, "all")) {
            $users->each(function ($user) {
                $this->mailService->sendUserProfile($user);
            });
            return redirect()->back();
        }
        $user = $users->firstWhere('email', $targetMail);
        $this->mailService->sendUserProfile($user);
        return redirect()->back();
    }  

    private function getUsers()
    {
        return collect(Session::get('users'));
    }
    
}