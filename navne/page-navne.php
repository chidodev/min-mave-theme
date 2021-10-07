
<?php 
?><div class="main-article">
    <h1 class="main-article__title main-article__title--violet">Find navne på drenge og navne på piger</h1>
    <div class="main-article__info d-flex flex-column d-lg-block clearfix">
        Velkommen til vores navneområde på Min-Mave.<br>

        Her kan du i ro og mag finde forslag til navnet på dit kommende barn, eller måske er du bare nysgerrig efter at undersøge popularitet og betydning af et navn, du allerede kender. Søgefunktionen til højre giver mange muligheder.<br>

        Vi har samlet en kæmpe database med navne, som er godkendt i Danmark - og som du frit kan bruge til at navngive dit barn efter. Vi har valgt også at medtage en lang række navne, som endnu ikke er godkendte i Danmark. På den måde får du det største udvalg, og hvem ved, om du bliver den næste, der søger om tilladelse til at få lov til at bruge et af de navne, når dit barn skal navngives.
    </div>
</div>
<div class="names-main d-flex justify-content-between">
    <?php
    $link_male = get_field('navne_api_url','option').'/api/name/popular?gender=drengenavne&perPage=20&page=1';
    $json = file_get_contents($link_male, true);
    $male = json_decode($json, true);
    ?>
    <div class="custom-item-container best-names names-main__list">
        <div class="best-names__title widget-title boys">
            <img src="/wp-content/themes/min-mave-theme/assets/img/male-icon.svg"
                 alt="">
            <span>Populære drengenavne</span>
        </div>
        <div class="best-names__body">
            <?php
            foreach($male as $key => $value) :
            if (!isset($value['totalNumberOfItems'])) :

            echo '
            <div class="best-names__item">
                <span>'.($key+1).'</span>';
                if ($value['arrow'] == 'Up')
                    echo '<img src="'.get_template_directory_uri().'/assets/img/increase.svg" alt="">';
                elseif ($value['arrow'] == 'Down')
                    echo '<img src="'.get_template_directory_uri().'/assets/img/decrease.svg" alt="">';
                else
                    echo '<img src="'.get_template_directory_uri().'/assets/img/equal.svg" alt="">';
                echo '
                <div class="best-names__name">
                    <a href="/navne/'.$value['slug'].'">'.$value['name'].'</a>
                </div>
                <div class="best-names__rate">';
                    $raiting = ($value['ratings']['RatingAverage'] != null)?$value['ratings']['RatingAverage']:0;
                        $star = 1;
                        while ($star<= 5) :
                            if ($star <= $raiting) : ?>
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                            <?php
                            endif;
                            $star++ ;
                        endwhile;
            echo '
                </div>
            </div>';
            endif;
            endforeach;
            ?>


            <div class="mt-2">
                <a class="names-main__link" href="/navne/drengenavne/">Populære drengenavne</a>
            </div>
        </div>
    </div>
    <div class="custom-item-container best-names names-main__list">
        <div class="best-names__title widget-title girls">
            <img src="/wp-content/themes/min-mave-theme/assets/img/female.svg"
                 alt="">
            <span>Populære pigenavne</span>
        </div>
        <?php $link_female = get_field('navne_api_url','option').'/api/name/popular?gender=pigenavne&perPage=20&page=1';
        $json = file_get_contents($link_female);
        $female = json_decode($json, true);
        ?>
        <div class="best-names__body">
            <?php
            foreach($female as $key => $value) :
                if (!isset($value['totalNumberOfItems'])) :

                    echo '
            <div class="best-names__item">
                <span>'.($key+1).'</span>';
                    if ($value['arrow'] == 'Up')
                        echo '<img src="'.get_template_directory_uri().'/assets/img/increase.svg" alt="">';
                    elseif ($value['arrow'] == 'Down')
                        echo '<img src="'.get_template_directory_uri().'/assets/img/decrease.svg" alt="">';
                    else
                        echo '<img src="'.get_template_directory_uri().'/assets/img/equal.svg" alt="">';
                    echo '
                <div class="best-names__name">
                    <a href="/navne/'.$value['slug'].'">'.$value['name'].'</a>
                </div>
                <div class="best-names__rate">';
                    $raiting = ($value['ratings']['RatingAverage'] != null)?$value['ratings']['RatingAverage']:0;
                    $star = 1;
                    while ($star<= 5) :
                        if ($star <= $raiting) : ?>
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                        <?php
                        endif;
                        $star++ ;
                    endwhile;
                    echo '
                </div>
            </div>';
                endif;
            endforeach;
            ?>
            <div class="mt-2">
                <a class="names-main__link" href="/navne/pigenavne/">Populære pigenavne</a>
            </div>
        </div>
    </div>
</div>
<div class="names-main__articles">
    <div class="article-list custom-item-container d-none d-md-flex flex-column justify-content-between ml-0 mt-4">
        <div class="article-list__content">
            <div class="article-list__title">
                Læs også
            </div>
            <div class="article-list__container">
                <?php
                $query = new WP_Query( ['posts_per_page' => 4] );
                while ( $query->have_posts() ) {
                $query->the_post();

                    echo '
                    <div class="article-list__item">
                        <a href="'.get_the_permalink().'">
                            '.get_the_title().'
                        </a>
                    </div>
                    ';
                }
                ?>

            </div>
        </div>
        <a href="/artikel/" class="custom-btn text-center outline article-list__more mx-auto">
            Se flere nyheder
        </a>
    </div>
</div>