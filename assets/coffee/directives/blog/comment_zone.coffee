lft.directive 'lftBlogPostCommentZone', [() ->

  lftBlogPostCommentZone =
    restrict: 'EA'
    replace: true
    templateUrl: 'directives.blog.comment_zone'
    link: () ->
      console.log 'hi!'

]
