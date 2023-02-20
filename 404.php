<script>
  function pageRedirect() {
    var delay = 4000;
    setTimeout( function () {
    //  window.location = "";
    }, delay );
  }
  pageRedirect();
</script>


<?php
$GLOBALS['title'] = "404 Not Found";
$GLOBALS['keywords'] = "404";
$GLOBALS['description'] = "404";
$GLOBALS['h1'] = "404 Not Found";

$GLOBALS['bodyID'] = "404";
$GLOBALS['bodyClass'] = "under";

get_header()
?>
<div id="main">
	<!-- #top_info -->
		<div id="top_info" class="clearfix">
			<div class="inner">
				<h2>404 Not Found</h2>
			</div>
	</div>
	<!-- end #top_info -->

	<!-- #topic_path -->
	<div id="topic_path" class="clearfix">
		<div class="inner">
			<ul>
				<li><a href="#">TOP</a></li>
				<li>404 Not Found</li>
			</ul>
		</div>
	</div>
	<!-- end #topic_path -->

	<!-- content start -->
	<div id="content">
		<div class="inner">
			<h3>404 Not Found</h3>
		</div>
	</div>
</div>
<?php
get_footer()
?>