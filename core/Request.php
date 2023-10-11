<?php

class Request
{
    private $getValues = [];
    private $postValues = [];

    public function __construct()
    {
        $this->getValues = $this->sanitizeArray($_GET);
        $this->postValues = $this->sanitizeArray($_POST);
    }

    private function sanitizeArray($array)
    {
        $sanitizedArray = [];
        foreach ($array as $key => $value) {
            $sanitizedArray[$key] = $this->sanitize($value);
        }
        return $sanitizedArray;
    }

    private function sanitize($data)
    {
        return $data;
    }

    public function get($key = null)
    {
        if ($key === null) {
            return $this->getValues;
        }

        return isset($this->getValues[$key]) ? $this->getValues[$key] : null;
    }

    public function post($key = null)
    {
        if ($key === null) {
            return $this->postValues;
        }

        return isset($this->postValues[$key]) ? $this->postValues[$key] : null;
    }
}