# PHPMagic

  

## Introduction

PHPMagic is a very simple and small framework, for creating PHP applications. The main goal was, to make the

framework as easy and slim as possible. PHPMagic is currently offering URL-Routing, a simple template rendering,

Controller handling and error logging and handling.

  

## Setup

Download the repo, extract it where you want and configure your apache installation to point to that directory.

You will also need to make sure, that 'AllowOverride All' is enabled for the framework directory.

  
## First Steps
We are going to create our first controller, that will display something for us once we call localhost/hello.

Open config/routes.json.
You will see the following:
```
"/": {

	"controller": "IndexController"

}
```
Copy this section, paste it in and change the "/" to "/hello", for the "controller" key give it any name you want, in our example we will name it "HelloController".

So your routes.json will look like the following:

```
"/": {

	"controller": "IndexController"

},

"/hello": {

	"controller": "HelloController"

}
```

Go to controller/ and copy the "IndexController.php", paste it in the same directory and change its name to "HelloController.php". Open the file and change also its class name to "HelloController".
In PHPMagic every controller must use the ControllerInterface and implements the methods there. Also your controller will have to inherit from the AppController.

Now we have here a very important line:
`return  parent::getView("index.html", ['stringKey' => 'This is our first template :)', 'configTitle' => 'Hello']);`

So lets take a look at the 'getView' method that we inherit here from our parent class:

- The first parameter is the template name, that will be rendered, currently this will be the "index.html".

- The second parameter is an array. Now this one here is really important: the array keys, will be the same keys that we will write in our html template. So for every key that we pass here, PHPMagic will get its value, check if that key is present in our html template (in this case the index.html) and write the value in the template. 
The only exception to that is the 'configTitle' key. This key is always present (can be changed in the header.html in templates/core/)

We are going to change this line to meet our needs:
`return  parent::getView("hello.html", ['message' => 'first controller!', 'configTitle' => 'Hello World!']);`

For the last step we will go to the folder templates/ and copy the 'index.html' there. Then rename it to 'hello.html', open the file and change this line:

`%stringKey%`
to:
`%message%`

Now we are done! You can open localhost/hello and see the result of your first controller. Have fun.

