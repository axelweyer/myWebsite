<div id="content">
	<div id="navigation">
		<img src="img/logo.png">
		<a <?php if(!isset($_GET['url']) || $_GET['url']=="home") echo 'class="green"'; ?> href="<?php echo URL; ?>"home>
			HOME
		</a>
		<a <?php if(isset($_GET['url']) && $_GET['url']=="projects") echo 'class="green"'; ?> href="<?php echo URL; ?>projects">
			PROJECTS
		</a>
		<a <?php if(isset($_GET['url']) && $_GET['url']=="design") echo 'class="green"'; ?> href="<?php echo URL; ?>design">
			DESIGN
		</a>
	</div>

	<div id="problem">
		<div class="widthDiv">
			<br><br><br><br>
			<span style="font-size:24px">Are you lost ?</span>
			<br>
			No problem, run the script to come back home
			<br><br>
			<pre>
				<code>
/**
 * Save your life
 *
 * @param {String} problem - the problem you got
 * @return {}
 */
function backHome(String problem)
{
	try
	{
		if(problem === "How to add a jack 3.5 to iPhone7")
			alert("Android");
		else if(problem === "back home")
			location = "home";
	}
	catch (e)
	{
   		e.message;
	}
}
				</code>
			</pre>
			<button onClick="location='home'">RUN SCRIPT</button>
		</div>
	</div>
</div>
