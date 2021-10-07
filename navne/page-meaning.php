<?php
$object = get_query_var('object');
$link = get_field('navne_api_url', 'option') . '/api/name?name=' . $object;
$json = file_get_contents($link);
$obj = json_decode($json, true); 
$string = explode('-', $object)[0];

?>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div class="d-flex">
    <div class="single custom-item-container">
        <div class="article__preview">

            <h4 class="article__title">
                <?php echo $obj[0]['name']; ?>
            </h4>

            <div class="article__description">
                <div itemprop="articleBody">
                    <?php echo $obj[0]['description']; ?>
                </div>
            </div>
            <div class="names-calendar__famous article__description">
                <br>
                <?php if (count($obj[0]['famous_people']) != 0): ?>
                <div class="names-calendar__famous-title">
                    Kendte personer med navnet:
                </div>
                <ul class="famous-people-list">
                    <?php foreach ($obj[0]['famous_people'] as $key => $tag) {
                        if (($key <= 3 )||($key === array_key_last($obj[0]['famous_people'])))
                        echo '<li>
                                    <a href="' . $tag['externalurl'] . '" wiki_link_lang="en"
                                       rel="nofollow" target="_blank" data_wiki="true" wiki_href="' . $tag['name'] . '"
                                       wiki_fetch_item="none">' . $tag['name'] . '</a> - Dansk <a
                                        href="/navne/kendte/beskaeftigelse/musikproducere"
                                        class="kendteoccuplink" data_html_exten="true">musikproducer</a>
                                </li>';

                    } ?>


                    <li class="last-li"><a href="/navne/kendte/<?php echo $obj[0]['slug']; ?>">Se alle</a></li>
                </ul>
                <?php endif; ?>
            </div>
            <div class="floatWrapper single_space article__description d-flex flex-column flex-sm-row justify-content-between">
                <div class="floatLeft w360">
                    <h3><label for="Names">Relaterede navne</label></h3>
                    <ul class="relatednames">
                        <?php foreach ($obj[0]['related_names'] as $key =>$tag) {


                                echo '<li>&nbsp;-
                            <a href="/navne/' . $tag['slug'] . '">' . $tag['name'] . '</a>
                        </li>';

                        } ?>

                    </ul>
                </div>
                <div class="floatLeft">

                    <div class="floatWrapper double_space w160"><label
                                for="Ratings">Rating</label> :
                        <div class="rating floatRight" title="Stem" itemprop="aggregateRating"
                             itemscope="" itemtype="http://schema.org/AggregateRating">
                            <span data-star-url="/navne/Rating/Rate?nameId=15833"></span>
                            <span data-star-label=""></span>
                            <?php $raiting = ($obj[0]['ratings']['RatingAverage'] != null) ? $obj[0]['ratings']['RatingAverage'] : 0;
                            $star = 1;
                            while ($star <= 5) :
                                if ($star <= $raiting) : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/star-full.svg"
                                         alt="">
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/star-outline.svg"
                                         alt="">
                                <?php
                                endif;
                                $star++;
                            endwhile; ?>
                            <meta itemprop="ratingValue" content="<?php echo $obj[0]['ratings']['RatingAverage']; ?>">
                            <meta itemprop="reviewCount" content="<?php echo $obj[0]['ratings']['NavnetalNumber']; ?>">
                        </div>
                    </div>
                </div>
                <div class="buttoncontainer">

                </div>
            </div>

        <div class="names-calendar__famous-tags article__tags">
            <h3><label for="Tags">Tags</label></h3>
            <?php foreach ($obj[0]['tags'] as $tag) {
                echo '<a href="/navne/' . $tag['slug'] . '">' . $tag['name'] . '</a>';
            } ?>
        </div>
            <div class="names-calendar__famous-related article__description">
                <br>
                <h1>Så populært er navnet <?php echo ucfirst($string); ?></h1>
                <div class="divider single_half_space"></div>
                <div class="names-calendar__famous-badges d-flex flex-column flex-sm-row align-items-stretch justify-content-between" id="div_namepage_statbox">

                    <div class="names-calendar__famous-top">
                                            <span class="names-calendar__famous-description">
                                                <?php echo $obj[0]['name']; ?> er det mest populære navn til baby i 2018
                                           </span>
                        <span class="names-calendar__famous-data">
                                                #<?php echo $obj[0]['navnetalnumber']; ?>
                                            </span>
                    </div>

                    <div class="names-calendar__famous-count">
                                            <span class="names-calendar__famous-description">
                                                Antal personer i Danmark med navnet <?php echo $obj[0]['name']; ?>
                                           </span>
                        <span class="names-calendar__famous-data">
                                                <?php echo $obj[0]['residentcount']; ?>
                                            </span>

                    </div>

                    <div class="names-calendar__famous-most-popular">
                                            <span class="names-calendar__famous-description">
                                                Navnet <?php echo $obj[0]['name']; ?> ligger nummer i mest populære over tid
                                            </span>
                        <span class="names-calendar__famous-data">
                                                  <span>#</span><?php echo $obj[0]['ratings']['NavnetalNumber']; ?>
                                            </span>

                    </div>
                </div>
            </div>
    </div>
    <div id="chart"></div>
    <script src="<?php echo get_template_directory_uri();?>/assets/js/apexcharts.min.js"></script>
    <script>
        <?php function cmp($a, $b)
        {
            return strcmp($a["Year"], $b["Year"]);
        }


usort($obj[0]['christenings'], "cmp");
?>
        let namesStat = <?php echo json_encode($obj[0]['christenings']); ?>  
        var options = {
            series: [{ name: "Names", data: (namesStat && namesStat.length ? namesStat : []).map((e) => ({ y: e.Number, x: e.Year })) }],
            chart: { height: 350, type: "line" },
            dataLabels: { enabled: !1 },
            colors: ["#634282"],
            stroke: { curve: "smooth", width: [2] },
            grid: { row: { colors: ["#f3f3f3", "transparent"], opacity: 0.5 } },
            xaxis: { type: "datetime" },
            yaxis: { forceNiceScale: !0 },
            tooltip: { x: { format: "yyyy" } },
        },
        chart = new ApexCharts(document.querySelector("#chart"), options);
        setTimeout(() => {
            chart.render();   
        });
    </script>

</div>
</div>