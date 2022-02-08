<?php

// CURL: is a tool which gives u possibility to interact remotly to other services to other resources.
// I can get the users from this url using file.getContent,
// but sometimes file.getContent is blocked in terms of some security | policies,
// also cannot be used if we want to pass some additional headers to the request,
// or if we want to post some information.
// this is the place where we need to use CURL.

$url = 'https://jsonplaceholder.typicode.com/users';

// Sample example to get data

/*
# Initialize(create) a resource
$resource = curl_init($url);
# Set couple of options of that resource
curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
# excecution the resource
$result = curl_exec($resource);
$code   = curl_getinfo($resource, CURLINFO_HTTP_CODE);

var_dump($code);
echo $result;

curl_close($resource);

 */

// Get response status code
// set_opt_array
// Post request on that endpoint(url) to create the user in the following API

$user = array(
    'name'     => 'Ahmad aldabouqi',
    'username' => 'ahmadaldabuqi',
    'email'    => 'a@gmail.com'
);

$resource = curl_init();
curl_setopt_array($resource, array(
    CURLOPT_URL            => $url,
    CURLOPT_RETURNTRANSFER => true,
    // Enable the POST response.
    CURLOPT_POST           => true,
    CURLOPT_HTTPHEADER     => array('content-type: application/json'),
    // The data to transfer with the response.
    CURLOPT_POSTFIELDS     => json_encode($user)
));

$result = curl_exec($resource);
curl_close($resource);
echo ($result);
