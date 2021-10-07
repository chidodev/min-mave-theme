<?php

$params = $_SESSION['search_params'];
$link = get_field('navne_api_url','option').'/api/name/search?page=1&perPage=20&'.http_build_query($params);


$object = get_query_var('object');

$page = 1;
$third_params = get_query_var('third');
$parametrs = get_query_var('parametrs');

if (is_numeric($parametrs)) {
    $page = $parametrs;
    $status = '';
    $base = get_permalink() .'/'. $object .  '/%_%/';

}
$json = file_get_contents($link.'&page='.$page);
$obj = json_decode($json, true);?>



<div class="main-article">
    <h3 class="main-article__title main-article__title--violet">Liste</h3>
    <div class="main-article__info d-flex flex-column d-lg-block clearfix">

    </div>
</div>


<div class="popular-name__table">
    <div class="custom-item-container ">
        <div class="popular-name__table-title widget-title d-flex justify-content-between align-items-center">
            <div class="d-flex">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/male-icon.svg" alt="Male">
                <span>Tilmeld dig nyhedsbrevet</span>
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
                        <div class="popular-name__table-count"><?php echo ($key+1);  ?></div>

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

