lft.directive 'lftBlogCommentForm', [() ->

  lftBlogCommentForm =
    restrict: 'EA'
    replace: true
    templateUrl: 'directives.blog.comment_form'
    link: ($scope, $element, $attrs) ->

      $scope.send = () ->
        console.log 'posting comment'


]
