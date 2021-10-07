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

$name = $_SESSION['kendt_params']['name'];
$professions = '&profession='.$_SESSION['kendt_params']['professions'];


if (empty ($parametrs5)) {
    $page = 1;
    $base=get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/%_%';
} else {
    if (is_numeric($parametrs5 )) {
        $page = $parametrs5;
        $status = '';
        $base=get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/%_%';
    } elseif ($parametrs5 == 'danske') {
        $status = '&status=1';
        $page = 1;
        $base=get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/%_%/'.$parametrs5;
    } elseif ($parametrs5 == 'internationale') {
        $status = '&status=0';
        $page = 1;
        $base=get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/%_%/'.$parametrs5;
    }

}

$parametrs6 = get_query_var('parametrs6');
if ($parametrs6 == 'danske') {
    $status = '&status=1';
    $page = 1;
    $base=get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/%_%/'.$parametrs5;
} elseif ($parametrs6 == 'internationale') {
    $status = '&status=0';
    $page = 1;
    $base=get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/%_%/'.$parametrs5;
}
$link = get_field('navne_api_url','option').'/api/famouspeople?coreName='.$name.$professions.'&perPage=20&page='.$page.$status;
$json = file_get_contents($link); //var_dump($link);
$obj = json_decode($json, true);?>

<div class="main-article">
        <h3 class="main-article__title main-article__title--violet">Populære drengenavne</h3>
        <div class="main-article__info d-flex flex-column d-lg-block clearfix">
            Længe før den lille ny er kommet til verden, starter overvejelserne. Hvad skal I kalde jeres lille søn?

            På Min-Mave kan du se en liste over alle drengenavne, både de allermest populære drengenavne og de FlERE INFORMATIONER unikke. Du kan også bruge de mange søgemuligheder til f.eks. at finde drengenavne, der starter eller slutter med et bestemt bogstav, eller drengenavne der har en bestemt længde.

            Hvis din søn allerede har fået sit navn, kan du ved hjælp af tabellen i højre side se, hvilken placering din søns navn har fået i listen over populære drengenavne år for år. Du kan også se, hvilke berømtheder dit barn deler navn med og meget FlERE INFORMATIONER.

            God fornøjelse
        </div>
    </div>

    <div class="famous-names__table tabs">
        <div class="custom-item-container d-flex flex-column">
            <div class="famous-names__table-title widget-title d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <span>Foreslå navne</span>
                </div>
                <div class="widget-filters tabs-container">
                    <a href="<?php echo get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/danske'; ?>"><span class="tab-item ml-4 <?php echo strripos($base,'danske')?'active':''; ?>" >Danske</span></a>
                    <a href="<?php echo get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/internationale'; ?>"><span class="tab-item ml-4 <?php echo strripos($base,'internationale')?'active':''; ?>">Internationale</span></a>
                    <a href="<?php echo get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/'; ?>"><span class="tab-item ml-4 <?php echo ((strripos($base,'internationale')== false)&&(strripos($base,'danske')== false)) ?'active':''; ?>" >Alle</span></a>
                </div>
            </div>
            <div class="famous-names__table-body widget-body">
                <div class="widget-filters justify-content-between tabs-container">
                    <a href="<?php echo get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/danske'; ?>"><span class="tab-item <?php echo strripos($base,'danske')?'active':''; ?>">Danske</span></a>
                        <a href="<?php echo get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/internationale'; ?>"><span class="tab-item <?php echo strripos($base,'danske')?'internationale':''; ?>" >Internationale</span></a>
                        <a href="<?php echo get_permalink().'/'.$object.'/'.$parametrs.'/'.$parametrs4.'/'; ?>"><span class="tab-item <?php echo ((strripos($base,'internationale')== false)&&(strripos($base,'danske')== false)) ?'active':''; ?>" >Alle</span></a>
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
