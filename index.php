<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<header class="article-header">

									<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard"><?php echo affable_html_current_post_byline(); ?></p>

								</header> <!-- end article header -->

								<section class="entry-content clearfix">
									<?php the_content('Read on &rarr;'); ?>
								</section> <!-- end article section -->

                <?php /*>
								<footer class="article-footer">
                  <p class="tags"><?php affable_article_tags(); ?></p>
								</footer> <!-- end article footer -->
                */?>

								<?php // comments_template(); // uncomment if you want to use them ?>

							</article> <!-- end article -->

							<?php endwhile; ?>

              <?php include('pages-nav.php'); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e("This is the error message in the index.php template.", "bonestheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

						<?php get_sidebar(); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
