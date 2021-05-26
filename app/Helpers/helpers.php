<?php // Code within app\Helpers\Helper.php
namespace app\Helpers;

use App\Models\Log;
use Config;
use Illuminate\Support\Str;

class Helper
{
    /**
     * @param success = Passing boolean apabila false maka response tersebut gagal
     * @param code = status code response
     * @param message = informasi pesan yang akan dikirimkan ke client
     * @param data = data yang akan dibawa ke client
     * @param optionalInfo = data tambahan
     */
     public static function RestResponse($success = true, $code, $message, $data = null, $optionalInfo = null, $error_message = null)
     {
         $res = array();
         $res['code'] = $code;

         if($optionalInfo != null) {
             $res = array_merge($res, $optionalInfo);
         }
         $res['message'] = $message;

         if(!$success) {
             $res['error_message'] = $error_message;
         }

         if($data != null) {
             $res['data'] = $data;
         }

         return response()->json($res, $code);
     }

     public static function saveLog($content, $type, $user_id)
     {
         $insert = Log::create([
             'content' => $content,
             'type' => $type,
             'user_id' => $user_id
         ]);
         if($insert) {
             return true;
         } else {
             return false;
         }
     }
}
