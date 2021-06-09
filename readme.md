
# YUGAL 

Create Modern Web App, Single Page Application and Modern Backend with YUGAL. Prebuild Markup with JS without BABEL. Develop Modern Applications with Limited Hosting.

## Author

- [@sinha.paurush](https://www.instagram.com/sinha.paurush/)


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
    //ENTER PATH OF YOUR FAVICON OR UPLOAD FAVICON IN ROOT FOLDER 
    WITH NAME 'favicon.ico' or NO FAVICON WILL BE SET,
    // It accepts an array, 1st Value (0 Index) image path and 2nd value 
    (1st Index) should have image type or extension, for eg png or jpg etc
    
    $common_head_tag = ''; //ADD A COMMON HTML <HEAD> TAG HERE FOR ALL PAGES!
    // THIS FESTURE IS GIVEN TO ADD ANY ANALYTIC CODE OR EXTERNAL LINK, CSS ETC.
    
    $text_accent_heading = "#000000";
    $text_accent_cont = "#000000";
    $universal_library = array(); 
    //All univarsal library should be in Array
    $site_title = "TMINC SITE TITLE"; 
    //This will be used by Framework and external Library will be able to reach it.
    
    $single_page_app = false;
    TELLS YUGAL IF YOU ARE CREATING A SINGLE PAGE APP, IF YOU WANT TO CREATE A SPA, 
    THEN SET ITS VALUE TO TRUE.

    $webapp = true; 
    //ENTER true if you are building webapp, else false. If you are not building webapp 
    then you can delete 'menifest.webmenifest' file from dir.
    // DEFINE A COLOR VARIABLE HERE AND USE IT IN ALL PAGES 
    WITHOUT DEFINING OR INCLUDING AGAIN
    // NO NEED OF INCLUDING THIS PAGE AGAIN AS IT IS PRE INCLUDED IN ALL PAGES WITH MODULES

    //MYSQL / MARIADB DETAIL FOR EACH PAGE
    //OPTIONAL, IGNORE, EDIT,DELETE DO WHATEVER YOU WANT.
    $server = ''; //Usually it is 'localhost' should check your PANEL for this.
    $user = ''; //Usually it is 'root' in XAMPP and WAMPP, check your PANEL for this.
    $pass = ''; //By default blank in XAMPP AND WAMP, check your PANEL TO find this.
    $db = ''; //Your DB name.
    //END OF MYSQL / MARIA DB CREDENTIALS, NOW YOU CAN USE THESE VARIABLE FOR DB CONNECTIONS AND USAGE.
?>
```
## Appendix

Any additional information goes here

  
