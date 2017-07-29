<html>
<head>
<title>La Grimpe</title>
<link rel="shortcut icon" href="">
<link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body bgcolor="#ffFFFF">

<div id="top"></div>


<table width="960">
<tr>
<td width="96" valign="top" id="gri"><img src="img/grimpeur.gif" width="96" alt="grimpeur" title="grimpeur"></td> 
<td width="190" valign="top">



<div id="side"> 
<div class="my" >
<a href=" " ><img src="img/gecko3.gif" class="float">  </a>
</div>
<li><a href="index.php?voix=1">Accueil </a></li>

<li><a href="index.php?voix=2">Topo </a></li>

<li><a href="index.php?voix=3">Les Grimpeurs Fous</a></li>

<li><a href="index.php?voix=4">Livre D'or </a></li>

<li><a href="index.php?voix=5">Galeries Photos</a></li>

<li><a href="index.php?voix=6">Liens</a></li>

<!--
<li><a href="index.php?voix=7">Liens</a></li>

<li><a href="index.php?voix=8"></a></li>

<li><a href="index.php?voix=9"></a></li>
!-->

</div>
<br>

	<?php
 		if($_GET['voix']==1 || !(isset($_GET['voix']))){ 
		?><object type="application/x-shockwave-flash" data="dewplayer.swf?son=06 On The Road Again.mp3&autoplay=true" width="190" height="20"><?php
		}
  		else {
		?><object type="application/x-shockwave-flash" data="dewplayer.swf?son=06 On The Road Again.mp3&autoplay=false" width="190" height="20"><?php
		}
	?>
</object>

</td>
<td width="500" height="500" valign="top">

<div id="centre">

<?php
 if(isset($_GET['voix']))    
   {
    switch($_GET['voix'])
        {
    case 1:
          include "accueil.html";
          break;
        case 2:
          include "topo.html";
          break;
        case 3:
          include "grimpeur.html";
          break;
        case 31:
          include "Drouz.html";
          break;
        case 32:
          include "jean.html";
          break;
        case 33:
          include "chris.html";
          break;
        case 4:
          include "LivreDor.php";
          break;
        case 5:
          include "photo.html";
          break;
		case 6:
          include "Liens.html";        
          break;
    }
    }
  else {include "accueil.html";}
?>



</div>

</td>
<td width="175" valign="top">

<div id="right" ><u><b><center>Pochaine<br>Grimpe</center></b></u><br>
  <div class="new">
  12/05.07 <div class="new_d">Sembrancher: Les Trapistes</div>

  </div>
</div>

</td>
</tr>
</table>
<!--
case 6:
          include "physique.html";
          break;
        case 7:
          include "chemgen.html";
          break;
        case 8:
          include "chemorg.html";
          break;
        case 9:
          include "bioche.html";
          break;
        case 10:
          include "divers.html";
          break;
        case 11:
          include "";
          break;
        case 12:
          include "video1.html";
          break;
        case 13:
          include "video2.html";
          break;
        case 14:
          include "video3.html";
          break;
        case 15:
          include "video4.html";
          break;
        case 16:
          include "video5.html";
          break;
        case 17:
          include "video6.html";
          break;
        case 18:
          include "video7.html";
-->


</body>
</html>