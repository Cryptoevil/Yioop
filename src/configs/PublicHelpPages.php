<?php
/**
 * SeekQuarry/Yioop --
 * Open Source Pure PHP Search Engine, Crawler, and Indexer
 *
 * Copyright (C) 2009 - 2019  Chris Pollett chris@pollett.org
 *
 * LICENSE:
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * END LICENSE
 *
 * Default Public Wiki Pages
 *
 * This file should be generated using ExportPublicHelpDb.php
 *
 * @author Chris Pollett chris@pollett.org
 * @license https://www.gnu.org/licenses/ GPL3
 * @link https://www.seekquarry.com/
 * @copyright 2009 - 2019
 * @filesource
 */
namespace seekquarry\yioop\configs;

/**
 * Public wiki pages
 * @var array
 */
$public_pages = [];
$public_pages["en-US"]["400"] = <<< 'EOD'
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARS==Bad Request==
Your request couldn&#039;t be processed by the server!
EOD;
$public_pages["en-US"]["404"] = <<< 'EOD'
title=Page Not Found
description=The page you requested cannot be found on our server
END_HEAD_VARS
==The page you requested cannot be found.==
EOD;
$public_pages["en-US"]["409"] = <<< 'EOD'
title=Conflict

description=Your request would result in an edit conflict.
END_HEAD_VARS
==Your request would result in an edit conflict, so will not be processed.==
EOD;
$public_pages["en-US"]["Main"] = <<< 'EOD'

EOD;
$public_pages["en-US"]["Podcast_Examples"] = <<< 'EOD'
page_type=media_list

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARS
EOD;
$public_pages["en-US"]["Syntax"] = <<< 'EOD'
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=Yioop+Wiki+Syntax

author=Chris+Pollett

robots=

description=Describes+the+markup+used+by+Yioop%26%23039%3B

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARS=Yioop Wiki Syntax=

: Wiki syntax is a lightweight way to markup a text document so that
it can be formatted and drawn nicely by Yioop.
This page briefly describes the wiki syntax supported by Yioop.

==Headings==
: In wiki syntax headings of documents and sections are written as follows:

&lt;nowiki&gt;
=Level1=
==Level2==
===Level3===
====Level4====
=====Level5=====
======Level6======
&lt;/nowiki&gt;

and would look like:

=Level1=
==Level2==
===Level3===
====Level4====
=====Level5=====
======Level6======

==Paragraphs==
: In Yioop two new lines indicates a new paragraph. You can control
the indent of a paragraph by putting colons followed by a space in front of it:

&lt;nowiki&gt;
: some indent

:: a little more

::: even more

:::: that&#039;s sorta crazy
&lt;/nowiki&gt;

which looks like:

: some indent

:: a little more

::: even more

:::: that&#039;s sorta crazy

==Horizontal Rule==
: Sometimes it is convenient to separate paragraphs or sections with a horizontal
rule. This can be done by placing four hyphens on a line by themselves:
&lt;nowiki&gt;
----
&lt;/nowiki&gt;
This results in a line that looks like:
----

==Text Formatting Within Paragraphs==
: Within a paragraph it is often convenient to make some text bold, italics,
underlined, etc. Below is a quick summary of how to do this:
===Wiki Markup===
{|
|&lt;nowiki&gt;&#039;&#039;italic&#039;&#039;&lt;/nowiki&gt;|&#039;&#039;italic&#039;&#039;
|-
|&lt;nowiki&gt;&#039;&#039;&#039;bold&#039;&#039;&#039;&lt;/nowiki&gt;|&#039;&#039;&#039;bold&#039;&#039;&#039;
|-
|&lt;nowiki&gt;&#039;&#039;&#039;&#039;&#039;bold and italic&#039;&#039;&#039;&#039;&#039;&lt;/nowiki&gt;|&#039;&#039;&#039;&#039;&#039;bold and italic&#039;&#039;&#039;&#039;&#039;
|}

===HTML Tags===
: Yioop also supports several html tags such as:
{|
|&lt;nowiki&gt;&lt;del&gt;delete&lt;/del&gt;&lt;/nowiki&gt;|&lt;del&gt;delete&lt;/del&gt;
|-
|&lt;nowiki&gt;&lt;ins&gt;insert&lt;/ins&gt;&lt;/nowiki&gt;|&lt;ins&gt;insert&lt;/ins&gt;
|-
|&lt;nowiki&gt;&lt;s&gt;strike through&lt;/s&gt; or
&lt;strike&gt;strike through&lt;/strike&gt; &lt;/nowiki&gt;|&lt;s&gt;strike through&lt;/s&gt;
|-
|&lt;nowiki&gt;&lt;sup&gt;superscript&lt;/sup&gt; and
&lt;sub&gt;subscript&lt;/sub&gt;&lt;/nowiki&gt;|&lt;sup&gt;superscript&lt;/sup&gt; and
&lt;sub&gt;subscript&lt;/sub&gt;
|-
|&lt;nowiki&gt;&lt;tt&gt;typewriter&lt;/tt&gt;&lt;/nowiki&gt;|&lt;tt&gt;typewriter&lt;/tt&gt;
|-
|&lt;nowiki&gt;&lt;u&gt;underline&lt;/u&gt;&lt;/nowiki&gt;|&lt;u&gt;underline&lt;/u&gt;
|}

===Spacing within Paragraphs===
: The HTML entity
&lt;nowiki&gt;&amp;nbsp;&lt;/nowiki&gt;
can be used to create a non-breaking space. The tag
&lt;nowiki&gt;&lt;br&gt;&lt;/nowiki&gt;
can be used to produce a line break.

==Preformatted Text and Unformatted Text==
: You can force text to be formatted as you typed it rather
than using the layout mechanism of the browser using the
&lt;nowiki&gt;&lt;pre&gt;preformatted text tag.&lt;/pre&gt;&lt;/nowiki&gt;
Alternatively, a sequence of lines all beginning with a
space character will also be treated as preformatted.

: Wiki markup within pre tags is still parsed by Yioop.
If you would like to add text that is not parsed, enclosed
it in &lt;tt&gt;&lt;`mbox{nowiki}`&gt; &lt;/`mbox{nowiki}`&gt;&lt;/tt&gt; tags.

==Styling Text Paragraphs==
: Yioop wiki syntax offers a number of templates for
control the styles, and alignment of text for
a paragraph or group of paragraphs:&lt;br /&gt;
`{{`left| some text`}}`,&lt;br /&gt; `{{`right| some text`}}`,&lt;br /&gt;
and&lt;br /&gt;
`{{`center| some text`}}`&lt;br /&gt; can be used to left-justify,
right-justify, and center a block of text. For example,
the last command, would produce:
{{center|
some text
}}
If you know cascading style sheets (CSS), you can set
a class or id selector for a block of text using:&lt;br /&gt;
`{{`class=&quot;my-class-selector&quot; some text`}}`&lt;br /&gt;and&lt;br /&gt;
`{{`id=&quot;my-id-selector&quot; some text`}}`.&lt;br /&gt;
You can also apply inline styles to a block of text
using the syntax:&lt;br /&gt;
`{{`style=&quot;inline styles&quot; some text`}}`.&lt;br /&gt;
For example, `{{`style=&quot;color:red&quot; some text`}}` looks
like {{style=&quot;color:red&quot; some text}}.

==Lists==
: The Yioop Wiki Syntax supported of ways of listing items:
bulleted/unordered list, numbered/ordered lists, and
definition lists. Below are some examples:

===Unordered Lists===
&lt;nowiki&gt;
* Item1
** SubItem1
** SubItem2
*** SubSubItem1
* Item 2
* Item 3
&lt;/nowiki&gt;
would be drawn as:
* Item1
** SubItem1
** SubItem2
*** SubSubItem1
* Item 2
* Item 3

===Ordered Lists===
&lt;nowiki&gt;
# Item1
## SubItem1
## SubItem2
### SubSubItem1
# Item 2
# Item 3
&lt;/nowiki&gt;
# Item1
## SubItem1
## SubItem2
### SubSubItem1
# Item 2
# Item 3

===Mixed Lists===
&lt;nowiki&gt;
# Item1
#* SubItem1
#* SubItem2
#*# SubSubItem1
# Item 2
# Item 3
&lt;/nowiki&gt;
# Item1
#* SubItem1
#* SubItem2
#*# SubSubItem1
# Item 2
# Item 3

===Definition Lists===
&lt;nowiki&gt;
;Term 1: Definition of Term 1
;Term 2: Definition of Term 2
&lt;/nowiki&gt;
;Term 1: Definition of Term 1
;Term 2: Definition of Term 2

==Tables==
: A table begins with {`|`  and ends with `|`}. Cells are separated with | and
rows are separated with |- as can be seen in the following
example:
&lt;nowiki&gt;
{|
|a||b
|-
|c||d
|}
&lt;/nowiki&gt;
{|
|a||b
|-
|c||d
|}
Headings for columns and rows can be made by using an exclamation point, !,
rather than a vertical bar |. For example,
&lt;nowiki&gt;
{|
!a!!b
|-
|c||d
|}
&lt;/nowiki&gt;
{|
!a!!b
|-
|c||d
|}
Captions can be added using the + symbol:
&lt;nowiki&gt;
{|
|+ My Caption
!a!!b
|-
|c||d
|}
&lt;/nowiki&gt;
{|
|+ My Caption
!a!!b
|-
|c||d
|}
Finally, you can put a CSS class or style attributes (or both) on the first line
of the table to further control how it looks:
&lt;nowiki&gt;
{| class=&quot;wikitable&quot;
|+ My Caption
!a!!b
|-
|c||d
|}
&lt;/nowiki&gt;
{| class=&quot;wikitable&quot;
|+ My Caption
!a!!b
|-
|c||d
|}
Within a cell attributes like align, valign, styles, and class can be used. For
example,
&lt;nowiki&gt;
{|
| style=&quot;text-align:right;&quot;| a| b
|-
| lalala | lalala
|}
&lt;/nowiki&gt;
{|
| style=&quot;text-align:right;&quot;| a| b
|-
| lalala | lalala
|}

==Math==

: Math can be included into a wiki document by either using the math tag:
&lt;nowiki&gt;
&lt;math&gt;
\sum_{i=1}^{n} i = frac{(n+1)(n)}{2}
&lt;/math&gt;
&lt;/nowiki&gt;

&lt;math&gt;
\sum_{i=1}^{n} i = frac{(n+1)(n)}{2}
&lt;/math&gt;

or by enclosing the math in backticks:

&lt;pre&gt;
`[[1, -2],[3,4]]`
&lt;/pre&gt;

`[[1, -2],[3,4]]`.

Rendering of math is done using [[https://www.mathjax.org/|MathJax]], making us of the [[https://en.wikipedia.org/wiki/ASCIIMathML|ASCIImathml]] extensions.

==Links and Relationships==
: A hypertext link to another document can be inserted into a wiki page using
the chain link icon in the GUI. Alternatively, there are several techniques
for inserting a link into a page depending on whether the link is to a page
within the same wiki group, is a link to a page on a different wiki
group, or is a link to a different website. In addition to normal
hypertext links, Yioop also supports relationship links.

&#039;&#039;&#039;Intra-Group Wiki Links&#039;&#039;&#039; use the syntax:
&lt;nowiki&gt;
[[name_of_wiki_page]]
or
[[name_of_wiki_page|text for the link]]
or
[[name_of_wiki_page#heading_or_id_on_page|text for the link]]
&lt;/nowiki&gt;
for example, to make a link to this Syntax page one could write,
&lt;nowiki&gt;
[[Syntax|Yioop Wiki Syntax Page]]
&lt;/nowiki&gt;
which would look like,

[[Syntax|Yioop Wiki Syntax Page]]

&#039;&#039;&#039;Inter-Group Wiki Links&#039;&#039;&#039; use the syntax:
&lt;nowiki&gt;
[[name_of-group@name_of_wiki_page|text for the link]]
&lt;/nowiki&gt;

&#039;&#039;&#039;Different Website Links&#039;&#039;&#039; use the syntax:
&lt;nowiki&gt;
[[website_url|text for the link]]
&lt;/nowiki&gt;

: Relationships are a generalized form of link. They are used to express
a more complicated linking between two wiki pages and have the syntax:

&lt;nowiki&gt;
[[relationship_type|wiki_page_name|text for the link]]
&lt;/nowiki&gt;

: In the navigation dropdown for a Yioop wiki page there are items for
what links to the current page and what relates to the current page
based on the links and relationships a page belongs to.

==Recent Places Dropdowns==
: You can add a dropdown that can allow users to navigate to recently visited
wiki pages using the syntax:

&lt;sub&gt;`[`{recent_places}]&lt;/sub&gt;

This looks like:

[{recent_places}]

==Adding Resources to a Page==

: Yioop wiki syntax supports adding search bars, audio, images, and video to a
page. The magnifying class edit tool icon can be used to add a search bar via
the GUI. This can also be added by hand with the syntax:
&lt;nowiki&gt;
{{search:default|size:small|placeholder:Search Placeholder Text}}
&lt;/nowiki&gt;
This syntax is split into three parts each separated by a vertical bar |. The
first part search:default means results from searches should come from the
default search index. You can replace default with the timestamp of a specific
index or mix if you do not want to use the default. The second group size:small
indicates the size of the search bar to be drawn. Choices of size are small,
medium, and large. Finally, placeholder:Search Placeholder Text indicates the
grayed out background text in the search input before typing is done should
read: Search Placeholder Text. Here is what the above code outputs:

{{search:default|size:small|placeholder:Search Placeholder Text}}

: Image, video and other media resources can be associated with a page by dragging
and dropping them in the edit textarea or by clicking on the link click to select
link in the gray box below the textarea. This would add wiki code such as

&lt;sub&gt;((resource`:`myphoto.jpg|Resource Description))&lt;/sub&gt;

to the page. Only saving the page will save this code and upload the resource to
the server. In the above &#039;&#039;myphoto.jpg&#039;&#039; is the resource that will be inserted and
Resource Description is the alternative text to use in case the viewing browser
cannot display jpg files. To add a resource
from a different wiki page belonging to the same group to the current wiki
page one can use a syntax like:

&lt;sub&gt;((resource`:`Documentation:ConfigureScreenForm1.png|The work directory form))&lt;/sub&gt;

Here Documentation would be the page and ConfigureScreenForm1.png the resource.
You can also insert resources from a data-string using &#039;&#039;resource-data&#039;&#039; rather than
&#039;&#039;resource&#039;&#039;. For example:

&lt;sub&gt;((resource-data`:`image/jpeg;base64,/9j/4AAQSkZJRg...rest of image data...|Seekquarry Logo))&lt;/sub&gt;

could be used to inline an image like:

((resource-data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAASABIAAD/4QBYRXhpZgAATU0AKgAAAAgAAgESAAMAAAABAAEAAIdpAAQAAAABAAAAJgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAAAtqADAAQAAAABAAAAewAAAAD/7QA4UGhvdG9zaG9wIDMuMAA4QklNBAQAAAAAAAA4QklNBCUAAAAAABDUHYzZjwCyBOmACZjs+EJ+/8AAEQgAewC2AwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/bAEMAGhoaGhoaLRoaLUAtLS1AV0BAQEBXbVdXV1dXbYRtbW1tbW2EhISEhISEhJ6enp6enri4uLi4z8/Pz8/Pz8/Pz//bAEMBICIiNTE1WjExWtiTeJPY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2P/dAAQADP/aAAwDAQACEQMRAD8A0dS1L7GBHGAZGGeegFZCQavejzSzAHpubaPyFRX5H9rHz/ublznpt4rsRgjI6UAcqbDV4BvRycf3XJ/Q1Z0/VneQW1394nAbpz6GuirA1HS5ri58622jI5yccjvwKAN+imrnaN3XHNRz3ENunmTMFH8/pQBNRWC2vW4OFjYj3IH9at2uq2tywQEox6Bu/wBD0oA06KKY7pGheQhVHUmgB9FYcmu2qnEasw9eAP1qSDWrSVtr5j9zjH5igDYrn9cuJ4DF5Llc7s4Ppit/rzXNeIesP0b+lAG7Zsz2kTuckopJ/CrNVLD/AI8of+ua/wAqbd30FmB5uST0C8n60AXaKrW1yLqPzUVlU9N3Gas0AFFFFABRRRQAUUUUAf/Q0dS00XoEkZ2yKMc9DWGG1XT/AJfnCj23L/X+ldNFfWk8vkxPubGeAf51coA5aHX5h/ro1b3U4/xrZtNStrs7UO1/7rdfw9ammsrW4/1sak+uOfzrl9SsPsMiSQk7WPGeoI5//VQB2VcXdytqF/syQgJA9gOv511NrMbizSY9WXn61xdlb3E8xW2IDBc9ccU15id7aG/GtvEu2NQBWdf28OwzxAKR1A6EVI1jqSffdVz6sB/SlbTNUdSrEEH3H+FaOUWrWMlCad7mzpV01zagucsh2k+vofyrG1i5kmuhaIflUgf8CPf8K1NJs7izWRZgAGwRg56VzsiTzam6RffMjYz/AJ9KyNma0EVvbrhQCe5PU1BeW8MyF0AVxyCO/saZLa6jCu6aRUHTJYD+lSCw1YjIYEH3H+Fa88drGPJLe5b0K6aSJrdjnZgr9D2/CoPEPWH6N/SpdL025tLkyygbSpHBz3FReIesP/Av6VkbF37dHZabCTy5jXav4dfpVGxsZL6T7beZKnkA/wAX/wBb/P1zlsLua0N22SFA2g9So9PYVv6Pe/aIfIkPzxjj3X1oA2AABgUtFFABRRRQAUUUUAFFFFAH/9GpdCXTNR81BkZLL6EHqP8APtXS22oWtyoKOA3908Gpp7eG5Ty5l3D+X0rDl0BScwy4Howz/hQBvvNEi7ndQB3JrltVvkvHSC2+YKevqTxgVMNAkzzKo+i//XrWtNMtrQ7wN7/3m7fT0oAsWkJt7WOA9VXB+veuXRjpepncPkyf++W/z+ldjVS7soLxAsw5HQjqKAMfVbea9aOe1HmpjHGKmur1tPs47cMDPtA9cep/wqH+w5UJ8mfAPsR/I1Lb6HEj77h/M5zgDA/HuaAL2mzXNxb+dcY+Y/LgY49awtSSWz1EXSDhiHH1HUV1gAAwOAKingiuI/LmXI/l9KAMK/jbVEinsiH25BGQCCcetXPPXTNPRJSDIFwFz1P+Aqo2hMj7reYj6jn8wRSx6EC++4lLfQcn8Tk0AWNKury63PPjYvAOMZNUvEPWH6N/SuiiijhQRxAKo6AVSv8AT1vihZyuzPQZ60ATWP8Ax4w/9c1/lXN3sEmmXizwcITlfT3H+e30rqoIhDCkIOdihc/So7u1ju4TDJ9QfQ+tADredLmFZo+jDp6e1T1nWNgbHcFkLK3YjHNaNABRRRQAUUUUAFFFFAH/0unooooAKjkljhTfKwVR3NNuJ0t4Wmk6KM//AFq5HF1q9wWJwF/JR7UAbkmt2afc3v8AQf44pY9asn+9uT/eH+FRRaXZxj5l3n1akl0q0kHyDyz6r/hSuVym0jpIoeMhgehFPri45bnSbnY3KnkgdGH+NdhHIksayxnKsMimSSUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAH//T6eiiigDntflKxxwj+Ilj+HT9TU2mRCKzQ93+Y/jVLxDnfH/un+YrUs/+PSL/AHB/Kky4lmimSSJEhkkOFHU1yt3qE9zMFhJVc4UA4P4+9IpuxsavCJLXzMcxnP4Hg1JoUpa1aI/wNx9Dz/Oi63jTG845fZz9areHw2Z27fL/AFpoiR0tFU7q+t7PHnE5PQDk1PDNHcRiWI5U0ySlqN+LKIbRl2+6D0+prIjj1i/QS+YUVjkZO3I9gOf1rbudPtrtg8wOQMcEjipXurSH5XkRcdsigDnJoNXsUM3mMyjqQxOPwNbGl37XsbCTAdDzjuD0NR3GrWHlOoYvxjgHHPv0rP8AD5zJJ/uj+ZoA0dZuJba3R4WKkvg49MGstr29vY0gtNxIQFyOCT9ewq74g/49Y/8AroP5Gp9EjVbEOvV2JP4HH9KAIdKj1FJWW7LbQOjc5J9D7VQGrTwXM3msWC7gq9s54rrK421iEur4YZHmMfyJP86AHFNaY/aB5nqOQP8Ax3P9KtahcX1lLH+9JDKDjjkjqOneumrK1iDzbNnHWP5h9O/6UAaUciyxrInRgCPxpJZFhiaV+igk/hWTok/mWphJ5jOB9DyKTXJ/LthAOsh5/wB0cmgCHS5ry8kd5ZGCKOnuef0FbXkt/wA9GqrpcBgs0DD5n+Y/j/8AWrRoA//U6eiiigDE1yAyWwmUZMZ5+hqHSbhZLfyCfmj4/DtW+yhlKsMg8EVyl3ptzZS+fZ5Kjpjkj6juKBp2LWrQXMyoIRlRnIHr2NYtxp09rGsp5HfHatKPWmAxMgJ9QcfoaZPq7SqY4owN3HJz+gpFOxUl1F5rMWz8tkZJ7gVqWk6abpwkfmSU7lX26D8K5+a1nt0V5V27ugPXH0oZ5ruTdIST3Jo2Ek5OyCWSa7kaRzknk1q6JeeTN9nf7sn6N2/PpVZECLtWqcgMc25eM8j6/wD66iM7ux01cPyQUjf1e8maf7FAT2BxwST0FTwaFCqgzuS3cLwP8azr+OUtHqcY+WRVYn0YetaUevW2z96rBgOcYIrQ5C02nWFvE8nlg4UnLc9PrWXoH+tk/wBxf5mnzXV1qv8Ao9ohSM/eY9/xH9Kh0NvKu3hbqVI/FTQBe1//AI9o/wDroP5GrWkf8g6L8f5mquv/APHtH/10H8jVrSP+QdF+P8zQBp1yen/8hdv96T+ddZXJ6fj+12/3pP50AdZSEAgg9DS0UAcnYk2OqNbseCSn9Vpbn/T9XEI5VTtP0Xlv8Km1yJo5I7yPg9Cfccin6HEzGS7k5JO0fzP60AdDS0UUAf/V6eiiigAooooAhkt7eX/Wxq31ANUrqa002LcqKGP3VUAZP+FWbu6jtITNJ9APU+lcNNNNezl5Dlj+QHoPagaTbsglkmvZjJIck9+wH+FWkRUXatCIqLgU6ueUrnrUKCgrvcKp3DAyADtViWQRr79qfplk15cbnHyLyx9fb8aqnHqZYuqrciOssEKWUSOOQoyKkNpal95iTd67Rmp+nFLWx5ogAAwOKTauc4GadRQAhAPUZoAA4FLRQAU0KoOQBTqKACkyKWsvU7GS8VDEwVkz1z3+lAGfrV0HKWcJ3HOWA9ew/Otu0gFtbJCP4Rz9e9Zdho4tpBNOwZh0A6A+vvW7QAUUUUAf/9bp6KKKACiiigCnfWaXsPlMcEHII9a5W40a7g+ZBvHqOv5V21FAHnQlmjO1uo7HrTzctjhcGu4uLa3lX94it9RWcmn2W/8A1S1PKjZV5pWTOes7Ce+kz0Xuxrtbe3jtohFEMAVKqqg2qMD2p1UYthRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQB//9k=|The Seekquarry Logo))

be aware though that the default maximum wiki page size is 512Kb (this can be set in src/configs/Config.php).

: Sometimes it is useful to edit the basic resource link
above to make a link which is a thumbnail of the resource which points to a
separate page containing that resource. This can be done using the syntax:

&lt;sub&gt;((resource-thumb`:`myphoto.jpg|Resource Description))&lt;/sub&gt;

: Similarly, by default for resources like PDFs, epub&#039;s, etc., the resource tag inlines
the whole resource into the page, if instead one wants a clickable link to a page where
the resource is displayed one can use the syntax:

&lt;sub&gt;((resource-link`:`my_document.pdf|Resource Description))&lt;/sub&gt;

: Comma separated value files (.csv or CSV files) are inlined into a page as a table. Which rows and columns of the CSV to present in this table can be controlled by the resource line. The general format for including
a CSV resource is:

&lt;sub&gt; ((resource`:`resource_name.csv#config#top_left_cell#bottom_right_cell|Resource Description))&lt;/sub&gt;

For example,

&lt;sub&gt;((resource`:`resource_name.csv##B2#C3|Resource Description))&lt;/sub&gt;

might output

((resource-data:text/csv;base64,LCwsLAosLTIsMywsCiw1LDQsLAosLCwsCiwsLCwK##B2#C3|Example CSV with Headings))

I.e., just the portion of the CSV given by the rectangle between the cells B2 and C3. Using a config directive we can omit the spreadsheet row and column headings as follows:

&lt;sub&gt;((resource`:`resource_name.csv#noheadings#B2#C3|Resource Description)) &lt;/sub&gt;

which might output


((resource-data:text/csv;base64,LCwsLAosLTIsMywsCiw1LDQsLAosLCwsCiwsLCwK#noheadings#B2#C3|Example CSV without Headings))

CSV spreadsheet files can also be used to output a variety of charts. The general format for the command to insert a chart resource is:

&lt;sub&gt;((resource-chart_type`:`resource_name.csv#char_config#x_start#x_end#y_start#y_end|Resource Description))&lt;/sub&gt;

Here &#039;&#039;chart_type&#039;&#039; can be one of &#039;&#039;bargraph&#039;&#039;,  &#039;&#039;linegraph&#039;&#039;, or &#039;&#039;pointgraph&#039;&#039;. For example, one might have a line like:

&lt;sub&gt;((resource-bargraph`:`resource_name.csv##B1#B4#C1#C4|Quadratic Function)) &lt;/sub&gt;

which could produce a chart like

((resource-bargraph:##(1,1)#(2,4)#(3,9)#(4,16)|Quadratic Function))

In the above example, the values for the `x` coordinates would come from the cells B1, B2, B3, B4 from
&#039;&#039;resource_name.csv &#039;&#039; and the values for the `y` coordinates would come from cells C1, C2, C3, C4 from
&#039;&#039;resource_name.csv &#039;&#039;. Alternatively, rather than use a CSV to get out data we can just list the points we want to plot with a command like:

&lt;sub&gt;((resource-bargraph`:`##(1,1)#(2,4)#(3,9)#(4,16)|Quadratic Function))&lt;/sub&gt;

==Manipulating Page Resources==

: A list of media that have already been associated with
a page appears under the Page Resource heading below the textarea. This
table allows the user to rename and delete resources as well as insert the
same resource at multiple locations within the same document.

: The resources section of the edit page can be thought of as similar to
a folder in Windows or MacOS. One can have subfolders of the resource folder.

: The &#039;&#039;&#039;Places&#039;&#039;&#039; dropdown at the top of the &#039;&#039;&#039;Page Resource&#039;&#039;&#039; section allows one to navigate
these folders.

: The &#039;&#039;&#039;Filter&#039;&#039;&#039; textfield lets you enter a search string.
Clicking &#039;&#039;&#039;Go&#039;&#039;&#039; then shows only those resources
which contain that search string in their title.

: The &#039;&#039;&#039;Clip Folder&#039;&#039;&#039; dropdown is used to copy files between folders and pages.
Its current value is the folder that the &#039;&#039;&#039;Clip Copy&#039;&#039;&#039; buttons next to resources
will copy their resource to when clicked. You can set the &#039;&#039;&#039;Clip Folder&#039;&#039;&#039; to
the current folder using the dropdown, then  move to the page and folder that
you would like to copy stuff from and click the &#039;&#039;&#039;Clip Copy&#039;&#039;&#039; button of the
desired resource.

: The &#039;&#039;&#039;Name&#039;&#039;&#039;, &#039;&#039;&#039;Size&#039;&#039;&#039;, &#039;&#039;&#039;Modified&#039;&#039;&#039; header links above the resources list
control the sort order for the resource list. If a page is a media list page,
then even in read mode, the sort order selected is remembered when drawing the
media list.

: The &#039;&#039;&#039;Actions&#039;&#039;&#039; drop can be used to create new folders, new text files, and new csv
text files within the current page resource folder. These are initial named beginning
with &#039;&#039;untitled&#039;&#039; followed by some number, and if applicable a file extension.

: Resources entries for the resources list consist first of an icon, followed by a textfield
with a name for the resource, followed by buttons for actions that can be done to that resource
(Rename, Add to Page, Clip Copy), followed by a link [X], which can be used to delete the resource.
If a resource is editable the icon will look like a plus sign together with a pencil. Clicking
on the icon will then let you edit the resource.

===Text and CSV Resources===
: For normal text files clicking edit will bring up a textarea with the context of the text to edit.
For CSV (comma separated value) files this will present the file as an editable spreadsheet.
Yioop spreadsheets can have equation much like Excel spreadsheets. Clicking on a cell lets one
edit its contents. For example, if in the cell A3
one entered the equation:
 = A1+A2
then clicking out of the cell would cause it to refresh with the value of the sum of the contents of
cells A1 and A2. In addition, to the standard arithmetic operators [&#039;*&#039;, &#039;/&#039;, &#039;+&#039;, &#039;-&#039;, &#039;%&#039;], the
spreadsheet expressions can use float or integer literals, and can make use of the following table
of built-in functions:

{| class=&quot;wikitable&quot;
!Function Name!!Description
|-
!avg(x1,...,xn), avg(x1:xn)|| computes average of values of cells listed as arguments
|-
!ceil(x)|| rounds the value of x up to nearest integer
|-
!cell(i,j)|| returns the contents of the cell with column name of letter j, and row name i. For example, cell(2,&#039;B&#039;) would return the contents of cell B2.
|-
!col(value, search_row, start_col, end_col)|| searches the row &#039;&#039;search_row&#039;&#039; between the columns
&#039;&#039;start_col&#039;&#039;, &#039;&#039;end_col&#039;&#039; for &#039;&#039;value&#039;&#039;. Returns the column name where this value was found or -1 if not found.
For example, col(3, 2, &quot;B&quot;, &quot;D&quot;) might return C if the cell C2 had value 3.
|-
!exp(x)|| computes `e^x`
|-
!floor(x)|| rounds the value of x down to the nearest integer
|-
!log(x)|| computes `log x`
|-
!min(x1,...,xn), min(x1:xn)|| computes minimum value of cells listed as arguments
|-
!max(x1,...,xn), max(x1:xn)|| computes maximum value of cells listed as arguments
|-
!pow(x,y)|| computes `x^y`
|-
!row(value, search_col, start_row, end_row)|| searches the column &#039;&#039;search_col&#039;&#039;
between the rows &#039;&#039;start_row&#039;&#039;, &#039;&#039;end_row&#039;&#039; for &#039;&#039;value&#039;&#039;.
Returns the row name where this value was found or -1 if not found.
For example, row(3, &quot;C&quot;, &quot;1&quot;, &quot;5&quot;) might return 2 if the cell C2 had value 3.
|-
!sqrt(x)|| computes `sqrt(x)`
|-
!sum(x1,...,xn), sum(x1:xn)|| computes sum of values of cells listed as arguments
|-
!username()|| returns username of the person using this CSV file
|}

===HTML, PDF and EPub Resources===
: How HTML, PDF, EPub resources included on a page render depends on how the Yioop wiki software
has been configured. If no special configuration has been done, then HTML and PDF documents
will bbe rendered in an &lt;iframe&gt; tag within the current wiki page. In the EPub, case a link
to download the resource will be given. If the wiki software detects the presence of the
file APP_DIR/scripts/pdf.js ([[https://en.wikipedia.org/wiki/PDF.js|PDF.js]])
or APP_DIR/scripts/epub.js ([[https://github.com/futurepress/epub.js|epub.js]]), the wiki
system will render the resource in a Javascript viewer and will do things like remember reading
position.


===Video and Audio Resources===

: Not all browsers support the same video and audio formats for playback. For this reason
it sometimes is useful to have multiple video resources for the same video. For example,
you might have a .ogv and .vp8 version of the same video recording. In read (non-edit)
mode, the Yioop wiki system displays only one link for video or audio files that have
the same name except for extension. It then includes the grouped file as separated &lt;source&gt;
tags within either the &lt;video&gt; or &lt;audio&gt; html tag used to render the item in the browser.
In this way, you can make your media take best advantages to whatever capabilities your
client&#039;s browser has. If you don&#039;t feel like recoding your media in such a fancy way, a safe
rule of thumb is that .mp3 audio will playback in all modern browser, and that .mp4 video
will playback in all modern browser.

: For video it is sometimes useful to add a subtitle or caption track. Yioop wiki supports
[[https://en.wikipedia.org/wiki/WebVTT|WebVTT]] format subtitles and captions. To see how
Yioop wiki makes use of these files, suppose you included a resource &#039;&#039;foo.mp4&#039;&#039; in your
wiki pages, and you also had a file named &#039;&#039;foo-captions-en-US.vtt&#039;&#039; then when the HTML
page is generated from your wiki page, a &lt;track&gt; tag for the caption file would be added
to the &lt;video&gt; tag. A user seeing this page would then see in the video player a closed caption
symbol and be able to turn on/off (defaults off) the English captions. If you wanted
named the file &#039;&#039;foo-subtitles-en-US.vtt&#039;&#039; instead, then Yioop wiki would include it as a
subtitles track (defaults on). You can add captions/subtitle files for as many languages as
desired.

: When viewing the page resources for a page in edit mode, one can see one file/resource and
no grouping of resources by name is done. In this way you can keep track of exactly what
resources are available for a page.

==Page Settings, Page Type==

: In edit mode for a wiki page, next to the page name, is a link [Settings].
Clicking this link expands a form which can be used to control global settings
for a wiki page.  This form contains a drop down for the page type, another
drop down for the type of border for the page in non-logged in mode,
a checkbox for whether a table of contents should be auto-generated from level 2
and level three headings and then text
fields or areas for the page title, author, meta robots, and page description.
Beneath this one can specify another wiki page to be used as a header for this
page and also specify another wiki page to be used as a footer for this page.

: The contents of the page title is displayed in the browser title when the
wiki page is accessed with the  Activity Panel collapsed or when not logged in.
Similarly, in the collapsed or not logged in mode, if one looks as the HTML
page source for the page,  in the head of document, &lt;meta&gt; tags for author,
robots, and description are set according to these fields. These fields can
be useful for search engine optimization. The robots meta tag can be
used to control how search engine robots index the page. Wikipedia has more information on
[[https://en.wikipedia.org/wiki/Meta_element|Meta Elements]].

: The &#039;&#039;&#039;Standard&#039;&#039;&#039; page type treats the page as a usual wiki page.

: &#039;&#039;&#039;Page Alias&#039;&#039;&#039; type redirects the current page to another page name. This can
be used to handle things like different names for the same topic or to do localization
of pages. For example, if you switch the locale from English to French and
you were on the wiki page dental_floss when you switch to French the article
dental_floss might redirect to the page dentrifice.

: &#039;&#039;&#039;Media List&#039;&#039;&#039; type means that the page, when read, should display just the
resources in the page as a list of thumbnails and links. These links for the
resources go to a separate pages used to display these resources.
This kind of page is useful for a gallery of
images or a collection of audio or video files.

: &#039;&#039;&#039;Presentation&#039;&#039;&#039; type is for a wiki page whose purpose is a slide presentation. In this mode,
....
on a line by itself is used to separate one slide. If presentation type is a selected a new
slide icon appears in the wiki edit bar allowining one to easily add new slides.
When the Activity panel is not collapsed and you are reading a presentation, it just
displays as a single page with all slides visible. Collapsing the Activity panel presents
the slides as a typical slide presentation using the
[[www.w3.org/Talks/Tools/Slidy2/Overview.html|Slidy]] javascript.
EOD;
$public_pages["en-US"]["ad_program_terms"] = <<< 'EOD'
page_type=standard

page_alias=terms

page_border=none

toc=true

title=Advertisement+Program+Terms

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARS==Terms and Conditions==
EOD;
$public_pages["en-US"]["advertise"] = <<< 'EOD'
page_type=standard

page_alias=

page_border=none

toc=true

title=Advertise using Yioop

author=Chris Pollett

robots=

description=A Description of Advertising Available at Yioop

page_header=

page_footer=

END_HEAD_VARS==What Ad Services We Offer==
EOD;
$public_pages["en-US"]["bot"] = <<< 'EOD'
title=Bot

description=Describes the web crawler used with this
web site
END_HEAD_VARS
==My Web Crawler==

Please Describe Your Robot
EOD;
$public_pages["en-US"]["captcha_time_out"] = <<< 'EOD'
title=Captcha/Recover Time Out
END_HEAD_VARS
==Account Timeout==

A large number of captcha refreshes or recover password requests
have been made from this IP address. Please wait until
%s to try again.
EOD;
$public_pages["en-US"]["presentation"] = <<< 'EOD'
page_type=presentation

page_alias=

page_border=solid-border

toc=true

title=Test Presentation

author=

robots=

description=

alternative_path=

page_header=

page_footer=

END_HEAD_VARS=Title=
* Slide Item
* Slide Item
* Slide Item
....
=Title=
* Slide Item
* Slide Item
* Slide Item
....


EOD;
$public_pages["en-US"]["privacy"] = <<< 'EOD'
title=Privacy Policy

description=Describes what information this site collects and retains about
users and how it uses that information
END_HEAD_VARS
==We are concerned with your privacy==
EOD;
$public_pages["en-US"]["register_time_out"] = <<< 'EOD'
title=Create/Recover Account

END_HEAD_VARS

==Account Timeout==

A number of incorrect captcha responses or recover password requests
have been made from this IP address. Please wait until
%s to access this site.
EOD;
$public_pages["en-US"]["suggest_day_exceeded"] = <<< 'EOD'

EOD;
$public_pages["en-US"]["terms"] = <<< 'EOD'
=Terms of Service=

Please write the terms for the services provided by this website.
EOD;
//
// Default Help Wiki Pages
//
/**
 * Help wiki pages
 * @var array
 */$help_pages = [];
$help_pages["en-US"]["Account_Registration"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=Account Registration

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSThe Account Registration field-set is used to control how user&#039;s can obtain accounts on a Yioop installation.

The dropdown at the start of this fieldset allows you to select one of four
possibilities:
* &#039;&#039;&#039;Disable Registration&#039;&#039;&#039;, users cannot register themselves, only the root
account can add users.
When Disable Registration is selected, the Suggest A Url form and link on
the tool.php page is disabled as well, for all other registration type this
link is enabled.
* &#039;&#039;&#039;No Activation&#039;&#039;&#039;, user accounts are immediately activated once a user
signs up.
* &#039;&#039;&#039;Email Activation&#039;&#039;&#039;, after registering, users must click on a link which
comes in a separate email to activate their accounts.
If Email Activation is chosen, then the reset of this field-set can be used
to specify the email address that the email comes to the user. The checkbox Use
PHP mail() function controls whether to use the mail function in PHP to send
the mail, this only works if mail can be sent from the local machine.
Alternatively, if this is not checked like in the image above, one can
configure an outgoing SMTP server to send the email through.
* &#039;&#039;&#039;Admin Activation&#039;&#039;&#039;, after registering, an admin account must activate
the user before the user is allowed to use their account.
EOD;
$help_pages["en-US"]["Ad_Server"] = <<< EOD

EOD;
$help_pages["en-US"]["Add_Locale"] = <<< EOD
page_type=standard

page_border=solid-border

toc=true

title=Add Locale

description=Help article describing how to add a Locale.

END_HEAD_VARS==Adding a Locale==

The Manage Locales activity can be used to configure Yioop for use with
different languages and for different regions.

* The first form on this activity allows you to create a new &amp;quot;Locale&amp;quot;
-- an object representing a language and a region.
* The first field on this form should be filled in with a name for the locale in
the language of the locale.
* So for French you would put :Fran&amp;ccedil;ais. The locale tag should be the
IETF language tag.
EOD;
$help_pages["en-US"]["Add_or_Edit_Pattern"] = <<< EOD

EOD;
$help_pages["en-US"]["Adding_Examples_to_a_Classifier"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSTo train a classifier one needs to add positive and negative examples of the concept that is to be learned. One way to add positive (negative) examples is to select an existing crawl and then marking that all (respectively, none) are in the class using the drop down below.

&lt;br /&gt;

Another way to give examples is to pick an existing crawl, leave the dropdown set to label by hand. Then type some keywords to search for in the crawl you picked using the &#039;&#039;&#039;Keyword&#039;&#039;&#039; textfield and click &#039;&#039;&#039;Load&#039;&#039;&#039;. This will bring up a list of search results together with links &#039;&#039;&#039;In Class&#039;&#039;&#039;, &#039;&#039;&#039;Not in Class&#039;&#039;&#039;, and &#039;&#039;&#039;Skip&#039;&#039;&#039;. These can then be used to add positive or negative examples.

&lt;br /&gt;

When you are done adding example, click &#039;&#039;&#039;Finalize&#039;&#039;&#039; to have Yioop actually build the classifier based on your training.

EOD;
$help_pages["en-US"]["Allowed_to_Crawl_Sites"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARS&#039;&#039;&#039;Allowed to Crawl Sites&#039;&#039;&#039; is a list of urls (one-per-line) and domains that the crawler is allowed to crawl. Only pages that are on sub-sites of the urls listed here will be crawled.

&lt;br /&gt;

This textarea is only used in determining by can be crawled if &#039;&#039;&#039;Restrict Sites By Url&#039;&#039;&#039; is checked.

&lt;br /&gt;

A line like:
&lt;pre&gt;
  http://www.somewhere.com/foo/
&lt;/pre&gt;
would allow the url
&lt;pre&gt;
  http://www.somewhere.com/foo/goo.jpg
&lt;/pre&gt;
to be crawled.

&lt;br /&gt;

A line like:
&lt;pre&gt;
 domain:foo.com
&lt;/pre&gt;
would allow the url
&lt;pre&gt;
  http://a.b.c.foo.com/blah/
&lt;/pre&gt;
to be crawled.
EOD;
$help_pages["en-US"]["Arc_and_Re-crawls"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARS&#039;&#039;&#039;Crawl or Arc Folder to Re-index&#039;&#039;&#039; dropdown allows one to select a previous Yioop crawl or an archive to do another crawl of. Possible archives that can be index include Arc files,  Warc Files, Email, Database dump, Open Directory RDF dumps, Media Wiki dumps etc. Re-crawling an old crawl might be useful if you would like to do further processing of the records in the index. Besides containing previous crawls, the dropdown list is populated by looking at the WORK_DIRECTORY/archives folder for sub-folders containing an arc_description.ini file.

&lt;br /&gt;

{{right|[[https://www.seekquarry.com/?c=static&amp;p=Documentation#Archive%20Crawl%20Options| Learn More.]]}}

EOD;
$help_pages["en-US"]["Authentication_Type"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=Authentication+Type

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSThe &#039;&#039;&#039;Authentication and Access&#039;&#039;&#039; field-set is used to control people log into Yioop and how their sessions are maintained once logged in.
&lt;br&gt;

The &#039;&#039;&#039;Authentication Type&#039;&#039;&#039; dropdown controls the protocol used for logging in:
* Below is a list of Authentication types supported.
** &#039;&#039;&#039;Normal Authentication&#039;&#039;&#039;, passwords are checked against stored as
salted hashes of the password; or
** &#039;&#039;&#039;ZKP (zero knowledge protocol) authentication&#039;&#039;&#039;, the server picks
challenges at random and send these to the browser the person is logging in
from, the browser computes based on the password an appropriate response
according to the Fiat Shamir protocol. The password is never sent over the
internet and is not stored on the server. These are the main advantages of
ZKP, its drawback is that it is slower than Normal Authentication as to prove
who you are with a low probability of error requires several browser-server
exchanges.

* You should choose which authentication scheme you want before you create many
users as if you switch everyone will need to get a new password.
&lt;br&gt;

The &#039;&#039;&#039;Timezone&#039;&#039;&#039; field controls the timezone used for dating posts and other events once a
user is logged in.
&lt;br&gt;

The &#039;&#039;&#039;Token Name&#039;&#039;&#039; field controls the name of the token variable which appears in URLs that is used in conjunction
with cookies to determine if a user is logged. It is there to prevent cross-site request forgery attacks
on a Yioop website.
&lt;br&gt;

The &#039;&#039;&#039;Session Name&#039;&#039;&#039; field controls the name of the cookie that will be stored in a user&#039;s browser to maintain a session once logged into Yioop.
&lt;br&gt;

The &#039;&#039;&#039;Autologout&#039;&#039;&#039; dropdown specifies how long a session can be inactive before a user will be logged out.


EOD;
$help_pages["en-US"]["Bot_Configuration"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSThe Bot Configuration field-set is used to control whether user&#039;s of this Yioop instance can be chat bots.
&lt;br/&gt;

If enabled under &#039;&#039;&#039;Manage Accounts&#039;&#039;&#039; a Yioop user can declare themselves a chat bot and give a callback url.
&lt;br/&gt;

Suppose a chat bot user has a name user name, &#039;&#039;user1&#039;&#039;. If that chat bot user belongs to a group, and in an already existing thread, someone posts a follow up comment containing &#039;&#039;user1&#039;&#039;, then that message will be sent in a post field together with a bot_token field to the callback url. The response from the url will then be used in a response to the comment (if any).
EOD;
$help_pages["en-US"]["Bot_Story_Patterns"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSHow a Chat Bot in Yioop behaves is determined by how it is configured in its Bot Story activity.
A Bot Story is a set of patterns that control how a chat bot reacts to group threads posts
for groups to which it belongs. A bot story pattern consists of the following components which are
configurable in the Bot Story activity:

; &#039;&#039;&#039;Request Expression&#039;&#039;&#039; : This and the trigger state are used to determine if a bot will react to a post. If a post contains @name_of_the_bot followed by some phrase or phrases which match the expression and the trigger state matches the trigger state of the bot for that user, then the pattern will apply. Request expressions are allowed to contain variables. They are strings beginning with $ followed by a sequence of word characters. For example, the expression:&lt;br /&gt;&#039;&#039;What is the weather in &#36;location?&#039;&#039;&lt;br /&gt;would match the string&lt;br /&gt;&#039;&#039;What is the weather in San Jose?&#039;&#039;&lt;br /&gt; and the value of &#36;location would get bound to San Jose in this match.
; &#039;&#039;&#039;Trigger State&#039;&#039;&#039; : A chat bot has a particular state it is in with respect to each user in a group. This state can be any string, but it starts at being the string &quot;0&quot;. If the current state of the bot for a user matches a pattern&#039;s trigger state and the last post of a user matches the request expression for the pattern then the pattern is activated. In the add pattern/edit pattern forms one can use simple strings or strings containing variables in defining a trigger state. For example, &quot;0&quot;, &quot;asleep&quot; are simple trigger states. One can also have &quot;1&#36;location&quot;. If the request expression for a pattern was &quot;What is the weather in &#36;location?&quot; and the user was in state &quot;1San Jose&quot; and posted a message &quot;What is the weather in San Jose?&quot; then this pattern would activate.
; &#039;&#039;&#039;Remote Message&#039;&#039;&#039; : If a bot url has been configured for a chat bot, then when a pattern is activated a request will be made to that url as part of computing the response the chat bot makes to the message which was just posted. The url request will have as part of its query string a variable &#039;&#039;remote_message&#039;&#039; which comes from this field of the Bot Pattern. The Remote Message can be any string and is allowed to have variables in it. So for example, a pattern&#039;s Remote Message might be getWeather,&#36;location. When the value of &#36;location is substituted with might become getWeather,San Jose. This tells the bot url site what action to perform with what value.
; &#039;&#039;&#039;Result State&#039;&#039;&#039; : This is the state the chat bot should enter for that user after the pattern is applied. It is allowed to be an arbitrary string and can have variables in it. These will be interpolated when the pattern is applied.
; &#039;&#039;&#039;Response&#039;&#039;&#039; : This is the text that the chat bot will post back to the thread in question in response to a user request. It is a string and can have variables. In addition, to variables bound from the Request Expression, it can make use of &#36;REMOTE_RESPONSE which has the string returned from the Bot url call (if there was one), and it can make use of &#36;USER_NAME, the name of the user that the post was in response to.



EOD;
$help_pages["en-US"]["Bot_User"] = <<< EOD

EOD;
$help_pages["en-US"]["Browse_Groups"] = <<< EOD
page_type=standard
page_border=solid-border
toc=true
title=Browse Groups
END_HEAD_VARS==Creating or Joining a group==
You can create or Join a Group all in one place using this Text field.
Simply enter the Group Name You want to create or Join. If the Group Name
already exists, you will simply join the group. If the group name doesn&#039;t
exist, you will be presented with more options to customize and create your
new Group.
==Browse Existing Groups==
You can use the [Browse] hyper link to browse the existing Groups.
You will then be presented with a web form to narrow your search followed by
a list of all visible groups to you beneath.
{{right|[[https://www.seekquarry.com/?c=static&amp;p=Documentation#Managing%20Users,%20Roles,%20and%20Groups| Learn More..]]}}
EOD;
$help_pages["en-US"]["CMS_Detectors"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARS&#039;&#039;&#039;CMS Detectors&#039;&#039;&#039; are used to help Yioop get to the most important content on a web page.
&lt;br /&gt;&lt;br /&gt;
You must enter the &#039;&#039;&#039;Name&#039;&#039;&#039;. The Header Regex and Important Content XPath are optional but will have no effect if they are not entered.
&lt;br /&gt;
&#039;&#039;&#039;The Header Regex&#039;&#039;&#039; is used to detect the CMS. The header of most CMS created sites are very common. A specifically crafted regular expression can be used to detect the CMS you are looking for. It looks in the href value in a rel=&#039;stylesheet&#039; tag or the src value in a type=&#039;text/javascript&#039; tag.
&lt;br /&gt;&lt;br /&gt;
The &#039;&#039;&#039;Important Content XPath&#039;&#039;&#039; is used to target the most important content for summarizing. The first entry is where to target the important content. Any subsequent entry will be used to remove content within the important content. Append each removal XPath to the end of the value delimited by three pound signs (###).
&lt;br /&gt;
&#039;&#039;&#039;Example:&#039;&#039;&#039;
&lt;br /&gt;&lt;br /&gt;
&lt;table border=&#039;1&#039;&gt;
&lt;th&gt;Setting&lt;/th&gt; &lt;th&gt;Value&lt;/th&gt;
&lt;tr&gt;&lt;td&gt;Name&lt;/td&gt;&lt;td&gt;Wordpress&lt;/td&gt;&lt;/tr&gt;
&lt;tr&gt;&lt;td&gt;Header Regex &lt;/td&gt;&lt;td&gt;wp-(?:content|includes)&lt;/td&gt;&lt;/tr&gt;
&lt;tr&gt;&lt;td&gt;Important Content XPath&lt;/td&gt;&lt;td&gt;//div[@id=&quot;content&quot;]###&lt;br /&gt;//div[@id=&quot;comments&quot;]###&lt;br /&gt;//div[@id=&quot;respond&quot;]&lt;/td&gt;&lt;/tr&gt;
&lt;/table&gt;
&lt;br /&gt;
EOD;
$help_pages["en-US"]["Captcha_Type"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=Captcha Type

author=

robots=

description=

alternative_path=

page_header=

page_footer=

END_HEAD_VARSThe Captcha Type field set controls what kind of
[[https://en.wikipedia.org/wiki/CAPTCHA|captcha]] will be used during account
registration, password recovery, and if a user wants to suggest a url. The choices for captcha are:
* &#039;&#039;&#039;Text Captcha&#039;&#039;&#039;, the user has to select from a series of dropdown answers
to questions of the form: &#039;&#039;Which in the following list is the most/largest/etc?
or Which is the following list is the least/smallest/etc?; &#039;&#039;
* &#039;&#039;&#039;Graphic Captcha&#039;&#039;&#039;, the user needs to enter a sequence of characters from
a distorted image;
* &#039;&#039;&#039;Hash captcha&#039;&#039;&#039;, the user&#039;s browser (the user doesn&#039;t need to do anything)
needs to extend a random string with additional characters to get a string
whose hash begins with a certain lead set of characters.

Of these, Hash Captcha is probably the least intrusive but requires
Javascript and might run slowly on older browsers. A text captcha might be used
to test domain expertise of the people who are registering for an account.
Finally, the graphic captcha is probably the one people are most familiar with.
EOD;
$help_pages["en-US"]["Changing_the_Classifier_Label"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSThe label of a classifier determines what meta-words will be added to pages that have that concept.

&lt;br /&gt;

If the label is foo, and the foo classifier is used in a crawl, then pages which have the foo property
will have the meta-word class:foo added to the list of words that are indexed.
EOD;
$help_pages["en-US"]["Crawl_Mixes"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSA &#039;&#039;&#039;Crawl Mix&#039;&#039;&#039; allows one to combine several crawl indexes into one to greater customize search results. This page allows one to either create a new crawl mix or find and edit an existing one. The list of crawl mixes is user dependent -- each user can create their own mixes of crawls that exist on the Yioop system.

&lt;br /&gt;

Clicking &#039;&#039;&#039;Share&#039;&#039;&#039;  on a crawl mix allows a user to post their crawl mix to a group&#039;s feed. User&#039;s of that group can then import this crawl mix into their own list of mixes by clicking on it.

&lt;br /&gt;

Clicking &#039;&#039;&#039;Set as Index&#039;&#039;&#039;  on a crawl mix means that by default the given crawl mix will be used to serve search results for this site.
EOD;
$help_pages["en-US"]["Crawl_Order"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARS&#039;&#039;&#039;Crawl Order&#039;&#039;&#039; controls how the crawl determines what to crawl next.

&lt;br /&gt;

&#039;&#039;&#039;Breadth-first Search&#039;&#039;&#039; means that Yioop first crawls the seeds sites, followed by those
sites directly linked to the seed site, followed by those directly linked to sites directly linked
to seed sites, etc.

&lt;br /&gt;

&#039;&#039;&#039;Page Importance&#039;&#039;&#039; gives each seed site an initial amount of cash. Yioop then crawls the seed sites. A given crawled page has its cash splits  amongst the sites that it link to based on the link quality and whether it has been crawled yet. The sites with the most cash are crawled next and this process is continued.
EOD;
$help_pages["en-US"]["Crawl_Robot_Set-up"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSThe &#039;&#039;&#039;Crawl Robot Set-up&#039;&#039;&#039; fieldset is used to provide websites that you crawl with information about who is crawling them. 

*The field &#039;&#039;&#039;Crawl Robot Name&#039;&#039;&#039; is used to say part of the USER-AGENT. It has the format:
&lt;br&gt;
Mozilla/5.0 (compatible; NAME_FROM_THIS_FIELD; YOUR_SITES_URL/bot)
&lt;br&gt;
The value set will be common for all fetcher traffic from the same queue server on site when downloading webpages. If you are doing crawls using multiple queue servers you should give the same value to each queue server. The value of YOUR_SITES_URL comes from the Server Settings - Name Server URL field.
*The &#039;&#039;&#039;Robot Instance&#039;&#039;&#039; field is used for web communication internal to a single yioop instance to help identify which queue server or fetcher under that queue server was involved. This string should be unique for each queue server in your Yioop set-up. The value of this string is written when logging requests between fetchers and queue servers and can be helpful in debugging.
*The &#039;&#039;&#039;Robot Description&#039;&#039;&#039; field is used to specify the Public bot wiki page. This page can also be accessed and edited under Manage Groups by clicking on the wiki link for the Public group and then editing its Bot page. This wiki page is what&#039;s display when someone goes to the URL:&lt;br&gt;
YOUR_SITES_URL/bot
&lt;br&gt;
The point of this page is to give web owners both contact info for your bot as well as a description of how your bot crawls web sites.

EOD;
$help_pages["en-US"]["Create_Group"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=Create+Group

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARS&#039;&#039;This form appears when the Group Name is available to create a new Group. &#039;&#039;
----

&#039;&#039;&#039;Name&#039;&#039;&#039;
* is used to specify the name of the new Group.

&#039;&#039;&#039;Register&#039;&#039;&#039; 
* says how other users are allowed to join the group:
* &lt;u&gt;No One&lt;/u&gt; means no other user can join the group (you can still invite
other users).
* &lt;u&gt;By Request&lt;/u&gt; means that other users can request the group owner to join
the group.
* &lt;u&gt;Anyone&lt;/u&gt; means all users are allowed to join the group.


&#039;&#039;&#039;Access&#039;&#039;&#039;
* controls how users who belong/subscribe to a group
other than the owner can access that group.
* &lt;u&gt;No Read&lt;/u&gt; means that a non-owner member of the group cannot read or
write the group news feed and cannot read the group wiki.
* &lt;u&gt;Read&lt;/u&gt; means that a non-owner member of the group can read the group
news feed and the groups wiki page.
* &lt;u&gt;Read Comment&lt;/u&gt; means that a non-owner member of the group can read the
group feed and wikis and can comment on any existing threads, but cannot start
new ones.
* &lt;u&gt;Read Write&lt;/u&gt; means that a non-owner member of the group can start new
threads and comment on existing ones in the group feed.
* &lt;u&gt;Read Write Wiki&lt;/u&gt;  means that a non-owner member of the group can start new
threads, can comment on existing ones in the group feed, and can edit and create
wiki pages for the group&#039;s wiki.

&#039;&#039;&#039;Voting&#039;&#039;&#039;
* Specifies the kind of voting allowed in the new group. 
* + Voting allows users to vote up posts and users,
* - Voting allows users to vote down posts and users. 
* +/- Voting allows users to vote up and down posts and users..

&#039;&#039;&#039;Post Life time&#039;&#039;&#039; 
* Specifies How long the posts should be kept.

&#039;&#039;&#039;Encryption&#039;&#039;&#039;
* Whether the posts in this group should be encrypted on the server. 
It does not enable encryption of wiki pages or media uploaded to a group. 
Enabling encryption means that posts will no longer be searchable. Once
you choose a group as encrypted, you are not able to change it to be unencrypted.
Similarly, you can&#039;t change an unencrypted group into a encrypted one. Yioop
maintains two databases a private and public one. Encrypted posts are stored
in the public database, group keys needed to decrypt and display them are stored
in a private database. Each post is encrypted using the group key and a unique per
post random salt vector. The idea is if an intruder steals only one of the
two databases it will be difficult for them to decrypt the posts.

EOD;
$help_pages["en-US"]["Database_Setup"] = <<< EOD
page_type=standard

page_border=solid-border

title=Database Setup

END_HEAD_VARSThe database is used to store information about what users are
allowed to use the admin panel and what activities and roles these users have.
* The Database Set-up field-set is used to specify what database management
system should be used, how it should be connected to, and what user name and
password should be used for the connection.

* Supported Databases
** PDO (PHP&#039;s generic DBMS interface).
** Sqlite3 Database.
** Mysql Database.

* Unlike many database systems, if an sqlite3 database is being used then the
connection is always a file on the current filesystem and there is no notion of
login and password, so in this case only the name of the database is asked for.
For sqlite, the database is stored in WORK_DIRECTORY/data.

* For single user settings with a limited number of news feeds, sqlite is
probably the most convenient database system to use with Yioop. If you think you
are going to make use of Yioop&#039;s social functionality and have many users,
feeds, and crawl mixes, using a system like Mysql or Postgres might be more
appropriate.
EOD;
$help_pages["en-US"]["Debug_Display"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSThe &#039;&#039;&#039;Debug Display&#039;&#039;&#039; fieldset consists of checkboxes which control the debugging features of Yioop that are enabled.

*The &#039;&#039;&#039;Error Info&#039;&#039;&#039; checkbox controls whether or not PHP errors, warnings and notices are output from Yioop. Whether the output is then to the browser or to a log file is controlled by the php.ini of your php install.
*The &#039;&#039;&#039;Query Info&#039;&#039;&#039; checkbox controls whether or not Yioop appends to each page information about how long each database and search query took.
*The &#039;&#039;&#039;Test Info&#039;&#039;&#039; checkbox controls whether or not Yioop unit tests are visible from the Yioop site. If checked, the &#039;&#039;&#039;Test Info&#039;&#039;&#039; link takes one to the unit tests.



EOD;
$help_pages["en-US"]["Disallowed_and_Sites_With_Quotas"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARS&#039;&#039;&#039;Disallowed to Crawl Sites&#039;&#039;&#039; are urls or domains (listed one-per-line) that Yioop should not crawl.

&lt;br /&gt;

A line like:
&lt;pre&gt;
  http://www.somewhere.com/foo/
&lt;/pre&gt;
would disallow the url
&lt;pre&gt;
  http://www.somewhere.com/foo/goo.jpg
&lt;/pre&gt;
to be crawled.

&lt;br /&gt;

A line like:
&lt;pre&gt;
 domain:foo.com
&lt;/pre&gt;
would disallow the url
&lt;pre&gt;
  http://a.b.c.foo.com/blah/
&lt;/pre&gt;
to be crawled.
&lt;br /&gt;

&#039;&#039;&#039;Sites with Quotes&#039;&#039;&#039; are urls or domains that Yioop should at most crawl some fixed number of urls from in an hour. These are listed in the same text area as Disallowed to Crawl Sites. To indicate the quota one lists after the url a fragment #some_number. For example,
&lt;pre&gt;
  http://www.yelp.com/#100
&lt;/pre&gt;
would restrict crawling of urls from Yelp to 100/hour.
EOD;
$help_pages["en-US"]["Discover_Groups"] = <<< EOD
page_type=standard

page_border=solid-border

toc=true

title=Discover Groups

END_HEAD_VARS&#039;&#039;&#039;Name&#039;&#039;&#039; Field is used to specify the name of the Group to
search for.
&#039;&#039;&#039;Owner&#039;&#039;&#039; Field lets you search a Group using it&#039;s Owner name.
&lt;br /&gt;
&#039;&#039;&#039;Register&#039;&#039;&#039; dropdown says how other users are allowed to join the group:
* &lt;u&gt;No One&lt;/u&gt; means no other user can join the group (you can still invite
other users).
* &lt;u&gt;By Request&lt;/u&gt; means that other users can request the group owner to join
the group.
* &lt;u&gt;Anyone&lt;/u&gt; means all users are allowed to join the group.
&lt;br /&gt;
&#039;&#039;It should be noted that the root account can always join any group.
The root account can also always take over ownership of any group.&#039;&#039;
&lt;br /&gt;
The &#039;&#039;&#039;Access&#039;&#039;&#039; dropdown controls how users who belong/subscribe to a group
other than the owner can access that group.
* &lt;u&gt;No Read&lt;/u&gt; means that a non-owner member of the group cannot read or
write the group news feed and cannot read the group wiki.
* &lt;u&gt;Read&lt;/u&gt; means that a non-owner member of the group can read the group
news feed and the groups wiki page.
* &lt;u&gt;Read&lt;/u&gt; Comment means that a non-owner member of the group can read the
group feed and wikis and can comment on any existing threads, but cannot start
new ones.
* &lt;u&gt;Read Write&lt;/u&gt;, means that a non-owner member of the group can start new
threads and comment on existing ones in the group feed and can edit and create
wiki pages for the group&#039;s wiki.
&lt;br /&gt;
The access to a group can be changed by the owner after a group is created.
* &lt;u&gt;No Read&lt;/u&gt; and &lt;u&gt;Read&lt;/u&gt; are often suitable if a group&#039;s owner wants to
perform some kind of moderation.
* &lt;u&gt;Read&lt;/u&gt; and &lt;u&gt;Read Comment&lt;/u&gt; groups are often suitable if someone wants
to use a Yioop Group as a blog.
* &lt;u&gt;Read&lt;/u&gt; Write makes sense for a more traditional bulletin board.
EOD;
$help_pages["en-US"]["Editing_Locales"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSThe &#039;&#039;&#039;Edit Locale&#039;&#039;&#039; form can be used to specify how various message strings in Yioop are translated in different languages.

The table below has two columns: a column of string identifiers and a column of translations. A string identifier refers to a location in the code marked as needing to be translated, the corresponding translation in that row is how it should be translated for the current locale. Identifiers typically specify the code file in which the identifier occurs. For example, the identifier
 serversettings_element_name_server
would appear in the file views/elements/server_settings.php . To see where this identifier occurs one could open that file and search for this string.

If no translation exists yet for an identifier the translation value for that row will appear in red. Hovering the mouse over this red field will show the translation of this field in the default locale (usually English).

The &#039;&#039;&#039;Show dropdown&#039;&#039;&#039; allows one to show either all identifiers or just those missing translations. The filter field let&#039;s one to see only identifiers that contain the filter as a substring.
EOD;
$help_pages["en-US"]["Editing_a_Crawl_Mix"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSA crawl mix is built out of a list of &#039;&#039;&#039;search result fragments&#039;&#039;&#039;.

&lt;br /&gt;

A fragment has a &#039;&#039;&#039;Results Shown&#039;&#039;&#039; dropdown which specifies up to how many results that given fragment is responsible for. If one that had three fragments, the first with this value set to 1 the next with it set to 5 and the last set to whatever. Then on a query the Yioop will try to get the first result from the first fragment, up to the next five results from the next fragment, and all remaining results from the last fragment. If a given fragment doesn&#039;t produce results the search engine skips to the  next fragment.

&lt;br /&gt;

The &#039;&#039;&#039;Add Crawls&#039;&#039;&#039; dropdown can be used to add a crawl to the given fragment. Several crawl indexes can be added to a given fragment. When search results are computed for the fragment, the search is performed on all of these indexes and a score for each result is determined. The &#039;&#039;&#039;Weight&#039;&#039;&#039; dropdown can then be set to specify how important a given indexes score of a result should be in the total score of a search result. The top totals scores are then returned by the fragment. If when performing the search on a given index you would like additional terms to be added to the query these can be specified in the &#039;&#039;&#039;Keywords&#039;&#039;&#039; field.


EOD;
$help_pages["en-US"]["Filtering_Search_Results"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARS==Filter Websites From Results Form==
The textarea in this form is used to list hosts one per line which are to be removed from any search result page in which they might appear. Lines in the textarea must be hostnames not general urls. Listing a host name like:
&lt;pre&gt;
 http://www.cs.sjsu.edu/
&lt;/pre&gt;
would prevent any urls from this site from appearing in search results. I.e., so for example, the URL
&lt;pre&gt;
 http://www.cs.sjsu.edu/faculty/pollett/
&lt;/pre&gt;
would be prevented from appearing in search results.
EOD;
$help_pages["en-US"]["Indexing_Plugins"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARS&#039;&#039;&#039;Indexing Plugins&#039;&#039;&#039; are additional indexing processors that a document can be made to go through during the indexing process. Users who know how to code can create their own plugins using the plugin API. Plugins can be used to extract new &quot;micro-documents&quot; from a given document, do clustering, or can be used to control the indexing or non-indexing of web pages based on their content.

&lt;br /&gt;

The table below allows a user to select and configure which plugins should be used in the current crawl.

&lt;br /&gt;


{{right|[[http://www.seekquarry.com/?c=static&amp;p=Documentation#Page%20Indexing%20and%20Search%20Options|Learn More..]]}}
EOD;
$help_pages["en-US"]["Kinds_of_Summarizers"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSYioop uses a &#039;&#039;&#039;summarizer&#039;&#039;&#039; to extract from a downloaded, or otherwise acquired document, text that it will add to its index. This text is also used for search result snippet generation. Only terms which appear in this summary can be used to look up a document. Text region scores, such as sentence scores, determined when a summary is made are used in calculating the order of search results.  

&lt;br /&gt;

The &lt;b&gt;Basic&lt;/b&gt; summarizer computes a summary by proceeding top to bottom through the document looking for block level tags such as h1, div, p, etc. Based on the distance from the top of the document, the tag type, and the length of the tag&#039;s contents, a score for its contents is calculated. The highest scoring regions in the whole document up to the summary length are then returned in the order they appeared in the document as the summary. 

&lt;br /&gt;

The &lt;b&gt;Centroid&lt;/b&gt; summarizer computes a summary by stripping all tags from the document and then splitting the document into &quot;sentence&quot; units. For each sentence, a vector is made with components the terms appearing in the sentence, and with values the term frequency times the inverse sentence frequency of that term. Using the scores for each sentence, an average sentence vector is computed. Sentences are then ranked by their normalized inner product with the average sentence. Top scoring sentence up to the summary length are then returned in the order they appeared in the document as the summary.

&lt;br /&gt;

The &lt;b&gt;Centroid-Weighted&lt;/b&gt; summarizer computes a summary by stripping all tags from the document and then splitting the document into &quot;sentence&quot; units. Then for each sentence it makes a normalized vector of term frequencies (no inverse sentence frequencies). It then computes a weighted average of these vectors where the weighting is based on distance from the start of the documents. The sentence closest to the average sentence based on inner product is determined. The components of this sentence are deleted from the average, and then the next best sentence is determined using the residual average. This process is continued until up-to-summary-length text has been extracted. Sentences found up to the summary length are then returned in the order they appeared in the document as the summary.

&lt;br /&gt;

The &lt;b&gt;Graph-Based&lt;/b&gt; summarizer computes a summary by stripping all tags from the document and then splitting the document into &quot;sentence&quot; units. An weighted adjacency matrix between sentences is then computed. The distance between two sentences is calculated using a distortion measure. Using this adjacency matrix, a sentence rank is computed using the power method (similar to Google&#039;s Page rank). Top scoring sentence up to the summary length are then returned in the order they appeared in the document as the summary.
EOD;
$help_pages["en-US"]["Locale_List"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=Locale List

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSBeneath the Add Locale form is a table listing some of the current
locales.


* The Show Dropdown let&#039;s you control how many of these locales are displayed in
one go.
* The Search link lets you bring up an advance search form to search for
particular locales and also allows you to control the direction of the listing.

The Locale List table
* The first column in the table  has a link with the name of the locale.
Clicking on this link brings up a page where one can edit the strings for that
locale.
* The next three columns of the Locale List table give the locale tag,
whether user&#039;s can use that locale in Settings, and the writing
direction of the locale, this is followed by the percent of strings translated.
* The Edit link in the column let&amp;#039;s you edit the locale tag, enabled status, and
text direction of a locale.
* Finally, clicking the Delete link let&amp;#039;s one delete a locale and all
its strings.
EOD;
$help_pages["en-US"]["Locale_Writing_Mode"] = <<< EOD
page_type=standard

page_border=solid-border

title=Locale Writing Mode

END_HEAD_VARSThe last field on the form is to specify how the language is
written. There are four options:
# lr-tb -- from left-to-write from the top of the page to the bottom as in
English.
#  rl-tb from right-to-left from the top the page to the bottom as in Hebrew
and Arabic.
#  tb-rl from the top of the page to the bottom from right-to-left as in
Classical Chinese.
#  tb-lr from the top of the page to the bottom from left-to-right as in
non-cyrillic Mongolian or American Sign Language.

&#039;&#039;lr-tb and rl-tb support work better than the vertical language support. As of
this writing, Internet Explorer and WebKit based browsers (Chrome/Safari) have
some vertical language support and the Yioop stylesheets for vertical languages
still need some tweaking. For information on the status in Firefox check out
this writing mode bug.&#039;&#039;
EOD;
$help_pages["en-US"]["Machine_Information"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARS&#039;&#039;&#039;Machine Information&#039;&#039;&#039; shows the currently known about machines.

&lt;br /&gt;

This list always begins with the &#039;&#039;&#039;Name Server&#039;&#039;&#039; itself and a toggle to control whether or not the Media Updater process is running on the Name Server. This allows you to control whether or not Yioop attempts to update its RSS (or Atom) search sources on an hourly basis. Yioop also uses the Media updater to convert videos that have been uploaded into mp4 and webm if ffmpeg is installed.

&lt;br /&gt;

There is also a link to the log file of the Media Updater process. Under the Name Server information is a dropdown that can be used to control the number of current machine statuses that are displayed for all other machines that have been added. It also might have next and previous arrow links to go through the currently available machines.

&lt;br /&gt;

{{right|[[https://www.seekquarry.com/?c=static&amp;p=Documentation#GUI%20for%20Managing%20Machines%20and%20Servers| Learn More.]]}}
EOD;
$help_pages["en-US"]["Manage_Advertisements"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSThe &#039;&#039;&#039;Advertisement Name&#039;&#039;&#039;, &#039;&#039;&#039;Text Description&#039;&#039;&#039;, &#039;&#039;&#039;Destination URL&#039;&#039;&#039; fields can be used to create a text-based advertisement. What this ad will look like appears in the &#039;&#039;&#039;Preview&#039;&#039;&#039; area.
&lt;br /&gt;

The &#039;&#039;&#039;Duration&#039;&#039;&#039; dropdown controls how many days the ad campaign will run for. The campaign starts on the date of purchase and this first day till midnight Pacific Time counts as one day of duration.
&lt;br /&gt;

&#039;&#039;&#039;Keywords&#039;&#039;&#039; should consist of a comma separated list of words or phrases. Each word or phrase has a minimum bid for each day based on demand for that keyword. If no one so far has purchased an ad for any of the keywords, then this minimum is $1/day/word or phrase. Otherwise, it is calculated using the total of the bids so far.
&lt;br /&gt;

The &#039;&#039;&#039;Calculate Bid&#039;&#039;&#039; button computes the minimum cost for the campaign you have chosen, add presents a form to receive your credit card information.

On this form the static field &#039;&#039;&#039;Minimum Bid Required&#039;&#039;&#039; field gives the minimum amount required to pay for the advertisement campaign in question. The &#039;&#039;&#039;Expensive word&#039;&#039;&#039; static field says for your campaign which term contributes the most to this minimum bid cost. The Budget fields allows you to enter an amount greater than or equal to the minimum bid that you are willing to pay your ad campaign. If there have been no other bids on your keywords then the minimum bid will show you ad 100% of the time any of your keywords are search for. If, however, there have been other bids, your bid amount as a fraction of the total bid amount for that day for the search keyword is used to select a frequency with which your ad is displayed, so it can make sense to bid more than the minimum required amount.
&lt;br /&gt;

If you need to edit the keywords or other details of your ad before purchasing it, you can click the &#039;&#039;&#039;Edit Ad&#039;&#039;&#039; button; otherwise, clicking the &#039;&#039;&#039;Purchase&#039;&#039;&#039; button completes the purchase of your Ad campaign.
&lt;br /&gt;

The &#039;&#039;&#039;Advertisement List&#039;&#039;&#039; beneath the form lists details for all of the ads you have created from most recent to least recent as well as impression and click information. You can edit the text of your ad (but not the keywords) by clicking an ad&#039;s edit column. You can also Deactivate a campaign to stop it from displaying. This does not refund your money.
EOD;
$help_pages["en-US"]["Manage_Credits"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARS&#039;&#039;&#039;Purchase Ad Credits&#039;&#039;&#039; form can be used to purchase ad credits which can then be spent under &#039;&#039;&#039;Manage Advertisements&#039;&#039;&#039;.
&lt;br /&gt;&lt;br /&gt;

The &#039;&#039;&#039;Quantity&#039;&#039;&#039; dropdown specifies the number of credits one wants to purchase at what price.
&lt;br /&gt;

The &#039;&#039;&#039;Card Number&#039;&#039;&#039; field should be filled in with a valid credit card.
&lt;br /&gt;

The &#039;&#039;&#039;CVC&#039;&#039;&#039; field you should put the three or four digit card verification number for your card.
&lt;br /&gt;

The &#039;&#039;&#039;Expiration&#039;&#039;&#039; dropdown is used to set your cards expiration date.
&lt;br /&gt;

The &#039;&#039;&#039;Purchase&#039;&#039;&#039; button is used to complete the purchase of Ad credit.
&lt;br /&gt;

Beneath the Purchase form is the list of &#039;&#039;&#039;Ad Credit Transactions&#039;&#039;&#039; that have been made with your account.
EOD;
$help_pages["en-US"]["Manage_Machines"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARS&#039;&#039;&#039;Add Machine&#039;&#039;&#039; allows you to add a new machine to be controlled by this Yioop instance.

&lt;br /&gt;

The &#039;&#039;&#039;Machine Name&#039;&#039;&#039; field lets you give this machine an easy to remember name. 
&lt;br /&gt;

The &#039;&#039;&#039;Machine URL&#039;&#039;&#039; field should be filled in with the URL to the installed Yioop instance.
&lt;br /&gt;

The &#039;&#039;&#039;Type/Channel&#039;&#039;&#039; controls, if set to a natural number, the channel that the queue servers and fetchers of this machine will use. The given machine will then only participate in crawls assigned to this channel number. If &#039;&#039;&#039;Type/Channel&#039;&#039;&#039; is set to &#039;&#039;&#039;Replica Server&#039;&#039;&#039;, then a Parent Dropdown will appear where one can select the machine that the given machine will mirror. Mirroring is only supported for now for query results.
If a Mirror server is created and turned on, then query results needed from the parent server will alternately come from the Mirror server or its parent.
&lt;br /&gt;

Finally, if &#039;&#039;&#039;Type/Channel&#039;&#039;&#039; is set to a natural number, the &#039;&#039;&#039;Number of Fetchers&#039;&#039;&#039; drop down allows you to say how many fetcher instances you want to be able to manage for that machine.

&lt;br /&gt;

{{right|[[https://www.seekquarry.com/?c=static&amp;p=Documentation#GUI%20for%20Managing%20Machines%20and%20Servers|Learn More..]]}}
EOD;
$help_pages["en-US"]["Max_Depth"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSThe &#039;&#039;&#039;Max Depth&#039;&#039;&#039; dropdown is used to limit what urls are allowed to be crawl by the number of hops they are from a seed site. For example, if the Max Depth was set to 2, then seed sites would be crawled, sites linked to seed sites would be crawled, and sites linked to sites linked to seed sites would be crawled. A depth 0 crawl only crawls the seed sites.
EOD;
$help_pages["en-US"]["Media_Sources"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARS&#039;&#039;&#039;Media Sources&#039;&#039;&#039; are used to specify how Yioop should handle news feeds and podcast sites.

&lt;br /&gt;


An &#039;&#039;&#039;RSS media source&#039;&#039;&#039; can be used to add an RSS or Atom feed (it auto-detects which kind) to the list of feeds which are downloaded hourly when Yioop&#039;s Media Updater is turned on. Besides the name you need to specify the URL of the feed in question. The Category field search usually be left at news. If you want to specify additional categories such as weather or sports, you typically want to create a mix that searches the default index with the keyword media:your_category injects, and then make a new subsearch with that mix.
This will allow your new category to show up on the Tools/More/Other Searches page.

&lt;br /&gt;

An &#039;&#039;&#039;HTML media source&#039;&#039;&#039; is a web page that has feed articles like an RSS page that you want the Media Updater to scrape on an hourly basis. To specify where in the HTML page the news items appear you specify different XPath information. For example,
&lt;pre&gt;
 Name: Cape Breton Post
 URL: http://www.capebretonpost.com/News/Local-1968
 Language: English
 Category: news
 Channel: //div[contains(@class, &quot;channel&quot;)]
 Item: //article
 Title:    //a
 Description: //div[contains(@class, &quot;dek&quot;)]
 Link: //a
&lt;/pre&gt;
The Channel field is used to specify the tag that encloses all the news items. Relative to this as the root tag, //article says the path to an individual news item. Then relative to an individual news item, //a gets the title, etc. Link extracts the href attribute of that same //a .

&lt;br /&gt;

A &#039;&#039;&#039;JSON media source&#039;&#039;&#039; is a used to scrape feed articles from JSON data as may be provided by a websites API. To handle a JSON media source you provide the same information as with an HTML media source. Internally, Yioop converts all JSON sources to xml before processing. The root objects maps to /html/body.
A property &#039;&#039;foo&#039;&#039; of the root object would get mapped to a tag &lt;foo&gt;. Array elements are mapped to a sequence of elements enclosed in &lt;item&gt; tags. The process is recursively applied until the JSON object is completely converted to an xml page. Once this is done the XPaths that a user provides are used to extract the feed items in the same way as how HTML feeds are extracted. As an example, Yioop search results and discussion groups can be output as JSON. To take Yioop&#039;s news feed and use it as a JSON media source in your search engine, you could use the settings:
&lt;pre&gt;
 Name: Yioop News
 URL: https://www.yioop.com/s/news?f=json
 Language: English
 Category: news
 Channel: //channel
 Item: //item
 Title: //title
 Description: //description
 Link: //link
&lt;/pre&gt;

&lt;br /&gt;

A &#039;&#039;&#039;Regex media source&#039;&#039;&#039; is a source of feed articles presented in some kind of non-tag based text format.
For example, the US National Weather Service has a text-based page for weather forecasts of major US cities
at
&lt;pre&gt;
 http://forecast.weather.gov/product.php?site=NWS&amp;
  issuedby=04&amp;product=SCS&amp;format=txt&amp;
  version=1&amp;glossary=0
&lt;/pre&gt;
changing the 04 above to 03, 02, 01 varies the group of cities. Most of the data on this page appears in a pre tag as text. &#039;&#039;Channel&#039;&#039; in this case would be a regex whose first capture group corresponds to the contents of this pre tag. We might want to get one item per line from the pre tag as that would correspond to the weather for one city. The &#039;&#039;Item Separator&#039;&#039; is a regex used to split the results of the Channel operation into items. Finally, &#039;&#039;Title&#039;&#039;, &#039;&#039;Description&#039;&#039;, and &#039;&#039;Link&#039;&#039; are regexes each with one capture group used to get these respective feed item components out of an item given after the splitting process above. Hence, a reasonable choice of values for the weather service page might be:
&lt;pre&gt;
 Name: National Weather Service 04
 URL: http://forecast.weather.gov/product.php?
  site=NWS&amp;issuedby=04&amp;product=SCS&amp;format=txt&amp;
  version=1&amp;glossary=0
 Language: English
 Category: weather
 Channel: /&lt;pre(?:.+?)&gt;([^&lt;]+)/m
 Item: /
/
 Title: /^(.+?)\s\s\s+/
 Description: /\s\s\s+(.+?)$/
 Link: http://www.weather.gov/
&lt;/pre&gt;
Notice in the above that the Link element is http://www.weather.gov/. If you have a feed
and it doesn&#039;t provide links for individual items. You can always provide a link to some
fixed site by directly entering a URL in the Link field.

&lt;br /&gt;


Not all feeds use the same tag to specify the image associated with a news item. The Image XPath allows you to specify relative to a news item (either RSS or HTML) where an image thumbnail exists. If a site does not use such thumbnail one can prefix the path with ^ to give the path relative to the root of the whole file to where a thumb nail for the news source exists. Yioop automatically removes escaping from RSS containing escaped HTML when computing this. For example, the following works for the feed:
&lt;pre&gt;
  https://feeds.wired.com/wired/index
  //description/div[contains(@class, &quot;rss_thumbnail&quot;)]/img/@src 
&lt;/pre&gt;

&lt;br /&gt;

A &#039;&#039;&#039;Feed Podcast source&#039;&#039;&#039; is an RSS or Atom source where each item contains a link to a podcast or video podcast. For example,
 http://feed.cnet.com/feed/podcast/all/hd.xml
The &#039;&#039;&#039;Alternative Link Tag&#039;&#039;&#039; field is used to say the XPath within the feed item to the link for the audio or video file. For the CNet example, this is:
 enclosure
If it is blank the default link tag is used. The media updater job when run checks if any items in the feed are new. If so, it downloads them to the wiki resource folder of the wiki page provided in the &#039;&#039;&#039;Wiki Destination&#039;&#039;&#039; field. This page is given in the format GroupName@PageName. If you give just PageName, the Public group is assumed. The &#039;&#039;&#039;Expires&#039;&#039;&#039; field controls how long a feed item is kept before it is deleted.
For example, if we wanted to download the popular Ted talk podcasts into the Ted subfolder of the resource folder of the Example Podcast wiki page of the Public group, where we have podcasts expire after after 1 month, we could do:
&lt;pre&gt;
 Name: Ted
 URL: https://pa.tedcdn.com/feeds/talks.rss
 Language: English
 Expires: One Month
 Alternative Link Tag: enclosure
 Wiki Destination: Library@News and Podcasts/Ted/%Y-%m-%d %F
&lt;/pre&gt;
Notice the string has &quot;%Y-%m-%d %F&quot; in it. This portion of the destination gives the format of the filename to use when storing a downloaded podcast file. It says name the file as the current year hyphen month hyphen day space the filename as given in the URL. %F is for the filename, other % modifiers can be standard date formatting instructions.
&lt;br /&gt;

Yioop supports the downloading of single video or audio file sources, as well as more complicated stream sources such as m3u8 streams.

&lt;br /&gt;

A &#039;&#039;&#039;Scrape podcast source&#039;&#039;&#039; is like a &#039;&#039;&#039;Feed Podcast source&#039;&#039;&#039;, but where one has a HTML or XML page which has a periodically updated link to a video or audio source. For example, it might be an evening news web site.
The URL field should be the page with the periodically updated link. The &#039;&#039;&#039;Aux Url XPaths&#039;&#039;&#039; field, if not blank, should be a sequence of XPaths or Regexes one per line. The first line will be applied to the page to obtain a next url to download. The next line&#039;s XPath or Regex is applied to this file and so on. The final url generated should be to the HTML or XML page that contains the media source for that day. Finally, on the page for the given day, &#039;&#039;&#039;Download XPath&#039;&#039;&#039; should be the XPath of the url of the video or audio file to download.
If a regex is used rather than an XPath, then the first capture group of the regex should give the url. A regex can be followed by json| to indicate the first capture group should be converted to a json object. To reference a path of through sub-objects of this object to a url. As an example, consider the following, which at some point, could download the Daily News  Scrape Podcast to a wiki group:

 Type: Scrape Podcast
 Name: Dailly News Podcast
 URL: https://www.somenetwork.com/daily-news
 Language: English
 Aux Url XPaths:
 /(https\:\/\/cdn.somenetwork.com\/daily-news\/video\/daily-[^\&quot;]+)\&quot;/
 /window\.\_\_data\s*\=\s*([^\]+\}\;)/json|video|current|0|publicUrl
 Download XPath: //video[contains(@height,&#039;540&#039;)]
 Wiki Destination: My Private Group@Podcasts/%Y-%m-%d.mp4

The initial page to be download will be: https://www.somenetwork.com/daily-news. On this page, we will use the first Aux Path to find a string in the page that matches /(https\:\/\/www.somenetwork.com\/daily-news\/video\/daily-[^\&quot;]+)\&quot;/. The contents matching between the parentheses is the first capture group and will be the next url to download. SO for example, one might get a url:
 https://cdn.somenetwork.com/daily-news/video/daily-safghdsjfg
This url is then downloaded and a string matching  the pattern /window\.\_\_data\s*\=\s*([^
]+\}\;)/ is found. The capture group portion of this string consists of what matches ([^
]+\}\;) is then converted to a JSON object, because of the json| in the Aux Url XPath. From this JSON object, we look at the video field, then the current subfields, its 0 subfield, and finally, the publicUrl field. This is the url we download next. Lastly, the download XPath is then used to actually get the final video link from this downloaded page.
Once this video is downloaded, it is stored in the Podcasts page&#039;s resource folder of the the My Private Group wiki group in a file with a name in the format: %Y-%m-%d.mp4.
EOD;
$help_pages["en-US"]["Monetization"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSThe &#039;&#039;&#039;Monetization&#039;&#039;&#039; field-set controls what kind of monetization features are used by Yioop. The default is that no monetization features are enabled.

* &#039;&#039;&#039;External Ad Server&#039;&#039;&#039; allows one to add a script for an external ad server to search result pages. Selecting this option lets you choose the placement of the external ad server&#039;s results and to cut and paste the necessary Javascript code.
* &#039;&#039;&#039;Group Fees&#039;&#039;&#039; enables the Manage Credits activity for all users. This allows users to purchase credits. By default credits are free, however, if the payment script is bought from seekquarry.com and installed then credits can be purchased via a credit card for a dollar value. Besides enabling the Manage Credits activity, &#039;&#039;&#039;Group Fees&#039;&#039;&#039; also allows owner&#039;s of groups on your site to charge a fee in credits to join a group.
* &#039;&#039;&#039;Keyword Advertising&#039;&#039;&#039; enables the Manage Credits activity mentioned above and also enables a Manage Advertisements activity. This latter activity allows user&#039;s to purchase keyword advertisements for search results.
* &#039;&#039;&#039;Group Fees and Keyword Ads&#039;&#039;&#039; enables both charging credits for joining groups and allows user&#039;s to purchase keyword advertisements.

EOD;
$help_pages["en-US"]["Name_Server_Setup"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSYioop can be run in a single machine or multi-machine setting. In a multi-machine setting, copies of Yioop software would be on different machines. One machine called the &#039;&#039;&#039;Name Server&#039;&#039;&#039; would be responsible for coordinating who crawls what between these machines. This fieldset allows the user to specify the url of the Name Server as well as a string (which should be the same amongst all machines using that name server) that will be used to verify that this machine is allowed to talk to the Name Server. In a single machine setting these settings can be left at their default values.

&lt;br /&gt;

When someone enters a query into a Yioop set-up, they typically enter the query on the name server. The &#039;&#039;&#039;Use Filecache&#039;&#039;&#039; checkbox controls whether the query results are cached in a file so that they don&#039;t have to be recalculated when someone enters the same query again. The file cache is purged periodically so that it doesn&#039;t get too large. Sometimes it is useful, however, to know the file cache has just been cleared. The &#039;&#039;&#039;Clear Cache&#039;&#039;&#039; link clears both the file cache as well as the local domain name to IP address cache.
EOD;
$help_pages["en-US"]["Page_Byte_Ranges"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARS&#039;&#039;&#039;Byte Range to Download&#039;&#039;&#039; determines the maximum number of bytes that Yioop will download for a given page when crawling. Setting a maximum is important so that Yioop does not get stuck downloading very large files.

&lt;br /&gt;

When Yioop shows the cached version of a URL it shows only what it downloaded.
EOD;
$help_pages["en-US"]["Page_Classifiers"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSClassifiers are used to say whether a page has or does not have a property. The &#039;&#039;&#039;Manage Classifiers&#039;&#039;&#039; activity let&#039;s you create and manage the classifiers for this Yioop system. Creating a classifier will take you to a page that let&#039;s you train the classifier against existing data such as a crawl indexed. Once you have a classifier you can use it to add meta words for that concept to pages in future crawls by selecting in on the Page Options activity. You can also use classifiers to score documents for ranking purposes in search results, again this can be done under the Page Options Activity.
EOD;
$help_pages["en-US"]["Page_Grouping_Options"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSThe &#039;&#039;&#039;Search Results Grouping&#039;&#039;&#039; controls allow you to control on a search query how many qualifying documents from an index to compute before trying to sort and rank them to find the top k results (here k is usually 10).  In a multi-queue-server setting the query is simultaneously asked by the name server machine of each of the queue server machines and the results are aggregated.

&lt;br /&gt;

&#039;&#039;&#039;Minimum Results to Group&#039;&#039;&#039; controls the number of results the name server want to have before sorting of results is done. When the name server request documents from each queue server, it requests for
&lt;br /&gt;
&amp;alpha; &amp;times; (Minimum Results to Group)/(Number of Queue Servers) documents.

&lt;br /&gt;
&#039;&#039;&#039;Server Alpha&#039;&#039;&#039; controls the number alpha.
EOD;
$help_pages["en-US"]["Page_Ranking_Factors"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSIn computing the relevance of a word/term to a page the fields on this form allow one to set the relative weight given to the word depending on whether it appears in the title, a link, or if it appears anywhere
else (description).
EOD;
$help_pages["en-US"]["Page_Rules"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARS&#039;&#039;&#039;Page Field Extraction Rules &#039;&#039;&#039; are statements from a Yioop-specific indexing language which can be applied to the words in a summary page before it is stored in an index. Details on this language can be found in the [[http://www.seekquarry.com/?c=static&amp;p=Documentation#Page%20Indexing%20and%20Search%20Options|Page Indexing and Search Options]] section of the Yioop Documentation.

&lt;br /&gt;

The textarea below this heading can be used to list out which extraction rules should be used for the current crawl.
EOD;
$help_pages["en-US"]["Privacy"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSThe privacy fieldset controls a variety of options with respect to how analytics from individual users is collected by a Yioop instance.

* &#039;&#039;&#039;Differential Privacy&#039;&#039;&#039; controls whether group and thread view statistics which are displayed under the Manage Groups and Feeds and Wikis activities are fuzzified to try to prevent individual users from being identifiable by change in counts.
* &#039;&#039;&#039;Group Analytics&#039;&#039;&#039; controls whether information about group and thread views is collected and whether statistics about these views are visible to group owners. If this is disabled, it does not delete statistics that were previously collected, however, they will no longer be viewable and no future views will be recorded.
* &#039;&#039;&#039;Search Analytics&#039;&#039;&#039; controls whether information about search queries is collected and aggregated. If this is disabled, it does not delete statistics that were previously collected, however, they will no longer be viewable and no future collection will occur. Also, if this is disabled, but keyword advertisements are enabled, then impressions with respect to advertised keywords will still be collected.
EOD;
$help_pages["en-US"]["Proxy_Server"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=Proxy server

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARS* Yioop can make use of a proxy server to do web
crawling.
EOD;
$help_pages["en-US"]["Recovery_Type"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

END_HEAD_VARSThe Recovery Type field set controls whether and how user account recovery can be handled in an automated fashion. The available choices are:
* &#039;&#039;&#039;No User Password Recovery Link&#039;&#039;&#039;, no &quot;Forgot Password?&quot; link is provided and a user cannot recover
their password on their own;
* &#039;&#039;&#039;Email Link Password Recovery&#039;&#039;&#039;, a user can specify their login and get emailed a password change link;
* &#039;&#039;&#039;Email Link and Check Questions Recovery&#039;&#039;&#039;, a user can specify their login and get emailed a password change link. The password change page requires the user correctly answers previously provided recovery questions.
EOD;
$help_pages["en-US"]["Repeat_Type"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSThe &#039;&#039;&#039;Repeat Type&#039;&#039;&#039; dropdown controls whether a crawl is a repeating crawl or not, and if so, what is its repeat duration. A non-repeating crawl has one index and crawling continues adding to this index until all allowed urls have been crawled or until the administrator stops the crawl. In a non-repeating crawl one has a double index, that consists of a index to serve search results from and an index to crawl into. Once the repeat time has been exceeded the index that was being crawled into becomes the index to serve results from, the previous search index is reset to empty and is then used to crawl into for the next repeat time amount of time. The &#039;&#039;&#039;Two Minute&#039;&#039;&#039; repeat type can be used to experiment with this behavior.
EOD;
$help_pages["en-US"]["Robots_Behaviors"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSThe &#039;&#039;&#039;Robots Behaviors&#039;&#039;&#039; dropdown controls the degree to which your Yioop crawler respects &#039;&#039;&#039;robots.txt&#039;&#039;&#039; files. A &#039;&#039;&#039;robots.txt&#039;&#039;&#039; is a file placed by a site operator in the document root of their web site. I.e., it would typically have a url like: 
https://some_host_name/robots.txt&lt;br&gt;
or&lt;br&gt;
http://some_host_name/robots.txt.
It is used to specify the files that a particular kind of crawler is allowed to download from a site and at what rate. So for example it might have instructions for how the GoogleBot is allowed to crawl the site, how the BingBot is allowed to crawl the site, etc. The available options are:
* &#039;&#039;&#039;Always Follow&#039;&#039;&#039; which always follows to the best of Yioop&#039;s abilities the robots.txt instructions.
* &#039;&#039;&#039;Allow Landing Page Crawl&#039;&#039;&#039; which allows Yioop to download urls of the form 
https://some_host_name/&lt;br&gt; 
or&lt;br&gt;
http://some_host_name/ but otherwise respects the robots.txt file.
* &#039;&#039;&#039;Ignore&#039;&#039;&#039; which allows Yioop to completely ignore the robots.txt file. This option should only be used at your own risk. There might be some use cases such as where you want to crawl part of a site that you yourself own, but where you don&#039;t have control of the robots.txt. For the most part, you should not use this option.
EOD;
$help_pages["en-US"]["Scrapers"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARS&#039;&#039;&#039;Web Scrapers&#039;&#039;&#039; are used to help Yioop get to the most important content on a web page during. When Yioop crawls it tries to extract the most important content of a page into a succinct summary. It then indexes just this summary. Web pages generated by a content management system such as Wordpress have a reasonably standard format and a web scraper can be used to isolated the sub-portion of a web page which is more likely to have useful content. Below we describe how to use Web Scraper activity to make a new scraper or view existing one.

&#039;&#039;&#039;Name&#039;&#039;&#039; is what to call the scraper that is being defined. A Web Scraper must have a Name, the Signature and Scrape Rules fields are optional but at least one of them must be present for the web scraper to have effect while crawling.

&#039;&#039;&#039;Signature&#039;&#039;&#039; is used to detect when a particular Web Scraper should be used. It should consist of an XPath query which would evaluate to a non-empty set of elements in the case of a page the scraper might work for.

&#039;&#039;&#039;Text XPath&#039;&#039;&#039; is used to specify an xpath to the most important content of a page for summarization.

&#039;&#039;&#039;Delete XPaths&#039;&#039;&#039;is used to specify xpaths, one per line, of content under the Text Xpath portion of the web page, that should be non considered for summarizations.

&#039;&#039;&#039;Extract Fields&#039;&#039;&#039; is used to specify a sequence of rules to extract to specific fields in the summary. Each rule should be on a line by itself and have the format: NAME_OF_SUMMARY_FIELD = SOME_XPATH. The meaning of such a rule compute the xpath on the original document and concatenate the text contents of the resulting nodes into NAME_OF_SUMMARY_FIELD in the summary. For example,
 SITE_NAME=//meta[@property=&#039;og:site_name&#039;]/@content
would take the value of the content attribute of all meta tags with property attribute having value og:site_name, concatenate them as a string, and store the key SITE_NAME with value this string in the pages summary when it is indexed.
EOD;
$help_pages["en-US"]["Search_Access"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSThe &#039;&#039;&#039;Search Access&#039;&#039;&#039; fieldset has checkboxes that control which interfaces can be used to get search query results from Yioop.

* The &#039;&#039;&#039;Web&#039;&#039;&#039; checkbox controls whether or not a traditional web search through the Yioop instance&#039;s landing page can be done.
* The &#039;&#039;&#039;RSS&#039;&#039;&#039; checkbox controls whether or not search queries in RSS format are available. If so, there a query string of the form ?q=some_search_query&amp;f=rss will output search results in rss format, a query string in RSS format will be output. This checkbox needs to be checked if you are using Yioop in a situation with multiple queue servers. This switch also enables queries of the form ?q=some_search_query&amp;f=json, ?q=some_search_query&amp;f=json&amp;callback=some_function, and ?q=some_search_query&amp;f=serial. These are respectively JSON format output, JSONP format output, and serialized PHP object format output.
* The &#039;&#039;&#039;API&#039;&#039;&#039; checkbox controls whether or not Yioop can be used as PHP library using the  Yioop Search Function API to return search results. This is described in the [[https://www.seekquarry.com/p/Documentation#Embedding%20Yioop%20in%20an%20Existing%20Site|Embedding Yioop]] section of the Yioop Documentation.

EOD;
$help_pages["en-US"]["Search_Results_Editor"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSThe &#039;&#039;&#039;Edit Result Page&#039;&#039;&#039; form can be used to change the title and snippet text associated with a given url if it appears in search results. The Edited Urls dropdown let&#039;s one see which URLs have been previously edited and allows one to load and re-edit these if desired. Edited words in the title and description of an edited URL are not indexed. Only the words from the page as originally appearing in the index are used for this. This form only controls the title and snippet text of the URL when it appears in a search engine result page.
EOD;
$help_pages["en-US"]["Search_Results_Page_Elements"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSThese checkboxes control whether various links and drop downs on the search result and landing
pages appear or not.

; &#039;&#039;&#039;Word Suggest&#039;&#039;&#039;: Controls whether the suggested query drop down appear as a query is entered in the search bar.
; &#039;&#039;&#039;Subsearch&#039;&#039;&#039; : Controls whether the links to subsearches such as Image, Video, and News search appear at the top of all search pages
; &#039;&#039;&#039;Signin&#039;&#039;&#039; : Controls whether the &#039;&#039;&#039;Sign In&#039;&#039;&#039; link appears at the top of the Yioop landing and search result pages.
; &#039;&#039;&#039;Cache&#039;&#039;&#039;, &#039;&#039;&#039;Similar&#039;&#039;&#039;, &#039;&#039;&#039;Inlinks&#039;&#039;&#039;, &#039;&#039;&#039;IP Address&#039;&#039;&#039;: Control whether the corresponding links appear after each search result item.



EOD;
$help_pages["en-US"]["Seed_Sites_and_URL_Suggestions"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARS&#039;&#039;&#039;Seed Sites&#039;&#039;&#039; are a list of urls that Yioop should start a crawl from.

&lt;br /&gt;

If under Server Settings : Account Registration user&#039;s are allowed to register for Yioop accounts at some
level other than completely disabled, then the Tools: Suggest a Url form will be enabled. URLs suggested through this form can be added to the seed sites by clicking the &#039;&#039;&#039;Add User Suggest data&#039;&#039;&#039; link. These URLS will appear at the end of the seeds sites and will appear with a timestamp of when they added before them. Adding this data to the seed sites clears the list of suggested sites from where it is temporarily stored before being added.

&lt;br /&gt;

Some site&#039;s robot.txt forbid crawl of the site. If you have your crawler configured to always follow the robots.txt file, but would like to create a placeholder page for such a forbidden site so that a link to that site might still appear in the index, yet so that the site itself is not crawled by the crawler, you can use a syntax like:

&lt;nowiki&gt;
http://www.facebook.com/###!
Facebook###!
A%20famous%20social%20media%20site
&lt;/nowiki&gt;

This should all be on one line. Here ###! is used a separator and the format is url##!title###!description.
EOD;
$help_pages["en-US"]["Server_Channel"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSEach machine in a cluster of Yioop instances with the same Name Server has a channel, defaulting to 0. The &#039;&#039;&#039;Server Channel&#039;&#039;&#039; drop down is populated with a list of channels of currently configured machines in the cluster. If there are no configured machines and empty message is displayed. The Server Channel of a crawl is used to specify which machines in the cluster will participate in the crawl -- only machine with the same channel as that of the crawl will participate. Using this mechanism it is possible to set up several ongoing simultaneous crawls provided they are on different channels.
EOD;
$help_pages["en-US"]["Start_Crawl"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSEnter a name for your crawl and click start to begin a new crawl. Previously completed crawls appear in the table below.

&lt;br /&gt;

Before you start your crawl be sure to start the queue servers and fetchers to be used for the crawl under &#039;&#039;&#039;Manage Machines&#039;&#039;&#039;.

&lt;br /&gt;

The &#039;&#039;&#039;Options&#039;&#039;&#039; link let&#039;s you specify what web sites you want to crawl or if you want to do an archive previous crawls or different kinds of data sets.
EOD;
$help_pages["en-US"]["Subsearches"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARS&#039;&#039;&#039;Subsearches&#039;&#039;&#039; are specialized search hosted on a Yioop site other than the default index. For example, a site might have a usual web search and also offer News and Images subsearches. This form let&#039;s you set up such a subsearch.

&lt;br /&gt;

A list of links to all the current subsearches on a Yioop site appears at the
 site_url?a=more
page. Links to some of the subsearches may appear at the top left hand side of of the default landing page provided the Pages Options : Search Time : Subsearch checkbox is checked.

&lt;br /&gt;

The &#039;&#039;&#039;Folder Name&#039;&#039;&#039; of a subsearch is the name that appears as part of the query string when doing a search restricted to that subsearch. After creating a subsearch, the table below will have a &#039;&#039;&#039;Localize&#039;&#039;&#039; link next to its name. This lets you give names for your subsearch on the More page mentioned above with respect to different languages.

EOD;
$help_pages["en-US"]["Suffix_Phrases"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSThis checkbox controls whether suffix phrases are extracted from document summaries at crawl time and whether suffix phrases are used at search time. Using suffix phrases allows for faster, by building a complete suffix tree of the corpus, but often less relevant, search results for multi-term queries in the spin hard drive setting for a very large index (&gt; 100 million pages). The resulting index will be substantially larger.

EOD;
$help_pages["en-US"]["Summary_Length"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSThis determines the maximum number of bytes that can appear in a summary generated for a document that Yioop has crawled. To have any effect this value should be smaller that the byte range downloaded. yo
EOD;
$help_pages["en-US"]["Test_Indexing_a_Page"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

alternative_path=

page_header=

page_footer=

sort=aname

END_HEAD_VARSThe &#039;&#039;&#039;Test Page&#039;&#039;&#039; form is used to test how Yioop would process a given web page. To test a web page one
first selects the &#039;&#039;&#039;Method of Submission&#039;&#039;&#039;. This can either be by giving the URI of the webpage you would like to test, or by choosing a file to upload and test or by direct input. For direct input one 
copies and pastes the source of the web page (obtainable by doing View Source in a browser) into the textarea. Then one selects the mimetype of the page (usually, text/html) and submits the form to see the processing results.
EOD;
$help_pages["en-US"]["Using_a_Classifier_or_Ranker"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSA &lt;b&gt;binary classifier&lt;/b&gt; is used to say whether or not a page has a property (for example, being a spam page or not). Classifiers can be created using the Manage Classifiers activity.

&lt;br/&gt;

The classifiers that have been created in this Yioop instance are listed in the table below and can be used for future crawls. Given a classifier named foo, selecting the &#039;&#039;&#039;Use to Classify&#039;&#039;&#039; check box for it tells Yioop to insert some subset of the following labels as meta-words when it indexes a page:
&lt;pre&gt;
 class:foo
 class:foo:10plus
 class:foo:20plus
 class:foo:30plus
 class:foo:40plus
 ...
 class:foo:50
 ...
&lt;/pre&gt;
When a document is scored against a classifier foo, it gets a score between 0 and 1 and if the score is greater than 0.5 the meta-word class:foo is added. A meta-word class:foo:XXplus indicates the document achieved at least a score of XX with respect to the classifier, and a meta-word class:foo:XX indicates it had a score between 0.XX and 0.XX + 0.9.

&lt;br /&gt;

The &#039;&#039;&#039;Use to Rank&#039;&#039;&#039; checkbox indicates that Yioop should take the score between 0 and 1 and use this as one of the scores when ranking search results.
EOD;
$help_pages["en-US"]["Work_Directory"] = <<< EOD
page_type=standard

page_alias=

page_border=solid-border

toc=true

title=

author=

robots=

description=

page_header=

page_footer=

END_HEAD_VARSThe &#039;&#039;&#039;Work Directory&#039;&#039;&#039; is a folder used to store all the customizations of this instance of Yioop.
This field should be a complete file system path to a folder that exists.
It should use forward slashes. For example:

 /some_folder/some_subfolder/yioop_data
(more appropriate for Mac or Linux) or
 c:/some_folder/some_subfolder/yioop_data
(more appropriate on a Windows system).

If you decide to upgrade Yioop at some later date you only have to replace the code folder
of Yioop and set the Work Directory path to the value of your pre-upgrade version. For this
reason the Work Directory should not be a subfolder of the Yioop code folder.
EOD;

