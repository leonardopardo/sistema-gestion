<?php
// Copyright (c) Microsoft Corporation.
// Licensed under the MIT License.

namespace App\Helpers;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

class TokenCache {
    public function storeTokens($accessToken, $user = null) {
        session([
            'accessToken' => $accessToken->access_token,
            'refreshToken' => $accessToken->refresh_token,
            'tokenExpires' => $accessToken->expires_in,
            // se deshabilita ya que va a ser siempre el mismo usuario. No mostramos el nombre porque no se necesita
            //'userName' => $user->getDisplayName(),
            //'userEmail' => null !== $user->getMail() ? $user->getMail() : $user->getUserPrincipalName()
        ]);
    }

    public function clearTokens() {
        session()->forget('accessToken');
        session()->forget('refreshToken');
        session()->forget('tokenExpires');
        session()->forget('userName');
        session()->forget('userEmail');
    }

    // <GetAccessTokenSnippet>
    public function getAccessToken() {
        // Check if tokens exist
        if (empty(session('accessToken')) ||
            empty(session('refreshToken')) ||
            empty(session('tokenExpires'))) {
            try{
                $this->siempreConectado();
            }catch(\Exception $exception){
                return '';
            }

        }

        // Check if token is expired
        //Get current time + 5 minutes (to allow for time differences)
        $now = time() + 300;
        if (session('tokenExpires') <= $now) {
            // Token is expired (or very close to it)
            // so let's refresh

            // Initialize the OAuth client usando graph original
            $oauthClient = GraphHelper::createClient();

            try {
                $newToken = $oauthClient->getAccessToken('refresh_token', [
                    'refresh_token' => session('refreshToken')
                ]);

                // Store the new values
                $this->updateTokens($newToken);

                return $newToken->getToken();
            }
            catch (IdentityProviderException $e) {
                return $e;
            }
        }

        // Token is still valid, just return it
        return session('accessToken');
    }
    // </GetAccessTokenSnippet>

    // <UpdateTokensSnippet>
    public function updateTokens($accessToken) {
        session([
            'accessToken' => $accessToken->getToken(),
            'refreshToken' => $accessToken->getRefreshToken(),
            'tokenExpires' => $accessToken->getExpires()
        ]);
    }

    public function siempreConectado()
    {
        $uri = GraphHelper::createUri();
        $client = GraphHelper::createClientV2();

        $access_token = GraphHelper::createClientGuzzle($uri, $client);

        $this->storeTokens($access_token);

    }
    // </UpdateTokensSnippet>
}
