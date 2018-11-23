<?php
    /*
    Template Name: solutions Page
    */
    get_header();
?>
<div class="containersolutions">
        <div class="mrsolutns">
            <div class="container">

                <h1 class="page-title" data-aos="fade-up" data-aos-easing="ease-out-cubic"  data-aos-duration="800"><?php echo get_post_meta( get_the_ID(),'sol_ban_title',true ); ?></h1>
                <p class="page-desc" data-aos="fade-up" data-aos-easing="ease-out-cubic"  data-aos-duration="800" >It is our goal to set the standard on providing state of the art project management systems, customizable solutions, seamless panel integration, diversity in respondents, and rigorous security.
                    </p>
            </div>
            <div class="bluearrowthree">
                    <img src="<?php bloginfo('template_directory')  ?>/images/trianglesolutnone.png">

            </div>

        </div>
        <div class="sectionssolutionitems">
            <div class="bluearoowone">
                <img src="<?php bloginfo('template_directory')  ?>/images/trianglesolutntwo.png">
            </div>
            <div class="bluearoowtwo">
                    <img src="<?php bloginfo('template_directory')  ?>/images/trianglesolutnthree.png">
            </div>
            <div class="container">
            <?php $blocks =  get_post_meta( get_the_ID(),'sol_ban_title',true );
            
            if($blocks) {
                $i = 1;
                foreach($blocks as $key=>$block){
                    if($i%2 !=0){
                        echo '<h1 style="color:red">'.$block['heading'].'<h1>';
                    }
                    else{
                        echo '<h1 style="color:blue">'.$block['heading'].'<h1>';
                    }
                   
                    $i++;
                 }}?>        

                <div class="sectnitem" >
                    <div class="srow" >
                        <div class="scol6" >
                            <div class="solimgsect">
                                <img src="<?php bloginfo('template_directory')  ?>/images/solitemimgone.svg">
                                <div id="particles-js1" class="sparticles-js"></div>
                            </div>   
                        </div>
                        <div class="scol6">
                                <div class="solsecttext"  data-aos="fade-up" data-aos-easing="ease-out-cubic"  data-aos-duration="800" data-aos-offset="200"
                                >
                                    <h2>Survey Programming </h2>
                                    <p>With our proprietary panel, state-of-the-art survey management system, and multiple fraud detection technologies, we have positioned ourselves as one of the most comprehensive online sample solution providers.</p>

                                </div>
                        </div>
                    </div>
                </div>
                <div class="sectnitem" >
                        <div class="srow">
                            <div class="scol6 order2">
                                <div class="solimgsect">
                                    <img src="<?php bloginfo('template_directory')  ?>/images/solitemimgonea.svg">
                                    <div id="particles-js2" class="sparticles-js"></div>
                                </div>   
                            </div>
                            <div class="scol6 order1">
                                    <div class="solsecttext"  data-aos="fade-up" data-aos-easing="ease-out-cubic"  data-aos-duration="800" data-aos-offset="200">
                                        <h2>Data Processing </h2>
                                        <p>With our proprietary panel, state-of-the-art survey management system, and multiple fraud detection technologies, we have positioned ourselves as one of the most comprehensive online sample solution providers.</p>
    
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="sectnitem" >
                            <div class="srow">
                                <div class="scol6">
                                    <div class="solimgsect">
                                        <img src="<?php bloginfo('template_directory')  ?>/images/solitemimgoneb.svg">
                                        <div id="particles-js3" class="sparticles-js"></div>
                                    </div>   
                                </div>
                                <div class="scol6">
                                        <div class="solsecttext"  data-aos="fade-up" data-aos-easing="ease-out-cubic"  data-aos-duration="800" data-aos-offset="200">
                                            <h2>Reporting </h2>
                                            <p>With our proprietary panel, state-of-the-art survey management system, and multiple fraud detection technologies, we have positioned ourselves as one of the most comprehensive online sample solution providers.</p>
        
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="sectnitem" >
                                <div class="srow">
                                    <div class="scol6 order2">
                                        <div class="solimgsect">
                                            <img src="<?php bloginfo('template_directory')  ?>/images/solitemimgonec.svg">
                                            <div id="particles-js4" class="sparticles-js"></div>
                                        </div>   
                                    </div>
                                    <div class="scol6 order1">
                                            <div class="solsecttext"  data-aos="fade-up" data-aos-easing="ease-out-cubic"  data-aos-duration="800" data-aos-offset="200">
                                                <h2>Charting </h2>
                                                <p>With our proprietary panel, state-of-the-art survey management system, and multiple fraud detection technologies, we have positioned ourselves as one of the most comprehensive online sample solution providers.</p>
            
                                            </div>
                                    </div>
                                </div>
                            </div>
                        <div class="sectnitem" >
                                <div class="srow">
                                    <div class="scol6">
                                        <div class="solimgsect">
                                            <img src="<?php bloginfo('template_directory')  ?>/images/solitemimgoned.svg">
                                            <div id="particles-js5" class="sparticles-js"></div>
                                        </div>   
                                    </div>
                                    <div class="scol6">
                                            <div class="solsecttext"  data-aos="fade-up" data-aos-easing="ease-out-cubic"  data-aos-duration="800" data-aos-offset="200">
                                                <h2>Coding  </h2>
                                                <p>With our proprietary panel, state-of-the-art survey management system, and multiple fraud detection technologies, we have positioned ourselves as one of the most comprehensive online sample solution providers.</p>
            
                                            </div>
                                    </div>
                                </div>
                            </div>

                
            </div>
            <div class="abt-s4 clearfix">
                    <div class="container">
                        <h2>Drop us a line</h2>
                        <div class="abt-s4-btn-wrap clearfix">
                            <a href="#" class="abt-s4-btn">Contact</a>
                        </div>
                    </div>
                </div>



        </div>
    </div>