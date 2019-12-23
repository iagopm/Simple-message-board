<?php

class Message
{
    public $id;
    public $user_id;
    public $message;

    public function __toString()
    {
        return $this->id . $this->user_id . $this->message;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }
}

?>
