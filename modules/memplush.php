<?php
ini_set("display_errors",1);
class memplush
{
        function index()
        {
            $memcache_obj = memcache_connect('127.0.0.1', 11211);

            memcache_flush($memcache_obj);
            
            /* OO API */
            
            $memcache_obj = new Memcache;
            $memcache_obj->connect('127.0.0.1', 11211);

            $memcache =$memcache_obj;
            $list = array();

            $allSlabs = $memcache->getExtendedStats('slabs');
            $items = $memcache->getExtendedStats('items');
            foreach($allSlabs as $server => $slabs) {
                foreach($slabs AS $slabId => $slabMeta) {
                    $cdump = $memcache->getExtendedStats('cachedump',(int)$slabId);
                    foreach($cdump AS $keys => $arrVal) {
                        if (!is_array($arrVal)) continue;
                        foreach($arrVal AS $k => $v) {
                            echo $k .'<br>';
                        }
                    }
                }
            }


          $memcache_obj->flush();
        }

}