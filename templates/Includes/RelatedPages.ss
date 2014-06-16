<% if RelatedPages %>
	<h2>$RelatedPagesTitle:</h2>
	<p>
		<ul>
			<% loop RelatedPages %>
				<li><a href="$Link">$Title</a></li>
			<% end_loop %>
		</ul>
	</p>
<% end_if %>