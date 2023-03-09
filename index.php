<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" >
    <title>Document</title>
</head>

<?php
include_once('model/functions.php');


$strTVstyle = "visibility:hidden; width:0px; height:0px "; //width:300px height:40px
$strMMstye  = "visibility:hidden; width:0px; height:0px ";
$strResult  = '';
$strGKstyle = "visibility:hidden; width:0px; height:0px ";
$strAll     = "visibility:hidden; width:0px; height:0px";
$intTV = 0;
$intMM = 0;
$intGK = 0;
$intPL = 0;
$intGKover40  = 0;
$intGKunder40 = 0;


echo '<a href="index.php?rq=all"> Все </a> ';
echo '';
//echo "";

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
$rq = $_GET['rq']??'';	
	if($rq == 'all' || $rq=='tv' || $rq=='gk' || $rq=='pl' || $rq=='ml' || $rq=='over40' || $rq=='under40'  )
	{
			if(f_pdoConnect()) // Если подключились к базе
			{
				$arrStringsFromDB = f_strArrGetStringsDb('products','id_group','');
				foreach( $arrStringsFromDB as $arrString)
				{
				 if($rq=='tv') {
					if($arrString['id'] > 6) $strResult .= "<br />" .  $arrString['name'] ;
						
						
						$strTVstyle = "visibility:visible; width:300px; height:40px ";
						$strAll  = "visibility:visible";
				 } 
				 else if ($rq == 'gk') {
					 if($arrString['id'] > 11)	$strResult .= "<br />" .   $arrString['name'] ;
						
						
						$strTVstyle = "visibility:visible; width:300px; height:80px ";
						$strAll  = "visibility:visible;";
						$strGKstyle = "visibility:visible; width:300px; height:40px";
				 }
				 else if ($rq == 'pl') {
					 if($arrString['id'] > 6 && $arrString['id'] < 11)	$strResult .= "<br />" .  $arrString['name'] ;
	
						
						$strTVstyle = "visibility:visible; width:300px; height:40px ";
						$strAll  = "visibility:visible;";
				 }
				 else if($rq == 'ml') {
					 if($arrString['id'] < 6)	$strResult .= "<br />"  .  $arrString['name'] ;

						
						$strTVstyle = "visibility:hidden; width:0px; height:0px ";
						$strAll  = "visibility:visible;";
					    $strGKstyle = "visibility:hidden; width:0px; height:0px";
				 }
				 else if($rq == 'over40'){
					 if($arrString['id_group'] == 6)  $strResult .= "<br />"  .  $arrString['name'] ;

					
						$strTVstyle = "visibility:visible; width:300px; height:80px ";
						$strAll  = "visibility:visible;";
						$strGKstyle = "visibility:visible; width:300px; height:40px";
				 }
				 else if($rq == 'under40') {
					 if($arrString['id_group'] == 5)  $strResult .= "<br />" .  $arrString['name'] ;
				
						$strTVstyle = "visibility:visible; width:300px; height:80px ";
						$strAll  = "visibility:visible;";
					    $strGKstyle = "visibility:visible; width:300px; height:40px";
				 }
				 
				 
				 else {
					$strResult .= "<br />"  .  $arrString['name'] ;
				}	
					if($arrString['id'] < 6 ) $intMM++;
					if($arrString['id'] > 6 ) $intTV++;
					if($arrString['id'] >=12  && $arrString['id'] <= 17 ) $intGK++;
					if($arrString['id'] >=7 && $arrString['id'] <= 10 ) $intPL++;
					if($arrString['id_group'] == 6) $intGKover40++;
					if($arrString['id_group'] == 5) $intGKunder40++;
				}
			}

			$strAll  = "visibility:visible;"; 
	}
}

echo '';

?>

<body>


<br />
  <div style="position: absolute; top:10px; left:300px; border: 0px solid black;">
	<?=$strResult??'' ?>
  </div>
  
     <ul class="clMenu clFirst" style="<?=$strAll??'' ?>" >
        <li>
           <a href="index.php?rq=tv" id="id11"> Телевизоры <?=$intTV??''?></a>
		   <ul class="clSecond" id="ul11" style="<?=$strTVstyle??'' ?>">
				<li>
                    <a href="index.php?rq=gk"  > Жк  Телевизоры  <?=$intGK??''?>  </a> 
					<ul class="clSecond" id="ul12" style="<?=$strGKstyle??'' ?>">
						<li>
							<a href="index.php?rq=under40" > Жк до 40 дюймов <?=$intGKunder40??'' ?> </a>
						</li>
						<li>
							<a href="index.php?rq=over40" > Жк более 40 дюймов <?=$intGKover40??'' ?> </a>
						</li>
					</ul>
					
				</li>
				<li>
                    <a href="index.php?rq=pl" > Плазменные телевизоры <?=$intPL??''?> </a>
                </li>
		   </ul>
        </li>
        <li>
            <a href="index.php?rq=ml" id="id12" > Мультимедиа <?=$intMM??''?>  </a>
            <ul class="clSecond" id="ul12" style="<?=$strMMstye??'' ?>">
                <li>
                    <a href="#"> Второй уровень 2  </a>
                </li>
           </ul>
        </li>
        
		<!--
		<li>
            <a href="#" id="id13"> Певый уровень 3  </a>
            <ul class="clSecond" id="ul13">
                <li>
                    <a href="#"> Второй уровень 3  </a>
                </li>
           </ul>
        </li>
		-->
     </ul>
	
	<a href="index.php"> Свернуть </a> <br />

		


  <!-- <script type="text/javascript" src="js/functions.js"> </script> -->
</body>
</html>