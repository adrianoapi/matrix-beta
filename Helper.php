<?php

class Helper
{
    
    /**
     * Acrescenta 0 quando for <= 9
     * @param type $number
     * @return type
     */
    public static function zero($number)
    {
        return $number <= 9 ? "0{$number}" : $number;
    }
    
    /**
     * Converte data br em sql
     * @param type $name $value
     */
    public static function dataToSql($value)
    {
        $data = explode('/', $value);
        return $data[2] . '-' . $data[1] . '-' . $data[0];
    }
    
    /**
     * Converte data sql em br
     * @param type $name $value
     */
    public static function dataToBr($value)
    {
        $data = explode('-', $value);
        return $data[2] . '/' . $data[1] . '/' . $data[0];
    }
    
    public static function calcularDias($value)
    {
        $data = explode('-', $value);
        if($data[2] >= date('d')){
            return $data[2] - date('d');
        }else{
            return 0;
        }
    }
}