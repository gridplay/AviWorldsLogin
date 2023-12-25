<?php
namespace GridPlay\AWLogin;
use GuzzleHttp\RequestOptions;
use SocialiteProviders\Manager\OAuth2\AbstractProvider;
use SocialiteProviders\Manager\OAuth2\User;
class Provider extends AbstractProvider {
    public const IDENTIFIER = 'AWLOGIN';
    protected $scopes = ['users'];
    protected $scopeSeparator = ' ';
    protected function getAuthUrl($state) {
        return $this->buildAuthUrlFromBase(
            'https://aviworlds.com/oauth/authorize',
            $state
        );
    }
    protected function getTokenUrl() {
        return 'https://aviworlds.com/oauth/token';
    }
    protected function getUserByToken($token) {
        $response = $this->getHttpClient()->get(
            'https://aviworlds.com/api/users',
            [
                RequestOptions::HEADERS => [
                    'Authorization' => 'Bearer '.$token,
                ],
            ]
        );

        return json_decode((string) $response->getBody(), true);
    }
    protected function mapUserToObject(array $user) {
        return (new User())->setRaw($user)->map([
            'id'         => $user['id'],
            'name'       => $user['name'],
            'uuid'       => $user['uuid'],
        ]);
    }
}
