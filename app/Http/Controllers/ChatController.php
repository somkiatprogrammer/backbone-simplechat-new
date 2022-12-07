<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ChatController extends Controller
{
    /**
     * Get the messages.
     *
     * @return Json
     */
    public function get() {
        return json_encode ( Message::get () );
    }

    /**
     * Remove the message by ID.
     *
     * @param number id
     * @return number
     */
    public function remove(Request $request, $id) {
        $message = Message::find($id);

        return (int)$message->delete();
    }

    /**
     * Add/Edit the message.
     * 
     * @param number $id
     * @return number
     */
    public function save(Request $request, $id) {

        $person = $request->input ( 'person' );
        $text = $request->input ( 'message' );
        
        if ($id == 0) {
            $message = new Message ();
            $message->person = $person;
            $message->message = $text;
            
            return ( int ) $message->save ();
        } else {
            return ( int ) Message::where ( 'id', $id )->update ( 
                array (
                    'message' => $text 
                ) );
        }
        
        return 0;
    }
}
