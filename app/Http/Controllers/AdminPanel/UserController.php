<?php

namespace App\Http\Controllers\AdminPanel;

use Flash;
use Response;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\UserApproveMail;
use App\Models\UserTransactions;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AdminPanel\UserRepository;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the Users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all();

        return view('adminPanel.users.index')
            ->with('users', $users);
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(__('messages.not_found', ['model' => __('models/users.singular')]));

            return redirect(route('adminPanel.users.index'));
        }

        return view('adminPanel.users.show')->with('user', $user);
    }

    /**
     *  Update status
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(__('messages.not_found', ['model' => __('models/users.singular')]));

            return redirect(route('adminPanel.users.index'));
        }

        $this->userRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/users.singular')]));

        return back();
    }


    public function approve($id)
    {
        $user = User::find($id);
        $user->update(['approved_at' => now()]);

        Mail::to($user->email)->send(new UserApproveMail($user));

        return back();
    }


    public function transactions()
    {
        $transactions = UserTransactions::get();

        return view('adminPanel.transactions.index', compact('transactions'));
    }
}
