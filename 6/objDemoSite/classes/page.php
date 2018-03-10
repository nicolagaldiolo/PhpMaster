<?php

class Page {
  // class Page's attributes
  public $content;
  public $title = "TLA Consulting Pty Ltd";
  public $keywords = "TLA Consulting, Three Letter Abbreviation, some of my best friends are search engines";
  public $buttons = array(
    "Home" => "home.php",
    "Page" => "page.php",
    "Contact" => "contact.php",
    "Services" => "services.php",
    "Site Map" => "sitemap.php",
  );

  public function __set($name, $value){
    $this->$name = $value;
  }

  public function Display(){
    echo "<body>\n<head>\n";
    $this->DisplayTitle();
    $this->DisplayKeywords();
    $this->DisplayStyles();
    echo "</head>\n<body>\n";
    $this->DisplayHeader();
    $this->DisplayMenu($this->buttons);
    echo $this->content;
    $this->DisplayFooter();
    echo "</body>\n</html>\n";
  }

  public function DisplayTitle(){
    echo "<title>" . $this->title . "</title>";
  }

  public function DisplayKeywords(){
    echo "<meta name='keywords' content='" . $this->keywords . "'/>";
  }

  public function DisplayStyles(){
    $style = <<<HTML
      <link href="assets/styles.css" type="text/css" rel="stylesheet">
HTML;
    echo $style;
  }

  public function DisplayHeader(){
    $header = <<<HTML
      <header>    
        <img src="assets/logo.gif" alt="TLA logo" height="70" width="70" /> 
        <h1>TLA Consulting</h1>
      </header>
HTML;
    echo $header;
  }

  public function DisplayMenu($buttons){
    $nav = "";
    foreach ($buttons as $key => $value){
      $nav .= $this->DisplayButton($key, $value, $this->isURLCurrentPage($value));
    }
    echo "<nav>{$nav}</nav>";
  }

  public function isURLCurrentPage($url){
    return ( strpos($_SERVER['PHP_SELF'], $url) !== false) ? true : false;
  }

  public function DisplayButton($name, $url, $active=true){
    if($active){
      $html = <<<HTML
        <div class="menuitem">
          <img src="assets/s-logo.gif" alt="" height="20" width="20" /> 
          <span class="menutext">{$name}</span>
        </div>
HTML;
    }else{
      $html = <<<HTML
      <div class="menuitem">
        <a href="{$url}">
          <img src="assets/s-logo.gif" alt="" height="20" width="20" /> 
          <span class="menutext">{$name}</span>
        </a>
      </div>
HTML;
    }

    return $html;

  }

  public function DisplayFooter(){
    $footer = <<<HTML
    <footer>
      <p>&copy; TLA Consulting Pty Ltd.<br />Please see our<a href="legal.php">legal information page</a>.</p>
    </footer>
HTML;
    echo $footer;
  }

}