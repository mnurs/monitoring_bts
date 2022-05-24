<?php

namespace App\Models;
 

class Helper
{
	public function getJawaban($id1,$id2) {
        $data = KuesionerJawaban::
                where('id_monitoring',$id1)->
                where('id_kuesioner',$id2)->
                first();
        return $data;
    }
}
