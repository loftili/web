lft.directive 'lftBlogCommentForm', ['BlogApi', (BlogApi) ->

  lftBlogCommentForm =
    restrict: 'EA'
    replace: true
    templateUrl: 'directives.blog.comment_form'
    require: '^lftBlogPost'
    link: ($scope, $element, $attrs, BlogPost) ->

      $scope.send = () ->
        comment = new BlogApi.Comment
          comment: $scope.comment
          post_id: BlogPost.post_id
        comment.$save()



]
