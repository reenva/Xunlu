<?php get_header(); ?>
    <div id="primary">
        <div class="breadcrumb-navigation">
            <a rel="bookmark" href="<?php echo home_url(); ?>"
               title="<?php bloginfo( 'name' ); ?>"><?php _e( 'Home', MUTHEME_NAME ); ?></a>
            <?php the_post(); ?>
            <?php if ( is_category() ) {
                ?>
                <span class="breadcrumb-arrow"></span><?php _e( 'Category', MUTHEME_NAME ); ?><span
                    class="breadcrumb-arrow"></span>
            <?php
            } else if ( is_tag() ) {
                ?>
                <span class="breadcrumb-arrow"></span><?php _e( 'Tag', MUTHEME_NAME ); ?><span
                    class="breadcrumb-arrow"></span>
            <?php
            } ?>
            <?php echo single_cat_title( '', false ); ?>
            <?php rewind_posts(); ?>
        </div>
        <div id="postlist">
            <?php if ( have_posts() ):while ( have_posts() ) : the_post();
                $post_thumbnail = mutheme_thumbnail( 'index-thumbnail', 130, 130 );
                $post_class     = 'post';

                if ( $post_thumbnail["exist"] ) {
                    $post_class .= ' post-has-thumbnail';
                }

                if ( is_sticky() ) {
                    $post_class .= ' post-sticky';
                }
                ?>
                <div id="post-<?php the_ID(); ?>" class="<?php echo $post_class; ?>">
                    <div class="post-header">
                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        </h2>
                    </div>
                    <div class="post-meta">
                        <ul class="inline-ul">
                            <li class="inline-li">
                                <?php echo mutheme_time_since(strtotime($post->post_date_gmt)); ?>
                            </li>
                            <li class="inline-li">
                                <span class="post-span">??</span>
                            </li>
                            <li class="inline-li">
                                <?php the_category( ' , ' ); ?>
                            </li>
                            <?php mutheme_views(); ?>
                            <li class="inline-li">
                                <span class="post-span">??</span>
                            </li>
                            <li class="inline-li">
                                <?php comments_popup_link( __('0 reply', MUTHEME_NAME), __('1 reply', MUTHEME_NAME), __('% replies', MUTHEME_NAME) ); ?>
                            </li>
                            <?php mutheme_likes(); ?>
                        </ul>
                    </div>
                    <div class="post-body">
                        <?php if ( $post_thumbnail["exist"] ) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink() ?>" rel="bookmark">
                                    <img class="lazy"
                                         src="<?php echo mutheme_cdn( mutheme_image( 'placeholder.png' ) ); ?>"
                                         data-original="<?php echo mutheme_cdn( $post_thumbnail ); ?>"
                                         alt="<?php the_title(); ?>" width="130" height="130"/>
                                </a>
                            </div>
                            <div class="post-content">
                                <?php printf( '<p>%s</p>', mutheme_excerpt( $post->post_content, 320 ) ); ?>
                            </div>
                        <?php else : ?>
                            <div class="post-content">
                                <?php printf( '<p>%s</p>', mutheme_excerpt( $post->post_content, 250 ) ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile;
            endif; ?>
        </div>
        <div class="pagenavi">
            <?php mutheme_pagenavi(); ?>
        </div>
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>