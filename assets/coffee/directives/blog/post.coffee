lft.directive 'lftBlogPost', ['$sce', ($sce) ->

  lftBlogPost =
    restrict: 'EA'
    templateUrl: 'directives.blog.post'
    replace: true
    scope: { post: '=' }
    link: ($scope, $element, $attrs) ->

      $scope.htmlSafe = () ->
        if($scope.post)
          $sce.trustAsHtml $scope.post.post_content

]
