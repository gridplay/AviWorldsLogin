# AviWorldsLogin

```bash
composer require gridplay/aviworldslogin
```
## Installation & Basic Usage

Please see the [Base Installation Guide](https://socialiteproviders.com/usage/), then follow the provider specific instructions below.

### Add configuration to `config/services.php`

```php
'awlogin' => [
  'client_id' => env('AWLOGIN_CLIENT_ID'),
  'client_secret' => env('AWLOGIN_CLIENT_SECRET'),
  'redirect' => env('AWLOGIN_REDIRECT_URI'),
],
```
### Add provider event listener

Configure the package's listener to listen for `SocialiteWasCalled` events.

Add the event to your `listen[]` array in `app/Providers/EventServiceProvider`. See the [Base Installation Guide](https://socialiteproviders.com/usage/) for detailed instructions.

```php
protected $listen = [
    \SocialiteProviders\Manager\SocialiteWasCalled::class => [
        // ... other providers
        \GridPlay\AWLogin\AWLoginExtendSocialite::class.'@handle',
    ],
];
```

### Usage

You should now be able to use the provider like you would regularly use Socialite (assuming you have the facade installed):

```php
return Socialite::driver('awlogin')->redirect();
```

### Returned User fields
```php
$user = Socialite::driver('awlogin')->user();
$user->id
```
- ``id``
- ``name``
- ``uuid``
