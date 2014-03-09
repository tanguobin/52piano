{extends file="lib/framework/base_fw.html"}

{block name="title"} - 钢琴知识 - {$question.title}{/block}

{block name="currentKnow"} class="nav-active"{/block}

{block name="body"}
	<div class="knowledge">
		<h1 title="{$question.title}">{$question.title}</h1>
		<p class="f14">{$question.content}</p>
	</div>
{/block}