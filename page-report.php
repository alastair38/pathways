 <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
     google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawMarkersMap);

      function drawMarkersMap() {
      var data = google.visualization.arrayToDataTable([
        ['City',   'Estimated Number of people with Dementia'],
        ['Aberdeen City',      3382],
        ['Aberdeenshire',     4242],
        ['Angus',    2329],
        ['Argyll and Bute',     1941],
        ['Clackmannanshire',   757],
        ['Dumfries and Galloway',     3307],
        ['Dundee',   2741],
        ['East Ayrshire',  2069],
        ['East Dunbartonshire', 2086],
        ['East Lothian',     1813],
        ['East Renfrewshire',  1714],
        ['Edinburgh',  7823],
        ['Western Isles',  603],
        ['Falkirk',  2480],
        ['Fife',  6682],
        ['Glasgow',  7892],
        ['Highlands',  4363],
        ['Inverclyde',  1423],
        ['Midlothian',  1350],
        ['Moray',  1725],
        ['North Ayrshire',  2464],
        ['North Lanarkshire',  4695],
        ['Orkney Islands',  401],
        ['Perth and Kinross',  3148],
        ['Renfrewshire',  2749],
        ['Scottish Borders  ',  2265],
        ['Shetland Islands',  401],
        ['South Ayrshire',  2463],
        ['South Lanarkshire',  5306],
        ['Stirling',  1588],
        ['West Dunbartonshire',  1405],
        ['West Lothian',  2272]
      ]);

      var options = {
        region: 'GB',
        displayMode: 'markers',
        colorAxis: {colors: ['#afbafb', '#414141']},
        backgroundColor: 'lightblue',
        datalessRegionColor: 'tomato',
        resolution: 'provinces',
        tooltip: { textStyle: { fontName: 'Raleway', fontSize: 16 } },
        legend: { textStyle: { fontName: 'Raleway', fontSize: 16} },
      };

      var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    };
    </script>
<?php

/*
Template Name: Form (No Sidebar)
*/

acf_form_head();
get_header(); ?>

	<div id="homePrimary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'form' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->

	</div><!-- #primary -->



<?php get_footer(); ?>
