lft.directive 'lftBlogPost', ['$sce', ($sce) ->

  BlogPost = ['$scope', ($scope) ->
    this.post_id = $scope.post.ID
  ]

  lftBlogPost =
    restrict: 'EA'
    templateUrl: 'directives.blog.post'
    replace: true
    scope: { post: '=' }
    controller: BlogPost
    link: ($scope, $element, $attrs) ->

      $scope.htmlSafe = () ->
        if($scope.post)
          $sce.trustAsHtml $scope.post.post_content

]
