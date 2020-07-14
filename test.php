<!DOCTYPE html>
<html>
    <body>
        <?php
            $myfile = fopen("movies.json","r"); 
            $json=fread($myfile,filesize("movies.json"));
            fclose($myfile);
            
            $array = json_decode($json,true);
            print_r($array);
            echo $array["movies"][0]['name'];
        ?>    
    </body>
</html>
