<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateChatContactRequest;
use App\Http\Requests\AdminPanel\UpdateChatContactRequest;
use App\Repositories\AdminPanel\ChatContactRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ChatContactController extends AppBaseController
{
    /** @var  ChatContactRepository */
    private $chatContactRepository;

    public function __construct(ChatContactRepository $chatContactRepo)
    {
        $this->chatContactRepository = $chatContactRepo;
    }

    /**
     * Display a listing of the ChatContact.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $chatContacts = $this->chatContactRepository->paginate(10);

        return view('adminPanel.chat_contacts.index')
            ->with('chatContacts', $chatContacts);
    }

    /**
     * Show the form for creating a new ChatContact.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.chat_contacts.create');
    }

    /**
     * Store a newly created ChatContact in storage.
     *
     * @param CreateChatContactRequest $request
     *
     * @return Response
     */
    public function store(CreateChatContactRequest $request)
    {
        $input = $request->all();

        $chatContact = $this->chatContactRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/chatContacts.singular')]));

        return redirect(route('adminPanel.chatContacts.index'));
    }

    /**
     * Display the specified ChatContact.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $chatContact = $this->chatContactRepository->find($id);

        if (empty($chatContact)) {
            Flash::error(__('messages.not_found', ['model' => __('models/chatContacts.singular')]));

            return redirect(route('adminPanel.chatContacts.index'));
        }

        return view('adminPanel.chat_contacts.show')->with('chatContact', $chatContact);
    }

    /**
     * Show the form for editing the specified ChatContact.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $chatContact = $this->chatContactRepository->find($id);

        if (empty($chatContact)) {
            Flash::error(__('messages.not_found', ['model' => __('models/chatContacts.singular')]));

            return redirect(route('adminPanel.chatContacts.index'));
        }

        return view('adminPanel.chat_contacts.edit')->with('chatContact', $chatContact);
    }

    /**
     * Update the specified ChatContact in storage.
     *
     * @param int $id
     * @param UpdateChatContactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChatContactRequest $request)
    {
        $chatContact = $this->chatContactRepository->find($id);

        if (empty($chatContact)) {
            Flash::error(__('messages.not_found', ['model' => __('models/chatContacts.singular')]));

            return redirect(route('adminPanel.chatContacts.index'));
        }

        $chatContact = $this->chatContactRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/chatContacts.singular')]));

        return redirect(route('adminPanel.chatContacts.index'));
    }

    /**
     * Remove the specified ChatContact from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $chatContact = $this->chatContactRepository->find($id);

        if (empty($chatContact)) {
            Flash::error(__('messages.not_found', ['model' => __('models/chatContacts.singular')]));

            return redirect(route('adminPanel.chatContacts.index'));
        }

        $this->chatContactRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/chatContacts.singular')]));

        return redirect(route('adminPanel.chatContacts.index'));
    }
}
