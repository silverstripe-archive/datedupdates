<% if FilteredUpdates %>
	<div class="resultsHeader">
		<h2 class="pull-left"><% if FilterDescription %>$FilterDescription<% else %>News<% end_if %></h2>
		<p class="pull-right"><% with FilteredUpdates %>$FirstItem - $LastItem<% end_with %></p>
	</div>

	<% loop FilteredUpdates %>
		<article class="$EvenOdd">
			<% if FeaturedImage %>
				<figure>
					$FeaturedImage.SetHeight(150)
				</figure>
			<% end_if %>
			<header>
				<h3><a href="$Link">$Title</a></h3>
			</header>

			<% if $Date || Author %>
				<p class="metaInfo">
					<% if $Date %>
						<time datetime="$Date">$Date.nice <% if $StartTime %>$StartTime.Nice <% end_if %>
						</time>
					<% end_if %>
					<% if Author %>by $Author<% end_if %>
				</p>
			<% end_if %>

			<p>
				<% if Abstract %>
					$Abstract
				<% else %>
					$Content.LimitWordCount
				<% end_if %>
			</p>
		</article>
	<% end_loop %>

<% else %>
	<div class="resultsHeader">
		<h2 class="pull-left"><% if FilterDescription %>$FilterDescription <a href="$Link">Show all news</a><% else %>News<% end_if %></h2>
		<p class="pull-right">None</p>
	</div>

	<article class="">
		<p>No news</p>
	</article>
<% end_if %>