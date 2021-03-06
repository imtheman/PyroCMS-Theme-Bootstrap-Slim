{{ post }}

<div class="post">

	<h2>{{ title }}</h2>

	<div class="meta">

		<div class="date text-muted">{{ helper:date timestamp=created_on }}</div>

		<div class="author">
			{{ helper:lang line="blog:written_by_label" }}
			<span><a href="{{ url:site }}user/{{ created_by:user_id }}">{{ created_by:display_name }}</a></span>
		</div>

		{{ if category }}
		<div class="category">
			<abbr title="Category">C:</abbr> <a href="{{ url:site }}blog/category/{{ category:slug }}">{{ category:title }}</a>
		</div>
		{{ endif }}

		{{ if keywords }}
		<div class="keywords">
			<abbr title="Keywords">K:</abbr>
			{{ keywords }}
				<a href="{{ url:site }}blog/tagged/{{ keyword }}">{{ keyword }}</a>
			{{ /keywords }}
		</div>
		{{ endif }}

	</div>

	<div class="body">
		{{ body }}
	</div>

</div>

{{ /post }}

<?php if (Settings::get('enable_comments')): ?>

<div id="comments">

	<div id="existing-comments">
		<h4><?php echo lang('comments:title') ?></h4>
		<?php echo $this->comments->display() ?>
	</div>

	<?php if ($form_display): ?>
		<?php echo $this->comments->form() ?>
	<?php else: ?>
	<?php echo sprintf(lang('blog:disabled_after'), strtolower(lang('global:duration:'.str_replace(' ', '-', $post[0]['comments_enabled'])))) ?>
	<?php endif ?>
</div>

<?php endif ?>
