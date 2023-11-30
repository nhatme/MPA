<?php
class Orders
{
    private $id;
    private $id_crypto;
    private $id_user;
    private $amount;
    private $status;
    private $type;
    private $isDelete;
    private $created_at;
    private $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function getid_crypto()
    {
        return $this->id_crypto;
    }

    public function getid_user()
    {
        return $this->id_user;
    }

    public function getamount()
    {
        return $this->amount;
    }

    public function getstatus()
    {
        return $this->status;
    }

    public function gettype()
    {
        return $this->type;
    }

    public function getisDelete()
    {
        return $this->isDelete;
    }

    public function getupdated_at()
    {
        return $this->updated_at;
    }

    public function __construct($id, $id_crypto, $id_user, $amount, $status, $type, $isDelete, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->id_crypto = $id_crypto;
        $this->id_user = $id_user;
        $this->amount = $amount;
        $this->status = $status;
        $this->type = $type;
        $this->isDelete = $isDelete;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}
