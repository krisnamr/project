<?php

namespace App\Mongodb;

use Jenssegers\Mongodb\Eloquent\Model;
use GuzzleHttp\Client;

class Riwayat extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'dosen';

    protected $fillable = [
        'dosen_id',
        'honor',
    ];

    protected $guard = [
        'id',
    ];

    public function getHonorTotal()
    {
        $honorTotal = 0;

        if ($this->honor) {
            foreach ($this->honor as $honor) {
                $honorTotal += $honor->total;
            }
        }

        return $honorTotal;
    }
    
    public function getPajakTotal()
    {

       $grandTotal=0;
       if($this->honor){
           foreach ($this->honor as $honor){
               $total=0;
               $total=$honor->total*$honor->pajak;
               $grandTotal=$grandTotal+$total;
           }
       }
       return $grandTotal;

    }

    public function getHonorTotalInRp()
    {
        return number_format($this->getHonorTotal(), '2', ',', '.');
    }
    
    public function getPajakTotalInRp()
    {
        return number_format($this->getPajakTotal(), '2', ',', '.');
    }

    public function honor()
    {
        return $this->embedsMany(\App\Mongodb\Honor::class);
    }

    public function namaDosen() {
        $dosen = array();
        $client = new Client();
        $res = $client->request('GET', 'http://localhost:3001/api/showdata/'. $this->dosen_id);
        $json = json_decode($res->getBody(),true);
        if(empty($json)) {
          return '';
        }else {
        return $json[0]['Nama'];
        }
      }
}
