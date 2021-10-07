<?php

$alphabet = array (
    'a' => 'A' ,
    'b' => 'B' ,
    'c' => 'C' ,
    'd' => 'D' ,
    'e' => 'E' ,
    'f' => 'F' ,
    'g' => 'G' ,
    'h' => 'H' ,
    'i' => 'I',
    'j' => 'J',
    'k' => 'K',
    'l' => 'L',
    'm' => 'M',
    'n' => 'N',
    'o' => 'O',
    'p' => 'P',
    'q' => 'R',
    'r' => 'R',
    's' => 'S',
    't' => 'T',
    'u' => 'U',
    'v' => 'V',
    'w' => 'W',
    'x' => 'X',
    'y' => 'Y',
    'z' => 'Z',
    'ae' => 'Æ' ,
    'oe' => 'Ø' ,
    'aa' => 'Å'
);

$object = get_query_var('object');


$third_params = get_query_var('third');
$parametrs = get_query_var('parametrs');
$parametrs4 = get_query_var('parametrs4');
$parametrs5 = get_query_var('parametrs5');
if ($object == 'drengenavne') {
    $link = get_field('navne_api_url','option').'/api/name/popular?gender=drengenavne&perPage=20';
    $title = 'Populære drengenavne';
    $text = 'Længe før den lille ny er kommet til verden, starter overvejelserne. Hvad skal I kalde jeres lille søn?<br><br>

På Min-Mave kan du se en liste over alle drengenavne, både de allermest populære drengenavne og de mere unikke. Du kan også bruge de mange søgemuligheder til f.eks. at finde drengenavne, der starter eller slutter med et bestemt bogstav, eller drengenavne der har en bestemt længde.<br><br>

Hvis din søn allerede har fået sit navn, kan du ved hjælp af tabellen i højre side se, hvilken placering din søns navn har fået i listen over populære drengenavne år for år. Du kan også se, hvilke berømtheder dit barn deler navn med og meget mere.<br><br>

God fornøjelse

';
} elseif ($object == 'pigenavne') {
    $link = get_field('navne_api_url','option').'/api/name/popular?gender=pigenavne&perPage=20';
    $title = 'Populære pigenavne';
    $text = 'For mange starter navneovervejelserne længe før, den lille ny er kommet til verden. I ved måske allerede, at det bliver en pige, men hvad skal hun hedde?<br><br>

Her på Min-Maves navnesektion kan du finde en oversigt over alle pigenavne, både de mest populære pigenavne og de mere specielle. Du har også mulighed for at søge efter pigenavne, der f.eks. starter med et bestemt bogstav eller har en bestemt længde.<br><br>

Hvis I allerede har navngivet jeres datter, kunne det måske være sjovt for dig at se, hvor populært navnet har været i bestemte årstal. Det kan du finde ud af ved at bruge vores oversigt til højre over populære pigenavne år for år. Du kan også se, hvilke kendte personer dit barn deler navn med og meget andet.<br><br>

God fornøjelse';
} elseif($object == 'populaere-navne') {
    $link = get_field('navne_api_url','option').'/api/name/popular?perPage=20';
    $title = 'Populære navne';
    $text = 'Hvert år offentliggør Danmarks Statistik en liste over de 50 mest populære drengenavne og de 50 mest populære pigenavne i Danmark.<br><br>

Listerne over de mest populære navne er altid ventet med spænding; Hos nogen fordi listerne kan bruges som inspiration, når de selv skal vælge et navn til deres lille ny, og hos andre fordi de foretrækker at gå udenom de allermest populære navne og i stedet vælger et mere unikt og specielt navn til deres baby.<br><br>

Som alt andet her i verden er også listerne over de mest populære navne præget af tidens tendenser, men én ting ligger fast – man kan næsten uden undtagelse gå ud fra, at navnene på kongehusets små prinser og prinsesser tager et hop op af listen over de mest populære navne i årene efter en kongelig dåb.';
} elseif($object == 'mest-populaere-baby-navne') {
    $link = get_field('navne_api_url','option').'/api/name/popular?perPage=20';
}

if (empty ($parametrs)) {
    $page = 1;
    $base=get_permalink().'/'.$object.'/'.$parametrs.'/%_%/';
} else {
    if (is_numeric($parametrs)) {
        $page = $parametrs;
        $status = '';
        $base = get_permalink() .'/'. $object .  '/%_%/';

    } elseif (array_key_exists($parametrs,$alphabet) ) {
        $link = get_field('navne_api_url','option').'/api/name/search?perPage=20';
        $gender = '&gender='.$object;
        $letter = '&nameBeginning='.$parametrs;
        $link .=$gender.$letter;
        $page = (!empty($parametrs4))?$parametrs4:1;

        $base = get_permalink() .'/'. $object . '/' . $parametrs . '/%_%/';
    } elseif ($parametrs == 'drengenavne') {

        $active_drengenavne = 'active';
        $active_alle = '';
        $status = '&status=1';
        $page = 1;
        $base = get_permalink() . '/' . $object . '/' . $parametrs . '/%_%/';
    } elseif ($parametrs == 'pigenavne') {
        $active_pigenavne = 'active';
        $active_alle = '';
        $status = '&status=2';
        $page = 1;
        $base = get_permalink() . '/' . $object . '/' . $parametrs . '/%_%/';
    } elseif ($parametrs == 'dreng') {

        $active_drengenavne = 'active';
        $active_alle = '';
        $gender = '&gender=drengenavne';
        $year = '&year='.$parametrs4;
        $link .=$gender.$year;
        $page = (!empty($parametrs5))?$parametrs5:1;
        $title = 'Mest populære drengenavne i '.$parametrs4;
        $text = '';
        $base = get_permalink() . '/' . $object . '/' . $parametrs .'/'.$parametrs4.'/%_%/';


    } elseif ($parametrs == 'pige') {
        $active_pigenavne = 'active';
        $active_alle = '';
        $gender = '&gender=pigenavne';
        $year = '&year='.$parametrs4;
        $link .=$gender.$year;
        $page = 1;
        $page = (!empty($parametrs5))?$parametrs5:1;
        $title = 'Mest populære pigenavne i '.$parametrs4;
        $text = '';
        $base = get_permalink() . '/' . $object . '/' . $parametrs .'/'.$parametrs4.'/%_%/';

    }

}

$json = file_get_contents($link.'&page='.$page);
$obj = json_decode($json, true);?>


    <div class="main-article">
        <h1 class="main-article__title main-article__title--violet"><?php echo $title; ?> </h1>
        <div class="main-article__info d-flex flex-column d-lg-block clearfix">
            <?php echo $text; ?>
        </div>
    </div>
<?php
if (!(($parametrs == 'dreng')||($parametrs == 'pige')||($object == 'populaere-navne'))) :
?>
    <div class="popular-name__letters">
        <div class="popular-name__letters-title">
            Vælg navnets startbogstav
        </div>
        <div class="popular-name__letters-list d-md-flex">
            <div class="d-flex flex-wrap">
                <?php foreach ($alphabet as $key => $one) : ?>
                    <a <?php echo ($key == $parametrs)?'class="active"':''; ?> href="/navne/<?php echo $object; ?>/<?php echo $key; ?>/"><?php echo $one; ?></a>
                <?php endforeach;?>

            </div>
        </div>
    </div>
<?php endif; ?>
    <div class="popular-name__table">
        <div class="custom-item-container ">
        <?php  if(($object == 'pigenavne')): ?>

            <div class="popular-name__table-title widget-title d-flex justify-content-between align-items-center girls" style="background:linear-gradient(to right,#e861a0 0%,#b7497e 100%);">
                    <div class="d-flex">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/female-icon.svg" alt="female" style="width:30px;">
                    <span>Mest Populære pigenavne</span>
                </div>
                <?php else:  ?>
            <div class="popular-name__table-title widget-title d-flex justify-content-between align-items-center">

                    <div class="d-flex">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/male-icon.svg" alt="Male">
                    <span>Mest Populære drengenavne</span>
                </div>
                <?php endif;  ?>

                <div class="widget-filters">
                    <a href="#">Navn</a>
                    <a href="#" class="reverse">Popularitet</a>
                    <a href="#">Rating</a>
                </div>
            </div>
            <div class="popular-name__table-body widget-body pb-3">
                <div class="widget-filters justify-content-between">
                    <a href="#">Navn</a>
                    <a href="#" class="reverse">Popularitet</a>
                    <a href="#">Rating</a>
                </div>
                <?php foreach($obj as $key => $value) :
                    if (!isset($value['totalNumberOfItems'])) : ?>

                <div class="popular-name__table-item">
                    <div class="popular-name__table-count"><?php echo ($key+1);  ?></div>
                    <?php
                    if ($value['arrow'] == 'Up')
                    echo '<img src="'.get_template_directory_uri().'/assets/img/increase.svg" alt="">';
                    elseif ($value['arrow'] == 'Down')
                    echo '<img src="'.get_template_directory_uri().'/assets/img/decrease.svg" alt="">';
                    else
                    echo '<img src="'.get_template_directory_uri().'/assets/img/equal.svg" alt="">';
                    ?>
                    <div class="popular-name__table-name"><?php echo $value['name']; ?></div>
                    <div class="popular-name__table-rate">
                        <?php $raiting = ($value['ratings']['RatingAverage'] != null)?$value['ratings']['RatingAverage']:0;
                        $star = 1;
                        while ($star<= 5) :
                            if ($star <= $raiting) : ?>
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                            <?php
                            endif;
                            $star++ ;
                        endwhile;?>

                    </div>
                    <div class="popular-name__table-check">
                        <?php if ($value['genders'][0]['name'] == 'drengenavne') : ?>
                            <img class="fe" src="<?php echo get_template_directory_uri();?>/assets/img/male-icon-alt.svg" alt="Check">
                        <?php elseif ($value['genders'][0]['name'] == 'pigenavne') : ?>
                            <img class="fe" src="<?php echo get_template_directory_uri();?>/assets/img/female-icon.svg" alt="Check">
                        <?php endif; ?>

                        <?php if ($value['approved'] == 1) : ?>
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/name-check.svg" alt="Check">
                        <?php endif; ?>
                    </div>
                    <a href="/navne/<?php echo $value['slug']; ?>" class="names-calendar__table-link">
                        <span class="mr-1">MERE</span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="7.811" height="14.121" viewBox="0 0 7.811 14.121">
                            <g id="nav-arrow-down" transform="translate(-7.939 19.061) rotate(-90)">
                                <g id="Сгруппировать_10" data-name="Сгруппировать 10" transform="translate(6 9)">
                                    <path id="Контур_4" data-name="Контур 4" d="M6,9l6,6,6-6" transform="translate(-6 -9)" fill="none" stroke="#634282" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                </g>
                            </g>
                        </svg>

                    </a>
                </div>
                <?php
                    else:
                        #

                    endif;
                    endforeach; ?>
                <?php

                echo '<div class="pagination d-flex justify-content-center align-items-center">';

                echo paginate_links(
                    array(
                        'base' => $base,
                        'format'    =>'%#%',
                        'current' => $page,
                        'total'     => $value['totalNumberOfItems']/20,
                        'prev_next' => true,
                        'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="7.811" height="14.121" viewBox="0 0 7.811 14.121" style="transform: rotate(180deg)">
  <g id="arrow_right" data-name="arrow right" transform="translate(1.061 1.061)">
    <g id="nav-arrow-down" transform="translate(0 12) rotate(-90)">
      <g id="Сгруппировать_10" data-name="Сгруппировать 10" transform="translate(0 0)">
        <path id="Контур_4" data-name="Контур 4" d="M0,0,6,6l6-6" fill="none" stroke="#e861a0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
      </g>
    </g>
  </g>
</svg>',
                        'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="7.811" height="14.121" viewBox="0 0 7.811 14.121">
  <g id="arrow_right" data-name="arrow right" transform="translate(1.061 1.061)">
    <g id="nav-arrow-down" transform="translate(0 12) rotate(-90)">
      <g id="Сгруппировать_10" data-name="Сгруппировать 10" transform="translate(0 0)">
        <path id="Контур_4" data-name="Контур 4" d="M0,0,6,6l6-6" fill="none" stroke="#e861a0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
      </g>
    </g>
  </g>
</svg>',
                    )
                );
                echo '</div>';

                ?>
            </div>
        </div>
    </div>
