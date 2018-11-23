<?php get_header(); ?>
<section class="wrapper">
    <div class="contentmain center">
        <div id="content" class="narrowcolumn">
            <p class="emoji">:(</p>
            <center><h2 class="title">Error 404 - Page Not Found</h2></center>
        </div>
        <div class="center">
            <p>You 
                <?php
#some variables for the script to use
#if you have some reason to change these, do.  but wordpress can handle it
$adminemail = get_option('admin_email'); #the administrator email address, according to wordpress
$website = get_bloginfo('url'); #gets your blog's url from wordpress
$webdomain = 'acodez.in';
$websitename = get_bloginfo('name'); #sets the blog's name, according to wordpress

if (!isset($_SERVER['HTTP_REFERER'])) {
    #politely blames the user for all the problems they caused
        echo "tried going to "; #starts assembling an output paragraph
        $casemessage = "All is not lost!";
    } elseif (isset($_SERVER['HTTP_REFERER'])) {
    #this will help the user find what they want, and email me of a bad link
    echo "clicked a link to"; #now the message says You clicked a link to...
        #setup a message to be sent to me
    $failuremess = "A user tried to go to $website"
    .$_SERVER['REQUEST_URI']." and received a 404 (page not found) error. ";
    $failuremess .= "It wasn't their fault, so try fixing it.  
    They came from ".$_SERVER['HTTP_REFERER'];
    wp_mail($adminemail, "Bad Link To ".$_SERVER['REQUEST_URI'],
        $failuremess, "From: $websitename<noreply@$webdomain>"); #email you about problem
    $casemessage = "An administrator has been emailed 
        about this problem, too.";#set a friendly message
    }
    echo " ".$website.$_SERVER['REQUEST_URI']; ?> 
    and it doesn't exist.
    <br/> <?php echo $casemessage; ?>  You can click back 
    and try again or search for what you're looking for:
   <form role="search" method="get" class="search-form" action="<?php the_permalink()?>">
                        <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                        <input type="submit" class="search-submit" value="Search">
                    </form>     
</p>

</div>
</div>
</section>
<?php get_footer(); ?>