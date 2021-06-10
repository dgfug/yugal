
# YUGAL 

Create Modern Web App, Single Page Application and Modern Backend with YUGAL. Prebuild Markup with JS without BABEL. Develop Modern Applications with Limited Hosting.

## Author

 [@sinha.paurush](https://www.instagram.com/sinha.paurush/)


## Recommended Environment

- ```XAMPP```, ```WAMPP```, ```APACHE``` Server
- Visual Studio Code

  
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
### Before you Start
Make sure that ```$yugal_enable_spa``` variable in ```string.php``` file is ```true```, by default it is ```false```.
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
        "title"=>"Some TITLE",
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
        "title"=>"Some Title,
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
- Change other pre defined variable in ```string.php``` as well.
- Set ```$webapp = true ``` or ```false```, if you have created a webapp then make it true else make it false.
- If you have created a WebApp then edit to menifest.webmenifest file and change values according to your app.
- Open ```.htaccess``` file and edit LINE 11 and change /yugal/ to file error404's path from the root. for eg: /error404
- Open ```tminc.php``` File in ```/modules``` directory, and in LINE ```4``` set ```ini_set("display_errors", "1");``` to ```ini_set("display_errors", "0");```


# Functions In Yugal
## PHP
### ```alert()```
Send JavaScript Alerts with PHP, in background, it prints JS ```alert()``` function, which allows developers to easily send alerts when needed from PHP, prevents code from being messed.

It accepts only one parameter, which is the alert message.

For eg: ```alert('Hello World')```

### ```export_screen()```
Export Screen prints the ```HTML``` or ```CSS``` or ```JS``` from PHP. It is used to make code easy to understand. 

It is used majorly in exporting ```body``` tag written in YUGAL BODY TREE.

Eg: 
```bash
$screen = "Hello World"
export_screen($screen);
```

### ```upload()```
As name defines, it uploads file on the server in one go.

Accepts 2 parameters, parameter 1, file array and parameter 2, upload Directory.

```upload($filearray, $upload_directory);```

There is no file size limit in this function.

Also it returns uploaded file path, so that you can save it in your Database and all.

Eg:
```bash
  $file_path = upload($_FILES['image'], 'public_images');
```

### ```save_cookie()```
- Saves data in browser's cookie
- Age of ```cookies``` saved with this function is ```30 Days```
- Accepts 2 parameters
- Parameter 1: ```cookie keyname```
- Parameter 2: ```cookie value```
- Eg: 
```bash
save_cookie('SOM_KEY', 'SOME_VALUE')
```

### ```cookie()```
- Simply return ```cookie``` from the browser storage.
- Accepts 1 parameter.
- Parameter 1: ```cookie keyname```

### ```style()```
- Allow users to write styles directly from ```PHP```.
- Suitable for small on-page styles.
- Accepts one parameter
- Parameter 1: ```style_code```
- Eg:
```bash
  style(
    "
      div{
        display:inline-block;
        font-size:20px;
      }
    "
  );
```
### ```delete_cookie()```
- Deletes cookie with key name.
- Accepts one parameter which keynameof the cookie which is to be deleted.
- Eg: 
```bash
  delete_cookie("KEY_NAME_OF_TARGET_COOKIE");
```

### ```meta()```
- This function defines ```<head>``` and opens ```<body>``` in YUGAL.
- You can define some parameter like title, keywords etc in this ```function```.
- It accepts an ```Array``` in it.
- Data key is defined in array key and value in respective value.
- For Eg: 
```bash
  meta(
    array(
      "title"=>"HI",
      "some_other_key"=>"SOME_VALUE"
    )
  );
```
- Eg:
```bash
  meta(
    array(
      "title"=>"SOME PAGE TITLE"
    )
  );
```

#### Parameters in ```meta()```
These parameters are exactly same in ```spa()```, ```add_spa()``` you wil learn below.

- ```title``` as String
- ```css``` as array accepts external ```CSS``` file path.
-  ```design``` as array accepts externa CSS in ```.php``` file
- ```description``` as string
- ```keyword``` as string
- ```robots``` as boolean, it ddescirbe that should Yugal allow crawlers to crawl the page.
- ```js``` as array, accepts external JS file path.
- ```custom``` as string, adds custom code in ```<head>``` so that external ANALYTIC, ADS code be implied.
- ```import``` as string, it imports component page from another page in ```comp```, no ```.php``` is required in it. Separate multiple pages with a comma and a space ```
- ```library``` as array, import library from ```lib``` folder, enter ```library``` folder name in ```lib``` Directory.

#### Some Univarsal Perameters can be defined in ```STRING.PHP```
- ```$theme_color``` as ```string``` defines theme colour of the app or website, it will change browser'scolour accordingly.
- ```$favicon``` as ```array``` accepts universal Favicon to add on website, in array only two indexes are required, in 0th index enter favicon path, and 1st index enter file type. If you don't want to set Favicon, make both indexes ```false``` and upload a file with ```favicon.ico``` as file name in root Directory.
- ```$common_head_tag``` as strng, defines common ```<head>``` tag for each ```page```.
- ```$universal_library``` as ```array```, will define universal library for each page.
### ```open()```
- Redirects to another page.
- ```PHP``` alternative is setting ```header()``` and then ```exit()``` that too had some issues.
- Accepts one parameter, which is destination URL.
- Eg:
```bash
  open("some-page-url");
```
- Some Other example.
```bash
  if (true){
    //SOME CODE
  }else{
    open("false-page.php");
  }
```
### ```error()```
- Send error in Console as in JS ```console.error()```.
- This may not work sometimes.
- Accepts one parameter, which is error message.
- ```console($errmessage)```
- DEPRECATED
- Eg: 
```bash
  error("SOME BACKEND ERROR");
```
### ```console()```
- Logs info in console.
- Accepts one parameter, which is log message.
- ```console($logmessage)```
- This may not work sometimes.
- DEPRECATED
- Eg: 
```bash
  console("SOME LOG INFO");
```

### ```warn()```
- Send warning logs info in console.
- Accepts one parameter, which is warning message.
- ```console($warnmessage)```
- This may not work sometimes.
- DEPRECATED
- Eg: 
```bash
  warn("SOME WARN MESSAGE");
```

### ```encrypt()```
- Encrypts key and Value, and saves it in the cookie.
- Accepts 2 parameter.
- Parameter 1: ```tag name```
- Parameter 2: ```value```
- ```encrypt('tagname', 'value');```
- Eg: 
```bash
  encrypt("some-cookie-keyname", "Cookie-Value");
```
- In this cookie key can not be decrypted but the value can be.

### ``` md5cook()```
- Encrypts key and Value, and saves it in the cookie.
- Accepts 2 parameter.
- Parameter 1: ```tag name```
- Parameter 2: ```value```
- ```encrypt('tagname', 'value');```
- Eg: 
```bash
  md5cook("some-cookie-keyname", "Cookie-Value");
```
- In this cookie key and value both can't be decrypted.

### ```dccook()```
- Returns cookie value after decrypting it which was save with ```encrypt()```.
- Accepts only on parameter, cookie key name which was given in ```encrypt()```.
- ```dccook("COOKIE-KEY-NAME")```
- Eg: 
```bash
  $value = dccook("COOKIE_KEY_NAME");
```
- Extra example
```bash
  //SAVING COOKIE
  encrypt("name", "Paurush Sinha");

  //GETTING COOKIE VALUE WHICH IS SAVED ABOVE
  $value = dccook("name");

  // PRINTING DECRYPTED COOKIE VALUE
  echo $value;
```

### ```save_local()```
- Save data in ```localstorage``` of the browser with JS.
- Accepts two parameters.
- Parameter 1: ```keyname```
- Parameter 2: ```value to store```
- ```save_local($keyname, $value_to_store)```
- Eg: 
```bash
  save_local("Name", "Paurush Sinha");
```
### ```del_local()```
- Deletes data in ```localstorage``` of the browser with JS.
- Accepts one parameters.
- Parameter 1: ```keyname```
- ```save_local($keyname)```
- Eg: 
```bash
  del_local("Name");
```
### ```loadevent()```
- Hits ```JavaScript``` event, when the page is loaded.
- Accepts one parameter, ```JavaScript Functions```.
- Accepts functions as string.
- Eg: 
```bash
  loadevent("
    alert('Full Page is loaded.');
  ");
```

### ```import()```
- Import components from ```comp``` folder.
- Only filename is required, not even ```.php```
- Only ```.php``` files can be imported.
- Accepts and ```array()```
- Accepts only one parameter, which is too an ```array```, which allows you to import multiple components from ```comp``` Directory.
- ```import(array());```
- Eg: 
```bash
  import(
    array(
      "button",
      "textbox"
    )
  );
```
### ```clicked()```
- Hits a ```JavaScript``` event when an element is clicked.
- Accepts 2 parameters, both as ```strings```.
- Parameter 1: Id of element which is clicked.
- Parameter 2: ```JavaScript Function``` to be hitted on element click.
- ```clicked($id, $function);``` 
- Eg: 
```bash
  echo "<button id='clickbtn'>Click Me</button>";

  clicked("clickbtn", "
    alert('Thanks for clicking me.');
  ");
```

### ```mouseover()```
- Hits a ```JavaScript``` event when cursor comes over the respective element.
- Accepts 2 parameters, both as ```strings```.
- Parameter 1: Id of element which is clicked.
- Parameter 2: ```JavaScript Function``` to be hitted on element mouse over.
- ```mouseover($id, $function);``` 
- Eg: 
```bash
  echo "<button id='clickbtn'>Click Me</button>";

  mouseover("clickbtn", "
    alert('Thanks for clicking me.');
  ");
```
## JavaScript
### ```getbyid(), widget(), select()```
- Selects ```DOM``` element with ```id```.
- Requires only one ```parameter``` which is ```id``` of the element.
- ```getbyid(id)```
- Eg:
```bash
  getbyid("some_div").innerHTML = "Hi! I am a message";
```
### ```getbytag()```
- Selects ```DOM``` element with ```tag names```.
- Requires only one ```parameter``` which is ```tag``` of the element.
- ```getbytag(tag)```
- Returns a ```list``` of elements with the same tag name.
- Eg:
```bash
  getbytag("div")[0].innerHTML = "Hi! I am a message";
```


### ```getbyclass()```
- Selects ```DOM``` element with ```class names```.
- Requires only one ```parameter``` which is ```class name``` of the element.
- ```getbyclass(classname)```
- Returns a ```list``` of elements with the same class name.
- Eg:
```bash
  getbyclass("red_sections")[0].innerHTML = "Hi! I am a message";
```

### ```getbyquery()```
- Selects ```DOM``` element with ```query```.
- Requires only one ```parameter``` which is ```query``` of the element.
- ```getbyquery(query)```
- Eg:
```bash
  getbyquery("#div").innerHTML = "Hi! I am a message";
```

### ```hover()```
- Hits function when cursor comes over respective element.
- Requires two parameters.
- Parameter 1: ```id``` of the respective element.
- Parameter 2: ```Javascript function``` to run.
- ```hover(id, function)```
- Eg: 
```bash
  hover("some_btn", ()=>{
    alert('You came over me");
  });
```
### ```clicked()```
- Hits function when respective element is clicked.
- Requires two parameters.
- Parameter 1: ```id``` of the respective element.
- Parameter 2: ```Javascript function``` to run.
- ```clicked(id, function)```
- Eg: 
```bash
  clicked("some_btn", ()=>{
    alert('You clicked me");
  });
```

### ```title()```
- Sets or Gets ```title``` of the page.
- It can only accept one parameter.
- Parameter 1: ```change <title> to```
- If parameter 1 is present then this ```function``` will change title to the given one.
- If no parameter is passed, it will return current title.
- 
```bash
  title(newtitle)
  //However this parameter is optional.
  ``` 
- Eg: 
```bash
  //Fetching Current Title
  let current_title = title();

  //SETTING NEW TITLE
  title("New Title"); 
```
### ```delete_cookie()```
- Deletes a cookie
- Accepts only one parameter which ```cookie``` key name.
- Eg: 
```bash
  delete_cookie("name");
```

### ```open()```
- Redirects to another page.
- Requires only one parameter which is destination URL.
- ```open('page')```
- Eg: 
```bash
  clicked("some_button", ()=>{
    open("page");
  })
```

### ```reload()```
- Reloads the page
- No parameter required.
- Eg: 
```bash
  if (true){
    alert('Woo Hoo');
  }else{
    reload();
  }
```
### ```save_local()```
- Save data in local storage.
- Two parameter is required.
- Parameter 1: ```localstorage key```
- Parameter 2: ```localstorage value```
- ```save_local(key, value)```
- Eg: 
```bash
  save_local("name", "Paurush Sinha");
```

### ```del_local()```
- Deltes value from local storage.
- One parameter is required.
- Parameter 1: ```localstorage key```
- ```del_local(key)```
- Eg: 
```bash
  del_local("name");
```
### ```save_cookie()```
- Save data in cookie storage.
- Two parameter is required.
- Parameter 1: ```cookie key```
- Parameter 2: ```cookie value```
- ```save_cookie(key, value)```
- Eg: 
```bash
  save_cookie("name", "Paurush Sinha");
```

# Single Page App (SPA) Functions
## ```tminc.launch(), navigate()```
- Used in place of ```href``` in SPA app.
- Accepts only one parameter, which is destination page name.
- ```tminc.launch(pageName)```
- Eg: 
```bash
  <a href="">CLICK ME</a>
  <!--ABOVE CODE WAS USED IN NON SPA APPS TO NAVIGATE BETWEEN SCREENS-->

  <!--BUT IN SPA APPS, CODE BELOW IS REQUIRED TO NAVIGATE BETWEEN SCREENS-->
  <a onclick="tminc.launch('page')">CLICK ME</a>
  <!-- THIS CODE IS FOR EXAMPLE ONLY, YOU CANT USE RAW HTML IN SPA,
    EITHER YOU NEED TO MAKE IT IN STRING OR MAKE IT WITH 
    YUGAL TREE METHOD.
  -->
```

## ```tminc.replace()```
- It replaces whole page with another.
- Accepts only one parameter which is page name.
- It calls page which is given in parameter, and replaces with ```<html>``` tag.
- IT'S SOMETHING BUGGY
- Eg:
```bash
  tminc.replace("page");
```
## ```tminc.makeBlank```
- It makes respective element blank.
- Requires only one parameter, which is element ```id```.
- ```tminc.makeBlank(id)```
- Eg:
```bash
  tminc.makeBlank("clean_me");
```

## ```preloaded()```
- Defines which page to be loaded at starting.
- Requires only one parameter, which is page name.
- ```preloaded(pagename)```
- Eg: 
```bash
  preloaded("home");
```

# SPA PHP FUNCTIONS
## ```add_spa()```
- It is alternative to ```meta()``` in SPA to meet SPA requirements.
- It can be only used in SPA frame page (```app.php```). 

## ```spa()```
- It is alternative to ```meta()``` in SPA to meet SPA requirements.
- It can be only used in pages other than SPA frame page (```app.php```). 
## ```preloaded()```
- Defines which page to be loaded by default. (Used in ```app.php``` page only)
- Accepts only one parameter, which is page name.
- ```preloaded($page)```
- Eg:
```bash
  preloaded("Page");
```
## ```save_screen()```
- On SPA pages (not on app.php), it compiles whole page into **JSON** data. It is required for making it accessable on another screen.
- Requires two parameter.
- Parameter 1: ```<head>``` tag variable.
- Parameter 2: ```YUGAL TREE``` or ```<body> in strings```
- ```save_screen($head, $yugal_body_tree)```  
- Eg: 
```bash
  $head = spa(
    array(
      "title"=>"Page Title"
    )
    );
    $body = prnt(
      "<p>Hi</p>"
    );

    save_screen($head, $body);
```
## ```test_screen()```
- Similar to ```save_screen()``` parameters are same to ```save_screen()```.
- Unlike ```save_screen()``` it dont compiles page into JSON, it compiles page in tradional HTML, CSS and JS.
- This can be use while Development to see preview.
Eg: 
```bash
  $head = spa(
    array(
      "title"=>"Page Title"
    )
    );
    $body = prnt(
      "<p>Hi</p>"
    );

    test_screen($head, $body);
```
## ```spa_body()```
- ```spa_body()``` replaces ```inverted commas``` as per the SPA.
- It makes decreases errors.
- Requires one parameter, which is ```<body>``` from YUGAL TREE.
- ```spa_body($yugal_tree)```
- Eg:
```bash
  $head = spa(
    array(
      "title"=>"Page Title"
    )
    );
    $body = spa_body(prnt(
      "<p>Hi</p>"
    ));

    save_screen($head, $body);
```
