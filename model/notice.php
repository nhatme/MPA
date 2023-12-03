<?php
class notice
{
    private $status;
    private $message;
    private $result;
    private $redirect;

    public function getStatus()
    {
        return $this->status;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getRedirect()
    {
        return $this->redirect;
    }

    public function __construct($status, $message, $result, $redirect)
    {
        $this->status = $status;
        $this->message = $message;
        $this->result = $result;
        $this->redirect = $redirect;
    }
}
