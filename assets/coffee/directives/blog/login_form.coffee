lft.directive 'lftBlogLoginForm', ['GoogleApi', (GoogleApi) ->

  lftBlogLoginForm =
    restrict: 'EA'
    replace: true
    templateUrl: 'directives.blog.login_form'
    link: ($scope, $element, $attrs) ->

      $scope.openAuth = () ->
        GoogleApi.prompt()

]
