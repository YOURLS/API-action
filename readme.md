# Plugin for YOURLS : Custom API Action [![Listed in Awesome YOURLS!](https://img.shields.io/badge/Awesome-YOURLS-C5A3BE)](https://github.com/YOURLS/awesome-yourls/)

> 💡 This is a plugin sample. Build on it !

## What for

Create custom API `action`, such as:  
`http://sho.rt/yourls-api.php?username=x&password=xx&action=do_crazy_stuff&format=json` 

## How to

* In `/user/plugins`, create a new folder named `api-action`
* Drop these files in that directory
* Go to the Plugins administration page and activate the plugin 
* Have fun

## Format your returns

Your API function should, ideally, return an array like this one:
```php
	$return = array(
		'statusCode' => 200, // HTTP-like status code
		'simple'     => "a human readable one liner, if 'format=simple'",
		'message'    => 'a return status',
		'your_action' => array( 
			'something' => 'some value',   // anything function wants to return
			'otherthing' => 'other value',
		),
	);
```

## License

Do whatever the hell you want with it.
