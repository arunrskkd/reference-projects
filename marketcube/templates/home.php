<?php
    /*
    Template Name: Home Page
    */
    get_header();
?>
<?php $slider = get_post_meta(get_the_ID(),'homepage_slider_images',true);
if($slider):?>
<section class="home-top-slider">
	
</section>
<?php endif; ?>

<div class="sectionbanner">
    <div class="fullsect">
        <?php if( get_post_meta( get_the_ID(),'ban_img',true ) ) {
            $style = 'style="background-image:url('. get_post_meta( get_the_ID(),'ban_img',true ).');"';
        } else {
            $style = '';
        } ?>
        <div class="imgsetc" <?php echo $style; ?>></div>
        <div class="imgtwosect posione panorama-object count">
            200000
        </div>
        <div class="imgtwosect positwo panorama-object count">
            900000
        </div>
        <div class="imgtwosect posithree panorama-object count">
            600000
        </div>
        <div class="imgtwosect posifour panorama-object count">
            500000
        </div>
        <div class="imgtwosect posionea panorama-object ">
            <img src="<?php echo get_template_directory_uri().'/images/banrposimg.svg';?>">
        </div>
        <div class="imgtwosect positwoa panorama-object ">
            <img src="<?php echo get_template_directory_uri().'/images/banrposimg.svg';?>">
        </div>
        <div class="imgtwosect posithreea panorama-object ">
            <img src="<?php echo get_template_directory_uri().'/images/banrposimg.svg';?>">
        </div>
        <div class="imgtwosect posifoura panorama-object ">
            <img src="<?php echo get_template_directory_uri().'/images/banrposimg.svg';?>">
        </div>
        <div class="textsect">
            <div class="container">
                <h1><?php echo get_post_meta( get_the_ID(),'ban_title',true ); ?></h1>
                <p class="para"><?php echo get_post_meta( get_the_ID(),'ban_desc',true ); ?></p>
            </div>
        </div>
    </div>
</div>
<div class="sectionflowanimate">
    <?php $i = 1;
    $j = 1;
    $blocks = get_post_meta(get_the_ID(),'h_s2_blks',true);
    if( $blocks ):
        foreach( $blocks as $key=>$block ): ?>
            <div class="automated">
                <div class="container">
                    <div class="row">
                        <?php if( $i%2 !=0 ): ?>
                            <div class="col-sm-6">
                                <div class="autoimgsect posr">
                                    <?php if( $block['img_url'] ): ?>
                                        <img src="<?php echo $block['img_url']; ?>" alt="<?php echo $block['title']; ?>"/>
                                    <?php endif; ?>
                                    <div id="particles-js<?php echo $j; ?>" class="particles-js<?php echo $j; ?>"></div>
                                    <?php if( $block['icon'] ): ?>
                                        <div class="spaniconnumberb">
                                            <img src="<?php echo $block['icon']; ?>" alt="<?php echo $block['title']; ?>"/>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="col-sm-6 posr">
                                <h3 class="animpara"><?php echo $block['title']; ?></h3>
                                <?php if( $block['btn_link'] ): ?>
                                    <a href="<?php echo $block['btn_link']; ?>" class=" hvr-wobble-vertical btnone centerblockmob anibtn zindexbtn"><?php echo $block['btn_label']; ?></a>
                                <?php endif; ?>
                            </div>
                        <?php else:?>
                            <div class="col-sm-6 posr">
                                <h3 class="animpara"><?php echo $block['title']; ?></h3>
                                <?php if( $block['btn_link'] ): ?>
                                    <a href="<?php echo $block['btn_link']; ?>" class=" hvr-wobble-vertical btnone centerblockmob anibtn zindexbtn"><?php echo $block['btn_label']; ?></a>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6">
                                <div class="autoimgsect ml-auto posr">
                                    <?php if( $block['img_url'] ): ?>
                                        <img src="<?php echo $block['img_url']; ?>" alt="<?php echo $block['title']; ?>"/>
                                    <?php endif; ?>
                                    <div id="particles-js<?php echo $j; ?>" class="particles-js<?php echo $j; ?>"></div>
                                    <?php if( $block['icon'] ): ?>
                                        <div class="spaniconnumbera">
                                            <img src="<?php echo $block['icon']; ?>" alt="<?php echo $block['title']; ?>"/>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php $i++;
            $j++;
        endforeach; ?>
    <?php endif; ?>
    <div class="automated">
        <div class="container">
            <div class="datass posr">
                <img src="<?php echo get_template_directory_uri().'/images/glowbakground.png'; ?>" alt="glowbakground"/>
                <div class="fallingeffect">
                    <span class="fallingitem">
                        <img src="<?php echo get_template_directory_uri().'/images/fallitemone.svg'; ?>" alt="fallingitem1"/>
                    </span>
                    <span class="fallingitem fallpositiontwo">
                        <img src="<?php echo get_template_directory_uri().'/images/fallitemoneb.svg'; ?>" alt="fallingitem2"/>
                    </span>
                    <span class="fallingitem fallpositionthree">
                        <img src="<?php echo get_template_directory_uri().'/images/fallitemonec.svg'; ?>" alt="fallingitem3"/>
                    </span>
                    <span class="fallingitem fallpositionfour ">
                        <img src="<?php echo get_template_directory_uri().'/images/fallitemoned.svg'; ?>" alt="fallingitem4"/>
                    </span>
                    <span class="fallingitem  fallpositionfice">
                        <img src="<?php echo get_template_directory_uri().'/images/fallitemone.svg'; ?>" alt="fallingitem5"/>
                    </span>
                </div>
                <div id="particles-js7" class="particles-js7"></div>
                <?php if( get_post_meta( get_the_ID(),'h_s2_blk_btn_circle',true ) ): ?>
                    <div class="ringfloat">
                        <img src="<?php echo get_post_meta( get_the_ID(),'h_s2_blk_btn_circle',true ); ?>" alt="glowring"/>
                    </div>
                <?php endif; ?>
            </div>
            <h3 class="animpara paratwo"><?php echo get_post_meta( get_the_ID(),'h_s2_blk_title',true ); ?></h3>
            <?php if( get_post_meta( get_the_ID(),'h_s2_blk_btn_link',true ) ): ?>
                <a href="<?php echo get_post_meta( get_the_ID(),'h_s2_blk_btn_link',true ); ?>" class=" hvr-wobble-vertical btnone centerblockmob anibtn mh-auto "><?php echo get_post_meta( get_the_ID(),'h_s2_blk_btn_label',true ); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <!-- center line with animation -->
    <div class="sectlineanim">
        <svg height="3350" width="700">
            <defs>
                <filter id="blur" x="-200%" y="-200%" width="400%" height="400%">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="70" />
                </filter>
            </defs>

            <path d="M 47 60 l 293 105 l 0 3006" id="flow" style="fill:transparent;stroke-width:3;
                            stroke:#0fffff;stroke-opacity:0.5;" />

            <circle id="circle" r="6" cx="0" cy="0" fill="#0fffff" />
            <circle id="circle4" r="6" cx="0" cy="0" fill="#0fffff" />
            <animateMotion xlink:href="#circle" dur="4s" begin="0s" fill="freeze" repeatCount="indefinite">
                <mpath xlink:href="#flow" />
            </animateMotion>
            <animateMotion xlink:href="#circle4" dur="4s" begin="2s" fill="freeze" repeatCount="indefinite">
                <mpath xlink:href="#flow" />
            </animateMotion>
            <path d="M 651 644 l -236 17 l -74 75 l 0 2647" id="flow2" style="fill:transparent;stroke-width:3;
                            stroke:#0fffff;stroke-opacity:0.5;" />

            <circle id="circle2" r="6" cx="0" cy="0" fill="#0fffff" />
            <animateMotion xlink:href="#circle2" dur="3s" begin="2s" fill="freeze" repeatCount="indefinite">
                <mpath xlink:href="#flow2" />
            </animateMotion>
            <path d="M 622 1877 l -207 15 l -74 75 l 0 1423" id="flow4" style="fill:transparent;stroke-width:3;
                            stroke:#0fffff;stroke-opacity:0.5;" />

            <!-- <circle id="circle4" r="6" cx="0" cy="0" fill="#0fffff" /> -->
            <animateMotion xlink:href="#circle4" dur="3s" begin="2s" fill="freeze" repeatCount="indefinite">
                <mpath xlink:href="#flow4" />
            </animateMotion>
            <path d="M 79 1254 l 186 16 l 75 61 l -1 2040" id="flow3" style="fill:transparent;stroke-width:3;
                            stroke:#0fffff;stroke-opacity:0.5;" />

            <circle id="circle3" r="6" cx="0" cy="0" fill="#0fffff" />
            <animateMotion xlink:href="#circle3" dur="3s" begin="2s" fill="freeze" repeatCount="indefinite">
                <mpath xlink:href="#flow3" />
            </animateMotion>
            <path d="M 84 2485 l 182 10 l 75 61 l -1 326" id="flow5" style="fill:transparent;stroke-width:3;
                            stroke:#0fffff;stroke-opacity:0.5;" />

            <circle id="circle5" r="6" cx="0" cy="0" fill="#0fffff" />
            <animateMotion xlink:href="#circle5" dur="3s" begin="2s" fill="freeze" repeatCount="indefinite">
                <mpath xlink:href="#flow5" />
            </animateMotion>
            <path d="M 622 3076 l -209 17 l -74 75 l 0 847" id="flow6" style="fill:transparent;stroke-width:3;
                            stroke:#0fffff;stroke-opacity:0.5;" />

            <circle id="circle6" r="6" cx="0" cy="0" fill="#0fffff" />
            <animateMotion xlink:href="#circle6" dur="3s" begin="2s" fill="freeze" repeatCount="indefinite">
                <mpath xlink:href="#flow6" />
            </animateMotion>
        </svg>
    </div>
    <!-- section clarity  -->
    <div class="sectionclarity">
        <div class="sectinerclarity">
            <div class="container">
                <div class="row d-flexone">
                    <div class="col-sm-5 mv-auto">
                        <h2 class="textmobcenter"><?php echo get_post_meta( get_the_ID(), 'h_s3_title', true ); ?></h2>
                        <p class="textmobcenter"><?php echo get_post_meta( get_the_ID(), 'h_s3_desc', true ); ?></p>
                        <?php if( get_post_meta( get_the_ID(), 'h_s3_btn_link', true ) ): ?>
                            <a href="<?php echo get_post_meta( get_the_ID(), 'h_s3_btn_link', true ); ?>" class=" hvr-wobble-vertical btnone centerblockmob btnwtwo"><?php echo get_post_meta( get_the_ID(), 'h_s3_btn_label', true ); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-7 ">
                        <div class="sectwave posr marginvmob">
                            <div class="ripples">
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                            </div>
                            <?php if( get_post_meta( get_the_ID(), 'h_s3_image', true ) ): ?>
                                <img src="<?php echo get_post_meta( get_the_ID(), 'h_s3_image', true ); ?>" alt="rounddimage">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section our unique value -->
    <div class="uniq">
        <div class="container">
            <div class="sectinsideunig">
                <h2><?php echo get_post_meta( get_the_ID(), 'h_s4_title', true ); ?></h2>
            </div>
            <?php if( get_post_meta( get_the_ID(), 'h_s4_blks', true ) ):
                $blocks = array_values( get_post_meta( get_the_ID(), 'h_s4_blks', true ) ); ?>
                <div class="row">
                    <?php foreach( $blocks as $key => $block ): ?>
                        <div class="col-sm-4">
                            <div class="sectinsideuni">
                                <?php if( $block['image'] ):?>
                                    <div class="uniqimg">
                                        <img src="<?php echo $block['image']; ?>" alt="<?php echo $block['title']; ?>"/>
                                    </div>
                                <?php endif; ?>
                                <h3><?php echo $block['title']; ?></h3>
                                <?php echo wpautop( $block['desc'] ); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif;
            if( get_post_meta( get_the_ID(), 'h_s4_btn_link', true ) ): ?>
                <div class="sectafter">
                    <a href="<?php echo get_post_meta( get_the_ID(), 'h_s4_btn_link', true ); ?>" class=" hvr-wobble-vertical btnone centerblockmob"><?php echo get_post_meta( get_the_ID(), 'h_s4_btn_label', true ); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>