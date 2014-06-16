<div class="row">
	<div class="span3">
		<% include SidebarNav %>
		<div class="well update-information">
			<h2 class="nonvisual-indicator">News item information</h2>
			<dl>
				<% if $Date %>
					<dt>Date</dt>
					<dd><time datetime="$Date">$Date.Nice</time></dd>
				<% end_if %>
				<% if Author %>
					<dt>Author:</dt>
					<dd>$Author</dd>
				<% end_if %>
				<% if Terms %>
					<dt>Tags</dt>
					<dd>
						<ul class="unstyled update-tags">
							<% loop Terms %>
								<li class="label">$Name</li>
							<% end_loop %>
						</ul>
					</dd>
				<% end_if %>
			</dl>
		</div>
	</div>
	<div class="span9">
		<div id="main" role="main">
			<% include Breadcrumbs %>
			<h1 class="page-header">$Title</h1>
			<div class="clearfix">
				<% if FeaturedImage %>
					<figure class="featured-image">
						$FeaturedImage.SetWidth(300)
					</figure>
				<% end_if %>
				$Content.RichLinks
			</div>
			<p><a href="$Parent.Link">←  Back to the news</a></p>
			<% include RelatedPages %>
		</div>
	</div>
	<div class="span12 pull-right">
		<% include PrintShare %>
		<% include LastEdited %>
	</div>
</div>