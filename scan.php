<?php
// Konfiguration

// Plex Daten
$http = "http";
$serverip = "";
$serverport = "32400";
$token = "";

// MySQL Daten
$host = "localhost";
$username = "root";
$datenbank = "plesk";
$passwort = "";

// Konfiguration Ende

$conn = new mysqli($host, $username, $passwort, $datenbank);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$urllibrarysections = $http."://".$serverip.":".$serverport."/library/sections/?X-Plex-Token=".$token;

$i = 1;

 $librarysectionsxml = simplexml_load_file($urllibrarysections);
 foreach($librarysectionsxml->Directory AS $element) {
  $libraryid = $element['key'];
  $urldetails = $http."://".$serverip.":".$serverport."/library/sections/".$libraryid."/all?X-Plex-Token=".$token;

    // MySQL vorbereiten:
    $eintrag = $conn->prepare("INSERT INTO bibliothek (plkey, title, pltype, scanner, agent, composite, contentChangedAt, updatedAt, createdAt, pllanguage, plxml) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $eintrag->bind_param("sssssssssss", $sqlkey, $sqltitle, $sqltype, $sqlscanner, $sqlagent, $sqlcomposite, $sqlcontentChangedAt, $sqlupdatedAt, $sqlcreatedAt, $sqllanguage, $sqlxml);

    $sqlkey = $element['key'];
    $sqltitle = $element['title'];
    $sqltype = $element['type'];
    $sqlscanner = $element['scanner'];
    $sqlagent = $element['agent'];
    $sqlcomposite = $element['composite'];
    $sqlcontentChangedAt = $element['contentChangedAt'];
    $sqlupdatedAt = $element['updatedAt'];
    $sqlcreatedAt = $element['createdAt'];
    $sqllanguage = $element['language'];
    $sqlxml = $element->__toString();
     $eintrag->execute();

    if ($element['type'] != "photo" AND $element['type'] != "show"){

      $detailxml = simplexml_load_file($urldetails);
      foreach($detailxml AS $item){
        // foreach für jedes Element "ITEM", aber nur falls nicht "Foto" oder "Serie"
        $eintrags = $conn->prepare("INSERT INTO items (ratingKey,plkey,plguid,studio,pltype,title,titleSort,originalTitle,contentRating,summary,audienceRating,year,thumb,art,duration,originallyAvailableAt,addedAt,updatedAt,audienceRatingImage,chapterSource,     Media_ID,Media_bitrate,Media_width,Media_height,Media_aspectRatio,Media_audioChannels,Media_audioCodec,Media_videoCodec,Media_videoResolution,Media_container,Media_videoFrameRate,Media_videoProfile,media_duration) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $eintrags->bind_param("sssssssssssssssssssssssssssssssss",$sql_item_ratingKey,$sql_item_plkey,$sql_item_plguid, $sql_item_studio,$sql_item_pltype, $sql_item_title, $sql_item_titleSort, $sql_item_originalTitel, $sql_item_contentRating, $sql_item_summary,$sql_item_audienceRating,$sql_item_year,$sql_item_thumb,$sql_item_art,$sql_item_duration,$sql_item_originallyAvailableAt,$sql_item_addedAt,$sql_item_updatedAt,$sql_item_audienceRatingImage,$sql_item_chapterSource,$sql_media_id,$sql_media_bitrate,$sql_media_width,$sql_media_height,$sql_media_aspectRatio,$sql_media_audioChannels,$sql_media_audioCodec,$sql_media_videoCodec,$sql_media_videoResolution,$sql_media_container,$sql_media_videoFrameRate,$sql_media_videoProfile,$sql_media_duration);


        $sql_item_ratingKey  = $item['ratingKey'];
        $sql_item_plkey  = $item['key'];
        $sql_item_plguid = $item['guid'];
        $sql_item_studio = $item['studio'];
        $sql_item_pltype = $item['type'];
        $sql_item_title = $item['title'];

        $sql_item_titleSort  = $item['titleSort'];
        $sql_item_originalTitel  = $item['originalTitle'];
        $sql_item_contentRating = $item['contentRating'];
        $sql_item_summary = $item['summary'];
        $sql_item_audienceRating = $item['audienceRating'];
        $sql_item_year = $item['year'];

        $sql_item_thumb  = $item['thumb'];
        $sql_item_art  = $item['art'];
        $sql_item_duration = $item['duration'];
        $sql_item_originallyAvailableAt = $item['originallyAvailableAt'];
        $sql_item_addedAt = $item['addedAt'];
        $sql_item_updatedAt = $item['updatedAt'];

        $sql_item_audienceRatingImage  = $item['audienceRatingImage'];
        $sql_item_chapterSource  = $item['chapterSource'];

        
        $sql_media_id = $item->Media['id'];
        $sql_media_bitrate = $item->Media['bitrate'];
        $sql_media_width = $item->Media['width'];
        $sql_media_height = $item->Media['height'];
        $sql_media_aspectRatio = $item->Media['aspectRatio'];
        $sql_media_audioChannels = $item->Media['audioChannels'];
        $sql_media_audioCodec = $item->Media['audioCodec'];
        $sql_media_videoCodec = $item->Media['videoCodec'];
        $sql_media_videoResolution = $item->Media['videoResolution'];
        $sql_media_container = $item->Media['container'];
        $sql_media_videoFrameRate = $item->Media['videoFrameRate'];
        $sql_media_videoProfile = $item->Media['videoProfile'];
        $sql_media_duration = $item->Media['duration'];


        


        $eintrags->execute();



        echo "Element ".$i."<br>";
        print_r($item);
        echo "<br>";
        $i++;


          // Test
          if($i == "5"){
            echo "Hallo";
            break;
            break 2;

          }


      }

      echo "Elemente: ".$i;


  }
 }

 $eintrag->close();
 $conn->close();

?>
