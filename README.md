#Form Validation

Strict typed HTML 5 compatible form validation classes.

###Installation

```command
composer require acfo/form-validation
```

###Usage

Implement the Form interface using the supplied FormImpl trait on your form validation class.
Add your form fields as properties (e.g. login form):

```php
class LoginForm implements Form
{
    use FormImpl;
    
    private $email;
    private $password;
    
    public function __construct()
    {
        $this->email = new Email(Requirement::Required);
        $this->password = new Password(Requirement::Required);
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getPassword()
    {
        return $this->password();
    }
}
```

The form validation class can be used to supply the view with client side validation parameters.   

```html
<form method="post" action="#">
    <input 
        name="email" 
        type="email" 
        minlength="<?= $loginForm->getEmail()->getMinLength() ?>" 
        maxlength="<?= $loginForm->getEmail()->getMaxLength() ?>"
        pattern="<?= $loginForm->getEmail()->getPattern() ?>"
        <?= $loginForm->getEmail()->getRequired() ?>
        >
    <input 
        name="password" 
        type="password" 
        minlength="<?= $loginForm->getPassword()->getMinLength() ?>" 
        maxlength="<?= $loginForm->getPassword()->getMaxLength() ?>"
        pattern="<?= $loginForm->getPassword()->getPattern() ?>"
        <?= $loginForm->getPassword->getRequired() ?>
        >
    <input type="submit">    
</form>
```


To perform server side validation of GET or POST form inputs call validate. 

```php
$loginForm = new LoginForm();

if (!$loginForm->validate($_POST)) {
    die('please do not try and feed me invalid data');
}
```
In most scenarios client side validation will trigger error messages and prevent invalid data from being sent 
to the server. The sole purpose of server side validation is to guard the server from malicious input. 

For those scenarios where form data validation relies solely on server side validation, 
the responsibility for displaying errors may also lie on the server side.    

Validation errors are stored on the form field objects. The form field method getError will return an empty string, 
'error missing', 'error invalid' or when specifically set by additional business logic 'error requirements'. 
The error strings can be used to display error messages in the view, e.g.:

CSS
```css
.feedback.missing, 
.feedback.invalid {
    display: none;
}

.error.missing .feedback.missing,
.error.invalid .feedback.invalid {
	color: red;
	display: block;
}
```

HTML
```html
<form method="post" action="#">
    <div class="<?= $loginForm->getEmail()->getError() ?>">
        <input 
            name="email" 
            type="email" 
            >
        <p class="feedback missing">Please enter your email.</p>
        <p class="feedback invalid">What you entered does not seem to be an email. Please try again.</p>
    </div>
    <div class="<?= $loginForm->getPassword()->getError() ?>">
        <input 
            name="password" 
            type="password" 
            >
        <p class="feedback missing">Please enter your password</p>
        <p class="feedback invalid">Your password has to be between 6 and 60 characters long</p>
    </div>
    <input type="submit">    
</form>
```

###Predefined form fields

#### Generic form fields
- Checkbox
- ConstListItem
- Date
- ListItem
- Number
- Text
#### Account form fields
- Email
- Password
#### Address form fields
- City
- Name
- Street
- ZipCode
#### Search form fields
- SearchString

Enjoy!