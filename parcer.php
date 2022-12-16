<?php   
    require "vendor/autoload.php";
    use PHPHtmlParser\Dom;
    
    $dom = new Dom;
    $dom->loadFromUrl('https://laminat-tula.ru/catalog/keramogranit/kerranova/-keramogranit-k-40-lr-light-beige-60x60-ot-kerranova-%28rossiya%29/');
    $url = 'https://laminat-tula.ru';
    $itemImage = $dom->find('img.main-photo')[0]->getAttribute('src');
    $itemTitle = $dom->find('h1')[0];
    $itemAbouts = $dom->find('div.prop-wrapper p');
    $result = array('url'=> $url,'image'=>$itemImage, 'title'=>$itemTitle->text);

    foreach ($itemAbouts as $itemAbout) {
        $itemSpan = $itemAbout->find('span');
        array_push($result, $itemAbout->text, $itemSpan->text);
    }
fopen('parsed-data.json', 'w');
    file_put_contents('parsed-data.json', json_encode($result));
   
    ?>