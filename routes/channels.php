<?php

use App\Models\Chat;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('chat-{chat}', function ($user, Chat $chat) {
    $contact = $chat->contacts()->where('user_id', $user->id)->orWhere('other_user_id', $user->id)->first();

    return !!$contact;
});

Broadcast::channel('user-{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
