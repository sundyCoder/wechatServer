<?php
/***************************************************************************
 * 
 * Copyright (c) 2015 wechat, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
class MC_Controller extends CI_Controller{ 

    //json格式化
    protected function json_return($info_array, $errmsg, $errno) {
            $ret_array = array (
                'data' => $info_array, 
                'info' => $errmsg,
                'status' => intval($errno),
            );
            if ('' == $ret_array['data'] || 0 == count($ret_array['data'])) {
                $ret_array['data'] =NULL;
            } 
            echo  json_encode($ret_array); 
        } 
    }
?>
