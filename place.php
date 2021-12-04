<?php
class Place
{
    var $koneksi;
    var $baseUrl;
    var $table = 'place';

    function __construct($koneksi, $baseUrl)
    {
        $this->koneksi = $koneksi;
        $this->baseUrl = $baseUrl;
    }

    function getData()
    {
        $no = 0;
        $data = mysqli_query($this->koneksi, "SELECT * FROM $this->table order by RAND()");
        while ($d = mysqli_fetch_array($data)) {
            $result[$no] = $d;
            $no++;
        }
        return $result;
    }

    function getDataByCategory($category)
    {
        $no = 0;
        $data = mysqli_query($this->koneksi, "SELECT * FROM $this->table where id_category='$category' order by id desc");
        while ($d = mysqli_fetch_array($data)) {
            $result[$no] = $d;
            $no++;
        }
        return $result;
    }
}
