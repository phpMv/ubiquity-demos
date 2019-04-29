# Authentification

Adds authentification to Admin controller (webtools access)

## Preview

![img](https://github.com/phpMv/ubiquity-demos/blob/master/auth-project/doc/images/admin-index-auth.png?raw=true)

## Howto
### AuthController creation
From the project folder, with devtools:
```bash
Ubiquity auth BasicAuthController
```
The following files are created:
- `BasicAuthControllerFiles` in `app/controllers/auth/files`
- `BasicAuthController` in `app/controllers`
- Customizable templates in `app/views/BasicAuthController`

### Creation of the authentication system
For the example, the connection identifiers are stored in the `config/adminConfig.php` file (to be created if it does not exist):
```php
return array(
	"devtools-path"=>"Ubiquity",
	"email"=>"root@dev.local",
	"password"=>"admin"
	);
```
Override the `BasicAuthController` `_connect` method to allow connection with the identifiers stored in this file:
```php
protected function _connect() {
		if(URequest::isPost()){
			$email=URequest::post($this->_getLoginInputName());
			$password=URequest::post($this->_getPasswordInputName());
			$config=(new Admin())->getConfig();
			if($config["email"]===$email && $config["password"]===$password){
				return $email;
			}
		}
		return;
	}
```
Override the `onConnect` method to define the actions to be performed after connection:

```php
	protected function onConnect($connected) {
		$urlParts=$this->getOriginalURL();
		USession::set($this->_getUserSessionKey(), $connected);
		if(isset($urlParts)){
			$this->_forward(implode("/",$urlParts));
		}else{
			Startup::forward("Admin");
		}
	}
```

### Adding authentification to Admin

```php
class Admin extends UbiquityMyAdminBaseController{
	use WithAuthTrait;
	protected function getAuthController(): AuthController {
		return new BasicAuthController();
	}
}
```
### Personalization of behaviour
See in [`BasicAuthController`](app/controllers/BasicAuthController.php)
### Customizing the display
See in [template files](app/views/BasicAuthController)

### Related documentation
- Guide: [auth controllers](https://micro-framework.readthedocs.io/en/latest/scaffolding/auth.html)
- API :
  - [AuthController](https://api.kobject.net/ubiquity/class_ubiquity_1_1controllers_1_1auth_1_1_auth_controller.html)
