
# YUGAL 

Create Modern Web App, Single Page Application and Modern Backend with YUGAL. Prebuild Markup with JS without BABEL. Develop Modern Applications with Limited Hosting.

## Author

 [@sinha.paurush](https://www.instagram.com/sinha.paurush/)


## Environment

Yugal Requires XAMPP/WAMPP developmental Environment. Yugal has capability to work within a Limited Hosting.


  
## Used In

This project is used in the following apps and projects:

- TMINC Kraya [http://kraya.tminc.ml]
- TMINC Folded Pages [http://fp.tminc.ml]
- Pranah [Under Development]

  
## Getting Started

To create a Yugal Project, run the following command in your htdocs or www or public_html folder.

```bash
  git clone https://github.com/sinhapaurush/yugal
  mv 'yugal' ./'my-project-name'
  cd ./'my-project-name'
  rm 'readme.md'
```
or,  you can do this all without copy-pasting each command with following command.

```bash
  git clone https://github.com/sinhapaurush/yugal && mv 'yugal' ./'my-project-name' && cd ./'my-project-name' && rm 'readme.md'
```
### String.php File
Define your universal variables and Library variables here. Some Required settings is available here in the form of variables. To enable the set the respective value to true and vice versa.
#### Never Delete a Pre-Defined variable from string.php file, even  if you don't have any use of it,it may create errors.
```bash
<?php
    $theme_color = '#FFFFFF'; 
    $favicon = array(false, false); 
    /*
        ENTER PATH OF YOUR FAVICON OR UPLOAD FAVICON IN ROOT FOLDER WITH NAME 'favicon.ico' 
        or NO FAVICON WILL BE SET,
        eg: $favicon = array("assets/favicon.png", "png");
    */

    $common_head_tag = ''; //ADD A COMMON HTML <HEAD> TAG HERE FOR ALL PAGES!
    // THIS FESTURE IS GIVEN TO ADD ANY ANALYTIC CODE OR EXTERNAL LINK, CSS ETC.

    $text_accent_heading = "#000000";
    $text_accent_cont = "#000000";

    $universal_library = array(); 
    //All univarsal library should be in Array


    $site_title = "TMINC SITE TITLE"; 
    //This will be used by Framework and external Library will be able to reach it.
    
    
    $webapp = true; //ENTER true if you are building webapp, else false. If you are not building webapp then you can delete 'menifest.webmenifest' file from dir.
    $yugal_enable_spa = true;
    //TRUE IF YOU WANT TO USE SPA FEATURE IN IT.

    //MYSQL / MARIADB DETAIL FOR EACH PAGE
    //OPTIONAL, IGNORE, EDIT,DELETE DO WHATEVER YOU WANT.
    $server = ''; 
    $user = ''; 
    $pass = ''; 
    $db = ''; 
    //END OF MYSQL / MARIA DB CREDENTIALS, NOW YOU CAN USE THESE VARIABLE FOR DB CONNECTIONS AND USAGE.
?>
```

  

## Pre-Requisite
- PHP
- JavaScript

##  Creating First App (Non Single Page App) 

##### Open terminal in your project's root Directory and run following command.

```bash
cd comp && touch button.php
```
Now a file "button.php" is created in your "comp" folder, paste the following code there. This will create a component in button function.

```
<?php 
  function cus_button($text){
    return("
      <button id='clickmebtn'>{$text}</button>
    ");
  }
?>
```
and save it.
##### Now open index.php, you must see the similiar code as below (if not editted).
```
<?php
    include('modules/tminc.php');   
    meta(
        array(
            "title"=>"TMINC PHP+JS",
            "design"=>array(
                "def"
            )
        )
    );
    $screen = prnt(
            p(
                array(
                    "style"=>"margin-top:45vh;text-align:center",
                    "id"=>"clickme"
                ),
                "Enter something below and click outside to see my power"
            ).
            center(
                textarea(
                    array(
                        "placeholder"=>"Enter Something",
                        "id"=>"text",
                        "style"=>"width:500px;height:30vh"
                    )
                )
            )
    );
    export_screen($screen);
    clicked("clickme", "
        toast('Thank You for Clicking me');
    ");
    script('
        widget("text").addEventListener("change", ()=>{
            widget("clickme").innerHTML = widget("text").value;
            widget("clickme").value="";
        });
    ');
    close();
?>
```
Deleted all this code, we'll write it again to learn it.

##### Now enter the following code.

```
  <?php
    include('modules/tminc.php');
  ?>
```
This will link the file to YUGAL
##### Now Open  ```meta()``` which accepts an array so that the tag must look similar to 
```
meta(array());
```
Array in ```meta()``` takes some ```head``` perameters. Right now to add title in page enter the following code.
```bash
meta(
  array(
    "title"=>"YOUR-TITLE-HERE"
  )
);
```
To import the ```button``` component we need to add ```import``` perameter in ```array``` in ```meta()```. So the ```meta()``` must look similar to the following code.
```bash
  meta(
    array(
      "title"=>"YOUR-TITLE-HERE",
      "import"=>"button"
    )
  );
```
In ```import``` parameter, a string is accepted, which is the file name of the file in which component is saved without ```.php``` and file must be in ```comp``` Directory. If you want to import components from multiple pages, just add comma and a space (```, ```)to separate names.
##### For Eg: 
```"import"=>"button, textbox"```

Now below, ```meta()``` enter the following code.

```bash
  $screen = prnt(
    cus_button("Click Me").
    "<span id='counter'>0</span>"
  );
  export_screen($screen);
```
In this code, we've defined our screen in ```YUGAL WIDGET TREE``` and with ```export_screen()``` this ```body``` tree is printed and given to browser window,  you can also use tradition way of defining ```body``` here. One example is given below.
```bash
  echo cus_button("Click Me"); ?>
  <span id="counter">0</span>
```
Output is going to be same. Now adding some JavaScript in it. This can too be done with traditional way, but we'll do it in YUGAL FUNCTIONS.
For JavaScript CLICK listener, YUGAL have ```clicked``` function in PHP and JS both, both will Output JavaScript's ```addEventListener```.

Enter the following code below the code.
```bash
  clicked("clickmebtn", "
    widget('counter').innerHTML = parseInt(widget('counter').innerHTML) + 1;
  ");
```
Here we introduced you with Yugal's JS ```widget``` method.

This method actually returns ```document.getElementById("some-id")```.This method was created to save time.


Now just simply add ```close()``` in PHP at the end of the code. This will simply clode ```<body>``` and ```<html>``` tags.

YUGAL also have an alternative to ```close()``` called ```end_doc()```,  this function is used when you want to import JavaScript Code from another JS file. See below how to do that.
```bash
  end_doc(array(
    "js/somescript.js"
  ));
```
Yes, it too accepts an Array, so that you can import multiple scripts in one go.

Now your code must look similar to the code below.

```bash
  <?php
    include('modules/tminc.php');
    meta(
      array(
        "title"=>"YOUR-PAGE-TITLE",
        "import"=>"button"
      )
    );
    $screen = prnt(
      cus_button("CLICK ME").
     " <span id='counter'>0</span>"
    );
    export_screen($screen);
    clicked("clickmebtn", "
      widget('counter').innerHTML = parseInt(widget('counter').innerHTML) + 1;
    ");
    close();
  ?>
```
Now you can run your code in the browser. A simple button and a ```0``` must be visible.

Now click button, it will count how much time you clicked it.

## Single Page App (SPA) in Yugal
You can actually open ```app.php``` and ```sample.php``` to see how it works.

### APP.PHP
```bash
    <?php
      include('modules/tminc.php');
      include('app_head.php');
          // END OF PROVISIONAL CODE

        $screen = prnt(
              nointernet().
              // PROGRESS BAR BELOW
              ''.
              // PROGRESS BAR ABOVE
              '<div id="root"></div>'
              ."<div class='fill_space_options' style='height:60px;'></div>"
          );
        export_screen($screen);


        // IF PAGE IS REQUESTED WITH GET DATA
        if (isset($_GET['page']) && @$_GET['page'] !== ""){
          preloaded($_GET['page'].".php");
        }else{
          preloaded("sample");
        }

        // END DOC
      end_doc(array(   
      ));
      ?>
```
Major functions used in ```APP.PHP``` is explained in Non-SPA guide above.

You can see in this page, ```app_head.php``` is included, this is nothing just header tags are being included right here. This will be explained below.

In ```$screen``` Yugal tree, ```<div id="root"></div>``` is defined, all imported body code will appear in this ```<div>``` this is very important for SPA, never delete it.

With ```preloaded()``` a simple PHP logic is written that is preloaded page is defined via URL or not.

```preloaded()``` tells YUGAL that which PAGE must be opened at first in SPA.

## APP_HEAD.PHP
In ```APP_HEAD.php``` the following code is pre-saved.
```bash
<?php
    include_once('modules/tminc.php');
    include('string.php');
       add_spa(
        array(
        "title"=>array(
            "hi"=>"",
            "en"=>""
        ),
        "design"=>array(
            "def"
                ),
        "css"=>array(
            "design/no_internet.css",
            "design/progress.css"
        ),
        "import"=>"nointernet"
    ));
?>

```
Here in place of ```meta()```, ```add_spa()``` is used, this function is only for this page, this includes some SPA files and ANIMATIONS.

### SAMPLE.PHP
```sample.php``` file below.
```bash
<?php
    include('modules/tminc.php');
    $head = spa(
        array(
        "title"=>array(
            "hi"=>" - सबकुछ",
            "en"=>$site_title." - Everything"
        ),
        "import"=>"header"
    ));
      $screen = prnt(
          prnt(
            "sd"
            ).
          "HELLO WORLD"
      );
      save_screen($head, $screen);

?>
```
In this page in place of ```meta()```, ```spa()``` is used, this tag allow ```<head>``` to be converted according to SPA requirements.

```save_screen()``` function accepts 2 parameters, parameter 1: ```<head>``` code and parameter 2:```<body>``` code

Because ```head``` tag is under ```spa()``` so ```spa()``` is saved in ```$head``` variable.  And body tree is save in ```$screen``` variable.

REMEMBER: You can't use tradional HTML coding way in this page, you can only use YUGAL TREE method for here.
However, you can write HTML in ```strings``` in YUGAL TREE.

Also YUGAL have some built-in functions to define ```tags``` easily.

For JavaScript Code, you can't use JS in this page, create a new ```.js``` file and link it in ```app_head.php``` in ```add_spa()``` function.

You can add JS in ```add_spa()``` in ```js``` parameter in ```array```, it also accepts an array.


## Deployment

Before Deployment, head up to strinng.php file and do some changes as per the webapp.
- Change theme colour in $theme_color as per your App, this will change browser's colour accordingly.
- Set ```$webapp = true ``` or ```false```, if you have created a webapp then make it true else make it false.
- If you have created a WebApp then edit to menifest.webmenifest file and change values according to your app.
- Open ```.htaccess``` file and edit LINE 11 and change /yugal/ to file error404's path from the root. for eg: /error404
