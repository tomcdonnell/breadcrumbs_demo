/*
 * vim: ts=3 sw=3 et wrap co=150 go-=b
 */

$(updateBreadcrumbs());

function updateBreadcrumbs()
{
   addCurrentPageToBreadcrumbs();

   let crumbs = getBreadcrumbsArray()

   crumbs = removeLoopsFromBreadcrumbsArray(crumbs);

   saveBreadCrumbsArrayToWindowName(crumbs);

   let html = '<ul>';

   for (let i = 0; i < crumbs.length; ++i) {
      let crumb = crumbs[i];

      html += '<li>';
      html +=  '&gt; ';
      html += (
         (i == crumbs.length - 1)?
         '<span>' + crumb.pageTitle + '</span>':
         "<a href='" + crumb.pageUrl + "'>" + crumb.pageTitle + '</a>'
      );
      html += '</li>';
   }

   html += '</ul>';

   $('#breadcrumbs').html('Breadcrumbs: ' + html).scrollLeft(9999999);
}

function addCurrentPageToBreadcrumbs()
{
   let pageTitleEqualsPageUrl = PAGE_TITLE + '=' + window.location.href;

   if (!window.name.endsWith('|' + pageTitleEqualsPageUrl)) {
      window.name += '|' + pageTitleEqualsPageUrl;
   }
}

/*
 * Encode crumbs array as a string, then save that string to window.name.
 * This is a useful way to save crumbs because window.name is special in
 * that its value is preserved when a new page is loaded in the same window.
 */
function saveBreadCrumbsArrayToWindowName(crumbs)
{
   let encodedArrayString = '';

   for (let i = 0; i < crumbs.length; ++i) {
      let crumb = crumbs[i];

      encodedArrayString += '|' + crumb.pageTitle + '=' + crumb.pageUrl;
   }

   window.name = encodedArrayString;
}

function getBreadcrumbsArray()
{
   let pageTitleEqualsPageUrlsInOrder = window.name.split('|');
   let crumbs                         = [];

   for (let i = 0; i < pageTitleEqualsPageUrlsInOrder.length; ++i) {
      let pageTitleEqualsPageUrl = pageTitleEqualsPageUrlsInOrder[i];
      let tokens                 = pageTitleEqualsPageUrl.split('=');
      let title                  = tokens[0];
      let url                    = tokens[1];

      if (title === '' || url === '') {
         continue;
      }

      crumbs.push({pageTitle: title, pageUrl: url});
   }

   return crumbs;
}

function removeLoopsFromBreadcrumbsArray(crumbs)
{
   if (crumbs.length <= 1) {
      // There cannot possibly be any loops to remove.
      return crumbs;
   }

   let crumbsNoLoops = [];

   // Remove loops from crumbs.
   for (let i = 0; i < crumbs.length; ++i) {
      let crumb              = crumbs[i];
      let matchingLaterCrumb = null;

      // Find last crumb with matching pageTitle.
      for (let j = crumbs.length - 1; j > i; --j) {

         if (crumbs[j].pageTitle === crumb.pageTitle) {
            matchingLaterCrumb = crumbs[j];
            i = j + 1;
            break;
         }
      }

      crumbsNoLoops.push((matchingLaterCrumb === null)? crumb: matchingLaterCrumb);
   }

   return crumbsNoLoops;
}
