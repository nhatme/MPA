<?php

class User
{
    private $id;
    private $email;
    private $username;
    private $password_user;
    private $avatar;
    private $bio;
    private $role_user;
    private $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password_user;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getbio()
    {
        return $this->bio;
    }

    public function getRole()
    {
        return $this->role_user;
    }

    public function getCreatedDate()
    {
        return $this->created_at;
    }

    public function __construct($id, $email, $username, $password_user, $avatar, $bio, $role_user, $created_at)
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->password_user = $password_user;
        $this->avatar = $avatar;
        $this->bio = $bio;
        $this->role_user = $role_user;
        $this->created_at = $created_at;
    }

}
