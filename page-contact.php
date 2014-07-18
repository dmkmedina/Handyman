<?php
/*
 Template Name: Contact Template
*/
?>
<?php get_header(); ?>

<div class="container">
<?php if (have_posts()): the_post(); // load the page ?>
    <?php $post_id = get_the_ID(); ?>
        <div class="home-left">
            <section class="panel panel-contact">
                <div class="panel__inner panel-contact__inner">
                    <h2><?php echo get_post_meta($post_id, 'contact-headline', true); ?></h2>

                    <?php the_content(); ?>

                    <div class="row">
                        <div class="form-half">
                            <input type="text" name="name" value="" placeholder="Name">
                        </div>

                        <div class="form-half">
                            <input type="text" name="email" value="" placeholder="Email">
                        </div>

                        <div class="form-full">
                            <p>
                                <textarea name="describeJob" cols="45" rows="4" placeholder="How can we help?">
                                </textarea></p><button class="btn btn-lg btn-success" type="button"><i class="fa fa-hand-o-right"></i> Send Your Message</button>
                        </div>
                    </div>
                </div>
            </section>

            <?php $testimonials = get_post_meta($post_id, 'contact-testimonial-posts', true); ?>
            <?php if (is_array($testimonials) && count($testimonials) > 0) : ?>
                <section class="panel panel-testimonials">
                    <div class="panel__inner panel-testimonials__inner">
                        <h2><?php echo get_post_meta($post_id, 'contact-template-testimonials-headline', true); ?></h2>
                        <div>
                            <?php foreach ($testimonials as $testimonial) : ?>
                                <?php $location = get_post_meta($testimonial, 'testimonial-author-location', true); ?>
                                <div class="panel-testimonials__block">
                                    <i class="fa fa-quote-left fa-2x pull-left"></i>
                                    <p><?php echo get_post_meta($testimonial, 'testimonial-quote-text', true); ?></p>
                                    <p class="panel-testimonials__author"><?php echo get_post_meta($testimonial, 'testimonial-quote-author', true); ?><?php if ($location) : ?>, <span><?php echo $location; ?></span><?php endif;?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>