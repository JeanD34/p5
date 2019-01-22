<?php

trait HydratorTrait {
    
    public function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}