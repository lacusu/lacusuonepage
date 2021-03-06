<?php
	// $price =  get_post_meta( $post->ID, 'wpcf-don-gia', true );
	// $discount = get_post_meta( $post->ID, 'wpcf-giam-gia', true );
	$sale_price_info = get_sale_price($post->ID);
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> itemscope itemtype="http://schema.org/CreativeWork">
	<div class="content-first">
		<div class="content-second">
			<div class="page_pd_detail">
				<div class="pd_detail_top">
					<div class="img_detail left col-xs-12 col-sm-5 col-md-4 col-lg-4">
						<div class="img_detail_big">
							<?php if($sale_price_info['discount']){ ?>
							<span class="pd-promotion"><?php echo '-'. $sale_price_info[discount_num] . '%'?></span>
						    <?php } ?>
							<?php 
							$image_ids = get_image_ids($post->ID, 'wpcf-hinh-anh-san-pham');
							$image_meta = get_attachment_meta($image_ids[0]);
							$alt = $image_meta['alt'];
							$title = $image_meta['title'];
							?>
							<img src="<?php echo $image_meta['src']; ?>" class="zoom_image" alt="<?php if($alt){ echo $alt;}else{the_title();} ?>" title="<?php if($title){ echo $title;}else{the_title();} ?>">
						</div>
					</div>
					<div class="info_detail right col-xs-12  col-sm-7 col-md-8 col-lg-8">
						<h1 class="pd-tit">
	                    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?> 
	                    	</a>
	                		<?php if(get_post_meta($post->ID, "wpcf-san-pham-moi")[0] == 1) { ?>
	                    	<span>	
	                    		<img class="pro_new_icon" alt="Sản phẩm mới" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_pro_new.gif">
	                    	</span>
	                    	<?php } ?>

	                    	<?php if(get_post_meta($post->ID, "wpcf-san-pham-hot")[0] == 1) { ?>
	                    	<span>	
	                    		<img class="pro_new_icon" alt="Sản phẩm bán chạy" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_pro_hot.gif">
	                    	</span>
	                    	<?php } ?>
                    	</h1>
						<div class="price">
	                    	<?php if($sale_price_info['discount']){ ?>
	                        <span class="price-discount" ><?php echo $sale_price_info['price']  ?></span>
	                        <?php } ?>

	                        <span class="price-sale" ><?php echo  $sale_price_info['sale_price'] ?></span>
	                    </div>
	             	   	<?php
	                    $warranty = get_post_meta( $post->ID, 'wpcf-bao-hanh', true );
	                    if($warranty){
	               		?>
	                    <div class="pd-warranty">
	                        <?php echo 'Bảo hành: '. $warranty ?>
	                    </div>
	             	   	<?php } ?>
	                    <?php 
	                    $made_in = get_post_meta( $post->ID, 'wpcf-xuat-xu', true );
	                    if($made_in){
	               		?>
	                    <div class="pd-made-in">
	                        <?php echo 'Xuất xứ: '. $made_in ?>
	                    </div>
	             	   	<?php } ?> 
	             	   	<?php
	             	   	get_template_part( 'template-parts/contact', 'order' );
	             	   	?>
		                <div class="pd-sum"> 
		                 <span>Tóm tắt sản phẩm</span>
		                 <p>
			                 <?php 
			                 echo get_pro_features($post->ID);
			                 ?>
		                </div>
					</div>
				</div>
			</div>

		</div>
				
		<div class="content-third" itemprop="text">
					
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
					
			<?php
			wp_link_pages( array(
				'before'           => '<p class="pagelinks">' . __( 'Pages:', 'seopress' ),
				'after'            => '</p>',
				'link_before'      => '<span class="pagelinksa">',
				'link_after'       => '</span>',
			) );
			?>
					
		</div>
	</div>
</div>