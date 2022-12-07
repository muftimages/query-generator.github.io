<?php
include 'idea-search-data.php';
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$final_link = strtok($actual_link,'?');
?>
<html>
  
<head>
    <title>Search Query Generator</title>
    <style type="text/css">
        a {font-size: 30px}
        span {font-size:22px}
        select, option {font-size:18px}
    </style>
</head>
  
<body>
    <h1>Generate Search Queries</h1>
    <fieldset>
        <form method="get" action="" enctype="multipart">
                <span>Categories:</span>
                <select name="category" id="category">
                    <option value="" disabled selected>Choose Option</option>
                    <?php foreach ($categories as $key => $category) { ?>
                        <option value="<?php echo $category;?>" <?php if(isset($_GET['category']) && $_GET['category'] == $category){echo 'selected';} ?> ><?php echo $category;?></option>
                    <?php } ?>
                </select>
                &nbsp; &nbsp; OR  &nbsp; &nbsp; <span>Search Term<span>:
                <input name="search_term" id="search_term" value="<?php if(isset($_GET['search_term'])){echo $_GET['search_term'];} ?>">
                <br>
                <br>
                <span>Festivals:</span>
                <select name="festival" id="festival">
                    <option value="" disabled selected>Choose Option</option>
                    <?php foreach ($festivals as $key => $festival) { ?>
                        <option value="<?php echo $festival;?>" <?php if(isset($_GET['festival']) && $_GET['festival'] == $festival){echo 'selected';} ?> ><?php echo $festival;?></option>
                    <?php } ?>
                </select>
                <br>
                <br>
                <span>Platform:</span>
                <select name="platform" id="platform">
                    <option value="" disabled selected>Choose Option</option>
                    <?php foreach ($platforms as $key => $platform) { ?>
                        <option value="<?php echo $platform;?>" <?php if(isset($_GET['platform']) && $_GET['platform'] == $platform){echo 'selected';} ?> ><?php echo $platform;?></option>
                    <?php } ?>
                </select>
                <br>
                <br>
                <input type="submit" value="Submit" name="submit" />
                <br>
                <br>
                <a href="<?php echo $final_link;?>" style="font-size: 20px">Clear</a>
        </form>
    </fieldset>
    <?php
       if(isset($_GET['submit']))
       {
           $catg = "";
           if(isset($_GET['category']) || (isset($_GET['search_term']) && !empty($_GET['search_term']))){
                $term = (!empty($_GET['category'])) ? $_GET['category'] : $_GET['search_term'];
                $catg = " for ".strtolower($term);
           }

           $fest = "";
           if(isset($_GET['festival'])){
                $fest = $_GET['festival'];
           }

           $plat = "";
           if(isset($_GET['platform'])){
                $plat = "site:".$_GET['platform'];
           }

            echo "<h3>Results:</h3>";
            $urlA = 'https://www.google.com/search?q='.$fest." creative ads".$catg." ".$plat;
            echo "<a href='".$urlA."' target='_blank'>".$fest." creative ads".$catg." ".$plat."</a><br>";
            echo "<hr>";

            $urlB = 'https://www.google.com/search?q='.$fest." post".$catg." ".$plat;
            echo "<a href='".$urlB."' target='_blank'>".$fest." post".$catg." ".$plat."</a><br>";
            echo "<hr>";

            $urlC = 'https://www.google.com/search?q='.$fest." images".$catg." ".$plat;
            echo "<a href='".$urlC."' target='_blank'>".$fest." images".$catg." ".$plat."</a><br>";
            echo "<hr>";

            $urlD = 'https://www.google.com/search?q='.$fest." banner".$catg." ".$plat;
            echo "<a href='".$urlD."' target='_blank'>".$fest." banner".$catg." ".$plat."</a><br>";
            echo "<hr>";
            
            $urlE = 'https://www.google.com/search?q='.$fest." background".$catg." ".$plat;
            echo "<a href='".$urlE."' target='_blank'>".$fest." background".$catg." ".$plat."</a><br>";
            echo "<hr>";
      }
    ?>
</body>
  
</html>