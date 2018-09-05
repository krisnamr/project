<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class ListJabatan extends Model
{
    protected $table = 'list_jabatan';
    public $fillable=['dosen_id','kegiatan_id','jabatan_id'];


      public function honor() {
        return $this->hasOne('App\Honor','id','list_jabatan_id');
      }

      public function kegiatan() {
        return $this->belongsTo('App\Kegiatan','kegiatan_id');
      }

      public function jabatan(){
          return $this->belongsTo('App\Jabatan','jabatan_id');
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
