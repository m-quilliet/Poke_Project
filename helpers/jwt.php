<?php
require_once dirname(__FILE__) . '/../utils/init.php';

class JWT{

    private static function base64url_encode($str) {
        return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
    }
    
    public static function generate_jwt($payload) {
    
        $headers = ['typ' => 'JWT', 'alg' => 'HS256'];
        $headers_encoded = self::base64url_encode(json_encode($headers));
    
        $payload_encoded = self::base64url_encode(json_encode($payload));
    
        $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", SECRET_256, true);
        $signature_encoded = self::base64url_encode($signature);
    
        $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
        return $jwt;
    }

    public static function is_jwt_valid($jwt) {
        // split the jwt
        $tokenParts = explode('.', $jwt);

        $header = base64_decode($tokenParts[0]);
        $payload = base64_decode($tokenParts[1]);
        $signature_provided = $tokenParts[2];
    


        $expiration = json_decode($payload)->exp;

        $is_token_expired = ($expiration - time()) < 0;

        // build a signature based on the header and payload using the secret
        $base64_url_header = self::base64url_encode($header);
        $base64_url_payload = self::base64url_encode($payload);
        $signature = hash_hmac('SHA256', $base64_url_header . "." . $base64_url_payload, SECRET_256, true);
        $base64_url_signature = self::base64url_encode($signature);
    
        // verify it matches the signature provided in the jwt
        $is_signature_valid = ($base64_url_signature === $signature_provided);
        
        if ($is_token_expired || !$is_signature_valid) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public static function get($jwt){
        $tokenParts = explode('.', $jwt);
        $payload = json_decode(base64_decode($tokenParts[1]));
        return $payload;
    }

}