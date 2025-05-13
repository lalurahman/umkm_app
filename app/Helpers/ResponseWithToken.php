<?php

namespace App\Helpers;

class ResponseWithToken
{
  protected static $response = [
    'code' => 200,
    'status' => 'success',
    'message' => null,
    'data' => null,
    'authorization' => null
  ];

  public static function success($data = null, $authorization = null, $message = null)
  {
    self::$response['message'] = $message;
    self::$response['data'] = $data;
    self::$response['authorization'] = $authorization;

    return response()->json(self::$response, self::$response['code']);
  }

  public static function error($data = null, $authorization = null, $message = null, $code = 400)
  {
    self::$response['status'] = 'error';
    self::$response['code'] = $code;
    self::$response['message'] = $message;
    self::$response['data'] = $data;
    self::$response['authorization'] = $authorization;

    return response()->json(self::$response, self::$response['code']);
  }

}