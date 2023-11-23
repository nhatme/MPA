<?php
include_once "./getData.php";

class CryptoCurrency
{
    private $id;
    private $name;
    private $logo;
    private $symbol;
    private $price;
    private $change_1h;
    private $change_24h;
    private $change_7d;
    private $market_cap;
    private $volume_24h;
    private $circulating_supply;
    private $max_supply;
    private $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function getSymbol()
    {
        return $this->symbol;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getchange_1h()
    {
        return $this->change_1h;
    }

    public function getchange_7d()
    {
        return $this->change_7d;
    }

    public function getchange_24h()
    {
        return $this->change_24h;
    }

    public function getmarket_cap()
    {
        return $this->market_cap;
    }

    public function getvolume_24h()
    {
        return $this->volume_24h;
    }

    public function getcirculating_supply()
    {
        return $this->circulating_supply;
    }
    public function getmax_supply()
    {
        return $this->max_supply;
    }
    public function getcreated_at()
    {
        return $this->created_at;
    }

    public function __construct($id, $name, $logo, $symbol, $price, $change_1h, $change_24h, $change_7d, $market_cap, $circulating_supply, $max_supply, $created_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->logo = $logo;
        $this->symbol = $symbol;
        $this->price = $price;
        $this->change_1h = $change_1h;
        $this->change_24h = $change_24h;
        $this->change_7d = $change_7d;
        $this->market_cap = $market_cap;
        $this->circulating_supply = $circulating_supply;
        $this->max_supply = $max_supply;
        $this->created_at = $created_at;
    }
}

$valueId = getId($getLatestList, $idStr, 10);
print_r($valueId);

$valueInfos = getInfo($getInfo, getId($getLatestList, "1,1027,825,1839,52,5426,3408,2010,74,1958", 10));

foreach ($valueInfos as $key => $value) {
    print_r($value);
    echo "  <br>
            <h1>Nhat Dep Trai</h1> 
            <br>
        ";
}