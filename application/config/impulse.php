<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$get_env = function (&$var, $default = null) {
    return !empty($var) ? $var : $default;
};

// Set the environment variable to get the username from.
$config['imp_username_env'] = $get_env(getenv("imp_username_env"), 'OIDC_CLAIM_preferred_username');

// Set the environment variable to get a name to display for the user.
$config['imp_displayname_env'] = $get_env(getenv("imp_displayname_env"), 'OIDC_CLAIM_name');

/* End of file config.php */
/* Location: ./application/config/config.php */
