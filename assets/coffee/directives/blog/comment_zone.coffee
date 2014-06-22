lft.directive 'lftBlogPostCommentZone', ['AuthManager', (AuthManager) ->

  lftBlogPostCommentZone =
    restrict: 'EA'
    replace: true
    templateUrl: 'directives.blog.comment_zone'
    link: ($scope, $element, $attrs) ->
      $scope.AuthManager = AuthManager


]
