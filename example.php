<?php
// composer autoloader
require 'vendor/autoload.php';

// namespace config
use Pardot\Core\API as PardotAPI;
use Pardot\Core\API as PardotConfig;

//See Config source for more details
$pardot_config = new PardotConfig(
    array(
    'email' => "<YOUR EMAIL>",
    'password' => "<YOUR PASSWORD>",
    'userkey' => "<YOUR USER KEY>",
    )
);

// read email by id
echo 'Get email by ID:' . "\n";
$email = PardotAPI::Instance($pardot_config)->doOperationById(PardotAPI::OBJ_EMAIL, PardotAPI::OPR_READ, 447822116);
var_dump($email['response']->email);

// read prospect by email
echo 'Get prospect by email:' . "\n";
$prospect = PardotAPI::Instance($pardot_config)->doOperationByField(
    PardotAPI::OBJ_PROSPECT,
    PardotAPI::OPR_READ,
    'email',
    'email@example.com'
);
var_dump($prospect);

// read all prospects updated in the last 15 minutes
$prospects = PardotAPI::Instance($pardot_config)->queryObject(PardotAPI::OBJ_PROSPECT, array('updated_after' => '15 minutes ago'));
var_dump($prospects);

//read all forms created after 10 days
$forms = PardotAPI::Instance($pardot_config)->queryObject(PardotAPI::OBJ_FORM, array('created_after' => '10 days ago'));
var_dump($forms);
