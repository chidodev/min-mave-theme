<?php

$months = array (
    "1" => 'januar',
    "2" => 'februar',
    "3" => 'marts',
    "4" => 'april',
    "5" => 'maj',
    "6" =>'juni',
    "7" =>'juli',
    "8"=>'august',
    "9"=>'september',
    "10"=> 'oktober',
    "11" => 'november',
    "12" =>'december'
);

$object = get_query_var('object');
$parametrs = get_query_var('parametrs');
$parametrs4 = get_query_var('parametrs4');
$parametrs5 = get_query_var('parametrs5');
$active_danske='';
$active_intenational = '';
$active_alle = 'active';

if (empty ($parametrs)) {
    $day = 'date='.date('d').'-';

} elseif ($parametrs == 'beskaeftigelse') {
    $profession = '&professions='.$parametrs4;
} elseif ($parametrs == 'danske') {
    $parametrs5 = 'danske';
    $active_alle = '';
    $active_danske = 'active';
    $day = 'date='.date('d').'-';
    $status = '&status=1';
    $parametrs = date('d');
    $parametrs4 = $months[date('n')];
} elseif ($parametrs == 'internationale') {
    $parametrs5 = 'internationale';
    $active_intenational= 'active';
    $active_alle = '';
    $day = 'date='.date('d').'-';
    $parametrs = date('d');
    $status = '&status=2';
    $parametrs4 = $months[date('n')];
} else  {
    $day = 'date='.$parametrs.'-';
}

if (empty ($parametrs4)) {
    $month = date('m');
} elseif ($parametrs == 'danske') {
    $active_danske = 'active';
    $parametrs5 = 'danske';
    $active_alle = '';
    $month = array_search($parametrs4,$months);
} elseif ($parametrs == 'internationale') {
    $parametrs6 = 'internationale';
    $active_intenational= 'active';
    $active_alle = '';
    $month = array_search($parametrs4,$months);
} else{
    $month = array_search($parametrs4,$months);
}

if (empty ($parametrs5)) {
    $page = 1;
    if (empty($parametrs4)) {
        $parametrs = date('d');
        $parametrs4 = $months[$month];
    }
    $base=get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/%_%/';

} else {
    if (is_numeric($parametrs5 )) {
        $page = $parametrs5;
        $status = '';
        $base=get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/%_%/';
    } elseif ($parametrs5 == 'danske') {
        $active_danske = 'active';
        $active_alle = '';
        $status = '&status=1';
        $page = 1;
        $base=get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/%_%/'.$parametrs5;
    } elseif ($parametrs5 == 'internationale') {
        $active_intenational= 'active';
        $active_alle = '';
        $status = '&status=2';
        $page = 1;
        $base=get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/%_%/'.$parametrs5;


    }

}

$parametrs6 = get_query_var('parametrs6');
if ($parametrs6 == 'danske') {
    $active_danske = 'active';
    $active_alle = '';
    $status = '&status=1';
//    $page = 1;
    $base = get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/%_%/'.$parametrs6;
} elseif ($parametrs6 == 'internationale') {
    $active_intenational= 'active';
    $active_alle = '';
    $status = '&status=2';
//    $page = 1;

    $base = get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/%_%/'.$parametrs6;
}

$link = get_field('navne_api_url','option').'/api/famouspeople?'.$day.$month.$profession.'&perPage=20&page='.$page.$status;
$json = file_get_contents($link);
$obj = json_decode($json, true);?>


<div class="main-article">
    <?php if (is_numeric($parametrs )) :?>
        <h1 class="main-article__title main-article__title--violet">Kendte personer der hedder <?php echo ucfirst(get_query_var('parametrs')) ;?></h1>
        <div class="main-article__info d-flex flex-column d-lg-block clearfix">
        Har du også svært ved at finde det helt perfekte navn til dit barn? Mange inspireres af kendte personer, når de navngiver deres børn. <br><br>

Se hvilke kendisser der hedder <?php echo ucfirst(get_query_var('parametrs')) ;?> eller find inspiration til hvad dit barn skal hedde blandt nogle af tidens mest kendte personer.<br><br>

Med den stadigt stigende medieeksponering, som kendte personer udsættes for, er det slet ikke så mærkeligt endda, at mange inspireres af kendte personer, når de navngiver deres børn. <br><br>

Særligt det danske kongehus bliver der skelet til, når danskere navngiver deres børn – det er således ikke unormalt, at navnet på et lille nyt royalt skud på stammen tager et gevaldigt hop op af navnehitlisterne i årene efter den kongelige dåb.<br><br>

Der kan naturligvis også være andre kendte end de kongelige, som du ønsker at opkalde dit barn efter. Måske fordi du beundrer dem for noget særligt eller ganske simpelt fordi du synes, at de har et flot navn, som du gerne vil videregive til dit barn.<br><br>

På Min-mave kan du både finde en lang række kendtes navne samt deres fødselsdatoer. Du kan dermed ikke alene finde inspiration til dit barns navn - du kan også se, hvilke kendisser dit barn deler fødselsdag med. Se alle de <a href="https://min-mave.dk/navne/kendte"> populære kendte navne her</a>.
        </div>
    <?php else : ?>
        <h1 class="main-article__title main-article__title--violet"><?php echo $parametrs4; ?></h1>
    <?php endif; ?>
    </div>

    <div class="famous-names__table tabs">
        <div class="custom-item-container d-flex flex-column">
            <div class="famous-names__table-title widget-title d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <?php if (is_numeric($parametrs )) :?>
                        <span>Navneoversigt </span>

                    <?php  else: ?>
                    <span>Foreslå navne</span>

                    <?php endif; ?>
                </div>
                <div class="widget-filters tabs-container">
                    <a href="<?php echo get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/danske'; ?>"><span class="top-item ml-4 <?php echo $active_danske; ?>" >Danske</span></a>
                    <a href="<?php echo get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/internationale'; ?>"><span class="top-item ml-4 <?php echo $active_intenational; ?>">Internationale</span></a>
                    <a href="<?php echo get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/'; ?>"><span class="top-item ml-4 <?php echo $active_alle; ?>" >Alle</span></a>
                </div>
            </div>
            <div class="famous-names__table-body widget-body">
                <div class="widget-filters justify-content-between tabs-container">
                    <a href="<?php echo get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/danske'; ?>"><span class="top-item <?php echo $active_danske; ?>">Danske</span></a>
                    <a href="<?php echo get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/internationale'; ?>"><span class="top-item <?php echo $active_intenational; ?>" >Internationale</span></a>
                    <a href="<?php echo get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/'; ?>"><span class="top-item <?php echo $active_alle; ?>" >Alle</span></a>
                </div>
                <div class="tab-block show" >
                    <?php foreach($obj as $key => $value) :
                        if (!isset($value['totalNumberOfItems'])) :?>
                    <div class="famous-names__table-item">
                        <div class="famous-names__country-flag"><img class="country-flag" src="<?php echo $value['country']['CountryFlagImage'];?>" alt="#"></div>
                        <div class="famous-names__table-name"><a href="<?php echo $value['externalurl'];?>"><?php echo $value['name'];?></a></div>
                        <div class="famous-names__name-type"><a href="/navne/kendte/beskaeftigelse/<?php echo $value['occupations'][0]['plural']; ?>"><?php echo $value['occupations'][0]['singular'];?></a></div>
                        <div class="famous-names__date"><?php if ($value['birthdate'] != '') :
                            $date = DateTime::createFromFormat('Y-m-j', $value['birthdate']);
                             echo $date->format('j M Y');
                             endif;?></div>

                        <div class="famous-names__table-rate">
                            <?php $raiting = ($value['averageRating'] != null)?$value['averageRating']:0;
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
                        <a href="<?php echo $value['externalurl'];?>" class="famous-names__table-link d-lg-none">
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

                </div>
                <div class="tab-block" id="internationale">
<!--                    Put content here -->
                </div>
                <div class="tab-block" id="danske">
                    <!--                    Put content here -->
                </div>

            </div>
        </div>
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
