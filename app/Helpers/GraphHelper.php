<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class GraphHelper {

    public static function createUri()
    {
        return
            config('microsoftGraph.oauth_authorityv2', env('OAUTH_AUTHORITYV2')).
            config('microsoftGraph.oauth_tenant_id', env('OAUTH_TENANT_ID')).
            config('microsoftGraph.oauth_token_endpoint', env('OAUTH_TOKEN_ENDPOINT'));
    }

    public static function createClientV2()
    {
        return [
            'client_id'                => config('microsoftGraph.oauth_app_id', env('OAUTH_APP_ID')),
            'client_secret'            => config('microsoftGraph.oauth_app_password', env('OAUTH_APP_PASSWORD')),
            'scope'                    => config('microsoftGraph.oauth_scopes', env('OAUTH_SCOPES')),
            'username'                 => config('microsoftGraph.oauth_user_email', env('OAUTH_USER_EMAIL')),
            'password'                 => config('microsoftGraph.oauth_user_password', env('OAUTH_USER_PASSWORD')),
            'grant_type'               => 'password',
        ];
    }

    public static function createClient()
    {
        return new \League\OAuth2\Client\Provider\GenericProvider([
            'clientId'                => config('microsoftGraph.oauth_app_id', env('OAUTH_APP_ID')),
            'clientSecret'            => config('microsoftGraph.oauth_app_password', env('OAUTH_APP_PASSWORD')),
            'redirectUri'             => config('microsoftGraph.oauth_redirect_uri', env('OAUTH_REDIRECT_URI')),
            'urlAuthorize'            => config('microsoftGraph.oauth_authority', env('OAUTH_AUTHORITY')).config('microsoftGraph.oauth_authorize_endpoint', env('OAUTH_AUTHORIZE_ENDPOINT')),
            'urlAccessToken'          => config('microsoftGraph.oauth_authority', env('OAUTH_AUTHORITY')).config('microsoftGraph.oauth_token_endpoint', env('OAUTH_TOKEN_ENDPOINT')),
            'urlResourceOwnerDetails' => '',
            'scopes'                  => config('microsoftGraph.oauth_scopes', env('OAUTH_SCOPES')),
        ]);
    }

    public static function createClientGuzzle($uri, $datos)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->post($uri, [
            'form_params' => $datos
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public static function prepare_url_get_url_files($file_id)
    {
        $driveId = config('microsoftGraph.microsoft_drive_id', env('MICROSOFT_DRIVE_ID'));
        return "/drives/{$driveId}/items/{$file_id}/preview";

        //        https://graph.microsoft.com/v1.0/drives/b!Zoe6MnUBAk-n0q5EZsykMlcb1nEomE5Dv2xyY9qDuomaymQ4tb9_Rbaocnc_hI1j/items/01WWTU4BFFLIIWTLBK6VAJPZBF4JXLBWBS/preview
    }

    public static function prepare_url_download_url_files($file_id)
    {
        $driveId = config('microsoftGraph.microsoft_drive_id', env('MICROSOFT_DRIVE_ID'));
        return "/drives/{$driveId}/items/{$file_id}";;
    }
}
