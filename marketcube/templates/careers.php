<?php
    /*
    Template Name: Careers
    */
    get_header();
    wp_enqueue_script('easy_responsive_tab');
    wp_enqueue_script('magnify_popup');
    wp_enqueue_script('validate');
    add_action('wp_footer','career_scripts',25);
    function career_scripts(){ ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#career-openings-accordion").easyResponsiveTabs({
                    type: 'accordion',
                    width: 'auto',
                    fit: true,
                    closed: true,
                    activate: function() {},
                    tabidentify: 'cr_tab_identifier',
                    activetab_bg: '#284f6c',
                    inactive_bg: '#fff',
                    active_border_color: '#e0dede',
                    active_content_border_color: '#e0dede'
                });

                $('.cr-apply-btn').magnificPopup({
                    type:'inline',
                    preloader: false,
                    fixedContentPos: true,
                });

                $('#c-resume-up').click(function() {
                    $('#c-resume').trigger('click');
                });
                $('#c-resume').change(function() {
                    var filename = $(this).val();
                    var lastIndex = filename.lastIndexOf("\\");
                    if (lastIndex >= 0) {
                        filename = filename.substring(lastIndex + 1);
                    }
                    $('#c-resume-name').text(filename);
                });

                $('#carrier-form').validate({
                    submitHandler: function(form) {
                        $.ajax({
                            type: "POST",
                            url: '<?php echo admin_url(); ?>admin-ajax.php',
                            data: new FormData(form),
                            contentType: false,
                            cache: false,
                            processData:false,
                            beforeSend: function() {
                                $("input[name=carrier-submit]", form).attr('disabled', 'disabled');
                                $(".loading").show();
                                $(".status").hide();
                            },
                            success: function(result) {
                                console.log(result);
                                if (result == 1 || result == '1') {
                                    $(".thanks").show();
                                    $(".loading").hide();
                                    document.forms["carrier-form"].reset();
                                    $('#c-resume-name').text('No File Chosen');
                                }
                                else {
                                    $(".loading").hide();
                                    $("input[name=carrier-submit]", form).removeAttr('disabled');
                                    $('.status p').text(result);
                                    $(".status").show();
                                }
                            }
                        });
                    },
                    rules: {
                        c_phone: {
                            required: true,
                            number: true
                        },
                        c_email: {
                            required: true,
                            email: true
                        }
                    }
                });

                $('.cr-apply-btn').click(function() {
                    var job_title = $(this).data('title');
                    $('#job-title').val(job_title);
                });

            });
        </script><?php
    }
?>
<div class="page-banner" style="background-image: url('<?php echo get_field('banner_image'); ?>');">
    <div class="page-banner-container">
        <?php if(get_field('banner_title')):?>
            <h1><?php the_field('banner_title'); ?></h1>
        <?php else:?>
            <h1><?php the_title(); ?></h1>
        <?php endif;?>
    </div>
</div>
<div class="page-container career-container">
    <div class="wrapper">
        <div class="cr-overview">
            <span class="cr-ow-tbg">Careers</span>
            <div class="cr-ow-desc">
                <?php the_field('overview');?>
            </div>
        </div>
    </div>
    <div class="carrier-sec2">
        <div class="wrapper">
            <div class="cr-inner">
                <div class="op-knocks cs2-blks">
                    <?php the_field('opportunity_knocks'); ?>
                </div>
                <div class="cr-path cs2-blks">
                    <?php the_field('career_path_with_kedia'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="cr-open-positions">
        <div class="wrapper">
            <div class="opn-stitle">
                <span>Open Positions</span>
                <h2><?php the_field('open_positions_section_title'); ?></h2>
            </div>
            <div class="cr-opn-pos-inr">
                <div id="career-openings-accordion">
                    <?php $openings = get_post_meta(get_the_ID(),'career_oppor_list',true);?>
                    <ul class="resp-tabs-list cr_tab_identifier">
                        <?php foreach($openings as $op):?>
                            <li class="resp-tab-item"><?php echo $op['title'] ?></li>
                        <?php endforeach;?>
                    </ul>
                    <div class="resp-tabs-container cr_tab_identifier">
                        <?php foreach($openings as $op):?>
                            <div class="resp-tab-content">
                                <div class="cr-acrd-item">
                                    <span class="cr-acd-item-title"><?php echo $op['title']; ?></span>
                                    <span class="cr-acd-item-text"><span>:</span><?php echo $op['department']; ?></span>
                                </div>
                                <div class="cr-acrd-item">
                                    <span class="cr-acd-item-title">Location</span>
                                    <span class="cr-acd-item-text"><span>:</span><?php echo $op['location']; ?></span>
                                </div>
                                <div class="cr-acrd-item">
                                    <span class="cr-acd-item-title">No Of Opening</span>
                                    <span class="cr-acd-item-text"><span>:</span><?php echo $op['opngs_count']; ?></span>
                                </div>
                                <div class="cr-acrd-item">
                                    <span class="cr-acd-item-title">Age</span>
                                    <span class="cr-acd-item-text"><span>:</span><?php echo $op['age']; ?></span>
                                </div>
                                <div class="cr-acrd-item">
                                    <span class="cr-acd-item-title">Experience In Years</span>
                                    <span class="cr-acd-item-text"><span>:</span><?php echo $op['exp']; ?></span>
                                </div>
                                <div class="cr-acrd-item">
                                    <span class="cr-acd-item-title">Profile Description</span>
                                    <span class="cr-acd-item-text"><span>:</span><?php echo $op['prof_desc']; ?></span>
                                </div>
                                <div class="cr-acrd-item">
                                    <span class="cr-acd-item-title">Scope and Responsibilities</span>
                                    <span class="cr-acd-item-text"><span>:</span><?php echo $op['responsibilities']; ?></span>
                                </div>
                                <div class="cr-acrd-item">
                                    <span class="cr-acd-item-title">Special Requirements</span>
                                    <span class="cr-acd-item-text"><span>:</span><?php echo $op['sp_req']; ?></span>
                                </div>
                                <div class="cr-acrd-item cr-apply">
                                    <a href="#cr-apply-form" class="cr-apply-btn" data-title="<?php echo $op['title']; ?>">Apply Now</a>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
        <div id="cr-apply-form">
            <form name="carrier-form" id="carrier-form" method="post" enctype="multipart/form-data">
                <h2>Apply Now</h2>
                <div class="status career-status" style="display:none; color:#f00; padding: 10px 0;text-align: center;">
                    <p style='text-align:center;'></p>
                </div>
                <div class="cr-field-outer">
                    <div class="cr-input-field">
                        <input type='text' name="c_name" id="c-name" placeholder="Name" class="cr-form-text required"/>
                    </div>
                    <div class="cr-input-field">
                        <input type='text' name="c_email" id="c-email" placeholder="Email" class="cr-form-text required"/>
                    </div>
                    <div class="cr-input-field">
                        <input type='text' name="c_phone" id="c_phone" placeholder="Phone" class="cr-form-text required"/>
                    </div>
                    <div class="cr-input-field">
                        <input type="text" name="c_reason" id="c-reason" placeholder="Why Do you want to work with us?" class="cr-form-text required"/>
                    </div>
                    <div class="cr-input-field ">
                        <input type="file" name="c_resume" id="c-resume" class="required" style="display: none;"/>
                        <span id="c-resume-up">Choose File</span>
                        <span id="c-resume-name">No File Chosen</span>
                    </div>
                    <div class="cr-input-field cr-input-field-submit">
                        <input type="hidden" name="job_title" id="job-title" value=""/>
                        <input type="hidden" name="action" value="career_form"/>
                        <input type="submit" name="carrier-submit" class="cr-submit" value="Submit"/>
                    </div>
                </div>
                <div class="loading" style="clear: both; display:none;">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/progress.gif" alt="loading" />
                </div>
                <div class="thanks clearfix" style="display:none;">
                    <p>
                        Thank You.<br/> Your application has been received and we will contact you soon.
                    </p>
                </div>
            </form>
        </div>
    </div>
    <div class="cr-btm">
        <div class="cr-btm-blk cr-locate">
            <div class="cr-loc-inr">
                <?php the_field('locate_us'); ?>
            </div>
        </div>
        <div class="cr-btm-blk cr-associate">
            <div class="cr-assoc-inr">
                <?php the_field('business_associate'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>