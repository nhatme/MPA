<?php
class category
{
    private $id;
    private $name;
    private $title;
    private $desc;
    private $num_tokens;
    private $avg_price_change;
    private $market_cap;
    private $market_cap_change;
    private $volume;
    private $volume_change;

    public function getId()
    {
        return $this->id;
    }

    public function getname()
    {
        return $this->name;
    }

    public function gettitle()
    {
        return $this->title;
    }

    public function getdesc()
    {
        return $this->desc;
    }
    public function getnum_tokens()
    {
        return $this->num_tokens;
    }

    public function getavg_price_change()
    {
        return $this->avg_price_change;
    }

    public function getmarket_cap()
    {
        return $this->market_cap;
    }

    public function getmarket_cap_change()
    {
        return $this->market_cap_change;
    }

    public function getvolume()
    {
        return $this->volume;
    }

    public function getvolume_change()
    {
        return $this->volume_change;
    }

    public function __construct()
    {
        
    }
}
