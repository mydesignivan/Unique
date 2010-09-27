<ul class="recent-comments">

<?php
  $comments = get_comments('number=10&status=approve');

  $true_comment_count = 0;

  foreach($comments as $comment) :
?>

<?php $comment_type = get_comment_type(); ?>
<?php if($comment_type == 'comment') { ?>

<?php $true_comment_count = $true_comment_count +1; ?>

<?php $comm_title = get_the_title($comment->comment_post_ID);?>
<?php $comm_link = get_comment_link($comment->comment_ID);?>

<li>
	<a href="<?php echo($comm_link)?>"> <?php echo substr(get_comment_excerpt(), 0, 70); ?> </a><br />
	<cite class="comment-author"><?php echo($comment->comment_author)?></cite>
</li> 

<?php } ?>

<?php if($true_comment_count == 4) {break;} ?>
<?php endforeach;?>

</ul>
