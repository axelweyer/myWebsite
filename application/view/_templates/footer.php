<div id="modalCredits" class="modal fade" role="dialog" style="color:black">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p class="title">Credits</p>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-3 text-center technologies"> <img src="img/toolbox/mini.png" class='technologiesIcon'>
                        <br> <span class="technologyTitle" style="padding-top:10px;margin-top:10px">MINI</span>
                        <br> PHP Framework </div>
                    <div class="col-sm-3 text-center technologies"> <img src="img/toolbox/bootstrap.png" class='technologiesIcon'>
                        <br> <span class="technologyTitle">Bootstrap</span>
                        <br> WEB Responsive Framework </div>
                    <div class="col-sm-3 text-center technologies"> <img src="img/toolbox/jquery.png" class='technologiesIcon'>
                        <br> <span class="technologyTitle">JQuery</span>
                        <br> JavaScript Library </div>
                    <div class="col-sm-3 text-center technologies"> <img src="img/toolbox/freewall.png" class='technologiesIcon'>
                        <br> <span class="technologyTitle">Freewall</span>
                        <br> JavaScript Grid Plugin </div>
                    <div class="col-sm-12">
                        <br>
                        <br>
                        <br>
                        <p>In the future, a better website :</p>
                        <ul>
                            <li>Analytics</li>
                            <li>Meta tags & h tags / SEO</li>
                            <li>Search Console by Google</li>
                            <li>credits modifs</li>
                            <li>displaying projects modifs</li>
                            <li>backgrounds</li>
                            <li>contact</li>
                            <li>recaptcha dans alert pour confirmer envoi</li>
                        </ul>
                    </div>
                </div>
                <div id="contactFooter">Created by Axel Weyer - 2016</div>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <div class="text-center">
        <br>
        <br> <span class="pointer" data-toggle="modal" data-target="#modalCredits">Credits </span><span class="green">©</span><span id="nameFooter"> 2016 by Axel Weyer</span> </div>
</div>
</div>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
	<script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->
	<?php if(!isset($_GET['url']) || $_GET['url']=="home")
	{ ?>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.1.3/circle-progress.min.js"></script>
    	<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
		<script src="js/utils/jquery.horizBarChart.min.js"></script>
		<script src="js/home.js"></script>
	<?php }
	else if(isset($_GET['url']) && $_GET['url']=="projects")
	{ ?>
		<script src="js/projects.js"></script>
	<?php }
	else if(isset($_GET['url']) && ($_GET['url']=="blog"))
	{ ?>
		<script src="js/utils/freewall.js"></script>
		<script src="js/blog.js"></script>
	<?php }
	else if(isset($_GET['url']) && ($_GET['url']=="design"))
	{ ?>
		<script src="js/utils/freewall.js"></script>
		<script src="js/design.js"></script>
	<?php }
	else if(isset($_GET['url']) && ($_GET['url']=="toolbox"))
	{ ?>
		<script src="js/utils/freewall.js"></script>
		<script src="js/toolbox.js"></script>
	<?php } ?>
    <script src="js/application.js"></script>
	<!--<script src="js/utils/jquery.nicescroll.js"></script>-->
</body>
</html>
