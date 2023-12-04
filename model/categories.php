<?php

class Categories
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

    public function __construct($id, $name, $title, $desc, $num_tokens, $avg_price_change, $market_cap, $market_cap_change, $volume, $volume_change)
    {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
        $this->desc = $desc;
        $this->num_tokens = $num_tokens;
        $this->avg_price_change = $avg_price_change;
        $this->market_cap = $market_cap;
        $this->market_cap_change = $market_cap_change;
        $this->volume = $volume;
        $this->volume_change = $volume_change;
    }
}
