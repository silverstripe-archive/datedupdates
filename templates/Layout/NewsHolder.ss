<div class="row">
	<div class="span12">
		<% include Breadcrumbs %>
		<div id="main" role="main" class="resultsList typography">
			<h1 class="page-header">$Title</h1>
			<div class="clearfix">
				$Content.RichLinks
			</div>
			<% include NewsHolderFilteredUpdates %>
			<% include RelatedPages %>
		</div>
	</div>
	<div class="span12 pull-right">
		<% include PrintShare %>
		<% include LastEdited %>
	</div>
</div>