<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateChatRequest;
use App\Http\Requests\AdminPanel\UpdateChatRequest;
use App\Repositories\AdminPanel\ChatRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ChatController extends AppBaseController
{
    /** @var  ChatRepository */
    private $chatRepository;

    public function __construct(ChatRepository $chatRepo)
    {
        $this->chatRepository = $chatRepo;
    }

    /**
     * Display a listing of the Chat.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $chats = $this->chatRepository->paginate(10);

        return view('adminPanel.chats.index')
            ->with('chats', $chats);
    }

    /**
     * Show the form for creating a new Chat.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.chats.create');
    }

    /**
     * Store a newly created Chat in storage.
     *
     * @param CreateChatRequest $request
     *
     * @return Response
     */
    public function store(CreateChatRequest $request)
    {
        $input = $request->all();

        $chat = $this->chatRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/chats.singular')]));

        return redirect(route('adminPanel.chats.index'));
    }

    /**
     * Display the specified Chat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $chat = $this->chatRepository->find($id);

        if (empty($chat)) {
            Flash::error(__('messages.not_found', ['model' => __('models/chats.singular')]));

            return redirect(route('adminPanel.chats.index'));
        }

        return view('adminPanel.chats.show')->with('chat', $chat);
    }

    /**
     * Show the form for editing the specified Chat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $chat = $this->chatRepository->find($id);

        if (empty($chat)) {
            Flash::error(__('messages.not_found', ['model' => __('models/chats.singular')]));

            return redirect(route('adminPanel.chats.index'));
        }

        return view('adminPanel.chats.edit')->with('chat', $chat);
    }

    /**
     * Update the specified Chat in storage.
     *
     * @param int $id
     * @param UpdateChatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChatRequest $request)
    {
        $chat = $this->chatRepository->find($id);

        if (empty($chat)) {
            Flash::error(__('messages.not_found', ['model' => __('models/chats.singular')]));

            return redirect(route('adminPanel.chats.index'));
        }

        $chat = $this->chatRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/chats.singular')]));

        return redirect(route('adminPanel.chats.index'));
    }

    /**
     * Remove the specified Chat from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $chat = $this->chatRepository->find($id);

        if (empty($chat)) {
            Flash::error(__('messages.not_found', ['model' => __('models/chats.singular')]));

            return redirect(route('adminPanel.chats.index'));
        }

        $this->chatRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/chats.singular')]));

        return redirect(route('adminPanel.chats.index'));
    }
}
