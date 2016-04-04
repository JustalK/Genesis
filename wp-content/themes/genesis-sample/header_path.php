<div id="header-path">
	<div class="wrap">
		<?php 
			$path = "";
			// For making the HOME
			if(strpos($_SERVER['REQUEST_URI'], '/') !== false) {
				$path .= '<a href="'.get_site_url().'">HOME</a>';
			}
			// For makin the author's path
			if(strpos($_SERVER['REQUEST_URI'], '?author=') !== false) {
				$user = get_user_by("ID",$_GET["author"]);
				$path .= '> <a href="'.get_site_url().'?author='.$_GET["author"].'">'.$user->user_login.'</a>';
			}
			// For making the post's path
			if(strpos($_SERVER['REQUEST_URI'], '?p=') !== false) {
				$post = get_post($_GET["p"]);
				$path .= '> <a href="'.get_site_url().'?p='.$_GET["p"].'">'.$post->post_title.'</a>';
			}
			// For making the cat's path
			if(strpos($_SERVER['REQUEST_URI'], '?cat=') !== false) {
				$cat = get_cat_name($_GET["cat"]);
				$path .= '> <a href="'.get_site_url().'?cat='.$_GET["cat"].'">'.$cat.'</a>';
			}
			// For making the page's path
			if(strpos($_SERVER['REQUEST_URI'], '?page_id=') !== false) {
				$page = get_post($_GET["page_id"]);
				$path .= '> <a href="'.get_site_url().'?page_id='.$_GET["page_id"].'">'.$page->post_title.'</a>';
			}			
			echo "Path : ".$path; 
		?>
	</div>
</div>