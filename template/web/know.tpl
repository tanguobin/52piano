{extends file="lib/framework/base_fw.html"}

{block name="title"}钢琴知识{/block}

{block name="description"}{/block}

{block name="currentKnow"} class="nav-active"{/block}

{block name="body"}
	<div class="know">
		<ol>
			{foreach from=$questions item="question"}
			<li><a href="/know_{$question.id}.html" target="_blank"><h2>{$question.title}</h2></a></li>
			{/foreach}
		</ol>
		<div id="pg" class="pg">{page current={$currentPn} total={$total} url='' rn={$rn}}</div>
	</div>
{/block}
