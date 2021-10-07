<?php acf_form_head(); ?>
<?php
/* Template Name: Children page */


get_header();
if ( is_user_logged_in() ) { ?>



    <div class="main-block">
    <div class="container">

        <?php get_template_part( 'banners/top', 'banner' ); ?>
        <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>

        <div class="row align-items-start">

            <div class="d-none d-xl-block col-2"><?php get_template_part( 'banners/left', 'skyscraper' ); ?></div>

            <div class="col d-flex flex-column flex-lg-row">
                <div class="content">
                    <h3 class="main-article__title"><?php the_title(); ?></h3>
                    <?php
                        $query = new WP_Query( array(
                            'post_type' => array( 'children' ),
                            'author' => get_current_user_id()
                        ) );
                    ?>
                    <div class="my-children">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="my-children__title">
                                Mine Børn
                            </div>
                            <button id="new-child" class="custom-btn my-children__add-new">Tilføj nyt barn</button>
                        </div>
                        <div id="user-children-cont" class="my-children__album custom-item-container text-center">

                            <?php
                            if(  $query->have_posts() ) {
                                ?>
                                <div class="my-children__album-container">
                                    <?php
                                    while ( $query->have_posts() ) : $query->the_post();
                                        $id =  get_the_ID();
                                        $skjul_dette = get_field('skjul_dette');
                                        $jeg_vil = get_field('jeg_vil');
                                        $harikke = get_field('har_ikke');
                                    ?>
                                    <div id="user-kid_<?php echo $id;?>>" class="my-children__photo-item d-flex flex-column justify-content-between">
                                        <div>
                                            <div class="my-children__photo mx-auto">
                                                <?php
                                                    if(get_field('profilbillede')!=null) {
                                                        ?>

                                                            <img src="<?php echo get_field('profilbillede')?>" alt="">
                                                        <?php
                                                    } else {
                                                        ?>
                                                            <div class="my-children__photo-item-default">
                                                                <img src="/wp-content/themes/min-mave-theme/assets/img/baby.svg" alt="">
                                                            </div>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="my-children__name text-center">
                                            <span>
                                                <?php echo get_field('navn'); ?>
                                            </span>
                                                <p class="my-children__hidden">
                                                    (vises ikke i profil)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="my-children__controlls d-flex flex-column">
                                            <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
                                            <button  type=submit" class="custom-btn  my-children__submit" data-id="<?php echo $id;?>"
                                               onclick="return confirm(&quot;Er du sikker på at du vil slette dette barn fra din profil?&quot;);">
                                                <input type="hidden" name="child_id" value="<?php echo $id;?>">
                                                <input type="hidden" name="action" value="remove_child">
                                                <span class="del-img"></span>
                                                <span class="text">Slet</span>
                                            </button>
                                            </form>
                                            <?php $unixtimestamp = strtotime( get_field('termin_fodselsdato') ); ?>
                                            <a href="#" class="custom-btn my-children__edit child-edit" data-action="edit" data-id="<?php echo $id;?>" data-name="<?php echo get_field('navn'); ?>" data-harikke="<?php echo $harikke[0]; ?>"
                                               data-termin="<?php echo get_field('termin_fodselsdato'); ?>" data-calendar="<?php echo date_i18n( "F, d, Y", $unixtimestamp ); ?>" data-kon="<?php echo get_field('kon'); ?>"
                                               data-profilbillede="<?php echo get_field('profilbillede'); ?>" data-jegvil="<?php echo $jeg_vil[0]; ?>" data-skjuldette="<?php echo $skjul_dette[0]; ?>">
                                                <span class="edit-img"></span>
                                                <span class="text">Rediger</span>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endwhile;
                                    ?>
                                </div>
                                    <?php
                                } else {
                                echo 'Du har i øjeblikket ingen børn oprettet';
                                }
                            ?>
                        </div>
                        <div class="my-children__form custom-item-container">
                            <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="validate" enctype="multipart/form-data" method="post" autocomplete="off" id="children_form">
                                <div class="data_i my-children__form-section my-children__form-section--name d-flex flex-wrap align-items-center">
                                    <input type="hidden" name="action" id="add_children" value="add_children">
                                    <input type="hidden" name="child_id" id="child_id">
                                    <div class="custom-input">
                                        <label for="usrchildname">Navn</label>
                                        <input name="childname" id="usrchildname" class="input_i input_t" type="text" value=""
                                               autocapitalize="off" autocorrect="off" autocomplete="off" spellcheck="false">
                                                                            </div>
                                    <div class="my-children__form-no-name custom-checkbox-block d-flex align-items-start">
                                        <label for="harikke" mmccheckboxiconindex="NoName">
                                            <input data-val="true" data-val-required="The NoName field is required." id="harikke" name="harikke" type="checkbox">
                                            <span class="checkmark"></span>
                                            Har ikke valgt navn endnu
                                        </label>
                                    </div>
                                    <div class="data_i_sep"></div>
                                </div>
                                <div class="my-children__form-section data_i">
                                    <div class="my-children__form-label">
                                        Termin/fødselsdato
                                    </div>
                                    <div class="calendar-input custom-select-block">
                                        <div class="d-flex align-items-center">
                                                        <span class="ovulation-calc__calendar-icon d-flex">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/black-calendar.svg" alt="">
                                                        </span>
                                            <span class="calendar-value">
                                                            Vælg dato
                                                        </span>
                                            <input type="hidden" id="birth-date" name="date" class="required">
                                        </div>
                                        <div class="custom-dropdown">
                                            <div class="calendar future-available">
                                                <div class="group calendar__header">
                                                    <p class="left pointer minusyear">&laquo;</p>
                                                    <p class="left year center pointer"></p>
                                                    <p class="right pointer addyear">&raquo;</p>
                                                </div>
                                                <div class="group calendar__header">
                                                    <p class="left pointer minusmonth">&laquo;</p>
                                                    <p class="left monthname center pointer"></p>
                                                    <p class="right pointer addmonth">&raquo;</p>
                                                </div>
                                                <ul class="group">
                                                    <li>Ma</li>
                                                    <li>Ti</li>
                                                    <li>On</li>
                                                    <li>To</li>
                                                    <li>Fr</li>
                                                    <li>Lø</li>
                                                    <li>Sø</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-children__hidden">
                                        Kender du ikke terminsdatoen, så prøv <a href="/beregn-termin.htm" target="_blank">vores terminsberegner</a> (åbner i en ny fane)
                                    </div>
                                    <div class="data_i_sep"></div>
                                </div>
                                <div class="my-children__form-section data_i">
                                    <div class="my-children__form-label">
                                        Køn
                                    </div>
                                    <div class="my-children__form-genfer radio-container">
                                        <!-- <input type="hidden" name="gender"> -->

                                        <div class="my-children__form-gender-select custom-checkbox-block d-flex align-items-start">
                                            <label for="pige" >
                                                <input type="radio" id="pige" name="gender" value="pige">
                                                <span class="checkmark"></span>
                                                Pige
                                            </label>
                                        </div>
                                        <div class="my-children__form-gender-select custom-checkbox-block d-flex align-items-start">
                                            <label for="dreng" >
                                                <input type="radio" id="dreng" name="gender" value="dreng">
                                                <span class="checkmark"></span>
                                                Dreng
                                            </label>
                                        </div>
                                        <div class="my-children__form-gender-select custom-checkbox-block d-flex align-items-start">
                                            <label for="ukendt">
                                                <input type="radio" id="ukendt" name="gender" value="ukendt">
                                                <span class="checkmark"></span>
                                                Ukendt
                                            </label>
                                        </div>
                                    </div>
                                    <div class="data_i_sep"></div>
                                </div>
                                <div class="my-children__form-section data_i">
                                    <div class="my-children__form-label">
                                        Profilbillede
                                    </div>
                                    <div class="my-children__add-photo">
                                        <div class="custom-file">
                                            <!--                                            <img id="usrchildphoto" src="/content/images/ico-unknown.png" alt=""-->
                                            <!--                                                 mmverticalalignapplied="true"-->
                                            <!--                                                 style="display: inline-block; vertical-align: middle;" border="0">-->
                                            <input type="file" name="profilbillede" id="usrchildphotoloc" value="">
                                            <label for="usrchildphotoloc" class="custom-btn">choose a file</label>
                                            <img class="preview" id="profilbillede" src="">
                                            <p class="custom-validation-error"></p>
                                        </div>
                                        <div class="my-children__hidden">
                                            <span>Maksimal filstørrelse er 5 MB<br>GIF, JPG, JPEG, PNG</span>
                                        </div>
                                    </div>
                                    <div class="data_i_sep"></div>
                                </div>
                                <div class="my-children__form-section data_i">
                                    <div class="my-children__form-gender-select custom-checkbox-block d-flex align-items-start">
                                        <label for="mails" mmccheckboxiconindex="NoName">
                                            <input id="mails" name="mails" type="checkbox">
                                            <span class="checkmark"></span>
                                            Jeg vil gerne modtage gode råd og inspiration på mail om mit barns udvikling underog efter graviditeten
                                        </label>
                                    </div>
                                    <div class="my-children__form-gender-select custom-checkbox-block d-flex align-items-start">
                                        <label for="hidden" mmccheckboxiconindex="NoName">
                                            <input name="hidden" id="hidden" type="checkbox">
                                            <span class="checkmark"></span>
                                            Skjul dette barn i min profil
                                        </label>
                                    </div>
                                </div>
                                <div class="my-children__form-section">
                                    <button type="submit" class="custom-btn" id="save-child">
                                        Gem barn
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    </div>
                    <?php get_sidebar() ?>
                </div>

                <div class="d-none d-xl-block col-2 text-right"><?php get_template_part( 'banners/right', 'skyscraper' ); ?></div>
            </div>
        </div>
    </div>


<?php
} else {
    wp_redirect( '/login' );
}
    get_footer(); ?>