<?php
/*
 * vim: ts=3 sw=3 et wrap co=150 go-=b
 */

class CommonHtml
{
   public function __construct()
   {
      throw new Exception('This class is not intended to be instantiated.');
   }

   public function getHtmlForHeaderPlusIndent($pageTitle)
   {
      $html  = "<!DOCTYPE html>\n";
      $html .= "<html>\n";
      $html .= " <head>\n";
      $html .= "  <script src='_lib/js/jquery-3.6.1.min.js'></script>\n";
      $html .= "  <script src='_common/js/breadcrumbs.js'></script>\n";
      $html .= "  <style>\n";
      $html .= <<<CSS
body {
   width: 1000px;
}

#breadcrumbs {
   border: 1px solid black;
   overflow-x: scroll;
   padding: 10px;
   white-space: nowrap;
   width: 100%;
}

#breadcrumbs > ul,
#breadcrumbs > ul > li {
   display: inline-block;
   margin: 0;
   padding: 0;
}

#breadcrumbs > ul > li {
   margin-right: 5px;
}
CSS;
      $html .= "  </style>\n";
      $html .= "  <title>Breadcrumbs Demo</title>\n";
      $html .= " </head>\n";
      $html .= " <body>\n";
      $html .= "  <h1>" . htmlentities($pageTitle) . "</h1>\n";
      $html .= "  <div id='breadcrumbs'>Breadcrumbs</div>\n";
      $html .= '  <p>PHP_SESSION_ID: ' . session_id() . "</p>\n";

      return [$html, '  '];
   }

   public function getHtmlForFooter()
   {
      $html  = " </body>\n";
      $html .= "</html>\n";

      return $html;
   }

   public function getHtmlForLoremIpsumParagraph($indent)
   {
      $html  = "$indent<p>\n";
      $html .= "$indent Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam\n";
      $html .= "$indent eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam\n";
      $html .= "$indent voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione\n";
      $html .= "$indent voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit amet consectetur adipisci[ng]\n";
      $html .= "$indent velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et dolore magnam aliquam quaerat voluptatem.\n";
      $html .= "$indent Ut enim ad minima veniam, quis nostrum[d] exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi\n";
      $html .= "$indent consequatur? [D]Quis autem vel eum i[r]ure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae\n";
      $html .= "$indent consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? [33] At vero eos et accusamus et iusto odio\n";
      $html .= "$indent dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias\n";
      $html .= "$indent excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est\n";
      $html .= "$indent laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis\n";
      $html .= "$indent est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda\n";
      $html .= "$indent est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet,\n";
      $html .= "$indent ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut\n";
      $html .= "$indent reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\n";
      $html .= "$indent</p>\n";

      return $html;
   }

   public function getHtmlForPageLinksUl($indent)
   {
      $html  = "$indent<ul>\n";
      $html .= "$indent <li><a href='index.php'>Homepage</a></li>\n";
      $html .= "$indent <li><a href='page_1.php'>Page 1</a></li>\n";
      $html .= "$indent <li><a href='page_2.php'>Page 2</a></li>\n";
      $html .= "$indent <li><a href='page_3.php'>Page 3</a></li>\n";
      $html .= "$indent <li><a href='page_4.php'>Page 4</a></li>\n";
      $html .= "$indent <li><a href='page_5.php'>Page 5</a></li>\n";
      $html .= "$indent <li><a href='page_6.php'>Page 6</a></li>\n";
      $html .= "$indent <li><a href='page_7.php'>Page 7</a></li>\n";
      $html .= "$indent <li><a href='page_8.php'>Page 8</a></li>\n";
      $html .= "$indent <li><a href='page_9.php'>Page 9</a></li>\n";
      $html .= "$indent <li><a href='page_10.php'>Page 10</a></li>\n";
      $html .= "$indent</ul>\n";

      return $html;
   }
}
?>
