 <?php
 
 
 
 

$mysqli  =  new mysqli(
    "localhost",
    "root",
    "12345",
    "cati_production",
    3306
    );

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
 
 
//$files = glob('*.csv');
 

$files = glob('*.csv');

foreach($files as $file){
 
    //clean names if needed
//     $filename = explode('\\',$file);
//     $filename2clean = str_replace('.csv','', $filename[5]);//because my file is under 5 folders on my PC
    $n = "devices_log"; //  strtolower(str_replace('fileprefix_','', filename2clean));
    
//     echo '<br>Create table <b>'.$n.'</b><hr>';
    
//     $sql = "CREATE TABLE IF NOT EXISTS `mydatabase`.`".$n."` (`email` varchar(60), `lastname` varchar(60), `firstname` varchar(60), `country` varchar(19)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
    
//     if (!($stmt = $mysqli->query($sql))) {
//         echo "\nQuery execute failed: ERRNO: (" . $mysqli->errno . ") " . $mysqli->error;
//     };
    
    //echo '<br>Import data from <b>'.$n.'</b><hr>';
    
    $sql = "LOAD DATA INFILE '".basename($file)."' INTO TABLE `cati_production`.`".$n."`
        FIELDS TERMINATED BY ',' 
         LINES TERMINATED BY '\\n' 

        IGNORE 1 ROWS      (Name,@Last_Updated,@Tracked, @Actions)
 SET Tracked =IF(@Tracked IS NULL or @Tracked = '', 0, @Tracked), Actions = null, Last_Updated= DATE_FORMAT(STR_TO_DATE(@Last_Updated, '%c/%e/%Y %H:%i'), '%Y-%m-%d %H:%m:%s')";
    
 
    echo '<br>';
    $mysqli->query($sql);
    echo $sql;
    
//     if (!($mysqli = $mysqli->query($sql))) {
//         echo "\nQuery execute failed: ERRNO: (" . $mysqli->errno . ") " . $mysqli->error;
//     };
    
}

echo '...Import finished !<br>';
 
 
mysqli_close($mysqli);
?>

