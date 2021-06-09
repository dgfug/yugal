<?php

head("HELLO WORLD");

//  WAY ONE TO DEFINE A COMPONENT
// TO ADD THIS IN SCREEN, YOU NEED TO USE html() function or echo in Screen 
// eg for below function in landing screen, (index.php) html(head("Hello World")); is used
  function head($snap){
    return ("
      <header>
      {$snap}
      </header>
    ");
  }

  // 2ND WAY TO DEFINE A COMPONENT
  // NO NEED OF ECHO / html()
  function foot($snap){
    ?>
    <footer>
      <?php echo $snap; ?>
    </footer>
    <?php
  }

  // 3RD WAY TO DEFINE A COMPONENT
  // NO NEED OF echo or html() in screen
  function main($snap){
    echo "<main>".$snap."</main>";
  }
?>
