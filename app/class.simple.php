<?php

class Simple
{
    /**
     * @var string
     */
    private $prop = 'somple';

    /**
     * @var int
     */
    public static $staticProp;


    /**
     * Simple constructor.
     */
    public function __construct()
    {
        self::$staticProp = 100;
    }
    
    public static function getStaticProp()
    {
        return self::$staticProp;
    }

    /**
     * @return string
     */
    public function getProp()
    {
        return $this->prop;
    }

    /**
     * @param $value
     * @return $this
     */
    public function setProp(string $value)
    {
        $this->prop = $value;
        
        return $this;
    }
    
}
