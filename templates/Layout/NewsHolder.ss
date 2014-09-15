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
<% if $FooterHeading || $FooterContent %>
<div class="row" data-target="$FooterHeadingAnchor" id="$FooterHeadingAnchor">
	<div class="span12">
		<% if $FooterHeading %>
		<h2 class="footer-heading">$FooterHeading.XML</h2>
		<% end_if %>
		<% if $FooterContent %>
		<div class="content-inset">
			$FooterContent.RichLinks
		</div>
		<% end_if %>
	</div>
</div>
<% end_if %>