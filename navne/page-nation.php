<?php

$object = get_query_var('object');
$parametrs = get_query_var('parametrs');

$link = get_field('navne_api_url','option').'/api/name/nation?tag='.$object.'&perPage=20&page=';


if (empty ($parametrs)) {
    $page = 1;
    $base=get_permalink().'/'.$object.'/'.$parametrs.'/%_%/';
} else {
    if (is_numeric($parametrs)) {
        $page = $parametrs;
        $status = '';
        $base = get_permalink() .'/'. $object .  '/%_%/';
    }
}

$json = file_get_contents($link.$page);
$obj = json_decode($json, true);?>


<?php if ($object == 'betydning') : ?>
<div class="category-page">
    <h3 class="main-article__title name-meaning__title">Navnes oprindelse</h3>
    <div class="main-article__info d-flex flex-column d-lg-block clearfix">
        <div class="main-article__content text-justify order-2 order-lg-1">
                                    <span class="category-description name-meaning__description">
                                        Fælles for de fleste af verdens navne er, at de i tidligere tider ofte havde en dybere betydning. Fx kunne de beskrive særligt eftertragtede egenskaber som mod, styrke og skønhed. Navnene viste også ofte noget om personens familiære forhold/oprindelse. I Danmark betyder f.eks. efternavnet Jensen oprindeligt Jens’ søn og det samme er tilfældet for de øvrige –sen efternavne. Noget tilsvarende gør sig gældende flere andre steder, f.eks. på Island hvor man bruger endelserne – dottir (for datter af) og –son (for søn af).<br><br>

                                        Når du kigger nærmere på de enkelte navne, vil du også se, at de ofte afspejler den kultur, de oprindeligt stammer fra. I dag er vores kultur dog mere mangfoldig og verden på mange måder blevet mindre end tidligere, så mange af de samme navne nyder popularitet i flere dele af verden. Til trods for dette er der også store lokale forskelle i forhold til navnetraditionen, hvilket bl.a. skyldes, at der er stor forskel på, om der er regler for navngivning eller ej. I Danmark kan man ikke bare kalde sit barn hvad som helst, men må holde sig til de godkendte navne, men sådan er det ikke alle steder i verden.
                                    </span>
            <div class="caregory text-left">
                <div class="category-section">
                    <strong>Skandinaviske Navne</strong>
                    <a title="Danske navne"
                       href="/navne/danske-navne"><img class="county-flag" src="/content/images/flags/danish-flag.png" alt="#">Danske navne</a>
                    <a title="Finske navne"
                       href="/navne/finske-navne/"><img class="county-flag" src="/content/images/flags/finske-flag.png" alt="#">Finske navne</a>
                    <a title="Islandske navne"
                       href="/navne/islandske-navne/"><img class="county-flag" src="/content/images/flags/islandske-flag.png" alt="#">Islandske navne</a>
                    <a title="Norske navne"
                       href="/navne/norske-navne/"><img class="county-flag" src="/content/images/flags/norske-flag.png" alt="#">Norske navne</a>
                    <a title="Oldnordiske navne"
                       href="/navne/oldnordiske-navne/"><img class="county-flag" src="/content/images/flags/none-flag.png" alt="#">Oldnordiske navne</a>
                    <a title="Skandinaviske navne"
                       href="/navne/skandinaviske-navne/"><img class="county-flag" src="/content/images/flags/none-flag.png" alt="#">Skandinaviske navne</a>
                    <a title="Svenske navne"
                       href="/navne/svenske-navne/"><img class="county-flag" src="/content/images/flags/svenske-flag.png" alt="#">Svenske navne</a>
                </div>
                <div class="category-section">
                    <strong>Europæiske Navne</strong>
                    <a title="Albanske navne"
                       href="/navne/albanske-navne/"><img class="county-flag" src="/content/images/flags/albania-flag.png" alt="#">Albanske navne</a>
                    <a title="Armenske navne"
                       href="/navne/armenske-navne/"><img class="county-flag" src="/content/images/flags/Armenske-flag.png" alt="#">Armenske navne</a>
                    <a title="Baskiske navne"
                       href="/navne/baskiske-navne"><img class="county-flag" src="/content/images/flags/Baskiske-flag.png" alt="#">Baskiske navne</a>
                    <a title="Engelske navne"
                       href="/navne/engelske-navne/"><img class="county-flag" src="/content/images/flags/Engelske-flag.png" alt="#">Engelske navne</a>
                    <a title="Franske navne"
                       href="/navne/franske-navne/"><img class="county-flag" src="/content/images/flags/Franske-flag.png" alt="#">Franske navne</a>
                    <a title="Germanske navne"
                       href="/navne/germanske-navne/"><img class="county-flag" src="/content/images/flags/none-flag.png" alt="#">Germanske navne</a>
                    <a title="Græske navne"
                       href="/navne/graeske-navne/"><img class="county-flag" src="/content/images/flags/Graske-flag.png" alt="#">Græske navne</a>
                    <a title="Gæliske navne"
                       href="/navne/gaeliske-navne/"><img class="county-flag" src="/content/images/flags/Galiske-flag.png" alt="#">Gæliske navne</a>
                    <a title="Hollandske navn"
                       href="/navne/hollandske-navne/"><img class="county-flag" src="/content/images/flags/Hollandske-flag.png" alt="#">Hollandske navne</a>
                    <a title="Irske navne"
                       href="/navne/irske-navne/"><img class="county-flag" src="/content/images/flags/Irske-flag.png" alt="#">Irske navne</a>
                    <a title="Irske navne"
                       href="/navne/italienske-navne/"><img class="county-flag" src="/content/images/flags/none-flag.png" alt="#">Italienske navne</a>
                    <a title="Korniske navne"
                       href="/navne/korniske-navne/"><img class="county-flag" src="/content/images/flags/none-flag.png" alt="#">Korniske navne</a>
                    <a title="Kroatiske navne"
                       href="/navne/kroatiske-navne/"><img class="county-flag" src="/content/images/flags/Kroatiske-flag.png" alt="#">Kroatiske navne</a>
                    <a title="Latinske navne"
                       href="/navne/latinske-navne/"><img class="county-flag" src="/content/images/flags/none-flag.png" alt="#">Latinske navne</a>
                    <a title="Latinske navne"
                       href="/navne/litauiske-navne/"><img class="county-flag" src="/content/images/flags/Litauiske-flag.png" alt="#">Litauiske navne</a>
                    <a title="Latinske navne"
                       href="/navne/polske-navne/"><img class="county-flag" src="/content/images/flags/Polske--flag.png" alt="#">Polske navne</a>
                    <a title="Latinske navne"
                       href="/navne/portugisiske-navne/"><img class="county-flag" src="/content/images/flags/Portugisiske-flag.png" alt="#">Portugisiske navne</a>
                    <a title="Latinske navne"
                       href="/navne/roma-navne/"><img class="county-flag" src="/content/images/flags/Roma-flag.png" alt="#">Roma navne</a>
                    <a title="Latinske navne"
                       href="/navne/russiske-navne"><img class="county-flag" src="/content/images/flags/Russiske-flag.png" alt="#">Russiske navne</a>
                    <a title="Latinske navne"
                       href="/navne/schweiziske-navne/"><img class="county-flag" src="/content/images/flags/Schweiziske-flag.png" alt="#">Schweiziske navne</a>
                    <a title="Latinske navne"
                       href="/navne/skotske-navne/"><img class="county-flag" src="/content/images/flags/Skotske-flag.png" alt="#">Skotske navne</a>
                    <a title="Latinske navne"
                       href="/navne/slaviske-navne/"><img class="county-flag" src="/content/images/flags/none-flag.png" alt="#">Slaviske navne</a>
                    <a title="Latinske navne"
                       href="/navne/slovenske-navne/"><img class="county-flag" src="/content/images/flags/Slovenske-flag.png" alt="#">Slovenske navne</a>
                    <a title="Latinske navne"
                       href="/navne/spanske-navne/"><img class="county-flag" src="/content/images/flags/Spanske-flag.png" alt="#">Spanske navne</a>
                    <a title="Latinske navne"
                       href="/navne/tyske-navne/"><img class="county-flag" src="/content/images/flags/Tyske-flag.png" alt="#">Tyske navne</a>
                    <a title="Latinske navne"
                       href="/navne/ukrainske-navne/"><img class="county-flag" src="/content/images/flags/Ukrainske-flag.png" alt="#">Ukrainske navne</a>
                    <a title="Latinske navne"
                       href="/navne/ungarske-navne/"><img class="county-flag" src="/content/images/flags/Ungarske-flag.png" alt="#">Ungarske navne</a>
                    <a title="Walisiske navne"
                       href="/navne/walisiske-navne/"><img class="county-flag" src="/content/images/flags/Walisiske-flag.png" alt="#">Walisiske navne</a>
                </div>
                <div class="category-section">
                    <strong>Verdens navne</strong>
                    <a title="Afrikanske navne"
                       href="/navne/afrikanske-navne/"><img class="county-flag" src="/content/images/flags/Afrikanske-flag.png" alt="#">Afrikanske navne</a>
                    <a title="Arabiske navne"
                       href="/navne/arabiske-navne/"><img class="county-flag" src="/content/images/flags/Arabiske-flag.png" alt="#">Arabiske navne</a>
                    <a title="Aramæiske navne"
                       href="/navne/aramaeiske-navne/"><img class="county-flag" src="/content/images/flags/Aramaiske-flag.png" alt="#">Aramæiske navne</a>
                    <a title="Assyriske navne"
                       href="/navne/assyriske-navne/"><img class="county-flag" src="/content/images/flags/Assyriske-flag.png" alt="#">Assyriske navne</a>
                    <a title="Babelske navne"
                       href="/navne/babelske-navne/"><img class="county-flag" src="/content/images/flags/Franske-flag.png" alt="#">Babelske navne</a>
                    <a title="Esperanto navne"
                       href="/navne/esperanto-navne/"><img class="county-flag" src="/content/images/flags/Esperanto-flag.png" alt="#">Esperanto navne</a>
                    <a title="Hawaiianske navne"
                       href="/navne/hawaiianske-navne/"><img class="county-flag" src="/content/images/flags/Hawaiianske-flag.png" alt="#">Hawaiianske navne</a>
                    <a title="Hebræiske navne"
                       href="/navne/hebraeiske-navne/"><img class="county-flag" src="/content/images/flags/Hebraiske-flag.png" alt="#">Hebræiske navne</a>
                    <a title="Hindi navn"
                       href="/navne/hindi-navne/"><img class="county-flag" src="/content/images/flags/Hindi-flag.png" alt="#">Hindi navne</a>
                    <a title="Indianske navne"
                       href="/navne/indianske-navne/"><img class="county-flag" src="/content/images/flags/none-flag.png" alt="#">Indianske navne</a>
                    <a title="Japanske navne"
                       href="/navne/japanske-navne/"><img class="county-flag" src="/content/images/flags/Japanske-flag.png" alt="#">Japanske navne</a>
                    <a title="Jiddische navne"
                       href="/navne/jiddische-navne/"><img class="county-flag" src="/content/images/flags/none-flag.png" alt="#">Jiddische navne</a>
                    <a title="Keltiske navne"
                       href="/navne/keltiske-navne/"><img class="county-flag" src="/content/images/flags/Keltiske-flag.png" alt="#">Keltiske navne</a>
                    <a title="Kendte personers børns navne"
                       href="/navne/kendte-personers-boerns-navne/"><img class="county-flag" src="/content/images/flags/none-flag.png" alt="#">Kendte personers børns navne</a>
                    <a title="Kendte personers navne"
                       href="/navne/kendte-personers-navne/"><img class="county-flag" src="/content/images/flags/none-flag.png" alt="#">Kendte personers navne</a>
                    <a title="Kinesiske navne"
                       href="/navne/kinesiske-navne/"><img class="county-flag" src="/content/images/flags/Kinesiske-flag.png" alt="#">Kinesiske navne</a>
                    <a title="Koreanske navne"
                       href="/navne/koreanske-navne/"><img class="county-flag" src="/content/images/flags/Koreanske-flag.png" alt="#">Koreanske navne</a>
                    <a title="Nahuatl navne"
                       href="/navne/nahuatl-navne/"><img class="county-flag" src="/content/images/flags/none-flag.png" alt="#">Nahuatl navne</a>
                    <a title="Persiske navne"
                       href="/navne/persiske-navne"><img class="county-flag" src="/content/images/flags/Persiske-flag.png" alt="#">Persiske navne</a>
                    <a title="Thailandske navne"
                       href="/navne/thailandske-navne/"><img class="county-flag" src="/content/images/flags/Thailandske-flag.png" alt="#">Thailandske navne</a>
                    <a title="Tyrkiske navne"
                       href="/navne/tyrkiske-navne/"><img class="county-flag" src="/content/images/flags/Tyrkiske-flag.png" alt="#">Tyrkiske navne</a>
                    <a title="Vietnamesiske navne"
                       href="/navne/vietnamesiske-navne/"><img class="county-flag" src="/content/images/flags/Vietnamesiske-flag.png" alt="#">Vietnamesiske navne</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else : ?>
    <div class="main-article">
        <h1 class="main-article__title main-article__title--violet">Populære <?php echo str_replace('-', ' ',$object);?></h1>
        <div class="main-article__info d-flex flex-column d-lg-block clearfix">
            Længe før den lille ny er kommet til verden, starter overvejelserne. Hvad skal I kalde jeres lille søn?<br><br>

            På Min-Mave kan du se en liste over alle drengenavne, både de allermest populære drengenavne og de mere unikke. Du kan også bruge de mange søgemuligheder til f.eks. at finde drengenavne, der starter eller slutter med et bestemt bogstav, eller drengenavne der har en bestemt længde.<br><br>

            Hvis din søn allerede har fået sit navn, kan du ved hjælp af tabellen i højre side se, hvilken placering din søns navn har fået i listen over populære drengenavne år for år. Du kan også se, hvilke berømtheder dit barn deler navn med og meget mere.

            God fornøjelse
        </div>
    </div>
    <div class="popular-name__table">
        <div class="custom-item-container ">
            <div class="popular-name__table-title widget-title d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/male-icon.svg" alt="Male">
                    <span>De mest populære navne</span>
                </div>
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
                            <div class="popular-name__table-count"><?php echo ($key+1); ?></div>
                            <img class="popular-name__table-trend" src="<?php echo get_template_directory_uri(); ?>/assets/img/decrease.svg" alt="">
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


            <?php endif; ?>







