<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// To use reCAPTCHA, you need to sign up for an API key pair for your site.
// link: http://www.google.com/recaptcha/admin
$config['recaptcha_site_key'] = '6LdXqzYUAAAAACVMGBdwiKw1FhhtYLCJwQdIj9Lu';
$config['recaptcha_secret_key'] = '6LdXqzYUAAAAACvpACJSVd7ASJBcSBtZ4CcwIGjl';

// $config['recaptcha_site_key'] = '6LfrWjcUAAAAANsBalVOfIpR2LO5N8fjSktUVckg';
// $config['recaptcha_secret_key'] = '6LfrWjcUAAAAAJ4NmXvFG_BX25vI-MaK4NVaaXOX';

// reCAPTCHA supported 40+ languages listed here:
// https://developers.google.com/recaptcha/docs/language
$config['recaptcha_lang'] = 'en';

/* End of file recaptcha.php */
/* Location: ./application/config/recaptcha.php */
