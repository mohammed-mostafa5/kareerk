<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateMessageRequest;
use App\Http\Requests\AdminPanel\UpdateMessageRequest;
use App\Repositories\AdminPanel\MessageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MessageController extends AppBaseController
{
    /** @var  MessageRepository */
    private $messageRepository;

    public function __construct(MessageRepository $messageRepo)
    {
        $this->messageRepository = $messageRepo;
    }

    /**
     * Display a listing of the Message.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $messages = $this->messageRepository->paginate(10);

        return view('adminPanel.messages.index')
            ->with('messages', $messages);
    }

    /**
     * Show the form for creating a new Message.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.messages.create');
    }

    /**
     * Store a newly created Message in storage.
     *
     * @param CreateMessageRequest $request
     *
     * @return Response
     */
    public function store(CreateMessageRequest $request)
    {
        $input = $request->all();

        $message = $this->messageRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/messages.singular')]));

        return redirect(route('adminPanel.messages.index'));
    }

    /**
     * Display the specified Message.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error(__('messages.not_found', ['model' => __('models/messages.singular')]));

            return redirect(route('adminPanel.messages.index'));
        }

        return view('adminPanel.messages.show')->with('message', $message);
    }

    /**
     * Show the form for editing the specified Message.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error(__('messages.not_found', ['model' => __('models/messages.singular')]));

            return redirect(route('adminPanel.messages.index'));
        }

        return view('adminPanel.messages.edit')->with('message', $message);
    }

    /**
     * Update the specified Message in storage.
     *
     * @param int $id
     * @param UpdateMessageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMessageRequest $request)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error(__('messages.not_found', ['model' => __('models/messages.singular')]));

            return redirect(route('adminPanel.messages.index'));
        }

        $message = $this->messageRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/messages.singular')]));

        return redirect(route('adminPanel.messages.index'));
    }

    /**
     * Remove the specified Message from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $message = $this->messageRepository->find($id);

        if (empty($message)) {
            Flash::error(__('messages.not_found', ['model' => __('models/messages.singular')]));

            return redirect(route('adminPanel.messages.index'));
        }

        $this->messageRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/messages.singular')]));

        return redirect(route('adminPanel.messages.index'));
    }
}
