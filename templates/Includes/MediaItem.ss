<header>
	<h3><a href="$Link">$Title</a></h3>
</header>
<p class="metaInfo">
	<% if Category %>
		<a class="label label-inverse" href="$Category.Link">$Category.Title</a>
	<% end_if %>
	<time datetime="$Date">$Date.nice</time>
</p>

<% if ContactName %>
	<p class="contact-name">$ContactName</p>
<% end_if %>
<% if ContactEmail %>
	<p class="contact-email">$ContactEmail</p>
<% end_if %>
<% if ContactPhone %>
	<p class="contact-phone">$ContactPhone</p>
<% end_if %>
<% if ContactMobile %>
	<p class="contact-mobile">$ContactMobile</p>
<% end_if %>

<% if Abstract %>
	<p>$Abstract</p>
<% else %>
	<p>$Content.LimitWordCount</p>
<% end_if %>
